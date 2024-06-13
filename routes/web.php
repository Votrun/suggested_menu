<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

// Trang home cho người dùng đã đăng nhập
Route::get('/home', [HomeController::class, 'home'])->name('home');

// Trang home cho người dùng chưa đăng nhập
Route::get('/', [HomeController::class, 'welcome'])->name('welcome');
// Admin routes
//Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
 //   Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
//});

// User routes
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('user.home');
});

// Auth routes
Auth::routes();

