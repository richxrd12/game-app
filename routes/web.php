<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\RegisterController;

Route::get('/home', function () {
    return view('index');
});

//Auth
Route::get('/login', [SessionController::class, 'index']);
Route::post('/login', [SessionController::class, 'login']);

Route::get('/register', [RegisterController::class, 'index']);