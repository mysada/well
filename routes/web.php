<?php

use App\Http\Middleware\AdminAuthInterceptor;
use Illuminate\Support\Facades\Route;

// Public routes
require __DIR__.'/web/public.php';

// Authenticated user routes
Route::middleware('auth')->group(function () {
    require __DIR__.'/web/user.php';
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
//QUERY CRUD -MANISH
Route::group(['middleware' => 'auth'], function () {
    Route::get('/admin/queries', [ContactQueryController::class, 'index'])->name('admin.queries');
    Route::get('/admin/queries/{id}', [ContactQueryController::class, 'show'])->name('admin.queries.show');
    Route::patch('/admin/queries/{id}/status', [ContactQueryController::class, 'updateStatus'])->name('admin.queries.updateStatus');
    Route::delete('/admin/queries/{id}', [ContactQueryController::class, 'destroy'])->name('admin.queries.destroy');
    Route::get('/admin/queries/{id}/edit', [ContactQueryController::class, 'edit'])->name('admin.queries.edit');
    Route::put('/admin/queries/{id}', [ContactQueryController::class, 'update'])->name('admin.queries.update');
    Route::post('/admin/queries/{id}/follow-up', [ContactQueryController::class, 'saveFollowUpNotes'])->name('admin.queries.saveFollowUpNotes');
});



//aman -- admin user management routing


// Admin routes

Route::middleware(AdminAuthInterceptor::class)->prefix('admin')->group(function () {
    require __DIR__.'/web/admin.php';
});

Auth::routes();

