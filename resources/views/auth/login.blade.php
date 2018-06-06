@extends('layout')

@section('title', 'Register')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/auth_form.css') }}">
@stop

@section('content')
    <div class="container">
        <form action='{{ route('login.post') }}' method='POST'>
            @csrf

            @include('error_by_key', ['key' => 'general'])

            <div class="block">
                <label for="login"> Username:</label>
                <input name='login' type="text"  required>
                @include('error_by_key', ['key' => 'login'])
            </div>

            <div class="block">
                <label for="password">Password: </label>
                <input name='password' type='password' required>
                @include('error_by_key', ['key' => 'password'])
            </div>

            <button type="submit" class="registerbtn">Login</button>
        </form>
    </div>
@stop