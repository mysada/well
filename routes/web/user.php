<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\well\CartItemController;
use App\Http\Controllers\well\ThankYouController;
use App\Http\Controllers\well\OrderController;
use App\Http\Controllers\well\WishlistController;
use App\Http\Controllers\well\UserController;
use App\Http\Controllers\well\CheckoutController;
use App\Http\Controllers\well\ReviewController;

// Cart operations
Route::resource('cart_items', CartItemController::class)->except(['create', 'edit', 'show'])->names([
  'index' => 'CartIndex',
  'store' => 'CartItemStore',
  'update' => 'CartItemUpdate',
  'destroy' => 'CartItemDestroy',
]);

// Order operations
Route::post('orders/store', [OrderController::class, 'store'])->name('OrderStore');
Route::get('order/details/{orderId}', [OrderController::class, 'details'])->name('order.details');
Route::get('thank-you/{orderId}', [ThankYouController::class, 'show'])->name('thankyou');

// Wishlist operations
Route::resource('wishlists', WishlistController::class)->except(['create', 'edit', 'show', 'update'])->names([
  'index' => 'WishlistIndex',
  'store' => 'WishlistStore',
  'destroy' => 'WishlistDestroy',
]);
Route::post('add2cart', [WishlistController::class, 'addToCart'])->name('WishlistAddToCart');

// User profile and address management
Route::get('profile', [UserController::class, 'index'])->name('user.profile');
Route::post('profile/logout', [UserController::class, 'logout'])->name('user.logout');
Route::put('profile/update', [UserController::class, 'update'])->name('user.update');
Route::post('/profile/set-default-address', [UserController::class, 'setDefaultAddress'])->name('user.setDefaultAddress');
Route::put('profile/update-address/{orderId}', [UserController::class, 'updateAddress'])->name('user.updateAddress');
Route::put('profile/update-default-address', [UserController::class, 'updateDefaultAddress'])->name('user.updateDefaultAddress');

// Checkout process
Route::get('checkout/{id}', [CheckoutController::class, 'showCheckout'])->name('checkout.show');
Route::post('checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

// Reorder
Route::get('reorder/{orderId}', [UserController::class, 'reorder'])->name('order.reorder');

// Product reviews (authenticated users can post)
Route::post('products/{id}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
