<?php

use Illuminate\Support\Facades\Mail;
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
    $data = [
        'title' => 'When meeting?',
        'content' => 'I sent this email from my PHP/Laravel application which I built from the udemy course'
    ];

    Mail::send('mail', $data, function($message){
        $message->to('ashma@zaheer.com', "Ashma")->subject('Hello Ashma!');
    });

//    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
