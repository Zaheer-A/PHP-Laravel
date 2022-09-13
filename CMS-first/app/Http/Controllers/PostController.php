<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{

    public function index(){
//        $posts = Post::all();
        $posts = auth()->user()->posts;
        return view('posts.index', ['posts' => $posts]);
    }


    public function show(Post $post){

        return view('blog-post', ['post' => $post]);
    }

    /**
     * Create a new post only when logged in as an admin
     * @return void
     */
    public function create(){
        return view('posts.create');
    }

    public function store(){
        $inputs = \request()->validate([
            'title' => 'required|min:2|max:200',
            'post_image' => 'file',
            'body' => 'required'
        ]);

        if(\request('post_image')){
            $inputs['post_image'] = \request('post_image')->store('images');
        }

        auth()->user()->posts()->create($inputs);
        session()->flash('postCreated', $inputs['title'] . ' post was created successfully');
        return redirect()->route('post.index');

    }

    public function destroy(Post $post, Request $request){

        $this->authorize('delete', $post);

        $post->delete();


        $request->session()->flash('message', 'Post was deleted');
        return back();
    }

    public function edit(Post $post){
        $this->authorize('view', $post);
        return view('posts.edit', ['post'=>$post]);
    }

    public function update(Post $post){
        $inputs = \request()->validate([
            'title' => 'required|min:2|max:200',
            'post_image' => 'file',
            'body' => 'required'
        ]);

        //Check if there is an image
        if(\request('post_image')){
            $inputs['post_image'] = \request('post_image')->store('images');
            $post->post_image = $inputs['post_image'];
        }

        $post->title = $inputs['title'];
        $post->body = $inputs['body'];


        $this->authorize('update', $post);

        $post->save();
        \session()->flash('editMessage', 'Post has been updated');
        return redirect()->route('post.index');

    }
}
