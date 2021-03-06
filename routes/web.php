<?php

use Illuminate\Support\Facades\Route;

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
    return view('home');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
//route Produks
Route::resource('produk', ProdukController::class);
//route Galeri
Route::resource('galeri', GaleriController::class);
//route berita
Route::resource('berita', beritaController::class);
//route komentar
Route::resource('komentar', KomentarController::class);
//route home
Route::get('home','HomeController@index');
Route::get('/home','HomeController@home');
