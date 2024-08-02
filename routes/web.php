<?php

use App\Http\Controllers\well\AboutController;
use App\Http\Controllers\well\CartItemController;
use App\Http\Controllers\well\HomeController;
use App\Http\Controllers\well\OrderController;
use App\Http\Controllers\well\PaymentController;
use App\Http\Controllers\well\ProductController;
use App\Http\Controllers\well\WishlistController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);

//guest
Route::resource('products', ProductController::class)->names([
  'index' => 'Products', //page: all products
  'show'  => 'ProductDetail', //page: product detail
]);

//using cookies to show cart when guest, using database when login
Route::resource('cart_items', CartItemController::class)->names([
  'index' => 'CartItemIndex', //page: cart list
]);

//login
Route::middleware('auth')->group(function () {
    Route::resource('cart_items', CartItemController::class)->names([
      'store'   => 'CartItemStore', //processor: add product into cart
      'update'  => 'CartItemUpdate', //processor: update cart products quantity
      'destroy' => 'CartItemDestroy',//processor: delete cart products
    ]);
    /**
     * maybe the create page is useless.
     */
    Route::resource('orders', OrderController::class)->names([
      'index'  => 'Order', //page: order list
      'create' => 'OrderCreate', //page: order create
      'store'  => 'OrderStore', //processor: save an order
      'show'   => 'OrderShow', //page: order detail
    ]);

    Route::resource('wishlists', WishlistController::class)->names([
      'index'   => 'WishlistIndex', //page: wishlist
      'store'   => 'WishlistStore', //processor: add product into wishlist
      'update'  => 'WishlistUpdate', //processor: update product quantity
      'destroy' => 'WishlistDestroy', //processor: delete product
    ]);
});
Auth::routes();

