<?php

use App\Http\Controllers\Vendor\DashboardController;
use App\Http\Controllers\Vendor\VendorController;
use Illuminate\Support\Facades\Route;


Route::prefix('vendor')->middleware(['auth', 'role:vendor'])->group(function () {
    //Route::get('/dashboard',[DashboardController::class, 'index'])->name('vendor.dashboard');
    //Route::resource('products', App\Http\Controllers\Vendor\ProductController::class);
});
