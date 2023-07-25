<?php

use App\Http\Controllers\Front\TopController;
use Illuminate\Support\Facades\Route;

Route::get('/', TopController::class)->name('top.index');
