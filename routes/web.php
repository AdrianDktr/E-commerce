<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CashFlowsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;

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
    return redirect()->route('index_product');
});

Auth::routes();


//product
Route::get('/index-product', [ProductController::class, 'index'])->name('index_product');


Route::middleware(['admin'])->group(function(){

    Route::get('/create-product', [ProductController::class, 'create'])->name('create_product');
    Route::post('/store-product', [ProductController::class, 'store'])->name('store_product');
    Route::get('/edit-product/{product}', [ProductController::class, 'edit'])->name('edit_product');
    Route::patch('/update-product/{product}', [ProductController::class, 'update'])->name('update_product');
    Route::delete('/delete-product/{product}', [ProductController::class, 'delete'])->name('delete_product');


    Route::post('/order-confirm-payment/{order}',[OrderController::class, 'confirm_payment'])->name('confirm_payment');
});

Route::get('/cash-flow',[CashFlowsController::class, 'index_line_chart'])->name('index_line_chart');

Route::middleware(['auth'])->group(function(){
    //product
    Route::get('/show-product/{product}', [ProductController::class, 'show'])->name('show_product');

    //cart
    Route::post('/store-cart/{product}', [CartController::class, 'add_to_cart'])->name('store_cart');
    Route::get('/show-cart', [CartController::class, 'show'])->name('show_cart');
    Route::patch('/update-cart/{cart}', [CartController::class, 'update'])->name('update_cart');
    Route::delete('/delete-cart/{cart}', [CartController::class,'delete'])->name('delete_cart');

    //orders
    Route::post('/checkout-order',[OrderController::class, 'checkout'])->name('checkout');
    Route::get('/index-order',[OrderController::class,'index'])->name('index_order');
    Route::get('/show-order/{order}',[OrderController::class, 'show_detail_order'])->name('show_detail_order');
    Route::post('/order-payment/{order}',[OrderController::class, 'receipt'])->name('submit_payment_receipt');


    //user information
    Route::get('/profile',[ProfileController::class,'show_profile'])->name('show_profile');
    Route::post('/edit-profile',[ProfileController::class, 'edit_profile'])->name('edit_profile');
});

