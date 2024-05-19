<?php
declare(strict_types=1);
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Application\Controllers\AuthController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware'=>'api', 'prefix'=>'auth'], function($route){
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/profile', [AuthController::class, 'profile']);
    Route::post('/logout', [AuthController::class, 'logout']);
});

Route::middleware('api')->group(function () {
    $routes = glob(__DIR__ . "/api/*.php");
    foreach ($routes as $route) {
        require($route);
    }
});

