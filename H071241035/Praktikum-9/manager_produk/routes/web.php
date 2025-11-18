<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\CategoryController::class, 'index'])->name('home');

Route::resource('categories', \App\Http\Controllers\CategoryController::class);
Route::resource('warehouses', \App\Http\Controllers\WarehouseController::class);
Route::resource('products', \App\Http\Controllers\ProductController::class);
Route::resource('stocks', \App\Http\Controllers\StockController::class);
