<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::put('/users/profile/{user}/update', [UserController::class, 'update'])->name('user.profile.update');


Route::delete('/users/profile/{user}/destroy', [UserController::class, 'destroy'])->name('user.destroy');

Route::middleware('role:Admin')->group(function(){
    Route::get('/users/profile', [UserController::class, 'index'])->name('admin.users.index');
});

Route::middleware(['can:view,user'])->group(function(){
    Route::get('/users/profile/{user}', [UserController::class, 'show'])->name('user.profile.show');
});
