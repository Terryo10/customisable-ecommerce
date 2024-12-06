<?php

use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\GoogleAuthController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PayNowController;
use App\Http\Controllers\ProductReviewController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\RegisterController;
use App\Livewire\ForgotPasswordPage;
use App\Livewire\HomePage;
use App\Livewire\Orders;
use App\Livewire\PayUsingEcocash;
use App\Livewire\ProductsSearch;
use App\Livewire\ResetPasswordForm;
use Illuminate\Http\Request;
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
Route::get('/products/{search}', ProductsSearch::class);
Route::post('/search', function (Request $request) {
    return redirect()->to('/products/' . $request->input('search'));
});
Route::get('/download-invoice/{order_id}', [ProductReviewController::class, 'downInvoiceAsPDF']);
Route::get('/download-receipt/{order_id}', [ProductReviewController::class, 'downReceiptAsPDF']);
Route::get('/pay-ecocash/{orderId}', PayUsingEcocash::class)->middleware('auth')->name('create.payment.ecocash');
Route::get('/handle-payment/{order_id}', [PayNowController::class, 'createPayment'])->middleware('auth')->name('paynow.payment');
Route::get('/cancel-payment/{id}', [PayNowController::class, 'paymentCancel'])->name('paynowCancel.payment');
Route::get('/check-payment/{id}', [PayNowController::class, 'checkPayment'])->name('paynowCheck.payment');
Route::get('/success-payment/{id}', [PayNowController::class, 'paymentSuccess'])->name('paynowSuccess.payment');
Route::get('/forgot-password', ForgotPasswordPage::class);
Route::post('/forgot-password', [LoginController::class, 'forgotPassword']);
Route::post('/contact', [ContactFormController::class, 'create'])->name('contact.create');
Route::post('/reset-password', [LoginController::class, 'submitResetPasswordForm'])->name('update.password');
Route::get('reset-password/{token}', ResetPasswordForm::class)->name('reset.password.get');
Route::get('/orders', Orders::class)->middleware('auth');
Route::post('/place-order', [ProductsController::class, 'placeOrder'])->middleware('auth')->name('placeOrder');
Route::get('/login-google', [GoogleAuthController::class, 'loginUsingGoogle']);
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::post('/register', [RegisterController::class, 'register']);
Route::post('/subscribe', [RegisterController::class, 'subscribe']);
Route::post('/review/{product_id}', [ProductReviewController::class, 'store'])->middleware('auth');
Route::delete('/review/{product_id}', [ProductReviewController::class, 'destroy'])->middleware('auth');
Route::get('/logout', [GoogleAuthController::class, 'logout'])->middleware('auth')->name('logout');
Route::get('/google-callback', [GoogleAuthController::class, 'callbackFromGoogle']);
Route::get('/check-user', [GoogleAuthController::class, 'checkUser']);
Route::get('/{any}',  HomePage::class)->where('any', '^(?!api).*');

