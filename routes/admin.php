<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\testController;
use App\Http\Controllers\AdminCompanieController;
use App\Http\Controllers\AdminContactController;
use App\Http\Controllers\AdminAddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

// Espacio de Pedro
Route::get  ('/register',       [AdminAuthController::class, 'showRegisterForm'])->name('admin.register'); 
Route::post ('/register',       [AdminAuthController::class, 'register'])->name('admin.register.post');
Route::get  ('/login',          [AdminAuthController::class, 'showLoginForm'])->name('admin.login');
Route::post ('/login',          [AdminAuthController::class, 'login'])->name('admin.login.post');
Route::get  ('/reset-password', [AdminAuthController::class, 'showResetPasswordForm'])->name('admin.resetPassword');
Route::post ('/reset-password', [AdminAuthController::class, 'resetPassword'])->name('admin.resetPassword.post');

//Companies
Route::resource('/companies', AdminCompanieController::class)->middleware('adminlogin')->names('admin.companies');
Route::get('/companies/restore/{id}', [AdminCompanieController::class, 'restore'])->name('admin.companies.restore');

//contacts
Route::resource('/contacts', AdminContactController::class)->middleware('adminlogin')->names('admin.contacts');
Route::get('/contacts/restore/{id}', [AdminContactController::class, 'restore'])->name('admin.contacts.restore');

//addresses
Route::resource('/addresses', AdminAddressController::class)->middleware('adminlogin')->names('admin.addresses');
Route::get('/addresses/restore/{id}', [AdminAddressController::class, 'restore'])->name('admin.addresses.restore');
//Test
Route::get('/test',     [testController::class, 'test'])->middleware('adminlogin')->name('test');



// Espacio del tonto de Paco

// Espacio de Fer
Route::get('/dashboard', [AdminController::class, 'index'])->middleware('adminlogin')->name('admin.dashboard');
Route::get('/profile', [ProfileController::class, 'indexAdmin'])->middleware('adminlogin')->name('admin.profile.index');
Route::get('/profile/{id}/edit/', [ProfileController::class, 'editAdmin'])->middleware('adminlogin')->name('admin.profile.edit');
Route::put('/profile/update/{id}', [ProfileController::class, 'updateAdmin'])->middleware('adminlogin')->name('admin.profile.update');