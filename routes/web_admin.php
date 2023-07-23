<?php

use App\Http\Controllers\Admin\CommentController;
use App\Http\Controllers\Admin\EpisodeController;
use App\Http\Controllers\Admin\NoteController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\StoryController;
use App\Http\Controllers\Admin\TopController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

Route::resource('/user', UserController::class);
Route::resource('/story', StoryController::class)->only(['index', 'show', 'edit', 'update']);
Route::resource('/episode', EpisodeController::class)->only(['index', 'show', 'edit', 'update']);
Route::resource('/comment', CommentController::class)->only(['index', 'show', 'edit', 'update']);
Route::resource('/note', NoteController::class)->only(['index', 'show', 'edit', 'update']);
Route::resource('/review', ReviewController::class)->only(['index', 'show', 'edit', 'update']);
Route::get('/', TopController::class)->name('top.index');
