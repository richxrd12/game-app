<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\WishlistController;

//Auth
Route::get('/login', [SessionController::class, 'index'])->name('login');
Route::post('/login', [SessionController::class, 'login']);
Route::post('/logout', [SessionController::class, 'destroy']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);

//Products
Route::get('/', [ProductController::class, 'index']);
Route::get('/category/{id}', [ProductController::class, 'filter']);
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/discounted', [ProductController::class, 'discounted']);


Route::middleware('auth')->group(function (){
    //Profile
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');    
    Route::put('/profile', [ProfileController::class, 'update']);
    Route::delete('/profile', [ProfileController::class, 'destroy']);
    //Cart 
    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/cart/add/{id}', [CartController::class, 'store']);
    Route::delete('/cart/delete', [CartController::class, 'clear']);
    Route::delete('/cart/delete/{id}', [CartController::class, 'remove']);

    //Wishlist
    Route::get('/wishlist', [WishlistController::class, 'index']);
    Route::post('/wishlist/add/{id}', [WishlistController::class, 'store']);
    Route::delete('/wishlist/delete/{id}', [WishlistController::class, 'remove']);

    //Order
    Route::get('/orders', [OrderController::class, 'index']);
    Route::get('/orders/address', [OrderController::class, 'address'])->name('cart.address');
    Route::get('/orders/address/{id}', [OrderController::class, 'create']);
    Route::get('/orders/{id}', [OrderController::class, 'show']);
    Route::post('/orders', [OrderController::class, 'store']);

    //Address
    Route::post('/address', [AddressController::class, 'store']);
    Route::get('/address/create', [AddressController::class, 'create']);

});

