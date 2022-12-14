<?php

use App\Models\Photo;
use App\Models\Staff;
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

Route::get('/create', function () {

    $staff = Staff::find(1);
    $staff->photos()->create(['path' => 'example.png']);

});

Route::get('/read', function () {
    $staff = Staff::findOrFail(1);
    foreach ($staff->photos as $photo){
        echo $photo->path;
    }
});

Route::get('/update', function () {
    $staff = Staff::findOrFail(1);
    $photo = $staff->photos()->whereId(1)->first();
    $photo->path= 'New path.png';
    $photo->save();
});


Route::get('/delete', function () {
    $staff = Staff::findOrFail(1);
    $staff->photos()->wherePath('badPic')->delete();

});

