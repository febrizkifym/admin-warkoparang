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

Auth::routes();

Route::get('/',function(){
    return redirect('dashboard');
})->middleware('auth');

Route::get('/dashboard','HomeController@index')->name('dashboard');

Route::get('/pengaturan/','HomeController@config')->name('pengaturan');
Route::post('/pengaturan/konsumsi','HomeController@tambah_menu')->name('tambah_menu');
Route::get('/pengaturan/konsumsi/{id}/hapus','HomeController@hapus_menu')->name('hapus_menu');
Route::get('/pengaturan/konsumsi/{id}/edit','HomeController@edit_menu')->name('edit_menu');
Route::post('/pengaturan/konsumsi/{id}/edit','HomeController@update_menu');

Route::get('/penjualan/konsumsi','KonsumsiController@index')->name('pkonsumsi');
Route::post('/penjualan/konsumsi','KonsumsiController@tambah');
Route::get('/penjualan/konsumsi/{id}/edit','KonsumsiController@edit')->name('edit_pkonsumsi');
Route::post('/penjualan/konsumsi/{id}/edit','KonsumsiController@update');
Route::get('/penjualan/konsumsi/{id}/hapus','KonsumsiController@hapus')->name('hapus_pkonsumsi');

Route::get('/penjualan/bensin','BensinController@index')->name('pbensin');
Route::post('/penjualan/bensin','BensinController@tambah');
Route::get('/penjualan/bensin/{id}/edit','BensinController@edit')->name('edit_pbensin');
Route::post('/penjualan/bensin/{id}/edit','BensinController@update');
Route::get('/penjualan/bensin/{id}/hapus','BensinController@hapus')->name('hapus_pbensin');

Route::get('/penjualan/pulsa','PulsaController@index')->name('ppulsa');
Route::post('/penjualan/pulsa','PulsaController@tambah');
Route::get('/penjualan/pulsa/{id}/edit','PulsaController@edit')->name('edit_ppulsa');
Route::post('/penjualan/pulsa/{id}/edit','PulsaController@update');
Route::get('/penjualan/pulsa/{id}/hapus','PulsaController@hapus')->name('hapus_ppulsa');

Route::get('/pengeluaran/','HomeController@index')->name('pengeluaran');