<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\PasswordResetController;

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

// Guest Routes
Route::post('register', [UserController::class, 'register'])->name('api.register');
Route::post('login', [UserController::class, 'login'])->name('api.login');
Route::post('password-reset-request', [PasswordResetController::class, 'create']);
Route::post('find/{token}', [PasswordResetController::class, 'find']);
Route::post('password-reset', [PasswordResetController::class, 'reset']);

// Logged Users
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('change/password', [UserController::class, 'changePassword']);
    Route::any('details', [UserController::class, 'details']);
});
