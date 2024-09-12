<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Website\Main\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\CategoryController;



Route::get('/',[HomeController::class,'index'])->name('home');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {

    Route::get('/dashboard', [DashboardController::class,'index'])->name('dashboard');

    Route::get('/category', [CategoryController::class, 'category'])->name('category.point');
    Route::post('/category/add', [CategoryController::class, 'addCategory'])->name('category.add');
//    // routes/web.php
//    Route::get('/categories/data', [CategoryController::class, 'getCategoriesData'])->name('categories.data');
//    // routes/web.php
//    Route::delete('/categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');


});
