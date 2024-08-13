<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\well\HomeController;
use App\Http\Controllers\well\AboutController;
use App\Http\Controllers\well\FaqController;
use App\Http\Controllers\well\PrivacyPolicyController;
use App\Http\Controllers\well\CancellationRefundsController;
use App\Http\Controllers\well\CountryTaxController;
use App\Http\Controllers\well\ContactController;
use App\Http\Controllers\well\ProductController;
use App\Http\Controllers\well\ReviewController;

// Home pages
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'index'])->name('about');
Route::get('/faq', [FaqController::class, 'index'])->name('faq');
Route::get('/privacy-policy', [PrivacyPolicyController::class, 'index'])->name('privacy_policy');
Route::get('/cancellation-refunds', [CancellationRefundsController::class, 'index'])->name('cancellation_refunds');

// Country and tax information
Route::get('/api/countries', [CountryTaxController::class, 'countries'])->name('api.countries');
Route::get('/api/provinces', [CountryTaxController::class, 'provinces'])->name('api.provinces');

// Contact page
Route::get('/contact', function () {
    return view('well.pages.contact');
})->name('contact.page');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');

// Product pages
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}/reviews', [ProductController::class, 'showReviews'])->name('product.reviews');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products-by-category/{categoryId}', [ProductController::class, 'getProductsByCategory']);
Route::post('/products/{id}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// Product reviews (public viewing)
