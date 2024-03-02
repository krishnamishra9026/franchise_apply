<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });




Auth::routes();
/*Route::get('register/buyer', [App\Http\Controllers\Auth\RegisterController::class, 'showBuyerRegistrationForm'])->name('buyer.register');
Route::get('register/seller', [App\Http\Controllers\Auth\RegisterController::class, 'showSellerRegistrationForm'])->name('seller.register');*/

Route::get('/login', function () {
    return redirect('/buyer/login');
});

Route::get('/', [App\Http\Controllers\IndexController::class, 'index'])->name('welcome');
Route::get('/about-us', [App\Http\Controllers\AboutController::class, 'about'])->name('about-us');
Route::get('/register/success', [App\Http\Controllers\IndexController::class, 'registerSuccess'])->name('register-success');
Route::get('/seller-information', [App\Http\Controllers\SellerInfoController::class, 'sellerInfo'])->name('seller-information');
Route::get('/buyer-information', [App\Http\Controllers\BuyerInfoController::class, 'buyerInfo'])->name('buyer-information');
Route::get('/customer-support', [App\Http\Controllers\SupportController::class, 'support'])->name('customer-support');
Route::post('/customer-support', [App\Http\Controllers\SupportController::class, 'saveSupport'])->name('customer-support');
Route::get('/terms-conditions', [App\Http\Controllers\TermsController::class, 'terms'])->name('terms-conditions');
Route::get('/privacy-policy', [App\Http\Controllers\TermsController::class, 'privacy'])->name('privacy-policy');


