<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'welcome');

// Auth::routes();

// Route::namespace('App\Http\Controllers')->middleware(['auth', 'user-role:author'])->group(function () {
//     Route::get('/author/home', [App\Http\Controllers\HomeController::class, 'indexAuthor'])->name('author.home');
//     Route::get('/author/articles', [App\Http\Controllers\HomeController::class, 'indexAuthor'])->name('author.articles');

// });

// Route::namespace('App\Http\Controllers')->middleware(['auth', 'user-role:visitor'])->group(function () {
//     Route::get('/visitor/home', [App\Http\Controllers\HomeController::class, 'indexVisitor'])->name('visitor.home');
//     Route::get('/visitor/articles', [App\Http\Controllers\HomeController::class, 'indexVisitor'])->name('visitor.articles');
// });

