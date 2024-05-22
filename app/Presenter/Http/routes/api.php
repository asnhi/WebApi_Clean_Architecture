<?php
declare(strict_types=1);
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Application\Controllers\AuthController;
use App\Application\Controllers\GameController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::group(['middleware' => 'jwt.verify'], function() {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
    // Các route khác cần xác thực JWT
});

Route::middleware('api')->group(function () {
    $routes = glob(__DIR__ . "/api/*.php");
    foreach ($routes as $route) {
        require($route);
    }
});

