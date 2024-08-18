<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\StripeController;
use App\Filament\Resources\OrderResource\Pages\OrderDetails;
use App\Models\Order;

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'auth'
])->group(function () {
    Route::get('/dashboard', function () {
        return redirect('/');
    })->name('dashboard');
    
    Route::get('/my-orders', [OrderController::class, 'index'])->name('order.index');
    Route::get('/cart', [HomeController::class, 'cart'])->name('cart');
    Route::get('/order/create', [OrderController::class, 'create']);
    Route::post('/stripe', [StripeController::class, 'stripe'])->name('stripe');
    Route::get('/success', [StripeController::class, 'success'])->name('success');
    Route::get('/cancel', [StripeController::class, 'cancel'])->name('cancel');
    Route::get('/pay/{order}', [StripeController::class, 'pay'])->name('pay');
    Route::get('/order/{order}', [OrderController::class, 'show'])->name('order.show');
    Route::get('/order-details/{order}', [OrderController::class, 'render'])
        ->name('filament.order.details');
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products/{slug}', [HomeController::class, 'show'])->name('products.show');
