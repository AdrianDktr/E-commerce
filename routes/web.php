<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

//product
Route::get('/index-product', [ProductController::class, 'index'])->name('index_product');
Route::get('/create-product', [ProductController::class, 'create'])->name('create_product');
Route::post('/store-product', [ProductController::class, 'store'])->name('store_product');
Route::get('/show-product/{product}', [ProductController::class, 'show'])->name('show_product');
Route::get('/edit-product/{product}', [ProductController::class, 'edit'])->name('edit_product');
Route::patch('/update-product/{product}', [ProductController::class, 'update'])->name('update_product');
Route::delete('/delete-product/{product}', [ProductController::class, 'delete'])->name('delete_product');

//cart
Route::post('/store-cart/{product}', [CartController::class, 'add_to_cart'])->name('store_cart');
Route::get('/show-cart', [CartController::class, 'show'])->name('show_cart');
Route::patch('/update-cart/{cart}', [CartController::class, 'update'])->name('update_cart');
Route::delete('/delete-cart/{cart}', [CartController::class,'delete'])->name('delete_cart');

//orders
Route::post('/checkout-order',[OrderController::class, 'checkout'])->name('checkout');
