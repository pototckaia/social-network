@extends('layout')

@section('title', 'Customize profile')

@section('css')
@stop


@section('content')

<div class="main-content-profile">
    @include('user_card', ['user' => $user])

    <div class="content-user-profile">
        <div class="container-profile-title">
            <h3> Edit your profile </h3>
        </div>

        <form action="{{ route("profile.update") }}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="title">
            <textarea name="content_post"></textarea>
            <button class="btn-my" role="button" type="submit">Save change </button>
        </form>


    </div>

</div>




@stop