<?php

use App\Http\Controllers\ForecastController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/forecasts', [ForecastController::class, 'index']);
Route::get('/forecasts/{forecastId}', [ForecastController::class, 'show']);
Route::post('/forecasts', [ForecastController::class, 'store']);
Route::patch('/forecasts/{forecast}', [ForecastController::class, 'update']);
Route::delete('/forecasts/{forecast}', [ForecastController::class, 'destroy']);
