<?php

use App\Http\Controllers\Buyer\Auth\ChangePasswordController;
use App\Http\Controllers\Buyer\Auth\ForgotPasswordController;
use App\Http\Controllers\Buyer\Auth\LoginController;
use App\Http\Controllers\Buyer\Auth\RegisterController;
use App\Http\Controllers\Buyer\Auth\MyAccountController;
use App\Http\Controllers\Buyer\Auth\ResetPasswordController;
use App\Http\Controllers\Buyer\DashboardController;
use App\Http\Controllers\Buyer\LiveStockController;
use App\Http\Controllers\Buyer\ViewStockController;
use App\Http\Controllers\Buyer\BuyStockController;
use App\Http\Controllers\Buyer\VehicleSearchController;
use App\Http\Controllers\Buyer\OrdersController;
use App\Http\Controllers\Buyer\OrderController;
use App\Http\Controllers\Buyer\InvoiceController;
use App\Http\Controllers\Buyer\InvoicesController;
use App\Http\Controllers\Buyer\InboxController;
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

Route::group(['prefix' => 'buyer', 'as' => 'buyer.'], function () {

    /*
    |--------------------------------------------------------------------------
    | Authentication Routes | LOGIN | REGISTER
    |--------------------------------------------------------------------------
    */

    Route::get('verify/{token}', [RegisterController::class, 'verifyAccount'])->name('verify');
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');
    Route::post('register', [RegisterController::class, 'register'])->name('register');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/update', [ResetPasswordController::class, 'reset'])->name('password.update');


    /*
    |--------------------------------------------------------------------------
    | Dashboard Route
    |--------------------------------------------------------------------------
    */

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/live-stock', [LiveStockController::class, 'liveStock'])->name('liveStock');
    Route::get('/view-stock/{id}', [ViewStockController::class, 'viewStock'])->name('viewStock');
    Route::get('/buy-stock/{car_id}/{seller_id}', [BuyStockController::class, 'buyStock'])->name('buyStock');
    Route::get('/buy-stock/{car_id}', [BuyStockController::class, 'buyStock'])->name('buy-stock');
    Route::get('/vehicle-search', [VehicleSearchController::class, 'VehicleSearchController'])->name('vehicle-search');
    Route::get('/orders', [OrdersController::class, 'OrdersController'])->name('orders');
    Route::resource('orders', OrderController::class);
    Route::get('/view-order', [OrdersController::class, 'ViewOrder'])->name('view-order');
    Route::resource('invoices', InvoiceController::class);
    Route::get('/invoices/download_invoice/{id}',[InvoiceController::class, 'downloadInvoice'])->name('invoices.download'); 
    Route::get('/view-invoice', [InvoicesController::class, 'ViewInvoice'])->name('view-invoice');
    Route::get('/inbox', [InboxController::class, 'InboxController'])->name('inbox');
    Route::get('/chat', [InboxController::class, 'Chat'])->name('chat');
    Route::get('/get-messages', [InboxController::class, 'getMessages'])->name('inbox.get-messages');
    Route::post('/store-message', [InboxController::class, 'storeMessage'])->name('inbox.store-message');


    /*
    |--------------------------------------------------------------------------
    | Settings > My Account Route
    |--------------------------------------------------------------------------
    */
    Route::resource('my-account', MyAccountController::class);

    /*
    |--------------------------------------------------------------------------
    | Settings > Change Password Route
    |--------------------------------------------------------------------------
    */
    Route::get('change-password', [ChangePasswordController::class, 'changePasswordForm'])->name('password.form');

    Route::post('change-password', [ChangePasswordController::class, 'changePassword'])->name('change-password');

});
