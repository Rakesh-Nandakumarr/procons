<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripeController;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'auth'
])->group(function () {
    Route::get('/dashboard', [OrderController::class, 'index'])->name('dashboard');
    Route::get('cart', [HomeController::class, 'cart'])->name('cart');
    Route::get('/order/create', [OrderController::class, 'create']);
    Route::post('stripe', [StripeController::class, 'stripe'])->name('stripe');
    Route::get('success', [StripeController::class, 'success'])->name('success');
    Route::get('cancel', [StripeController::class, 'cancel'])->name('cancel');
    Route::get('pay/{order}', [StripeController::class, 'pay'])->name('pay');
    Route::get('order/{order}', [OrderController::class, 'show'])->name('order.show');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('products/{slug}', [ProductController::class, 'show'])->name('products.show');