<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Post;

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

//Route::get('/', function () {
//    return view('Welcome');
//});

//Route::get('/post/{name}', function($name){
//   return "Welcome to the PHP course " . $name . "!";
//});


//Route::get('/post/{variable}', '\App\Http\Controllers\PostController@index');

//Create special routes to use in your controllers
//Route::resource('posts', '\App\Http\Controllers\PostController');


//Route::get('contact', '\App\Http\Controllers\PostController@contact');
//
//
//Route::get('post/{id}/{name}', '\App\Http\Controllers\PostController@show_post');






/*
|--------------------------------------------------------------------------
| Database raw sql queries
|--------------------------------------------------------------------------
*/

Route::get('/insert', function(){
    DB::insert('insert into possts (title, body) values(?, ?)', ['PHP without Laravel', 'Laravel is to have']);
});

//
//Route::get('/read', function (){
//   $results = DB::select('select * from possts where id = ?', [1]); //returns an array of results
//    //They come as an STD class object
//    foreach ($results as $result){
////        echo "The result title is: " . $result->title;
//        return $result;
//    }
//});
//
//Route::get('/update', function(){
//    $updated = DB::update('update possts set title = "Java still OP" where id = ?', [1]);
//    return $updated; //gives a number of the row
//});
//
//Route::get('/delete', function(){
//    $deleted = DB::delete('delete from possts where id=?', [2]);
//    return $deleted;
//});

/*
|--------------------------------------------------------------------------
| Eloquent
|--------------------------------------------------------------------------
*/

Route::get('/read', function (){

    $posts = Post::all(); //Pulls all the records!
    foreach ($posts as $post){
        return $post->title;
    }
});

Route::get('/findwhere' , function (){
   $posts = Post::where('title', 'PHP without Laravel')->orderBy('id', 'desc')->take(1)->get();
   return $posts;
});

Route::get('/findmore', function(){

    $more_posts = Post::findOrFail(5);
    return $more_posts;

});



