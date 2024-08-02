<?php

use App\Http\Controllers\well\HomeController;
use App\Http\Controllers\well\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);

Route::get('/products', [ProductController::class, 'index'])->name(
  'products.index'
);
Route::get('/product_detail', [ProductController::class, 'index'])->name(
  'products.index'
);
Auth::routes();

