@extends('layout')

@section('title', 'Register')

@section('css')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/form.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset("css/errors.css") }}">

@stop

@section('content')
    <div id="page-content">
        <div class="container" id="create-id">
            <div id="oauth" class="center-block">
                <div id="form-container">
                    <div id="form-main">

                        <form id="userId" action='{{ route('register.post')}}' method='POST' >

                            <h3>Create a account ID</h3>
                            <div id="form-input" >

                                @csrf

                                <div id="login">
                                    <label for='login' class="control-label">Username: </label>
                                    <input name='login' class="form-control" placeholder="" type="text"
                                           value="{{old('login')}}" autocomplete="false"
                                    required>
                                    @include('error_by_key', ['key' => 'login', 'type' => 'text'])
                                </div>

                                <div id="pw">
                                    <label for="password" class="control-label">Password:</label>
                                    <input name='password' class="form-control" type='password' required autocomplete="false">
                                    @include('error_by_key', ['key' => 'password', 'type' =>'text'])
                                </div>

                                <div id="con-pw">
                                    <label for="password_confirmation" class="control-label">Confirm password: </label>
                                    <input name='password_confirmation'
                                           class='form-control' type='password' required>
                                </div>
                            </div>

                            <button id="create-id-btn" class="btn-my" role="button"
                                    type="submit" >Register</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>


@stop

@section('js')
    {{--<script type="text/javascript" src=" {{  resource_path('assets/js/register.js') }}"></script>--}}
@stop