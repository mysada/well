<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\admin\AdminHomeController;
use App\Http\Controllers\admin\AdminOrderController;
use App\Http\Controllers\admin\AdminPaymentController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\AdminReviewController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\admin\ContactQueryController;

// Admin home
Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');

// Contact queries
Route::get('queries', [ContactQueryController::class, 'index'])->name('admin.queries');

// User management
Route::resource('user', AdminUserController::class)->except(['show'])->names([
  'index'   => 'AdminUserList',
  'create'  => 'AdminUserCreate',
  'store'   => 'AdminUserStore',
  'edit'    => 'AdminUserEdit',
  'update'  => 'AdminUserUpdate',
  'destroy' => 'AdminUserDestroy',
]);

// Order management
Route::resource('orders', AdminOrderController::class)->only(['index', 'show', 'destroy'])->names([
  'index'   => 'AdminOrderList',
  'show'    => 'AdminOrderShow',
  'destroy' => 'AdminOrderDestroy',
]);

// Product management
Route::resource('products', AdminProductController::class)->names([
  'index'   => 'AdminProductList',
  'create'  => 'AdminProductCreate',
  'store'   => 'AdminProductStore',
  'show'    => 'AdminProductShow',
  'edit'    => 'AdminProductEdit',
  'update'  => 'AdminProductUpdate',
  'destroy' => 'AdminProductDestroy',
]);

// Review management
Route::controller(AdminReviewController::class)->group(function () {
    Route::get('reviews', 'index')->name('AdminReviewList');
    Route::get('reviews/{review}/edit', 'edit')->name('AdminReviewEdit');
    Route::put('reviews/{review}', 'update')->name('AdminReviewUpdate');
    Route::delete('reviews/{review}', 'destroy')->name('AdminReviewDestroy');
    Route::get('reviews/export', 'export')->name('AdminReviewExport');
    Route::post('reviews/flag/{id}', 'flag')->name('AdminReviewFlag');
    Route::patch('reviews/status/{id}', 'updateStatus')->name('AdminReviewUpdateStatus');
});

// Payment management
Route::resource('payments', AdminPaymentController::class)->only(['index', 'show'])->names([
  'index' => 'AdminPaymentList',
  'show'  => 'AdminPaymentShow',
]);

// Category management
Route::resource('categories', AdminCategoryController::class)->except(['show'])->names([
  'index'   => 'AdminCategoryList',
  'create'  => 'AdminCategoryCreate',
  'store'   => 'AdminCategoryStore',
  'edit'    => 'AdminCategoryEdit',
  'update'  => 'AdminCategoryUpdate',
  'destroy' => 'AdminCategoryDestroy',
]);
