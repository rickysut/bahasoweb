<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\NewPasswordController;
use App\Http\Controllers\Api\ArticleController;
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

// articles
Route::get('articles', [ArticleController::class, 'list']);
Route::get('authorarticles', [ArticleController::class, 'index'])->middleware('auth:sanctum');
Route::get('article/{article}', [ArticleController::class, 'show']);
Route::post('article/{id}', [ArticleController::class, 'update'])->middleware('auth:sanctum');
Route::delete('article/{id}', [ArticleController::class, 'delete'])->middleware('auth:sanctum');
Route::post('createarticle', [ArticleController::class, 'create'])->middleware('auth:sanctum');


