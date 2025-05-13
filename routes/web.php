<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AddressController;

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

//Order
Route::get('/order', [OrderController::class, 'index']);
Route::get('/order/address', [OrderController::class, 'address']);
Route::get('/order/address/{id}', [OrderController::class, 'create']);
Route::post('/order', [OrderController::class, 'store']);

//Address
Route::get('/address', [AddressController::class, 'index']);
Route::post('/address', [AddressController::class, 'store']);
Route::get('/address/create', [AddressController::class, 'create']);