<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthPassportController;
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


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


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
|  Routes for Bussiness
|--------------------------------------------------------------------------
*/
