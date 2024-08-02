<?php

use App\Http\Controllers\well\AboutController;
use App\Http\Controllers\well\CartController;
use App\Http\Controllers\well\HomeController;
use App\Http\Controllers\well\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);

Route::resource('/products', ProductController::class)->names([
  'index' => 'Products',
  'show'  => 'ProductDetails',
]);

Route::middleware('auth')->group(function () {
    Route::resource('cart', CartController::class)->names([
      'index'   => 'Cart',
      'store'   => 'CartAdd',
      'update'  => 'CartUpdate',
      'destroy' => 'CartDelete',
    ]);
});
Auth::routes();

