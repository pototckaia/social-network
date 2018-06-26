@extends('layout')

@section('title', 'Home')

@section('css')
@stop

@section('header')
    @include('header_auth', ['auth_user' => $user])
@stop

@section('content')



@stop