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
Route::get('/penjualan/bensin','BensinController@index')->name('penjualan_bensin');
Route::post('/penjualan/bensin','BensinController@tambah');