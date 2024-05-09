<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProducGalleryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('admin.')->prefix('admin')->middleware('admin')->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/userList', [App\Http\Controllers\Admin\DashboardController::class, 'userList'])->name('userList');
    Route::put('/resetPassword/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'resetPassword'])->name('resetPassword');
    Route::resource('/category', CategoryController::class)->except(['create', 'show', 'edit']);
    Route::resource('/product', ProductController::class);
        Route::resource('/product.gallery', ProducGalleryController::class)->except(['create', 'show', 'edit', 'update']);
});

Route::name('user.')->prefix('user')->middleware('user')->group(function(){
    Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/updatePassword', [App\Http\Controllers\User\DashboardController::class, 'updatePassword'])->name('updatePassword');
    Route::put('/changePassword', [App\Http\Controllers\User\DashboardController::class, 'changePassword'])->name('changePassword');
});