<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

// Trang home cho người dùng đã đăng nhập


// Trang home cho người dùng chưa đăng nhập
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
// Admin routes
// Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
//     Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
// });

// User routes
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('user.home');
    Route::get('/admin', [AdminController::class, 'admin'])->name('admin.dashboard');
});

// Auth routes
Auth::routes();