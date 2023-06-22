<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookStoreController;
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

Route::middleware('auth:sanctum')->get('/BookStore', [BookStoreController::class, 'getBookStoreAll']);
Route::middleware('auth:sanctum')->get('/BookStore/{id}', [BookStoreController::class, 'getBookStoreOne']);
Route::middleware('auth:sanctum')->post('/BookStoreCreate', [BookStoreController::class, 'createBookStore']);
Route::middleware('auth:sanctum')->put('/BookStore/{id}', [BookStoreController::class, 'editBookStore']);
Route::middleware('auth:sanctum')->delete('/BookStore/{id}', [BookStoreController::class, 'deleteBookStore']);
