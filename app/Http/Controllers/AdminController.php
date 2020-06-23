<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Validator;
use App\admin\katalog;
use App\admin\foto;
use App\admin\gallery;
use App\admin\album;
use App\admin\about;
use App\master\halaman;
use App\Order\Order;
use App\Order\Payment;
use App\Location\City;
use View;
use DB;
use Auth;

class AdminController extends Controller
{		
	  protected $foto  ;
	 public function __construct(foto $foto)
    {
         $this->middleware(['auth','verified']);
          $this->foto = $foto;

    }
   public function index(){


   	return view('admin/index');
   }

   public function katalog (){


   	return view('admin/katalog');
   }

   public function history (){
     $payments = Payment::all();

    return view('admin/payment',compact('payments'));
   }

   public function history_det ($order_id){

        
         $data = DB::table('orders')
        ->where('orders.order_id','=', $order_id)
        ->join('payments','payments.order_id', '=', 'orders.order_id')
        ->join('cities','cities.city_id', '=', 'payments.city_id')
        ->select('orders.*','payments.nama as pembeli','payments.email','payments.phone','payments.address','payments.note','payments.amount','payments.status', 'cities.title as kota')
        ->get();

   
    return view('admin/paydet',compact('data'));
   }

   public function about (){

        $data = about::first();
    return view('admin/about',compact('data'));
   }

   public function hal_depan (){
        $data = halaman::find(1);

    return view('admin/depan',compact('data'));
   }

   public function katalogdata (){

   		$katalog= katalog::all();

   	return view('admin/katalogdata',compact('katalog','data3','data'));
   }

    public function hal_depan_up (Request $request){

         $validation = Validator::make($request->all(),[
            
            'judul' => 'required',
            'isi' => 'required',
            'alamat' => 'required',
             ]);

        if ($validation->fails()) {
            return redirect()->back()->with(['gagal' => 'pastikan *terisi dan yang anda masukkan file type jpeg,png,jpg,gif,svg | Max 2.4 Mb! ']);
        }

        else{
            $id = $request->id;
        $data = halaman::find($id) ;
        $data->judul = $request->judul;
        $data->isi   = $request->isi;
        $data->vidio = $request->alamat;

        $data->save();
           return redirect()->back()->with(['sukses' => 'Berhasil Memperbari data!']);
        }


    
   }

   public function about_up (Request $request){

         $validation = Validator::make($request->all(),[
            
            'misi' => 'required',
            'visi' => 'required',
            'alamat' => 'required',
             ]);

        if ($validation->fails()) {
            return redirect()->back()->with(['gagal' => 'pastikan *terisi dan yang anda masukkan file type jpeg,png,jpg,gif,svg | Max 2.4 Mb! ']);
        }

        else{
            
        $data = about::find(1) ;
        $data->misi = $request->misi;
        $data->visi   = $request->visi;
        $data->alamat = $request->alamat;

        $data->save();
           return redirect()->back()->with(['sukses' => 'Berhasil Memperbari data!']);
        }


    
   }

   public function katalogdet ($id){

   		$data3= katalog::find($id);

   		 $data2 = DB::table('foto')
        ->where('foto.id_katalog','=', $id)
        ->join('katalog','foto.id_katalog', '=', 'katalog.id')
        ->select('foto.*','katalog.cover','katalog.nama','katalog.deskripsi','katalog.harga')
        ->get();

   return view('admin/katalogdet',compact('katalog','data2','data'));
   }
   public function katalog_up (Request $request){

        $validation = Validator::make($request->all(),[
            
            'judul' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
            ]);

        if ($validation->fails()) {
            return redirect()->back()->with(['gagal' => 'pastikan *terisi dan yang anda masukkan file type jpeg,png,jpg,gif,svg | Max 2.4 Mb! ']);
        }

        else{

        $uploadedFile = $request->file('cover'); 

        if ($uploadedFile == NULL){

            return redirect()->back()->with(['gagal' => 'gambar belom diisi']);
        }

        else{
        $uploadedFile = $request->file('cover'); 
        $name = time().'.'.$uploadedFile->getClientOriginalName();

        $path = $uploadedFile->move('gambar/cover',$name);

           }
        }

            $res = new katalog;
            
            $res->cover = $name;
           
            $res->nama = $request->judul;
            $res->deskripsi = $request->deskripsi;
            $res->harga = $request->harga;
           
         
            $res->save();

            $id = $res->id;
           

        if ($request->hasFile('image') == null) {

            $images = $request->file('image');
            return redirect()->back()->with(['sukses' => 'Anda belum menambahkan foto katalog!']);
            }

        else{
            $images = $request->file('image');
            foreach($images as $key => $image) {
                //create new instance of Photo class

              
                $albums = $id;
                
                $name2 = time().'.'.$image->getClientOriginalName();
                $path2 = $image->move('gambar/foto',$name2);
                
                
                $newPhoto = new $this->foto;
                $newPhoto->id_katalog  = $albums;
                $newPhoto->file     = $name2;
               
                $newPhoto->save();

                
            }
        }
                return redirect()->back()->with(['sukses' => 'Berhasil menambahkan katalog!']);
        
    }

    public function katalog_edit(Request $request, $id){

         $uploadedFile = $request->file('cover');
         $res =  katalog::find($id);

        if($uploadedFile == null){

            
            $res->cover = $request->cover2;
            $res->nama = $request->judul;
            $res->deskripsi = $request->deskripsi;
            $res->harga = $request->harga;
           	$res->save();

             $id2 = $res->id;

            if ($request->hasFile('image') == null) {

                $images = $request->file('image');
                return redirect()->back()->with(['sukses' => 'Berhasil mengedit , Anda belum menambahkan foto katalog!']);
                }

            else{
                $images = $request->file('image');
                foreach($images as $key => $image) {
                    //create new instance of Photo class

                    $albums = $id2;
                    $name2 = time().'.'.$image->getClientOriginalName();
                    $path2 = $image->move('gambar/foto',$name2);
                    
                    
                    $newPhoto = new $this->foto;
                    $newPhoto->id_katalog  = $albums;
                    $newPhoto->file     = $name2;
                   
                    $newPhoto->save();
                }
            }

         }
         else{

            $validation = Validator::make($request->all(),[
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
            ]);

             if ($validation->fails()) {
            return redirect()->back()->with(['gagal' => 'pastikan *terisi dan yang anda masukkan file type jpeg,png,jpg,gif,svg | Max 2.4 Mb! ']);
            } 
            else{

            $name = time().'.'.$uploadedFile->getClientOriginalName();
            $path = $uploadedFile->move('gambar/cover',$name);

            $res->cover = $name;
          	$res->nama = $request->judul;
            $res->deskripsi = $request->deskripsi;
            $res->harga = $request->harga;
           
            $res->save();

                if ($request->hasFile('image') == null) {

                    $images = $request->file('image');
                    return redirect()->back()->with(['sukses' => 'Berhasil mengedit , Anda belum menambahkan foto katalog!']);
                    }

                else{
                    $images = $request->file('image');
                    foreach($images as $key => $image) {
                        //create new instance of Photo class

                        

                        $albums = $id2;
                        
                        $name2 = time().'.'.$image->getClientOriginalName();
                        $path2 = $image->move('gambar/foto',$name2);
                        
                        
                        $newPhoto = new $this->foto;
                        $newPhoto->id_katalog  = $albums;
                        $newPhoto->file     = $name2;
                       
                        $newPhoto->save();

                        
                    }
                }
            }
           
         } 
            return redirect()->back()->with(['sukses' => 'Berhasil mengedit katalog']);

    }

    public function hapus_foto ($id){

        $hapus = foto::find($id);

        $path = public_path()."/gambar/foto/".$hapus->file;
        unlink($path);
        $hapus -> forceDelete();

        return redirect()->back()->with(['sukses' => 'Berhasil menghapus foto']);
    }

     public function gallery(){

     	return view('admin/gallery');
     }

     public function gallerydata(){

     	$data = album::all();
     	

     	return view('admin/datagallery',compact('data'));
     }

     public function gallerydet($id){

     	$data = DB::table('gallery')
        ->where('gallery.id_album','=', $id)
        ->join('album','gallery.id_album', '=', 'album.id')
        ->select('gallery.*', 'album.id as id_album ', 'album.cover','album.judul')
        ->get();

     	return view('admin/detgallery',compact('data'));
     }

    public function gallery_up(Request $request){

         $validation = Validator::make($request->all(),[
            'judul' => 'required',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
            ]);

        if ($validation->fails()) {
            return redirect()->back()->with(['gagal' => 'pastikan *terisi dan yang anda masukkan file type jpeg,png,jpg,gif,svg | Max 2.4 Mb! ']);
        }

        else{

        $uploadedFile = $request->file('cover'); 

        if ($uploadedFile == NULL){

            return redirect()->back()->with(['gagal' => 'gambar belom diisi']);
        }

        else{
        $uploadedFile = $request->file('cover'); 
        $name = time().'.'.$uploadedFile->getClientOriginalName();

        $path = $uploadedFile->move('gambar/gallery/cover',$name);

           }
        }

            $res = new album;
            $res->cover = $name;
            $res->judul = $request->judul;
            $res->id_admin = Auth::user()->id;
         
            $res->save();

            $id = $res->id;

        if ($request->hasFile('image') == null) {

            $images = $request->file('image');
            return redirect()->back()->with(['sukses' => 'Anda belum menambahkan foto katalog!']);
            }

        else{
            $images = $request->file('image');
            foreach($images as $key => $image) {
                //create new instance of Photo class

                

                $albums = $id;
                
                $name2 = time().'.'.$image->getClientOriginalName();
                $path2 = $image->move('gambar/gallery/foto',$name2);
                
                
                $newPhoto = new gallery;
                $newPhoto->id_album  = $albums;
                $newPhoto->file     = $name2;
               
                $newPhoto->save();

                
            }
        }
                return redirect()->back()->with(['sukses' => 'Berhasil menambahkan gallery!']);
        

        return view('admin/gallery');
    }

    public function gallery_edit(Request $request, $id){

        $uploadedFile = $request->file('cover');
         $res =  album::find($id);

        if($uploadedFile == null){

            $res->cover = $request->cover2;
            $res->judul = $request->judul;
            $res->id_admin = Auth::user()->id;
            $res->save();

             $id2 = $res->id;

            if ($request->hasFile('image') == null) {

                $images = $request->file('image');
                return redirect()->back()->with(['sukses' => 'Berhasil mengedit , Anda tidak mengedit foto gallery!']);
                }

            else{
                $images = $request->file('image');
                foreach($images as $key => $image) {
                    //create new instance of Photo class

                    

                    $albums = $id2;
                    
                    $name2 = time().'.'.$image->getClientOriginalName();
                    $path2 = $image->move('gambar/gallery/foto',$name2);
                    
                    
                    $newPhoto = new gallery;
                    $newPhoto->id_album  = $albums;
                    $newPhoto->file     = $name2;
                   
                    $newPhoto->save();

                    
                }
            }

         }
         else{

            $validation = Validator::make($request->all(),[
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg'
            ]);

             if ($validation->fails()) {
            return redirect()->back()->with(['gagal' => 'pastikan *terisi dan yang anda masukkan file type jpeg,png,jpg,gif,svg | Max 2.4 Mb! ']);
            } 
            else{

            $name = time().'.'.$uploadedFile->getClientOriginalName();
            $path = $uploadedFile->move('gambar/gallery/cover',$name);

            $res->cover = $name;
            $res->judul = $request->judul;
            $res->id_admin = Auth::user()->id;

            $res->save();

                if ($request->hasFile('image') == null) {

                    $images = $request->file('image');
                    return redirect()->back()->with(['sukses' => 'Berhasil mengedit , Anda belum menambahkan foto katalog!']);
                    }

                else{
                    $images = $request->file('image');
                    foreach($images as $key => $image) {
                        //create new instance of Photo class

                        

                        $albums = $id2;
                        
                        $name2 = time().'.'.$image->getClientOriginalName();
                        $path2 = $image->move('gambar/gallery/foto',$name2);
                        
                        
                        $newPhoto = new gallery;
                        $newPhoto->id_katalog  = $albums;
                        $newPhoto->file     = $name2;
                       
                        $newPhoto->save();

                        
                    }
                }
            }
           
         } 
            return redirect()->back()->with(['sukses' => 'Berhasil mengedit gallery']);

    }

    public function hapus_gallery ($id){

        $hapus = gallery::find($id);

        $path = public_path()."/gambar/gallery/foto/".$hapus->file;
        unlink($path);
        $hapus -> forceDelete();

        return redirect()->back()->with(['sukses' => 'Berhasil menghapus foto']);
    }
    
    
}
