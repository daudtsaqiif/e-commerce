<?php

use App\Http\Controllers\Admin\MyTransactionController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProducGalleryController;
use App\Http\Controllers\Admin\ProductController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'index']);
Route::get('/detail-product/{slug}', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'detailProduct'])->name('detail.product');
Route::get('/detail-category/{slug}', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'detailCategory'])->name('detail.category');
Route::get('/cart', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'cart'])->name('cart')->middleware('auth');

Auth::routes();

Route::middleware('auth')->group(function () {
    Route::get('/cart', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'cart'])->name('cart');
    Route::post('/cart/{id}', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'addToCart'])->name('cart.add');
    Route::delete('/cart/{id}', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'deleteCart'])->name('cart.delete');
    Route::post('/checkout', [App\Http\Controllers\FrontEnd\FrontEndController::class, 'checkout'])->name('checkout');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::name('admin.')->prefix('admin')->middleware('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/userList', [App\Http\Controllers\Admin\DashboardController::class, 'userList'])->name('userList');
    Route::put('/resetPassword/{id}', [App\Http\Controllers\Admin\DashboardController::class, 'resetPassword'])->name('resetPassword');
    Route::resource('/category', CategoryController::class)->except(['create', 'show', 'edit']);
    Route::resource('/product', ProductController::class);
    Route::resource('/product.gallery', ProducGalleryController::class)->except(['create', 'show', 'edit', 'update']);
    Route::resource('/transaction', TransactionController::class);
    Route::resource('/my-transaction', MyTransactionController::class)->only(['index', 'show']);
});

Route::name('user.')->prefix('user')->middleware('user')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\User\DashboardController::class, 'index'])->name('dashboard');
    Route::get('/updatePassword', [App\Http\Controllers\User\DashboardController::class, 'updatePassword'])->name('updatePassword');
    Route::resource('/my-transaction', MyTransactionController::class)->only(['index', 'show']);
    Route::put('/changePassword', [App\Http\Controllers\User\DashboardController::class, 'changePassword'])->name('changePassword');
});
