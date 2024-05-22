<?php

use Illuminate\Support\Facades\Route;
use App\Application\Controllers\OrderController;

Route::middleware('jwt.verify')->group(function () {
    Route::prefix('order')->group(function () {
        Route::get('', [OrderController::class, 'showAllOrder']);
    });
});


