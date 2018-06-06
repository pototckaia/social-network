@extends('layout')

@section('title', 'Register')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('/css/auth_form.css') }}" id="register_form">

@stop

@section('content')
    <div class="container">
        <form action='{{ route('register.post')}}' method='POST' >
            @csrf

            <div class="block">
                <label for='login'>Username: </label>
                <input name='login' placeholder="" type="text" value="{{old('login')}}" required>
                @include('error_by_key', ['key' => 'login'])
            </div>

            <div class="block">
                <label for="password">Password:</label>
                <input name='password' type='password' required>
                @include('error_by_key', ['key' => 'password'])
            </div>

            <div class="block">
                <label for="password_confirmation"> Confirm password: </label>
                <input name='password_confirmation' type='password' required>
            </div>

            <button type="submit" class="registerbtn">Register</button>
        </form>
    </div>

@stop

@section('js')
    {{--<script type="text/javascript" src=" {{  resource_path('assets/js/register.js') }}"></script>--}}
@stop