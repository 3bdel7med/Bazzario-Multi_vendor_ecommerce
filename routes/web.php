<?php
use App\Http\Controllers\CartController;
use App\Http\Controllers\Frontend\CategoriesController;
use App\Http\Controllers\Frontend\VendorController;

use Illuminate\Support\Facades\Route;
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/shop', [App\Http\Controllers\CustomerController::class, 'shop'])->name('shop');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart', [CartController::class,'showCart'])->name('cart');
Route::get('/categories', [App\Http\Controllers\CustomerController::class, 'categories'])->name('categories');
Route::get('/vendors', [App\Http\Controllers\VendorController::class, 'index'])->name('vendors');
Route::get('/vendor/{id}', [App\Http\Controllers\VendorController::class, 'show'])->name('vendor.show');
Route::get('/cart',function(){
    return view('customers.cart');
})->name('cart');
Route::get('/checkout',function(){
    return view('customers.checkout');
})->name('checkout');
Route::get('orders',function(){
    return view('customers.order');
})->name('orders');


// Admin Dashboard Routes
require __DIR__.'/admin.php';
// Vendor Dashboard Routes
require __DIR__.'/vendor.php';
// Customer Dashboard Routes
require __DIR__.'/customer.php';
require __DIR__.'/auth.php';
Route::get('/vendors', [VendorController::class, 'index'])->name('vendors');
Route::get('/categories',[CategoriesController::class, 'index'])->name('categories');
// Laravel 11 built-in health check
Route::post('/cart/add/{id}', [\App\Http\Controllers\Customer\CartController::class, 'addToCart'])->name('cart.add');


