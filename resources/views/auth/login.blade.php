@extends('layout')

@section('title', 'Login')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset("css/errors.css") }}">

@stop

@section('header')

@stop

@section('content')
    <div id="page-content">
        <div class="container" id="create-id">
            <div id="oauth" class="center-block">
                <div id="form-container">
                    <div id="form-main">

                        <form id="userId" action='{{ route('login.post') }}' method='POST'>

                            <h3>Sign In</h3>
                            <div id="form-input">
                                @csrf
                                @include('error_by_key', ['key' => 'general', 'type' => 'block'])

                                <div id="login">
                                    <label for='login' class="control-label">Username: </label>
                                    <input name='login' class="form-control" placeholder="" type="text"
                                           value="{{old('login')}}" autocomplete="false"
                                           required>
                                    @include('error_by_key', ['key' => 'login', 'type' => 'text'])
                                </div>

                                <div id="pw">
                                    <label for="password" class="control-label">Password:</label>

                                    <input name='password' class="form-control" type='password'
                                           required autocomplete="false">

                                    @include('error_by_key', ['key' => 'password', 'type' => 'text'])
                                </div>

                            </div>
                            <button id="create-id-btn" class="btn-my" role="button"
                                    type="submit">Login</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop