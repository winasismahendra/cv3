<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\admin\katalog;
use App\admin\foto;
use DB;
use Cart;
use App\admin\album;
use App\admin\about;
use App\master\halaman;
use Auth;


class MasterController extends Controller
{
    public function index(){
        
         
         $katalog = katalog::orderBy('created_at', 'desc')->paginate(3);
         $halaman = halaman::find(1);
       

    	return view('master/index',compact('katalog','halaman'));
    }

    public function logout(){
        Auth::logout();
        return redirect('user');
    }

    public function kontak(){


    	return view('master/kontak');
    }

     public function tentang(){

        $data = about::first();

        return view('master/tentang',compact('data'));
    }

    public function toko(){

        $katalog= katalog::paginate(9);

    	return view('master/toko',compact('katalog'));
    }

     public function tokodet($id){

        
        $katalog = DB::table('foto')
        ->where('foto.id_katalog','=', $id)
        ->join('katalog','foto.id_katalog', '=', 'katalog.id')
        ->select('foto.*','katalog.cover','katalog.nama','katalog.deskripsi','katalog.harga')
        ->get();

        return view('master/tokodet',compact('katalog'));
    }

     public function login(){


    	return view('master/login');
    }

    public function daftar(){


    	return view('master/daftar');
    }

     public function gallery(){

        $data = album::all();

        return view('master/album',compact('data'));
    }

    public function gallery2($judul){

       
        $id = album::where('judul', $judul)->first()->id;
        
        $data = DB::table('gallery')
        ->where('gallery.id_album','=', $id)
        ->join('album','gallery.id_album', '=', 'album.id')
        ->select('gallery.*', 'album.id as id_album ', 'album.cover','album.judul')
        ->get();

        return view('master/gallery',compact('data'));
    }

    public function cart(){
        $cartItems = Cart::content();
        return view('master/cart', compact('cartItems'));

        if ($cartItems->count() < 1) {
            alert()->warning('Maaf halaman tidak tersedia, pastikan cart anda terisi untuk melakukan proses Checkout')->persistent('Close');
            return back();
        }
        else
        {
            return view('master/cart', compact('cartItems'));
        }
    }

     public function cek_out(){
        $cartItems = Cart::content();

        return view('master/cek_out', compact('cartItems'));
    }

}
