<?php

use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Livewire\ForgotPasswordPage;
use App\Livewire\HomePage;
use App\Livewire\Orders;
use App\Livewire\ResetPasswordForm;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', HomePage::class);
Route::get('/product/{id}', HomePage::class);
Route::get('/forgot-password', ForgotPasswordPage::class);
Route::post('/forgot-password', [LoginController::class, 'forgotPassword']);
Route::post('/reset-password', [LoginController::class, 'submitResetPasswordForm'])->name('update.password');
// Route::get('reset-password/{token}', [LoginController::class, 'showResetPasswordForm'])->name('reset.password.get');
Route::get('reset-password/{token}', ResetPasswordForm::class)->name('reset.password.get');
Route::get('/orders', Orders::class)->middleware('auth');
Route::post('/place-order', [ProductsController::class, 'placeOrder'])->middleware('auth')->name('placeOrder');
Route::get('/login-google', [GoogleAuthController::class, 'loginUsingGoogle'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/subscribe', [RegisterController::class, 'subscribe']);
Route::post('/review/{product_id}', [ProductReviewController::class, 'store'])->middleware('auth');
Route::delete('/review/{product_id}', [ProductReviewController::class, 'destroy'])->middleware('auth');
Route::get('/logout', [GoogleAuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/google-callback', [GoogleAuthController::class, 'callbackFromGoogle']);
Route::get('/check-user', [GoogleAuthController::class, 'checkUser']);
Route::get('/{any}',  HomePage::class)->where('any', '^(?!api).*');
// Route::get('/{any}', function () {
//     return view('app');
// })->where('any', '^(?!api).*');
