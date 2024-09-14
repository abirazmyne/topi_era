<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\Main\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Website\Main\ProductDetailController;



Route::get('/',[HomeController::class,'index'])->name('home');


Route::get('we/product/details/{id}', [ProductDetailController::class, 'index'])->name('website.product.detail');


Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    Route::get('/category', [CategoryController::class, 'category'])->name('category.point');
    Route::post('/category/add', [CategoryController::class, 'addCategory'])->name('category.add');


//    Route::get('categories/data/yajra', [CategoryController::class, 'getData'])->name('categories.data.yajra');


//    // routes/web.php
//    Route::get('/categories/data', [CategoryController::class, 'getCategoriesData'])->name('categories.data');
//    // routes/web.php
//    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');



});
