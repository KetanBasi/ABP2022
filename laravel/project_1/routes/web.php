<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BrandController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GudangController;
use App\Http\Controllers\MarketController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;

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

// Route::get ('/hello', function () {
//     return "Hello World!";
// });

// Route::get ('/', function() { return view('home'); });
Route::get ('/', [DashboardController::class, 'dashboard']);

Route::get ('/main',           function() { return view('main');           });
Route::get ('/test',           function() { return view('test');           });
Route::get ('/test/table',     function() { return view('test.table');     });
Route::get ('/test/table-old', function() { return view('test.table-old'); });

Route::get ('/sign-in', [UserController::class, 'sign_in' ]);
Route::post('/sign-in', [UserController::class, 'verify'  ]);
Route::get ('/sign-up', [UserController::class, 'sign_up' ]);
Route::post('/sign-up', [UserController::class, 'register']);

Route::get ('/produk',             [ProdukController::class, 'index' ]);
Route::post('/produk',             [ProdukController::class, 'store' ]);
Route::get ('/produk/create',      [ProdukController::class, 'create']);
Route::get ('/produk/edit/{id}'  , [ProdukController::class, 'edit'  ]);
Route::post('/produk/update/{id}', [ProdukController::class, 'update']);
Route::get ('/produk/delete/{id}', [ProdukController::class, 'delete']);

Route::get ('/brand',             [BrandController::class, 'index' ]);
Route::post('/brand',             [BrandController::class, 'store' ]);
Route::get ('/brand/create',      [BrandController::class, 'create']);
Route::get ('/brand/edit/{id}'  , [BrandController::class, 'edit'  ]);
Route::post('/brand/update/{id}', [BrandController::class, 'update']);
Route::get ('/brand/delete/{id}', [BrandController::class, 'delete']);

Route::get ('/gudang',             [GudangController::class, 'index'  ]);
Route::post('/gudang',             [GudangController::class, 'store'  ]);
Route::get ('/gudang/create',      [GudangController::class, 'create' ]);
Route::get ('/gudang/edit/{id}'  , [GudangController::class, 'edit'   ]);
Route::get ('/gudang/detail/{id}', [GudangController::class, 'details']);
Route::post('/gudang/update/{id}', [GudangController::class, 'update' ]);
Route::get ('/gudang/delete/{id}', [GudangController::class, 'delete' ]);

Route::get ('/customer',             [CustomerController::class, 'index' ]);
Route::post('/customer',             [CustomerController::class, 'store' ]);
Route::get ('/customer/create',      [CustomerController::class, 'create']);
Route::get ('/customer/edit/{id}'  , [CustomerController::class, 'edit'  ]);
Route::post('/customer/update/{id}', [CustomerController::class, 'update']);
Route::get ('/customer/delete/{id}', [CustomerController::class, 'delete']);

Route::get ('/market',                        [MarketController::class, 'index'   ]); //* Market list items
Route::post('/market',                        [MarketController::class, 'store'   ]); //* Add item to cart
Route::get ('/market/detail/{id}',            [MarketController::class, 'detail'  ]); //* Market get item details
Route::get ('/market/cart/{uid}',             [MarketController::class, 'cart'    ]); //* User Cart
Route::get ('/market/cart/{uid}/reset',       [MarketController::class, 'reset'   ]); //* User Cart reset
Route::post('/market/cart/{uid}/update',      [MarketController::class, 'update'  ]); //* User Cart Order update
Route::get ('/market/cart/{uid}/checkout',    [MarketController::class, 'checkout']); //* User Cart checkout
Route::get ('/market/cart/{uid}/detail/{id}', [MarketController::class, 'order'   ]); //* User Cart Order detail
Route::get ('/market/cart/{uid}/delete/{id}', [MarketController::class, 'delete'  ]); //* User Cart Order delete
