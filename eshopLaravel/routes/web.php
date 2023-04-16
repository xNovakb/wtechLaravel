<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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
