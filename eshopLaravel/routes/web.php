<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

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

// Eshop main page
Route::get('/', function () {
    return view('mainPage');
});

Route::get('/', [ProductController::class, 'getAndSortProductsBy']);

// Detail of product
Route::get('/detail/{id}', function () {
    return view('detailOfProduct');
});

Route::get('/product/{id}', [ProductController::class, 'getProduct']);

// Registration view
Route::get('/register', [UserController::class, 'register']);

// Login view
Route::get('/login', [UserController::class, 'login']);

// Users functions
Route::prefix('users')->group(function () {
    // Login user
    Route::post('/auth', [UserController::class, 'auth']);

    // Create user
    Route::post('/create', [UserController::class, 'create']);

    // Logout user
    Route::post('/logout', [UserController::class, 'logout']);
});

//Cart prefix
Route::prefix('cart')->group(function () {
    Route::get('/summary', [CartController::class, 'summary']);
    Route::get('/shipping', [CartController::class, 'shipping']);
    Route::post('/payment', [CartController::class, 'payment']);
    Route::post('/info', [CartController::class, 'info']);
    Route::get('/info', [CartController::class, 'info']);
    Route::post('/store', [CartController::class, 'store']);
});


//Admin prefix
Route::prefix('admin')->group(function () {
    Route::get('/products', function () {
        return view('admin.adminMainPage');
    });

    Route::get('/products/{id}', function () {
        return view('admin.productCreation');
    });
});
