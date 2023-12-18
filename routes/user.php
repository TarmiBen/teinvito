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
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');
Route::resource('profile', ProfileController::class)->middleware('verified')->names('profile');

Route::resource('my-subscription', MySubscriptionController::class)->middleware('verified')->names('my-subscription');
Route::resource('subscription', SubscriptionController::class)->middleware('verified')->names('subscription');


Route::get('/paypal', [PayPalController::class,'index']);
Route::get('/withpay', [PayPalController::class,'payWhit']);
Route::get('/paypal/status', [PayPalController::class,'status']);

Route::resource('/event', EventController::class)->middleware('verified')->names('event');
Route::get('/event/restore/{id}', [EventController::class, 'restore'])->name('event.restore');

Route::resource('/guests', GuestsController::class)->middleware('verified')->names('guests');
Route::get('/invitation/{hash}', [GuestsController::class, 'urlValid'])->name('guests.confirm');
Route::post('/guest/{hash}', [GuestsController::class, 'confirmAssistance'])->name('guests.guest');

Route::get('/invitations/create/{invitationId?}', [InvitationController::class, 'create'])->middleware('verified')->name('admin.invitations.create');
Route::get('/invitations', [InvitationController::class, 'index'])->middleware('verified')->name('admin.invitations.index');
Route::get('/invitations/show/{invitationId}', [InvitationController::class, 'show'])->middleware('verified')->name('admin.invitations.show');
Route::get('/invitations/delete/{deleteId}', [InvitationController::class, 'deleteConfirm'])->middleware('verified')->name('admin.invitations.deleteConfirm');
Route::delete('/invitations/{invitation}', [InvitationController::class, 'destroy'])->middleware('verified')->name('admin.invitations.destroy');

Route::resource('/companies', CompanieController::class)->middleware('verified')->names('companies');
Route::middleware(['auth', 'password.confirm'])->group(function () {
    Route::get('logs', [LogController::class, 'index'])->middleware('verified')->name('logs.index');
    Route::resource('/userProviders', UserProviderController::class)->middleware('verified')->names('admin.userProviders');
});
Route::resource('/contacts', ContactController::class)->middleware('verified')->names('contacts');
Route::resource('/addresses', AdressController::class)->middleware('verified')->names('addresses');
Route::resource('/services', ServiceController::class)->middleware('verified')->names('admin.services');

//servicePackage section
Route::get('/servicePackage/create/{servicePackageId?}', [ServicePackageController::class, 'create'])->middleware('verified')->name('admin.servicePackages.create');
Route::get('/servicePackage', [ServicePackageController::class, 'index'])->middleware('verified')->name('admin.servicePackages.index');
Route::get('/servicePackage/show/{servicePackage}', [ServicePackageController::class, 'show'])->middleware('verified')->name('admin.servicePackages.show');
Route::get('/servicePackage/delete/{deleteId}', [ServicePackageController::class, 'deleteConfirm'])->middleware('verified')->name('admin.servicePackages.deleteConfirm');
Route::delete('/servicePackage/{servicePackage}', [ServicePackageController::class, 'destroy'])->middleware('verified')->name('admin.servicePackages.destroy');

//restored section
Route::get('/companies/{id}/restore', [CompanieController::class, 'restore'])->name('companies.restore');
Route::get('/userProviders/{id}/restore', [UserProviderController::class, 'restore'])->name('admin.userProviders.restore');
Route::get('/contacts/{id}/restore', [ContactController::class, 'restore'])->name('contacts.restore');
Route::get('/addresses/{id}/restore', [AdressController::class, 'restore'])->name('addresses.restore');

//category
Route::get('/category', [CategoryController::class, 'index'])->middleware('verified')->name('category');
Route::post('/category', [CategoryController::class, 'store'])->middleware('verified')->name('category.store');
Route::get('/category/category-add', [CategoryController::class, 'create'])->middleware('verified')->name('category.create');
Route::get('/category/{id}/category-edit', [CategoryController::class, 'edit'])->middleware('verified')->name('category.edit');
Route::put('/category/{id}/category-edit', [CategoryController::class, 'update'])->middleware('verified')->name('category.update');
Route::get('/category/{id}/category-show', [CategoryController::class, 'show'])->middleware('verified')->name('category.show');
Route::delete('/category/{categoria}', [CategoryController::class, 'destroy'])->middleware('verified')->name('category.destroy');

//customView
Route::resource('/customView', CustomViewController::class)->names('admin.customView')->only(['index']);
Route::get('/customView/create/{CustomViewId?}', [CustomViewController::class, 'create'])->name('admin.customView.create');
Route::get('/customView/show/{CustomViewId}', [CustomViewController::class, 'show'])->name('admin.customView.show');
