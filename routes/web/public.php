<?php

use App\Http\Controllers\well\AboutController;
use App\Http\Controllers\well\CancellationRefundsController;
use App\Http\Controllers\well\ContactController;
use App\Http\Controllers\well\CountryTaxController;
use App\Http\Controllers\well\FaqController;
use App\Http\Controllers\well\HomeController;
use App\Http\Controllers\well\PrivacyPolicyController;
use App\Http\Controllers\well\ProductController;
use Illuminate\Support\Facades\Route;

// Home pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']); // Duplicate route - can be removed if unnecessary

// About, FAQ, Privacy Policy, and Cancellation/Refunds pages
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy_policy');
Route::get('/cancellation-refunds', [CancellationRefundsController::class, 'index'])->name('cancellation_refunds');

// Country and tax information
Route::controller(CountryTaxController::class)->prefix('api')->group(function () {
    Route::get('/countries', 'countries');
    Route::get('/provinces', 'provinces');
});

// Contact page
Route::controller(ContactController::class)->group(function () {
    Route::get('/contact', 'showContactForm')->name('contact.page');
    Route::post('/contact', 'submit')->name('contact.submit');
});


// Product pages and reviews
Route::controller(ProductController::class)->group(function () {
    Route::get('/products', 'index')->name('products.index');
    Route::get('/products/{id}', 'show')->name('products.show');
    Route::get('/products/{id}/reviews', 'showReviews')->name('product.reviews');
});
