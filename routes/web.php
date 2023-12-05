<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GuestsController;
use App\Http\Controllers\PayPalController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MySubscriptionController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\CompanieController;
use App\Http\Controllers\UserProviderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdressController;
use App\Http\Controllers\LogController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServicePackageController;
use App\Http\Controllers\CustomViewController;
use App\Http\Controllers\QueryController;
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
Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

