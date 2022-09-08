@extends('layouts.app')

@section('content')
    <h1>Index Post Page</h1>
    <ul>
        @foreach($posts as $post)
            <li><a href="{{route('posts.show', $post->id)}}">{{$post->title}}</li></a>
        @endforeach
    </ul>

@endsection

