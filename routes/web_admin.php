<?php

use App\Http\Controllers\Admin\StoryController;
use App\Http\Controllers\Admin\TopController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('/user', UserController::class);
Route::resource('/story', StoryController::class)->only(['index', 'show', 'edit', 'update']);
Route::get('/', TopController::class)->name('top.index');
