<?php

@extends('layout')

@section('title', $user->login)

@section('css')
@stop

@section('content')

{{--'user_icon'--}}
    <img src="{{ $user->path_to_avatar }}" alt='avatar'>
    <p>{{$user->login}}</p>
    <p>{{$user->about}}</p>

    <p>About(Optional)</p>

    <p>Avatar</p>

{{--<div class="block">--}}
{{--<label for="image">Avatar</label>--}}
{{--<input type="file" name="image"/>--}}
{{--@include('error_by_key', ['key' => 'image'])--}}
{{--</div>--}}

{{--<div class="block">--}}
{{--<label for="about">About you:</label>--}}
{{--<input type="text" name="about" value="{{old('about')}}">--}}
{{--@include('error_by_key', ['key' => 'about'])--}}
{{--</div>--}}

@stop