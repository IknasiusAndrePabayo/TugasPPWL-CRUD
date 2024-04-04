<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;



Route::get('/', [ProductController::class, 'index'])->name('index');
Route::get('products/create', [ProductController::class, 'create'])->name('products.create');
Route::post('products', [ProductController::class, 'store'])->name('products.store');
Route::get('products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::delete('products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');


Route::get('/brand', [BrandController::class, 'index'])->name('index');
Route::get('brands/create', [BrandController::class, 'create'])->name('brands.create');
Route::post('brands', [BrandController::class, 'store'])->name('brands.store');
Route::get('brands/{id}/edit', [BrandController::class, 'edit'])->name('brands.edit');
Route::put('brands/{id}', [BrandController::class, 'update'])->name('brands.update');
Route::delete('brands/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');