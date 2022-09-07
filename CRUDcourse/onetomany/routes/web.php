<?php

use App\Models\Post;
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
    $post = new Post();
    $post->name = "New Post";
    $post->body = "Body of the new post";
    $post->save();
    $user->posts()->save($post);
    echo "new post made!";

});

Route::get('/read', function(){
    $user = User::findOrFail(1);
    echo strtoupper($user->name) . "<br>";
    foreach($user->posts as $post){
        echo $post->name . "<br>";
        echo $post->body . "<br>";
    }
});

Route::get('/update', function(){
    $user = User::findOrFail(1);
    $user->posts()->whereId(2)->update(['name'=>'I love laravel', 'body'=>'this is awesome']);
    echo "Post 1 updated";
});

Route::get('/delete', function(){
    $user = User::findOrFail(1);
    $user->posts()->whereId(2)->delete();
});
