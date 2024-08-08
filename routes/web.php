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
use App\Http\Controllers\well\FaqController;
use App\Http\Controllers\well\HomeController;
use App\Http\Controllers\well\CheckoutController;
use App\Http\Controllers\well\PrivacyPolicyController;
use App\Http\Controllers\well\ProductController;
use App\Http\Controllers\well\UserController;
use App\Http\Controllers\well\WishlistController;
use App\Http\Middleware\AdminAuthInterceptor;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

//home pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/faq', [FaqController::class, 'index'])->name("faq");
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy_policy');

//Manish_Contact_Page
Route::get('/contact', function () {
    return view('well.pages.contact');
})->name('contact.page');
Route::post('/contact', [ContactController::class, 'submit'])->name(
  'contact.submit'
);

//product
Route::get('/products', [ProductController::class, 'index'])->name(
  'products.index'
);
Route::get('/products/{id}', [ProductController::class, 'show'])->name(
  'products.show'
);


// Routes for cart item actions, accessible only to logged-in users
Route::middleware('auth')->group(function () {
    Route::resource('/cart_items', CartItemController::class)->names([
      'index'   => 'CartIndex',
      'store'   => 'CartItemStore',
      'update'  => 'CartItemUpdate',
      'destroy' => 'CartItemDestroy',
    ]);

    Route::post('/cart_items/update_quantity', [CartItemController::class, 'updateQuantity'])->name('CartItemUpdateQuantity');

    //checkout route - Manish
//Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout.show');
//Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');

    /**
     * order routes
     */
    Route::resource('/orders', OrderController::class)->names([
      'create' => 'OrderCreate', //page: order create
      'store'  => 'OrderStore', //processor: save an order
      'show'   => 'OrderShow', //page: order detail
    ]);

    /**
     * Wishlist route
     */
    Route::resource('/wishlists', WishlistController::class)->names([
      'index'   => 'WishlistIndex', //page: wishlist
      'store'   => 'WishlistStore', //processor: add product into wishlist
      'destroy' => 'WishlistDestroy', //processor: delete product
    ]);
    Route::post('/add2cart', [WishlistController::class, 'addToCart'])->name(
      'WishlistAddToCart'
    );

    Route::resource('user', UserController::class)
         ->names([
           'index' => 'Profile', //page: profile with orders
         ]);
});

// profile routes updated by Aman, revised by Manish
Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [UserController::class, 'index'])->name('user.profile');
    Route::post('/profile/logout', [UserController::class, 'logout'])->name('user.logout');
    Route::put('/profile/update', [UserController::class, 'update'])->name('user.update');
    Route::get('/reorder/{orderId}', [UserController::class, 'reorder'])->name('order.reorder');
    Route::get('/checkout', [CheckoutController::class, 'showCheckout'])->name('checkout.show');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
});
//
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

    Route::resource('/admin/categories', AdminCategoryController::class)->names(
      [
        'index'   => 'AdminCategoryList',
        'create'  => 'AdminCategoryCreate',
        'store'   => 'AdminCategoryStore',
        'edit'    => 'AdminCategoryEdit',
        'update'  => 'AdminCategoryUpdate',
        'destroy' => 'AdminCategoryDestroy',
      ]
    );
});






