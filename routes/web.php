<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', [ProductController::class, 'index']); 
Route::get('/categories/{slug}', [CategoryController::class, 'show']); 
Route::get('/products/{slug}', [ProductController::class, 'show'])->name('products.show');
Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
