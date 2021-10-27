<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Admin\ApiController;
use App\Http\Controllers\Api\PasswordResetController;
use App\Http\Controllers\Api\ReferencesController;

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

Route::group(['prefix' => 'references'], function() {
    Route::get('/events', [ReferencesController::class, 'events']);
    Route::get('/stands', [ReferencesController::class, 'stands']);
    Route::get('/tariff-plans', [ReferencesController::class, 'tariffPlans']);
});

Route::group(['prefix' => 'visitor'], function() {
    Route::post('/register', [UserController::class, 'visitorRegistration']);
});

// Logged Users
Route::group(['middleware' => 'auth:api'], function () {
    Route::post('change/password', [UserController::class, 'changePassword']);
    Route::any('details', [UserController::class, 'details']);
    Route::get('/user-stands', [UserController::class, 'userStands']);
});

Route::group(['middleware' => 'web', 'prefix' => 'admin'], function() {
    Route::get('stands-by-event', [ApiController::class, 'standsByEvent']);
});
