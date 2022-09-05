<?php

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
    return view('Welcome');
});

//Route::get('/post/{name}', function($name){
//   return "Welcome to the PHP course " . $name . "!";
//});


//Route::get('/post/{variable}', '\App\Http\Controllers\PostController@index');

//Create special routes to use in your controllers
//Route::resource('posts', '\App\Http\Controllers\PostController');


Route::get('contact', '\App\Http\Controllers\PostController@contact');


Route::get('post/{id}/{name}', '\App\Http\Controllers\PostController@show_post');
