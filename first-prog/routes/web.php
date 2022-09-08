<?php

use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\User;
use App\Models\Country;
use App\Models\Photo;

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

//Route::get('/read', function (){
//
//    $posts = User::all(); //Pulls all the records!
//    foreach ($posts as $post){
//        return $post;
//    }
//});
//
//Route::get('/findwhere' , function (){
//   $posts = Post::where('title', 'PHP without Laravel')->orderBy('id', 'desc')->take(1)->get();
//   return $posts;
//});
//
//Route::get('/findmore', function(){
//
//    $more_posts = Post::findOrFail(5);
//    return $more_posts;
//
//});
//
//Route::get('/basicinsert', function(){
//
//    $post = new Post;
//
//    $post->title = 'new ORM title';
//    $post->body= 'wow eloquent is so cool';
//
//    $post->save(); //Save and update the record
//
//});
//
//Route::get('/findrecord', function(){
//
//    $post = Post::find(3);
//
//    $post->title = 'even newer title!';
//    $post->body= 'ORM input';
//
//    $post->save(); //Save and update the record
//
//});
//
//
///*
//|--------------------------------------------------------------------------
//| Multiple table editing
//|--------------------------------------------------------------------------
//*/
//
//Route::get('/create', function (){
//   Post::create(['title' => 'basic insert', 'body' => 'Wow I love so much']);
//});
//
//
//Route::get('/update', function(){
//
//    Post::where('id', 5)->where('is_admin', 0)->update(['title'=>'The better title', 'body'=>'The even better description']);
//
//});
//
//
///*
//|--------------------------------------------------------------------------
//| Delete function (multiple methods)
//|--------------------------------------------------------------------------
//*/
//
//Route::get('/deleteOne', function(){
//
//    $delete_post = Post::find(6);
//    $delete_post->delete();
//
//});
//
//Route::get('/deleteTwo', function(){
//
//    Post::destroy([4, 5]);
//
//});
//
///*
//|--------------------------------------------------------------------------
//| SOFT Delete & Retrieve
//|--------------------------------------------------------------------------
//*/
//Route::get('/softDelete', function(){
//
//    Post::find(9)->delete();
//
//});
//
//Route::get('/readSoftDelete', function(){
//
////    $post = Post::find(8);
////    return $post;
//
//    $post =  Post::withTrashed()->where('id', 8)->get();
//    return $post;
//
//});
//
//
//Route::get('/retrieve', function (){
//    Post::withTrashed()->where('is_admin', 0)->restore();
//    echo "item restored";
//});
//
///*
//|--------------------------------------------------------------------------
//| Hard Delete PERMANENT
//|--------------------------------------------------------------------------
//*/
//
//Route::get('/forceDelete', function (){
//
//    Post::withTrashed()->where('id', 10)->forceDelete();
//    echo 'Item delted permanently';
//
//});
//
///*
//|--------------------------------------------------------------------------
//| Eloquent Data Relations
//|--------------------------------------------------------------------------
//*/
//Route::get('/user/{id}/post', function($id){
//    echo 'Methods called';
//    return User::find($id)->post;
//
//});
//
//Route::get('/post/{id}/user', function($id){
//
//    return Post::find($id)->user->name;
//});
//
//Route::get('/posts/{id}', function($id){
//
//    $user = User::find($id);
//    $posts = $user->posts;
//    foreach ($posts as $post){
//        echo $post->title . "<br>";
//    }
//
//});
//
//Route::get('/role/{user}', function($user){
//   $user = User::find($user);
//   foreach($user->roles as $role){
//       echo $user->name . " is an " . $role->name;
//   }
//});
//
//
//Route::get('/user/pivot', function(){
//
//    $user = User::find(1);
//    foreach($user->roles as $role){
//        echo $role->pivot->created_at;
//    }
//
//});
//
//Route::get('/user/country', function(){
//
//    $country = Country::find(2);
//
//    foreach($country->posts as $post){
//        echo $post->title . "<br>";
//    }
//
//});
//
//
////Polymorphic Relations
//Route::get('/photo/user/{id}', function($id){
//    $user = User::find($id);
//    foreach($user->photos as $photo){
//        return $photo->path;
//    }
//});
//
//Route::get('/photo/post/{id}', function($id){
//    $post = Post::find($id);
//    foreach($post->photos as $photo){
//        return $photo->path;
//    }
//});
//
//Route::get('/photo/{id}', function($id){
//
//    $photo = Photo::findOrFail($id);
//    return $photo;
//
//});
//
////Polymorphic MAny to Many
//Route::get('/post/tag/{id}', function($id){
//   $post = Post::find($id);
//   foreach($post->tags as $tag){
//       echo $tag->name . "<br>";
//   }
//});
//
//Route::get('/tag/post', function(){
//    $tag = Tag::find(2);
//    foreach($tag->posts as $post){
//        return $post->title;
//    }
//});

//FORUMS
Route::resource('/posts', '\App\Http\Controllers\PostController');

Route::group(['middleware'=>'web'], function(){
   Route::resource('/posts', 'App\Http\Controllers\PostController');
});

