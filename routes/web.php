<?php

use Illuminate\Support\Facades\Route;

// Public routes
require __DIR__.'/web/public.php';

// Authenticated user routes
Route::middleware('auth')->group(function () {
    require __DIR__.'/web/user.php';
});

// Admin routes
Route::middleware('admin')->prefix('admin')->group(function () {
    require __DIR__.'/web/admin.php';
});

Auth::routes();

