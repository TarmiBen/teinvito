<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\testController;

// Espacio de Pedro
Route::get  ('/register',       [AdminAuthController::class, 'showRegisterForm'])->name('admin.register'); 
Route::post ('/register',       [AdminAuthController::class, 'register'])->name('admin.register.post');
Route::get  ('/login',          [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post ('/login',          [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::get  ('/reset-password', [AdminAuthController::class, 'showResetPasswordForm'])->name('admin.resetPassword');
Route::post ('/reset-password', [AdminAuthController::class, 'resetPassword'])->name('admin.resetPassword.post');


Route::get('/test',     [testController::class, 'test'])->middleware('adminlogin')->name('test');

// Espacio del tonto de Paco

// Espacio de Fer
