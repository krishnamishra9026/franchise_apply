<?php

use App\Http\Controllers\Seller\Auth\ChangePasswordController;
use App\Http\Controllers\Seller\Auth\ForgotPasswordController;
use App\Http\Controllers\Seller\Auth\LoginController;
use App\Http\Controllers\Seller\Auth\RegisterController;
use App\Http\Controllers\Seller\Auth\MyAccountController;
use App\Http\Controllers\Seller\Auth\ResetPasswordController;
use App\Http\Controllers\Seller\DashboardController;
use App\Http\Controllers\Seller\MyStockController;
use App\Http\Controllers\Seller\OrderController;
use App\Http\Controllers\Seller\OrdersController;
use App\Http\Controllers\Seller\InvoicesController;
use App\Http\Controllers\Seller\InvoiceController;
use App\Http\Controllers\Seller\InboxController;
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

Route::group(['prefix' => 'seller', 'as' => 'seller.'], function () {

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
    Route::get('/my-stock', [MyStockController::class, 'MyStock'])->name('my-stock');
    Route::get('/add-stock', [MyStockController::class, 'AddStock'])->name('add-stock');
    Route::post('/add-stock', [MyStockController::class, 'storeStock'])->name('stock.store');
    Route::get('/my-stock/{id}/edit', [MyStockController::class, 'EditStock'])->name('edit-stock');
    Route::post('/my-stock/{id}/update', [MyStockController::class, 'updateStock'])->name('update-stock');
    Route::get('/my-stock/{id}/delete', [MyStockController::class, 'deleteStock'])->name('delete-stock');

    Route::get('/stock/import', [MyStockController::class, 'stockImport'])->name('stock-import');
    Route::post('/stock/import', [MyStockController::class, 'postStockImport'])->name('stock-import');
    Route::get('/stock/download-sample-file', [MyStockController::class, 'downloadSampleFile'])->name('stock-sample.file');    
    Route::post('/stock/import-process', [MyStockController::class, 'importProcessData'])->name('stock.import-process');
    
    Route::resource('orders', OrderController::class);
    Route::get('orders/update-status/{id}/{status}', [OrderController::class, 'updateStatus'])->name('orders.update-status');
    Route::get('/view-order', [OrdersController::class, 'ViewOrder'])->name('view-order');
    Route::resource('invoices', InvoiceController::class);
    Route::get('/invoices/download_invoice/{id}',[InvoiceController::class, 'downloadInvoice'])->name('invoices.download'); 
    Route::get('/view-invoice', [InvoicesController::class, 'ViewInvoice'])->name('view-invoice');
    Route::get('/inbox', [InboxController::class, 'Inbox'])->name('inbox');
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
