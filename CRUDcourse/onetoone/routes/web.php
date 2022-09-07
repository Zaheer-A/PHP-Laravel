<?php

use App\Models\User;
use App\Models\Address;
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

Route::get('/insert/{id}', function ($id){
   $user = User::findOrFail($id);
   $address = new Address(['name'=>'147 Brongouw 1352EN']);
   $user->address()->save($address);
});

Route::get('/update', function(){
    //get()->returns an array of results
    //first() returns the first one
    $address = Address::where('user_id', 1)->first();
    $address->name = "123 Updated Avenue Alaska";
    $address->save();
    echo "Addresses added succesfully!";
});

Route::get('/read', function(){
    $user = User::findOrFail(1);
    echo $user->address->name;
});

Route::get('/delete', function(){
    $user = User::findOrFail(1);
    echo $user->address()->delete();
});
