<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

//Auth
Route::get('/login', [SessionController::class, 'index']);
Route::post('/login', [SessionController::class, 'login']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

//Products
Route::get('/', [ProductController::class, 'index']);
Route::get('/category/{id}', [ProductController::class, 'filter']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/discounted', [ProductController::class, 'discounted']);

//Cart 
Route::get('/cart', [CartController::class, 'index']);
Route::post('/cart/add/{id}', [CartController::class, 'add']);
Route::delete('/cart/delete', [CartController::class, 'clear']);
Route::delete('/cart/delete/{id}', [CartController::class, 'remove']);