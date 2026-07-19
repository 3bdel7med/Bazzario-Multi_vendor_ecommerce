<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\Customer\MyOrderController;
use App\Http\Controllers\Frontend\CategoriesController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\WishlistController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('customers.dashboard');
    })->name('dashboard');
    // cart routes

    // chat


    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [App\Http\Controllers\ProfileController::class, 'update'])->name('profile.update');
    Route::get('/chat/{receiver}', [ChatController::class, 'show'])->name('chat.show')->middleware('auth');
    Route::post('/chat/{receiver}/send', [ChatController::class, 'sendMessage'])->name('chat.send')->middleware('auth');
    Route::get('/users', [App\Http\Controllers\UserController::class, 'index'])->name('users');
    Route::get('/mycart',[\App\Http\Controllers\Customer\CartController::class, 'index'])->name('customer.cart');
    Route::post('/cart/update/{cartItem}', [\App\Http\Controllers\Customer\CartController::class, 'update'])->name('cart.update');
    Route::get('/invoice',[MyOrderController::class, 'generatePdf'])->name('invoice');
    Route::post('/cart/remove/{cartItem}', [\App\Http\Controllers\Customer\CartController::class, 'remove'])->name('cart.remove');
    Route::post('/addToWishlist/{product:id}',[WishlistController::class, 'addToWishlist'])->name('addToWishlist');

    // checkout routes
    Route::get('/checkout', [\App\Http\Controllers\Customer\CheckoutController::class, 'index'])->name('customer.checkout.index');
    Route::post('/checkout', [\App\Http\Controllers\Customer\CheckoutController::class, 'store'])->name('customer.checkout.store');
    // orders routes
    Route::get('/orders', [\App\Http\Controllers\Customer\MyOrderController::class, 'index'])->name('customer.orders');
    Route::get('/orders/{order}', [\App\Http\Controllers\Customer\MyOrderController::class, 'show'])->name('customer.orders.show');
    Route::post('/posts/{post}/comments', [\App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');

    });
Route::get('/blog', [\App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blog');
Route::resource('posts', \App\Http\Controllers\PostController::class);
Route::get('/new-arrivals', [\App\Http\Controllers\Frontend\NewarrivalsController::class, 'index'])->name('new-arrivals');
// store comment route
Route::get('/category/{category:slug}',[CategoriesController::class, 'show'])->name('category.show');
Route::get('/product_detail/{product:id}',[ProductController::class, 'productDetails'])->name('productDetails');

