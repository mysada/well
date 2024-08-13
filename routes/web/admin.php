<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminPaymentController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\ContactQueryController;
use Illuminate\Support\Facades\Route;

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
Route::resource('orders', AdminOrderController::class)->only(
  ['index', 'show', 'destroy','update']
)->names([
  'index'   => 'AdminOrderList',
  'update'  => 'AdminOrderUpdate',
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
Route::resource('reviews', AdminReviewController::class)->except(
  ['create', 'store', 'show']
)->names([
  'index'   => 'AdminReviewList',
  'edit'    => 'AdminReviewEdit',
  'update'  => 'AdminReviewUpdate',
  'destroy' => 'AdminReviewDestroy',
]);
Route::get('reviews/export', [AdminReviewController::class, 'export'])->name(
  'AdminReviewExport'
);
Route::post('reviews/flag/{id}', [AdminReviewController::class, 'flag'])->name(
  'AdminReviewFlag'
);
Route::patch(
  'reviews/status/{id}',
  [AdminReviewController::class, 'updateStatus']
)->name('AdminReviewUpdateStatus');

// Payment management
Route::resource('payments', AdminPaymentController::class)->only(
  ['index', 'show']
)->names([
  'index' => 'AdminPaymentList',
  'show'  => 'AdminPaymentShow',
]);

// Category management
Route::resource('categories', AdminCategoryController::class)
     ->except(['show'])
     ->names([
       'index'   => 'AdminCategoryList',
       'create'  => 'AdminCategoryCreate',
       'store'   => 'AdminCategoryStore',
       'edit'    => 'AdminCategoryEdit',
       'update'  => 'AdminCategoryUpdate',
       'destroy' => 'AdminCategoryDestroy',
     ]);

// Admin home
Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home');

// Contact queries
Route::get('queries', [ContactQueryController::class, 'index'])->name(
  'admin.queries'
);
