@extends('layouts.app')

@section('content')
    <h1>Edit Post Page</h1>

{{--    <form method="post" action="/posts/{{$post->id}}">--}}
{{--        @csrf--}}
{{--        {{csrf_field()}}--}}
{{--        <input type="hidden" name="_method" value="PUT">--}}
{{--        <input type="text" name="title" placeholder="Enter Title" value="{{$post->title}}">--}}
{{--        <input type="text" name="body" placeholder="Enter body" value="{{$post->body}}">--}}
{{--        <input type="submit" name="Submit">--}}
{{--    </form>--}}

    {!! Form::model($post, ['method'=>'PATCH', 'action'=>['App\Http\Controllers\PostController@update', $post->id]]) !!}
    @csrf
    <div class="form-group">
        {!! Form::label('title', 'New Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
        {!! Form::label('title', 'New Body:') !!}
        {!! Form::text('body', null, ['class'=>'form-control']) !!}
        {!! Form::submit('Update', ['class' => 'button-style']) !!}
    </div>
    {!! Form::close() !!}

    {!! Form::open(['method'=>'DELETE', 'action'=>['App\Http\Controllers\PostController@destroy', $post->id]]) !!}
    {!! Form::submit('Delete') !!}
    {!! Form::close() !!}


@endsection

