<?php

use Illuminate\Support\Facades\Route;
use App\Presenter\Http\Middleware\CartAccess;
use App\Application\Controllers\CartController;


Route::middleware(['auth', CartAccess::class])->group(function () {
        Route::post('cart/add', [CartController::class, 'addToCart']);
        Route::put('cart/update', [CartController::class, 'updateCart']);
        // Route::post('cart/buynow', [CartController::class, 'buyNow']);
        Route::get('/cart', [CartController::class, 'showCart']);
        Route::delete('/cart/remove', [CartController::class, 'removeAllCart']);
        Route::delete('/cart/remove/{id}', [CartController::class, 'removeCartByIDGame']);
});

