<?php

use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MySubscriptionController;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\InvitationController;
use App\Http\Controllers\CompanieController;
use App\Http\Controllers\UserProviderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdressController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServicePackageController;
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
//logout
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->middleware('verified')->name('home');
Route::resource('profile', ProfileController::class)->middleware('verified')->names('profile');	
Route::resource('my-subscription', MySubscriptionController::class)->middleware('verified')->names('my-subscription');
Route::resource('subscription', SubscriptionController::class)->middleware('verified')->names('subscription');
Route::resource('admin/invitations', InvitationController::class)->names('admin.invitations');
Route::resource('admin/companies', CompanieController::class)->names('admin.companies');
Route::middleware(['auth', 'password.confirm'])->group(function () {
    Route::resource('admin/userProviders', UserProviderController::class)->names('admin.userProviders');
});
Route::resource('admin/contacts', ContactController::class)->names('admin.contacts');
Route::resource('admin/addresses', AdressController::class)->names('admin.addresses');
Route::resource('admin/services', ServiceController::class)->names('admin.services');
Route::get('/admin/servicePackage/create/{servicePackageId?}', [ServicePackageController::class, 'create'])->name('admin.servicePackages.create');
Route::get('/admin/servicePackage', [ServicePackageController::class, 'index'])->name('admin.servicePackages.index');
Route::get('/admin/servicePackage/show/{servicePackage}', [ServicePackageController::class, 'show'])->name('admin.servicePackages.show');
Route::get('/admin/servicePackage/delete/{deleteId}', [ServicePackageController::class, 'deleteConfirm'])->name('admin.servicePackages.deleteConfirm');
Route::delete('/admin/servicePackage/{servicePackage}', [ServicePackageController::class, 'destroy'])->name('admin.servicePackages.destroy');
//restored section
Route::get('/admin/companies/{id}/restore', [CompanieController::class, 'restore'])->name('admin.companies.restore');
Route::get('/admin/userProviders/{id}/restore', [UserProviderController::class, 'restore'])->name('admin.userProviders.restore');
Route::get('/admin/contacts/{id}/restore', [ContactController::class, 'restore'])->name('admin.contacts.restore');
Route::get('/admin/addresses/{id}/restore', [AdressController::class, 'restore'])->name('admin.addresses.restore');
//autocomplete section
Route::get('/autoCompleteUser/json', [UserProviderController::class, 'autoCompleteUser'])->name('admin.userProviders.autoCompleteUser');
Route::get('/autoCompleteCompany/json', [UserProviderController::class, 'autoCompleteCompany'])->name('admin.userProviders.autoCompleteCompany');
//category
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::post('/category', [CategoryController::class, 'store'])->name('category.store');
Route::get('/category/category-add', [CategoryController::class, 'create'])->name('category.create');
Route::get('/category/{id}/category-edit', [CategoryController::class, 'edit'])->name('category.edit');
Route::put('/category/{id}/category-edit', [CategoryController::class, 'update'])->name('category.update');
Route::get('/category/{id}/category-show', [CategoryController::class, 'show'])->name('category.show');
Route::delete('/category/{categoria}', [CategoryController::class, 'destroy'])->name('category.destroy');
