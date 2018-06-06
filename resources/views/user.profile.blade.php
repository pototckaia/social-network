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

    {{--только для владельца--}}
    <a href="{{ route('post.create') }}">NEW POST</a>
    <a href="{{ route('user.edit') }}">CUSTOMIZE PROFILE</a>

    <p>Post</p>
    @foreach ($user->posts as $post)
        <a href="{{ route('post.show', ['id' => $post->id]) }}"> {{ $post->title }} </a>

        <p> submitted {{$post->created_at }} by {{ $user->login }} </p>

        <a href="{{ route('post.show', ['id' => $post->id]) }}">
            {{ $post->comments->count() }} comments</a>
    @endforeach

    <p> Comment </p>
    @foreach($user->comments as $comment)
        <p>{{ $comment->post->title }} by </p>
        <a href={{ route('user.profile', ['id' => $comment->post->user->id ]) }}>
            {{ $comment->post->user->login }}
        </a>

        <p> create {{ $comment->created_at }} </p>
        <p> {{ $comment->content }} </p>
        <a href="{{ route('post.show', ['id' => $comment->post->id]) }}"> full comments </a>

    @endforeach

@stop