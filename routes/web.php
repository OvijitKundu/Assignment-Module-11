<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SaleController;
use App\Http\Controllers\StoreController;
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


Route::get('/', [StoreController::class, 'index'])->name('dashboard');
Route::get('/dashboard', [StoreController::class, 'index'])->name('dashboard');
Route::get('/create', [StoreController::class, 'create'])->name('create');

Route::get('/store', [SaleController::class, 'create'])->name('store.create');
Route::post('/store', [SaleController::class, 'store'])->name('store.store');

Route::resource('products', ProductController::class);
Route::post('/products', [ProductController::class, 'store'])->name('products.store');

Route::get('/sales/create', [SaleController::class, 'create'])->name('sales.create');
Route::post('/sales', [SaleController::class, 'store'])->name('sales.store');
