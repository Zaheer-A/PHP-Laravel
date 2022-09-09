<?php

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/admin/user/roles', ['middleware'=>'role', function(){


    return "Middleware RoleMiddleware";

}]);

//Route::get('/isAdmin', function(){
//    $user = Auth::user();
//    if($user->isAdmin()){
//        echo $user->name . " is an admin";
//    } else {
//        echo $user->name . " is not an admim";
//    }
//});

Route::get('/admin', 'App\Http\Controllers\AdminController@index');

