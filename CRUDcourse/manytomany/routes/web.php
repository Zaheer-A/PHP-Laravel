<?php

use App\Models\Role;
use App\Models\User;
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
    return view('welcome');
});

Route::get('/create', function(){

    $user = User::findOrFail(1);
    $role = new Role();
    $role->name = 'Free_User';
    $user->roles()->save($role);

});

Route::get('/reading', function () {

    $user = User::findOrFail(2);
    foreach($user->roles as $role){
        echo $role->name;
    }
});

Route::get('/update', function () {

    $user = User::findOrFail(1);

    if($user->has('roles')){
        foreach($user->roles as $role){
            if($role->name === 'admin'){
                $role->name = strtoupper('subscriber');
                $role->save();
                echo "Role changed";
            }
        }
    }
});

Route::get('/delete', function () {

    $user = User::findOrFail(2);
    $user->roles()->delete();
});

Route::get('/attach', function () {

    $user = User::findOrFail(1);
    $user->roles()->attach(3);
});

Route::get('/detach', function () {

    $user = User::findOrFail(1);
    $user->roles()->detach(2);
});

Route::get('/sync', function () {

    $user = User::findOrFail(1);
    $user->roles()->sync([1, 2]); //keep these roles but delete the rest!
});


