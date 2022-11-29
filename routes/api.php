<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\NewPasswordController;
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

Route::post('register', [AuthController::class ,'register']);
Route::post('login', [AuthController::class , 'login']);

Route::post('logout', [AuthController::class ,'logout'])->middleware('auth:sanctum');
Route::post('forgot-password', [NewPasswordController::class, 'forgotPassword']);
Route::get('reset-password', [NewPasswordController::class, 'resetPassword']);

