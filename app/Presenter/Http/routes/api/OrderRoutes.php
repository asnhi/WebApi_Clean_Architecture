<?php

use Illuminate\Support\Facades\Route;
use App\Application\Controllers\OrderController;

Route::middleware('auth')->group(function () {
    Route::get('/order', [OrderController::class, 'showAllOrder']);
});

// Route::prefix('order')->group(function () {
//     Route::get('{id}', [OrderController::class, 'showAllOrder']);
// });


