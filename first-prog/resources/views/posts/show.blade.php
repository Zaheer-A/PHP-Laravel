@extends('layouts.app')

@section('content')
    <h1>Show Post Page</h1>
    <h2><a href="{{route('posts.edit', $post->id)}}">Edit body: {{$post->body}}</a></h2>

@endsection

