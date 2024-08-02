<?php

use App\Http\Controllers\well\HomeController;
use App\Http\Controllers\well\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);

Route::resource('products', ProductController::class)->names([
  'index' => 'products',
  'show'  => 'productsDetail',
]);

Auth::routes();

