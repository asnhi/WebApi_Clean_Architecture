<?php

use Illuminate\Support\Facades\Route;
use App\Presenter\Http\Middleware\CartAccess;
use App\Application\Controllers\CartController;


Route::middleware(['jwt.verify', CartAccess::class])->group(function () {
        Route::prefix('cart')->group(function () {
            Route::post('add', [CartController::class, 'addToCart']);
            Route::put('update', [CartController::class, 'updateCart']);
            Route::post('buy', [CartController::class, 'payCart']);
            Route::get('/', [CartController::class, 'showCart']);
            Route::delete('remove/{productId?}', [CartController::class, 'removeFromCart']);
            Route::post('order', [CartController::class, 'orderCart']);
        });
    });
    

