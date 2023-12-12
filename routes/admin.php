<?php
//<!-- Espacio de Pedro -->

//<!-- Espacio del tonto de Paco -->

use App\Http\Controllers\EventLwController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('event', EventLwController::class)->names('admin.event');
Route::resource('user', UserController::class)->names('admin.user');

//<!-- Espacio de Fer -->
