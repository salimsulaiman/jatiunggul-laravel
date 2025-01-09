<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleItemController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [UserController::class, 'index'])->name('users')->middleware('auth')->middleware('auth');
Route::post('/', [UserController::class, 'store'])->name('user.post');
Route::delete('/{id}', [UserController::class, 'destroy'])->name('user.destroy');
Route::put('/{id}', [UserController::class, 'update'])->name('user.put');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories')->middleware('auth');
Route::post('/category', [CategoryController::class, 'store'])->name('category.post');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
Route::put('/category/{id}', [CategoryController::class, 'update'])->name('category.put');

Route::get('/products', [ProductController::class, 'index'])->name('products')->middleware('auth');
Route::post('/product', [ProductController::class, 'store'])->name('product.post');
Route::delete('/product/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
Route::put('/product/{id}', [ProductController::class, 'update'])->name('product.put');

Route::get('/customers', [CustomerController::class, 'index'])->name('customers')->middleware('auth');
Route::get('/customer/{id}', [CustomerController::class, 'show'])->name('customer.show');
Route::put('/customer/{id}', [CustomerController::class, 'update'])->name('customer.put');

Route::get('/saleitems/{id}', [SaleItemController::class, 'show'])->name('sale_item.show')->middleware('auth');
Route::put('/saleitems/{id}', [SaleItemController::class, 'update'])->name('sale_item.put');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.auth');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');