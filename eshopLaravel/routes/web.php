<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;

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

// Login of user
Route::get('/login', function () {
    return view('login');
});


// Registration of user
Route::get('/register', function () {
    return view('register');
});

// Eshop main page
Route::get('/products', function () {
    return view('mainPage');
});

// Detail of product
Route::get('/products/{id}', function () {
    return view('detailOfProduct');
});

//Cart prefix
Route::prefix('cart')->group(function () {
    Route::get('/summary', [CartController::class, 'summary']);
    Route::get('/shipping', [CartController::class, 'shipping']);
    Route::get('/payment', [CartController::class, 'payment']);
    Route::get('/info', [CartController::class, 'info']);
});