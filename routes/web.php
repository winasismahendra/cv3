<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/tes', function () {
    return view('layout.master');
});
Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

Route::get('/', 'MasterController@index')->name('rumah');
Route::get('/kontak', 'MasterController@kontak')->name('kontak');
Route::get('/toko', 'MasterController@toko')->name('toko');
Route::get('/toko/{id}', 'MasterController@tokodet')->name('tokodet');
Route::get('/masuk', 'MasterController@login')->name('user');
Route::get('/cart', 'MasterController@cart')->name('cart');
Route::get('/cek-out', 'MasterController@cek_out')->name('cek_out');
Route::get('/tentang', 'MasterController@tentang')->name('tentang');
Route::get('/daftar', 'MasterController@daftar')->name('daftar');
Route::get('/gallery', 'MasterController@gallery')->name('gallery');
Route::get('/gallery/{judul}', 'MasterController@gallery2')->name('gallery2');


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/hal-depan', 'AdminController@hal_depan')->name('depan');
Route::post('/hal-depan-up', 'AdminController@hal_depan_up')->name('depan_up');

Route::get('/katalog', 'AdminController@katalog')->name('katalog');
Route::get('/katalog/{id}', 'AdminController@katalogdet')->name('katalog_det');
Route::get('/data-katalog', 'AdminController@katalogdata')->name('katalog_data');
Route::post('/katalog/{id}/proses','AdminController@katalog_edit')->name('katalog_edit');
Route::post('/katalog-up', 'AdminController@katalog_up')->name('katalog_up');
Route::get('/hapus-foto/{id}','AdminController@hapus_foto')->name('hapus_foto');

Route::get('/adm-gallery', 'AdminController@gallery')->name('galleryadmin');
Route::get('/adm-gallery/{id}', 'AdminController@gallerydet')->name('galleryadmindet');
Route::get('/adm-gallery-data', 'AdminController@gallerydata')->name('gallerydata');
Route::post('/gallery-up','AdminController@gallery_up')->name('gallery_up');
Route::post('/gallery-edit/{id}','AdminController@gallery_edit')->name('gallery_edit');
Route::get('/hapus-gallery/{id}','AdminController@hapus_gallery')->name('hapus_gallery');
Route::get('/adm-status', 'AdminController@history')->name('history');
Route::get('/adm-status-det/{order_id}', 'AdminController@history_det')->name('history_det');

Route::get('/adm-about', 'AdminController@about')->name('about');
Route::post('/adm-about-up', 'AdminController@about_up')->name('about_up');
Route::get('/adm-kontak', 'AdminController@kontak')->name('kontak_adm');



Route::get('/dashboard', 'AdminController@index')->name('landing');


Route::get('/get-city-list', 'OrderController@getCity');

Route::group(['as' => 'order.'], function () {

	Route::get('/addToCart', 'OrderController@addToCart')->name('addToCart');
	Route::match(['put', 'patch'], '/cart','OrderController@updateCart')->name('updateCart');
	Route::delete('/deleteCartItem/{id}','OrderController@deleteCart')->name('deleteCart');

	Route::delete('/deleteAllCartItem','OrderController@deleteAllCart')->name('deleteAllCart');
	Route::delete('/deleteHistory/{orderId}','OrderController@deleteHistory')->name('deleteHistory');

	Route::post('/order/payment', 'OrderController@orderCart')->name('payment');
	Route::post('/payment', 'OrderController@orderProccess')->name('proccess');
	Route::post('/notification/handler', 'OrderController@notificationHandler')->name('notification.handler');

	Route::get('payments/completed', 'OrderController@completed');
	Route::get('payments/failed', 'OrderController@failed');
	Route::get('payments/unfinish', 'OrderController@unfinish');

	Route::get('orders/received/{orderID}', 'OrderController@received');

	Route::get('orders/history', 'OrderController@historyOrder')->name('history');
	Route::get('orders/history/{orderId}', 'OrderController@historyOrderDetail')->name('history.detail');
});
