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

            <div class="row">
                <div class="col-sm-8">
                    <fieldset class="group-form">
                        <legend> Login </legend>
                        <div>Your login must be uniquely</div>
                        {{ Form::text('login', $user->login, ['placeholder' => "Displayed Login", 'required' => 'required']) }}
                        @include('error_by_key', ['key' => 'login', 'type' => 'text'])
                    </fieldset>

                    <fieldset class="group-form">
                        <legend>Email</legend>
                        <div>Just your name. Doesn't affect anything. </div>
                        {{ Form::email('email', $user->email, ['placeholder' => "Contact with me"]) }}
                        @include('error_by_key', ['key' => 'avatar', 'type' => 'text'])
                    </fieldset>

                    <fieldset class="group-form">
                        <legend> About me </legend>
                        <div> Let know a little about yourself </div>
                        {{ Form::textarea('about', $user->about, ['placeholder' => "A little description of yourself"]) }}
                        @include('error_by_key', ['key' => 'about', 'type' => 'text'])
                    </fieldset>

                </div>

                <div class="col-sm-4">
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

                    <fieldset class="group-form">
                        {{ Form::open(['method' => 'delete', 'route' => 'me.delete']) }}
                        {{ Form::button('Delete account ', ['class' => 'btn-my btn-danger', 'type' => 'submit']) }}
                        {{ Form::close() }}

                    </fieldset>

                </div>
            </div>




        </div>
    </div>

@stop