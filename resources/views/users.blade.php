@extends('layout')


@section('content')
    <p>All users</p>
    @foreach($users as $user)
        <p>{{ $user->login }}</p>
    @endforeach
@stop