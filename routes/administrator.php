<?php

use App\Http\Controllers\Admin\Auth\ChangePasswordController;
use App\Http\Controllers\Admin\Auth\ForgotPasswordController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\MyAccountController;
use App\Http\Controllers\Admin\Auth\ResetPasswordController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\BuyerController;
use App\Http\Controllers\Admin\SellerController;
use App\Http\Controllers\Admin\StockController;
use App\Http\Controllers\Admin\OrdersController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\InvoicesController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\InboxController;
use App\Http\Controllers\Admin\EarningsController;
use App\Http\Controllers\Admin\CommissionController;
use App\Http\Controllers\Admin\PageManagementController;
use App\Http\Controllers\Admin\UserManagement\RoleController;
use App\Http\Controllers\Admin\UserManagement\AdminController;
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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    /*
    |--------------------------------------------------------------------------
    | Authentication Routes | LOGIN | REGISTER
    |--------------------------------------------------------------------------
    */

    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.submit');
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
    Route::resource('buyers', BuyerController::class);
    Route::resource('sellers', SellerController::class);
    Route::get('/stock/import', [StockController::class, 'stockImport'])->name('stock-import');
    Route::post('/stock/import', [StockController::class, 'postStockImport'])->name('stock-import');
    Route::get('/stock/download-sample-file', [StockController::class, 'downloadSampleFile'])->name('stock-sample.file');    
    Route::post('/stock/import-process', [StockController::class, 'importProcessData'])->name('stock.import-process');    
    Route::get('/stock', [StockController::class, 'stock'])->name('stock');
    Route::delete('/stock/delete/{id}', [StockController::class, 'stockDelete'])->name('stock.delete');
    Route::get('/live-stock', [StockController::class, 'liveStock'])->name('live-stock');
    Route::get('/view-stock/{id}', [StockController::class, 'viewStock'])->name('view-stock');
    Route::get('/view-live-stock/{id}/{seller_id}', [StockController::class, 'viewLiveStock'])->name('view-live-stock');
    Route::resource('orders', OrderController::class);
    Route::get('ark-as-read', [OrderController::class,'markAsRead'])->name('mark-as-read');
    Route::get('orders/update-status/{id}/{status}', [OrderController::class, 'updateStatus'])->name('orders.update-status');
    Route::get('/purchase-orders', [OrdersController::class, 'purchaseOrder'])->name('purchase-orders');
    Route::get('/generate-purchase-order/{id}', [OrdersController::class, 'generatePO'])->name('generate-purchase-order');
    Route::get('/view-order', [OrdersController::class, 'viewOrder'])->name('view-order');
    Route::resource('invoices', InvoiceController::class);
    Route::get('/invoices/download_invoice/{id}',[InvoiceController::class, 'downloadInvoice'])->name('invoices.download'); 
    Route::get('/view-invoice', [InvoicesController::class, 'viewInvoice'])->name('view-invoice');
    Route::get('/inbox', [InboxController::class, 'inbox'])->name('inbox');
    Route::get('/get-sender', [InboxController::class, 'getSender'])->name('inbox.get-sender');
    Route::get('/get-active-sender', [InboxController::class, 'getActiveSender'])->name('inbox.get-active-sender');
    Route::get('/get-active-messages', [InboxController::class, 'getActiveMessages'])->name('inbox.get-active-messages');
    Route::post('/store-message', [InboxController::class, 'storeMessage'])->name('inbox.store-message');
    Route::post('/store-active-message', [InboxController::class, 'storeActiveMessage'])->name('inbox.store-active-message');
    Route::get('/earnings', [EarningsController::class, 'earnings'])->name('earnings');
    Route::get('/commission', [CommissionController::class, 'commission'])->name('commission');
    Route::post('commission', [CommissionController::class, 'updateCommission'])->name('commission.update');
    Route::get('/home-page', [PageManagementController::class, 'homePage'])->name('home-page');
    Route::get('/about-page', [PageManagementController::class, 'aboutPage'])->name('about-page');
    Route::get('/sellers-page', [PageManagementController::class, 'sellerPage'])->name('sellers-page');
    Route::get('/buyers-page', [PageManagementController::class, 'buyerPage'])->name('buyers-page');
    Route::get('/terms-page', [PageManagementController::class, 'termsPage'])->name('terms-page');
    Route::get('/privacy-page', [PageManagementController::class, 'privacyPage'])->name('privacy-page');
    Route::post('/store-page', [PageManagementController::class, 'store'])->name('page.store');

    Route::resource('users', AdminController::class);
    Route::resource('roles', RoleController::class);
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
