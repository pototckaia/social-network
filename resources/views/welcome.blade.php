@extends('layout')


@section('title', 'Welocome')

@section('content')
    <h2>Hello</h2>

    <div>
        <div class="top-right links">
            @if (Session::has('user'))
                <a href="{{ route('home.get') }}">Home</a>
            @else
                <a href="{{ route('login.get') }}">LOG IN</a>
                <a href="{{ route('register.get') }}">SIGN UP</a>
            @endauth
        </div>

        {{--<div> User: {{ Session::get('user') }} </div>--}}

    </div>

@stop
