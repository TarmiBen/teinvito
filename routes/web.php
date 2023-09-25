<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MySubscriptionController;
use App\Http\Controllers\SubscriptionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');

Route::resource('profile', ProfileController::class)->middleware('verified')->names('profile');	

Route::resource('my-subscription', MySubscriptionController::class)->middleware('verified')->names('my-subscription');

Route::resource('subscription', SubscriptionController::class)->middleware('verified')->names('subscription');

//category
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/category-add', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category/{id}/category-edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}/category-edit', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/{id}/category-show', [CategoryController::class, 'show'])->name('category.show');
Route::delete('/category/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
