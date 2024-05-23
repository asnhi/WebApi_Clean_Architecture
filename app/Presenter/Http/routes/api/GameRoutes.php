<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;

use App\Application\Controllers\GameController;


Route::prefix('game')->group(function () {

    Route::get('/detail/{id}', [GameController::class, 'showGameByID']);
    Route::get('favorate', [GameController::class, 'showFavorate']);
    Route::get('search', [GameController::class, 'showSearch']);

    Route::group(['middleware' => 'jwt.verify'], function() {
        
        // Các route khác cần xác thực JWT
        Route::post('', [GameController::class, 'createGame']);
        Route::delete('{id}', [GameController::class, 'deleteGame']); 
    });
    
});