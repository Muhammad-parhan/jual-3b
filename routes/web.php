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
    return view('welcome');
});

Route::get('produk','produkctrl@awal');
Route::get('produk/ad','produkctrl@add');
Route::post('produk/addp','produkctrl@addProcess');
Route::get('produk/edit/{id}','produkctrl@edit');
Route::patch('produk/{id}','produkctrl@editProcess');
Route::delete('produk/{id}','produkctrl@delete');
Route::get('kategori','kategorictrl@awal');
Route::get('kategori/ad','kategorictrl@add');
Route::post('kategori/addp','kategorictrl@addProcess');
Route::get('kategori/edit/{id}','kategorictrl@edit');
Route::patch('kategori/{id}','kategorictrl@editProcess');
Route::delete('kategori/{id}','kategorictrl@delete');



