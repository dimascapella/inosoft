<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\MotorcycleController;

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

Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [AuthController::class, 'logout']);
    Route::get('who', [AuthController::class, 'who']);

    Route::group(['prefix' => 'car', 'as' => 'car::'], function(){
        Route::get('/', [CarController::class, 'index']);
        Route::post('/sold', [CarController::class, 'carSold']);
        Route::get('/checkStock/{id}', [CarController::class, 'checkStock']);
        Route::get('/transactions/{id}', [CarController::class, 'getTransactions']);
    });

    Route::group(['prefix' => 'motorcycle', 'as' => 'motorcycle::'], function(){
        Route::get('/', [MotorcycleController::class, 'index']);
        Route::post('/sold', [MotorcycleController::class, 'motorcycleSold']);
        Route::get('/checkStock/{id}', [MotorcycleController::class, 'checkStock']);
        Route::get('/transactions/{id}', [MotorcycleController::class, 'getTransactions']);
    });
});
