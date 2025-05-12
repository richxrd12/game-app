<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\HomeController;

Route::get('/', [HomeController::class, 'index']);
Route::get('/category/{id}', [HomeController::class, 'filter']);
Route::get('/product/{id}', [HomeController::class, 'show']);
Route::get('/discounted', [HomeController::class, 'discounted']);

//Auth
Route::get('/login', [SessionController::class, 'index']);
Route::post('/login', [SessionController::class, 'login']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);