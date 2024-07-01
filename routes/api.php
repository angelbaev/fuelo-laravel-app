<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\FuelController;
use App\Http\Controllers\DistrictController;
use App\Http\Controllers\DimensionController;
use App\Http\Controllers\FuelPriceController;
use App\Http\Controllers\GasStationController;

//Route::get('/user', function (Request $request) {
//    return $request->user();
//})->middleware('auth:sanctum');


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function ($router) {
    Route::post('/register', [AuthController::class, 'register'])->name('register');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:api')->name('logout');
    Route::post('/refresh', [AuthController::class, 'refresh'])->middleware('auth:api')->name('refresh');
    Route::post('/me', [AuthController::class, 'me'])->middleware('auth:api')->name('me');
});

Route::resource('brands', BrandController::class)->middleware('auth:api');
Route::resource('fuels', FuelController::class, ['only' => ['index', 'show']])->middleware('auth:api');

Route::resource('districts', DistrictController::class, ['only' => ['index', 'show']])->middleware('auth:api');
Route::resource('dimensions', DimensionController::class, ['only' => ['index', 'show']])->middleware('auth:api');
Route::resource('prices', FuelPriceController::class, ['only' => ['index', 'show']])->middleware('auth:api');
Route::resource('gasstations', GasStationController::class, ['only' => ['index', 'show']])->middleware('auth:api');

