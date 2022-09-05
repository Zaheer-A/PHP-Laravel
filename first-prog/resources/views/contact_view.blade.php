@extends('layouts.app')

@section('content')
{{--    <h1>Post content</h1>--}}
    <h1>Contacts: </h1>

    @if(count($people))
        <ul>
        @foreach($people as $person)
            <li>{{$person}}</li>
        @endforeach
        </ul>
    @endif

@endsection
