<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Requests\CreatePostRequest;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $posts = Post::recent();
        return view('posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostRequest $request)
    {

        $input = $request->all();
        if($file = $request->file('file')){
            $name = $file->getClientOriginalName();
            //Creates an images folder in the public directory
            $file->move('images', $name);
            $input['path'] = $name;
        }

        Post::create($input);

        //How to store a file
//        return $request->file('file');


//        $this->validate($request, [
//
//            'title'=>'required',
//            'body'=>'required'
//
//        ]);
//        Post::create($request->all());
//        $post = new Post();
//        $post->title = $request->title;
//        $post->body = $request->body;
//        $post->save();
//
//        return redirect('/posts');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::findOrFail($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::findOrFail($id);
        $post->update($request->all());
        return redirect('/posts');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/posts');
    }

    /**
     * Custom method to show a view
     * @return void
     */
    public function contact()
    {
        $people = ["Ashma", "Neo", "Jeem", "Dad"];
        return view('contact_view', compact('people'));
    }

    public function show_post($id, $name){
//        return view('post')-> with('id', $id);
//        The method below does the same thing. As long as the name inside compact is the same as the
//        variable being passed it will use it.
        return view('post', compact('id', 'name'));
    }
}
