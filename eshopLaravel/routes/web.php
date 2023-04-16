<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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

// Eshop main page
Route::get('/products', function () {
    return view('mainPage');
});

// Detail of product
Route::get('/products/{id}', function () {
    return view('detailOfProduct');
});

// Registration of user
Route::get('/register', [UserController::class, 'create']);

// Create user
Route::post('/user', [UserController::class, 'store']);

// Logout user
Route::post('/logout', [UserController::class, 'logout']);

//Cart prefix
Route::prefix('cart')->group(function () {
    Route::get('/summary', [CartController::class, 'summary']);
    Route::get('/shipping', [CartController::class, 'shipping']);
    Route::get('/payment', [CartController::class, 'payment']);
    Route::get('/info', [CartController::class, 'info']);
});