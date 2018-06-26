@extends('layout')

@section('title', 'Customize profile')

@section('css')
@stop

@section('content')

    <div class="container">
        <div class="center-block">

            {{ Form::open(array(
                'route' => 'me.update',
                'files' => true,
                'method' => 'put',
                'id' => 'profile-edit'))  }}

                <fieldset class="group-form">
                    <legend> Login </legend>
                    <div>Your login must be uniquely</div>
                    {{ Form::text('login', $user->login, ['placeholder' => "Displayed Login", 'required' => 'required']) }}
                    @include('error_by_key', ['key' => 'login', 'type' => 'text'])
                </fieldset>

                <fieldset class="group-form">
                    <legend> About you </legend>
                    <div> Let know a little about yourself </div>
                    {{ Form::textarea('about', $user->about, ['placeholder' => "A little description of yourself"]) }}
                    @include('error_by_key', ['key' => 'about', 'type' => 'text'])
                </fieldset>

                <fieldset class="group-form">
                    <legend>Avatar</legend>
                    <div>Upload your own profile avatar. Profile image must be .PNG or .JPG format. </div>
                    {{ Form::file('avatar', ['type' => 'image/jpeg|image/png']) }}
                    @include('error_by_key', ['key' => 'avatar', 'type' => 'text'])
                </fieldset>
            <fieldset class="group-form">
                {{ Form::button( 'Save', array('class' => 'btn-my', 'type' => 'submit')) }}
            </fieldset>

            {{ Form::close() }}


        </div>
    </div>

    {{ session()->token() }} <br>
    {{ $token }} <br>
    {{ session()->getId()}}

@stop