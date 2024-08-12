<?php

use App\Http\Controllers\Admin\AdminCategoryController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\ContactQueryController;
use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminPaymentController;
use App\Http\Controllers\Admin\AdminProductController;
use App\Http\Controllers\Admin\AdminReviewController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\well\AboutController;
use App\Http\Controllers\well\CartItemController;
use App\Http\Controllers\well\CancellationRefundsController;
use App\Http\Controllers\well\CheckoutController;
use App\Http\Controllers\well\ContactController;
use App\Http\Controllers\well\CountryTaxController;
use App\Http\Controllers\well\FaqController;
use App\Http\Controllers\well\HomeController;
use App\Http\Controllers\well\OrderController;
use App\Http\Controllers\well\PrivacyPolicyController;
use App\Http\Controllers\well\ProductController;
use App\Http\Controllers\well\ReviewController;
use App\Http\Controllers\well\ThankYouController;
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
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name(
  'privacy_policy'
);
Route::get('/cancellation-refunds', [CancellationRefundsController::class, 'index'])->name('cancellation_refunds');

//country
Route::get('/api/countries', [CountryTaxController::class, 'countries'])->name(
  'api.countries'
);
Route::get('/api/provinces', [CountryTaxController::class, 'provinces'])->name(
  'api.provinces'
);

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

//Reviews ROutes -MANISH
Route::get('/products/{id}/reviews', [ProductController::class, 'showReviews'])->name('product.reviews');
Route::post('/products/{id}/reviews', [ReviewController::class, 'store'])->name('reviews.store1');
Route::get('/products/{id}/reviews', [ReviewController::class, 'show'])->name('product.show');


// Routes for cart item actions, accessible only to logged-in users
Route::middleware('auth')->group(function () {
    Route::resource('/cart_items', CartItemController::class)->names([
      'index'   => 'CartIndex',
      'store'   => 'CartItemStore',
      'update'  => 'CartItemUpdate',
      'destroy' => 'CartItemDestroy',
    ]);

//thankyou route - MAnish

Route::get('/thank-you/{orderId}', [ThankYouController::class, 'show'])->name('thankyou');


    /**
     * order routes
     */
    Route::post('/orders/store', [OrderController::class, 'store'])->name(
      'OrderStore'
    );

    Route::get('/order/details/{orderId}', [OrderController::class, 'details'])->name('order.details');


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
    Route::get('/checkout/{id}', [CheckoutController::class, 'showCheckout'])->name('checkout.show');
    Route::post('/checkout/process', [CheckoutController::class, 'process'])->name('checkout.process');
    Route::post('/profile/set-default-address/{orderId}', [UserController::class, 'setDefaultAddress'])->name('user.setDefaultAddress');
    Route::put('/profile/update-address/{orderId}', [UserController::class, 'updateAddress'])->name('user.updateAddress');
    Route::put('/profile/update-default-address', [UserController::class, 'updateDefaultAddress'])->name('user.updateDefaultAddress');
    Route::get('/profile/set-default-address/{orderId}', [UserController::class, 'setDefaultAddress'])->name('user.setDefaultAddress');
    Route::post('/profile/set-default-address', [UserController::class, 'setDefaultAddress'])->name('user.setDefaultAddress');

});




Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/queries', [ContactQueryController::class, 'index'])->name('admin.queries');
});



//aman -- admin user management routing

Route::middleware(AdminAuthInterceptor::class)->prefix('admin')->group(function () {
    Route::resource('/user', AdminUserController::class)->names([
      'index'   => 'AdminUserList',
      'create'  => 'AdminUserCreate',
      'store'   => 'AdminUserStore',
      'edit'    => 'AdminUserEdit',
      'update'  => 'AdminUserUpdate',
      'destroy' => 'AdminUserDestroy',

    ]);

    //aman -- admin user management routing ends here

    Route::resource('/orders', AdminOrderController::class)->names([
      'index'   => 'AdminOrderList',
      'show'    => 'AdminOrderShow',
      'destroy' => 'AdminOrderDestroy',
    ]);

    Route::resource('/products', AdminProductController::class)->names([
      'index'   => 'AdminProductList',
      'create'  => 'AdminProductCreate',
      'store'   => 'AdminProductStore',
      'show'    => 'AdminProductShow',
      'edit'    => 'AdminProductEdit',
      'update'  => 'AdminProductUpdate',
      'destroy' => 'AdminProductDestroy',
    ]);

    Route::resource('/reviews', AdminReviewController::class)->names([
      'index'   => 'AdminReviewList',
      'edit'    => 'AdminReviewEdit',
      'update'  => 'AdminReviewUpdate',
      'destroy' => 'AdminReviewDestroy',
    ]);

    Route::resource('/payments', AdminPaymentController::class)->names([
      'index'   => 'AdminPaymentList',
      'show'    => 'AdminPaymentShow',
    ]);

    Route::resource('/categories', AdminCategoryController::class)->names([
      'index'   => 'AdminCategoryList',
      'create'  => 'AdminCategoryCreate',
      'store'   => 'AdminCategoryStore',
      'edit'    => 'AdminCategoryEdit',
      'update'  => 'AdminCategoryUpdate',
      'destroy' => 'AdminCategoryDestroy',
    ]);

    Route::resource('/', AdminHomeController::class)->names([
      'index' => 'admin.home',
    ]);
});






