<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostsController;

// shortcut key to import hold Ctrl + Alt then I
                                // controller name, method
Route::get('/posts', [PostsController::class, 'index']);

Route::get('/posts/create', [PostsController::class, 'create']);

// Route::get('/posts/{id}', [PostsController::class, 'show']);
Route::get('/posts/{post}', [PostsController::class, 'show']);
Route::get('/posts/{post}/edit', [PostsController::class, 'edit']);

Route::post('/posts', [PostsController::class, 'store']);
Route::put('/posts/{post}', [PostsController::class, 'update']);

Route::delete('/posts/{post}', [PostsController::class, 'destroy']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
