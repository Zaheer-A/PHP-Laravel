<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
//    return view('welcome');
//    if(Auth::check()){
//        return "The user is logged in!";
//    }

    //You would put this in a model and they will be redirected to the page they were trying to go
    //Before being logged in!
//    if(Auth::attempt(['username'=>$username, 'password'=>$password])){
//        return redirect()->intended();
//    }
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin', function(){
    return view('admin.index');
});
