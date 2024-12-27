<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('users');
Route::post('/', [UserController::class, 'store'])->name('user.post');
Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::put('/{id}', [UserController::class, 'update'])->name('user.put');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories');
Route::post('/category', [CategoryController::class, 'store'])->name('category.post');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.put');

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::post('/product', [ProductController::class, 'store'])->name('product.post');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.put');

Route::get('/customers', [CustomerController::class, 'index'])->name('customers');
Route::get('/customer/{id}', [CustomerController::class, 'show'])->name('customer.show');
Route::put('/customer/{id}', [CustomerController::class, 'update'])->name('customer.put');