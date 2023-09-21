<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MySubscriptionController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\InvitationController;

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

Route::resource('admin/invitations', InvitationController::class)->names('admin.invitations');