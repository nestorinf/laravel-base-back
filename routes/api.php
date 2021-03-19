<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthPassportController;
use App\Http\Controllers\CountryController;

/*
|--------------------------------------------------------------------------
|  Routes for Grop Authentication User
|--------------------------------------------------------------------------
*/

Route::prefix('auth')->group(function () {
    Route::post('signup', [AuthPassportController::class, 'registerUser']);
    Route::post('login', [AuthPassportController::class, 'login']);
    Route::get('logout', [AuthPassportController::class, 'logout'])->middleware('auth:api');
});

/*
|--------------------------------------------------------------------------
|  Routes for Bussiness Process
|--------------------------------------------------------------------------
|
| Routes Group middleware auth and prefix version 1.0
*/

Route::group(['middleware' => 'auth:api'], function () {
    Route::prefix('v1')->group(function () {
        Route::group(['middleware' => 'role'],function () {
            Route::resource('countries', CountryController::class);
        });
    });
});
