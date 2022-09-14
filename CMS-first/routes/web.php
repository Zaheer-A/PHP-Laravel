<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/post/{post}', [\App\Http\Controllers\PostController::class, 'show'])->name('post');

Route::middleware('auth')->group(function(){
    Route::get('/admin', [App\Http\Controllers\AdminsController::class, 'index'])->name('admin.index');

    Route::get('/admin/posts/index', [App\Http\Controllers\PostController::class, 'index'])->name('post.index');
    Route::get('/admin/posts/create', [App\Http\Controllers\PostController::class, 'create'])->name('post.create');
    Route::post('/admin/posts', [PostController::class, 'store'])->name('post.store');

    Route::get('/admin/posts/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
    Route::delete('/admin/posts/{post}/delete', [PostController::class, 'destroy'])->name('post.destroy');
    Route::patch('/admin/posts/{post}/update', [PostController::class, 'update'])->name('post.update');

    Route::get('/profile/{user}', [UserController::class, 'show'])->name('user.profile.show');
    Route::put('/profile/{user}/update', [UserController::class, 'update'])->name('user.profile.update');

    Route::get('admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::delete('admin/{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');
});
