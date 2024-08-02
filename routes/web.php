<?php

use App\Http\Controllers\well\AboutController;
use App\Http\Controllers\well\CartItemController;
use App\Http\Controllers\well\HomeController;
use App\Http\Controllers\well\OrderController;
use App\Http\Controllers\well\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);

//guest
Route::resource('products', ProductController::class)->names([
  'index' => 'Products',
  'show'  => 'ProductDetail',
]);

//login
Route::middleware('auth')->group(function () {
    Route::resource('cart_items', CartItemController::class)->names([
      'index'   => 'CartItemIndex',
      'store'   => 'CartItemStore',
      'update'  => 'CartItemUpdate',
      'destroy' => 'CartItemDestroy',
    ]);

    Route::resource('orders', OrderController::class)->names([
      'index'   => 'Order',
      'create'  => 'OrderCreate',
      'store'   => 'OrderStore',
      'show'    => 'OrderShow',
      'edit'    => 'OrderEdit',
      'update'  => 'OrderUpdate',
      'destroy' => 'OrderDestroy',
    ]);
});
Auth::routes();

