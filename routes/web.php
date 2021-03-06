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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'admin' , 'Middleware'=>['auth' , 'role:admin']], function(){
Route::resource('eskuls','EskulController');
Route::resource('prestasis','PrestasiController');
Route::resource('fasilitas','FasilitasController');
Route::resource('industris','IndustriController');
Route::resource('jurusans','JurusanController');
Route::resource('beritas','BeritaController');
Route::resource('gurustafs','GurustafController');
Route::resource('galeri','GaleriController');
});
Auth::routes();
Route::get('cek',function(){
    return view('layouts.admin');

});
