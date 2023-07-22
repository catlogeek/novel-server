<?php

use App\Http\Controllers\Admin\TopController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('/users', UserController::class);
Route::get('/', TopController::class)->name('top.index');
