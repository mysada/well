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
Route::resource('cart_items', CartItemController::class)->except(
  ['create', 'edit', 'show']
)->names([
  'index'   => 'CartIndex',
  'store'   => 'CartItemStore',
  'update'  => 'CartItemUpdate',
  'destroy' => 'CartItemDestroy',
]);

// Wishlist operations
Route::controller(WishlistController::class)->group(function () {
    Route::get('wishlists', 'index')->name('WishlistIndex');
    Route::post('wishlists', 'store')->name('WishlistStore');
    Route::delete('wishlists/{id}', 'destroy')->name('WishlistDestroy');
    Route::post('wishlist/cart', 'addToCart')->name('WishlistAddToCart');
});

// Order operations
Route::controller(OrderController::class)->group(function () {
    Route::post('orders/store', 'store')->name('OrderStore');
    Route::get('order/details/{orderId}', 'details')->name('order.details');
});

// Wishlist additional operations

// User profile and address management
Route::controller(UserController::class)->group(function () {
    Route::get('profile', 'index')->name('user.profile');
    Route::post('profile/logout', 'logout')->name('user.logout');
    Route::put('profile/update', 'update')->name('user.update');
    Route::post('profile/set-default-address/{orderId}', 'setDefaultAddress')->name('user.setDefaultAddress');
    Route::put('profile/update-address/{orderId}', 'updateAddress')->name('user.updateAddress');
    Route::put('profile/update-default-address', 'updateDefaultAddress')->name('user.updateDefaultAddress');
    Route::get('profile/reorder/{orderId}', 'reorder')->name('order.reorder');
});

// Checkout process
Route::controller(CheckoutController::class)->group(function () {
    Route::get('checkout/{id}', 'showCheckout')->name('checkout.show');
    Route::post('checkout/process', 'process')->name('checkout.process');
});

// Reorder

// Product reviews
Route::post('products/{id}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// Thank you page
Route::get('thank-you/{orderId}', [ThankYouController::class, 'show'])->name('thankyou');
