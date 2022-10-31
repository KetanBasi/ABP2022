<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routeps
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/laravel', function () {
    return view('welcome');
});

// Route::get('/hello', function () {
//     return "Hello World!";
// });

Route::get('/', function () { return view('home'); });

Route::get('/produk', [ProdukController::class, 'index']);
Route::post('/produk', [ProdukController::class, 'store']);
Route::get('/produk/create', [ProdukController::class, 'create']);
Route::get('/produk/edit/{id}', [ProdukController::class, 'edit']);
Route::post('/produk/update/{id}', [ProdukController::class, 'update']);
Route::get('/produk/delete/{id}', [ProdukController::class, 'delete']);

Route::get('/brand', [BrandController::class, 'index']);
Route::post('/brand', [BrandController::class, 'store']);
Route::get('/brand/create', [BrandController::class, 'create']);
Route::get('/brand/edit/{id}', [BrandController::class, 'edit']);
Route::post('/brand/update/{id}', [BrandController::class, 'update']);
Route::get('/brand/delete/{id}', [BrandController::class, 'delete']);

Route::get('/gudang', [GudangController::class, 'index']);
Route::post('/gudang', [GudangController::class, 'store']);
Route::get('/gudang/create', [GudangController::class, 'create']);
Route::get('/gudang/edit/{id}', [GudangController::class, 'edit']);
Route::post('/gudang/update/{id}', [GudangController::class, 'update']);
Route::get('/gudang/delete/{id}', [GudangController::class, 'delete']);

Route::get('/customer', [CustomerController::class, 'index']);
Route::post('/customer', [CustomerController::class, 'store']);
Route::get('/customer/create', [CustomerController::class, 'create']);
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit']);
Route::post('/customer/update/{id}', [CustomerController::class, 'update']);
Route::get('/customer/delete/{id}', [CustomerController::class, 'delete']);
