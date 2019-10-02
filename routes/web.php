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

//BERITA
//Awal
Route::get('/berita', 'BeritaController@indexAwal');



//KOnten
Route::get('/konten/home', 'BeritaController@indexHomeKonten');

Route::get('/konten/help', 'BeritaController@indexHelp');

Route::get('/konten/about', 'BeritaController@indexAbout');

Route::get('/konten/page/content/{id_berita}', 'BeritaController@indexKonten');

Route::post('/konten/home', 'BeritaController@store');



//Form 
Route::get('/berita/create', 'BeritaController@create');

Route::get('/berita/{id_berita}/edit', 'BeritaController@edit');

Route::patch('/berita/{id_berita}', 'BeritaController@update');

Route::delete('/berita/{id_berita}', 'BeritaController@destroy');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
