<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Cart;
use Auth;
use DB;
use Validator;
use App\User;
use App\admin\katalog;
use App\Order\Order;
use App\Order\Payment;
use Ramsey\Uuid\Uuid;
use Carbon\Carbon;
use App\Location\City;
use Session;
use Veritrans_Config;
use Veritrans_Snap;
use Veritrans_Notification;
use App\Notifications\NewOrderNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Notification;

class OrderController extends Controller
{   
    public function __construct(Request $request)
    {   
        // $this->middleware(['auth','verified']);

        $this->request = $request;
 
        // Set midtrans configuration
        Veritrans_Config::$serverKey = config('services.midtrans.serverKey');
        Veritrans_Config::$isProduction = config('services.midtrans.isProduction');
        Veritrans_Config::$isSanitized = config('services.midtrans.isSanitized');
        Veritrans_Config::$is3ds = config('services.midtrans.is3ds');
    }

    public function getCity(Request $request)
    {
        $city = City::where('province_id', $request->province_id)->pluck("title","city_id");
            return response()->json($city);
    }

     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkOutIndex()
    {   
        $cartItems = Cart::content();
        return view('', compact('cartItems'));
    }

    public function addToCart(Request $request)
    {   $products = katalog::where('katalog.id', $this->request->id)->first();

        Cart::add($this->request->id, $products->nama,1,$products->harga,['cover' => $products->cover]);

        $cartItems = Cart::content();
        response()->json($cartItems);
        return view('commons.ajax.cartButton', compact('cartItems'));
    }

    public function updateCart(Request $request){
        Cart::update($this->request->id,['qty' => $this->request->qty, "options" => ['cover' => $this->request->cover]]);
            
        $cartItems = Cart::content();
        $cartSubTotal = number_format(Cart::subtotal(), 2, ',','.');

        response()->json($cartItems);
        alert()->success('Cart anda telah berhasil di update')->persistent('Close');
        return back();

    }

    public function deleteCart(Request $request){
        Cart::remove($this->request->id);

        $cartSubTotal = number_format(Cart::subtotal(), 2, ',','.');

        $cartItems = Cart::content();
        response()->json($cartItems);

        return response()->json(['success' => 'Data is successfully deleted', 'data' => $cartItems, 'subTotal' => $cartSubTotal, 'count' => $cartItems->count()]);
    }

    public function deleteAllCart(Request $request){
        Cart::destroy();

        alert()->success('Cart anda telah berhasil di kosongkan')->persistent('Close');
        return back();

    }

    public function deleteCartIndex(Request $request){
        Cart::remove($this->request->id);

        $cartItems = Cart::content();
        $cartSubTotal = number_format(Cart::subtotal(), 2, ',','.');

        response()->json($cartItems);
        return view('', compact('cartItems'));
    }

    public function storeCart()
    {
        Cart::instance('history')->store(Auth::user()->id);

        Cart::destroy();

        return redirect()->route('')->withInfo('Item Belanja anda telah berhasil terekam, Silahkan lakukan Checkout ketika siap.');
    }

    public function restoreCart()
    {
        Cart::instance('history')->store(Auth::user()->id);

        return view('')->withInfo('Item Belanja anda telah berhasil di restore, Silahkan melanjutkan belanja Anda. Terima Kasih!');
    }

    public function orderProccess(Request $request)
    {   
        $rules = array(
            'first_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
        );

        $messages = array(
                'first_name.required' => 'Maaf, Nama Pemesan tidak boleh dikosongi.',
                'last_name.required' => 'Maaf, Nama Pemesan tidak boleh dikosongi.',
                'address.required' => 'Maaf, Alamat Pemesan tidak boleh dikosongi.',
                'email.required' => 'Maaf, Email Pemesan tidak boleh dikosongi.',
                'phone.required' => 'Maaf, No. Telepon Pemesan tidak boleh dikosongi.',
            );

        $error = Validator::make($this->request->all(), $rules, $messages);

        if($error->fails())
        {
            return redirect()->back()->with(['errors' => $error->errors()->all()]);
        }

        if (Session::has('data_customers')) {
             Session::forget('data_customers');
        }
        if (Session::has('order_id')) {
             Session::forget('order_id');
        }

        $cartItems = Cart::content();

        $dataCust = [
                        'nama' => $request->first_name. ' '. $request->last_name,
                        'email' => $request->email,
                        'phone' => $request->phone,
                        'address' => $request->address,
                        'city_id' => $request->city_id,
                        'note' => $request->note,
                    ];

        Session::put('data_customers', $dataCust);

        $dataCustomers = Session::get('data_customers');

        return view('master.payment', compact('dataCustomers', 'cartItems'));
    }

    public function orderCart()
    {   
        // if (Cart::content()->count() < 1) {
            
        //     alert()->success('Silahkan selesaikan terlebih dahulu transaksi anda sebelumnya')->persistent('Close');
        //     return redirect()->route('toko');
        // }
        // $cost = RajaOngkir::ongkosKirim([
        //     'origin' => 444,
        //     'destination' => $request->city_id,
        //     'weight' => 1000,
        //     'courier' => $request->courier_id,
        // ])->get();

        // $ongkosKirim = $cost[0]['costs'][1]['cost'][0]['value'];

        \DB::transaction( function() {

            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'; 
            $randomString = ''; 
              
            for ($i = 0; $i < 4; $i++) { 
                $index = rand(0, strlen($characters) - 1); 
                $randomString .= $characters[$index]; 
            }

            $t = time();
            $date = date("Y-md",$t);
            $randomId = $date .'-'. $randomString;

                $dataCustomers = Session::get('data_customers');

            $payments = Payment::create([
                'user_id' => Auth::user()->id,
                'order_id' => $randomId,
                // 'pengiriman' => $this->request->courier_id,
                'amount' => floatval(Cart::subtotal()),
                'nama' => $dataCustomers['nama'],
                'email' => $dataCustomers['email'],
                'address'=> $dataCustomers['address'],
                'city_id' => $dataCustomers['city_id'],
                'phone' => $dataCustomers['phone'],
                'note' => $dataCustomers['note'],
            ]);
            
            Session::put('order_id', $payments->order_id);

            foreach (Cart::content() as $cart) {
                $items[] = array(
                    'id'                  => $cart->rowId,
                    'name'                => $cart->name,
                    'price'               => floatval($cart->price),
                    'quantity'            => $cart->qty,
                );
            }

            // Buat transaksi ke midtrans kemudian save snap tokennya.
            $payload = [
                'transaction_details' => [
                    'order_id'      => $payments->id,
                    'gross_amount'  => floatval($payments->amount),
                ],
                'customer_details' => [
                    'first_name'    => $payments->nama,
                    'email'         => $payments->email,
                    'address'       => $payments->address,
                    'phone'         => $payments->phone,
                ],
                'item_details' =>
                    $items
            ];

            $snapToken = Veritrans_Snap::getSnapToken($payload);
            $payments->snap_token = $snapToken;
            $payments->save();
 
            // Beri response snap token
            $this->response['snap_token'] = $snapToken;
            
            $data = array(
                'order_id' => $payments->order_id,
                'amount' => $payments->amount,
                );

            $orders = New Order;
            $orders->user_id = Auth::user()->id;

            foreach (Cart::content() as $cart) {
                $orders=Auth::user()->orders()->create([
                    'order_id' => $payments->order_id,
                    'product_qty' =>$cart->qty,
                    'product_id' => $cart->id,
                    'total' =>$cart->qty+$cart->subtotal,
                    'product_name'=> $cart->name,
                    'product_image' =>$cart->options->has('cover')?$cart->options->cover:'',
                    'product_price' => $cart->price,
                ]);
            }
            $orders->save();    
        });

        Cart::destroy();
        return response()->json($this->response);
        // return redirect()->route();
    }

    /**
     * Midtrans notification handler.
     *
     * @param Request $request
     * 
     * @return void
     */
    public function notificationHandler(Request $request)
    {   
        $notif = new Veritrans_Notification();
        \DB::transaction(function() use($notif) {
 
          $transaction = $notif->transaction_status;
          $type = $notif->payment_type;
          $orderId = $notif->order_id;
          $fraud = $notif->fraud_status;
          $order = Payment::findOrFail($orderId);
 
          if ($transaction == 'capture') {
 
            // For credit card transaction, we need to check whether transaction is challenge by FDS or not
            if ($type == 'credit_card') {
 
              if($fraud == 'challenge') {
                $order->setPending();
                // return redirect()->route();
              } else {
                $order->setSuccess();
                // return redirect()->route();
              }
 
            }
 
          } elseif ($transaction == 'settlement') {

            $order->setSuccess();

            // return redirect()->route();
 
          } elseif($transaction == 'pending'){
 
            $order->setPending();

            // return redirect()->route();
 
          } elseif ($transaction == 'deny') {
 
            $order->setFailed();

            // return redirect()->route();
 
          } elseif ($transaction == 'expire') {
 
            $order->setExpired();
 
          } elseif ($transaction == 'cancel') {
 
            $order->setFailed();

            // return redirect()->route();
 
          }
 
        });
 
        return;
    }


    public function received($orderId)
    {
        $order = Order::where('order_id', $orderId)
            ->where('user_id', Auth::user()->id)
            ->firstOrFail();

        return view('master.received', compact('order'));
    }

    public function completed(Request $request)
    {
        $code = Session::get('order_id');
        $order = Payment::where('order_id', $code)->firstOrFail();
        
        if ($order->payment_status == 'pending') {
            return redirect('payments/failed?order_id='. $code);
        }

        Session::flash('success', "Thank you for completing the payment process!");

        return redirect('orders/received/'. $order->id);
    }

    public function unfinish(Request $request)
    {
        $code = Session::get('order_id');
        $order = Order::where('order_id', $code)->firstOrFail();

        Session::flash('error', "Sorry, we couldn't process your payment.");

        return redirect('orders/received/'. $order->id);
    }

    public function failed(Request $request)
    {
        $code = Session::get('order_id');
        $order = Order::where('order_id', $code)->firstOrFail();

        Session::flash('error', "Sorry, we couldn't process your payment.");

        return redirect('orders/received/'. $order->id);
    }



    public function historyOrder()
    {   
        $payments = Payment::where('user_id', Auth::user()->id)->get();

        return view('master.history', compact('payments'));
    }

    public function historyOrderDetail($orderId)
    {
        $orders = Order::where('order_id', $orderId)
            ->where('user_id', Auth::user()->id)
            ->get();

        return view('master.historyDetail', compact('orders'));        
    }

    public function deleteHistory($orderId) 
    {   
        $order = Order::where('order_id', $orderId)->get();

        foreach ($order as $items) {
            $items->delete();
        }

        Payment::where('order_id', $orderId)->first()->delete();

        alert()->success('History belanja anda telah berhasil dihapus')->persistent('Close');
        return back();
    }
}
