<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::post('/login', [AuthController::class, 'login'])->name('login');

// Route::middleware('auth:sanctum')->get('/cart', [CartController::class, 'getCartAll']);
// Route::middleware('auth:sanctum')->get('/cart/{id}', [CartController::class, 'getCartOne']);

// Route::middleware('auth:sanctum')->put('/cart/{id}', [CartController::class, 'editCart']);
// Route::middleware('auth:sanctum')->delete('/cart/{id}', [CartController::class, 'deleteCart']);

Route::post('/cart-create', [CartController::class, 'createCart']);