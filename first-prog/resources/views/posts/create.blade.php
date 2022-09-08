@extends("layouts.app")

@section('content')
    <h1>Create Post Page</h1>

{{--    <form method="post" action="/posts">--}}

    {!! Form::open(['method'=>'post', 'action'=>'App\Http\Controllers\PostController@store', 'files'=>true]) !!}
        @csrf


    <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
        {!! Form::label('title', 'Body:') !!}
        {!! Form::text('body', null, ['class'=>'form-control']) !!}
    </div>

    Submit file
    <div class="form-group">
        {!! Form::file('file') !!}
    </div>

    <br>

    <div class="form-group">
        {!! Form::submit('Create Post', ['class' => 'btn btn-primary']) !!}
    </div>




{{--        <input type="text" name="title" placeholder="Enter Title">--}}
{{--        <input type="text" name="body" placeholder="Enter body">--}}
{{--        <input type="submit" name="Submit">--}}


    {!! Form::close() !!}


    @if(count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

{{--    </form>--}}

@endsection
