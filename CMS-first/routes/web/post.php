<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/posts/index', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
Route::get('/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
Route::post('/posts', [PostController::class, 'store'])->name('post.store');


Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::delete('/posts/{post}/delete', [PostController::class, 'destroy'])->name('post.destroy');
Route::patch('/posts/{post}/update', [PostController::class, 'update'])->name('post.update');
