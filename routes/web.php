<?php

use App\Http\Controllers\admin\AdminCategoryController;
use App\Http\Controllers\admin\AdminOrderController;
use App\Http\Controllers\admin\AdminPaymentController;
use App\Http\Controllers\admin\AdminProductController;
use App\Http\Controllers\admin\AdminReviewController;
use App\Http\Controllers\admin\AdminUserController;
use App\Http\Controllers\well\AboutController;
use App\Http\Controllers\well\CartItemController;
use App\Http\Controllers\well\ContactController;
use App\Http\Controllers\well\HomeController;
use App\Http\Controllers\well\OrderController;
use App\Http\Controllers\well\ProductController;
use App\Http\Controllers\well\WishlistController;
use App\Http\Middleware\AdminAuthInterceptor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index']);

//Manish_Contact_Page
Route::get('/contact', function () {
    return view('well.pages.contact');
})->name('contact.page');

Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

//guest
Route::get('/products', [App\Http\Controllers\well\ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [App\Http\Controllers\well\ProductController::class, 'show'])->name('products.show');

//using cookies to show cart when guest, using database when login
Route::get('/cart_items', [CartItemController::class, 'index'])->name('CartItemIndex');

//login
Route::middleware('auth')->group(function () {
    Route::resource('/cart_items', CartItemController::class)->names([
        'index'   => 'CartItemIndex',
        'store'   => 'CartItemStore',
        'update'  => 'CartItemUpdate',  // This route expects a parameter: {cart_item}
        'destroy' => 'CartItemDestroy'
]);
    /**
     * maybe the create page is useless.
     */
    Route::resource('/orders', OrderController::class)->names([
      'create' => 'OrderCreate', //page: order create
      'store'  => 'OrderStore', //processor: save an order
      'show'   => 'OrderShow', //page: order detail
    ]);

    Route::resource('/wishlists', WishlistController::class)->names([
      'index'   => 'WishlistIndex', //page: wishlist
      'store'   => 'WishlistStore', //processor: add product into wishlist
      'destroy' => 'WishlistDestroy', //processor: delete product
    ]);

    Route::resource('user', \App\Http\Controllers\well\UserController::class)->names([
      'index' => 'Profile', //page: profile with orders
    ]);
});
Auth::routes();

Route::middleware(AdminAuthInterceptor::class)->group(function () {
    Route::resource('/admin/user', AdminUserController::class)->names([
      'index'   => 'AdminUserList',
      'create'  => 'AdminUserCreate',
      'store'   => 'AdminUserStore',
      'edit'    => 'AdminUserEdit',
      'update'  => 'AdminUserUpdate',
      'destroy' => 'AdminUserDestroy',
    ]);

    Route::resource('/admin/orders', AdminOrderController::class)->names([
      'index'   => 'AdminOrderList',
      'create'  => 'AdminOrderCreate',
      'store'   => 'AdminOrderStore',
      'show'    => 'AdminOrderShow',
      'edit'    => 'AdminOrderEdit',
      'update'  => 'AdminOrderUpdate',
      'destroy' => 'AdminOrderDestroy',
    ]);

    Route::resource('/admin/products', AdminProductController::class)->names([
      'index'   => 'AdminProductList',
      'create'  => 'AdminProductCreate',
      'store'   => 'AdminProductStore',
      'show'    => 'AdminProductShow',
      'edit'    => 'AdminProductEdit',
      'update'  => 'AdminProductUpdate',
      'destroy' => 'AdminProductDestroy',
    ]);

    Route::resource('/admin/reviews', AdminReviewController::class)->names([
      'index'   => 'AdminReviewList',
      'edit'    => 'AdminReviewEdit',
      'update'  => 'AdminReviewUpdate',
      'destroy' => 'AdminReviewDestroy',
    ]);

    Route::resource('/admin/payments', AdminPaymentController::class)->names([
      'index'   => 'AdminPaymentList',
      'show'    => 'AdminPaymentShow',
      'destroy' => 'AdminPaymentDestroy',
    ]);

    Route::resource('/admin/categories', AdminCategoryController::class)->names([
      'index'   => 'AdminCategoryList',
      'create'  => 'AdminCategoryCreate',
      'store'   => 'AdminCategoryStore',
      'edit'    => 'AdminCategoryEdit',
      'update'  => 'AdminCategoryUpdate',
      'destroy' => 'AdminCategoryDestroy',
    ]);
});






