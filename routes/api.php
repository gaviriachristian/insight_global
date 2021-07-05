<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\OrderController;
use App\Http\Controllers\KeyController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\TechnicianController;

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

Route::apiResource('orders', OrderController::class);

Route::apiResource('keys', KeyController::class);

Route::apiResource('vehicles', VehicleController::class);

Route::apiResource('technicians', TechnicianController::class);