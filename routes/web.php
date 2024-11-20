<?php

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::any('/orders', [OrdersController::class, 'index']);
Route::any('/order', [OrdersController::class, 'index']);
Route::get('/login', [LoginController::class, 'index']);
Route::get('/register', [RegisterController::class, 'index']);

Route::get('/login-google', [GoogleAuthController::class, 'loginUsingGoogle']);
Route::get('/google-callback', [GoogleAuthController::class, 'callbackFromGoogle']);
Route::get('/check-user', [GoogleAuthController::class, 'checkUser']);
