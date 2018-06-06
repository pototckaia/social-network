@extends('layout')

@section('title', 'Register')

@section('css')
@stop

@section('content')

    {{ $user  }}
    <a href="{{ route('post.add') }}" >NEW POST</a>
    <a href="{{ route('user.edit') }}">CUSTOMIZE PROFILE</a>

@stop