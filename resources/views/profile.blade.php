@extends('layout')

@section('title', $user->login)

@section('css')
@stop

@section('content')
    <div class="main-content-profile">

        @include('user_card', ['user' => $user])

        <div class="content-user-profile">

            <div class="post ">
                <div class="preview">
                    Akfula commented on beta_testers_on_steam_vr_needed Beta testers on Steam VR needed Posted by
                </div>
                <div class="wrap-con-post ">
                    <div class="con-post">
                        I'm interested to take part in beta.
                    </div>
                </div>
            </div>

            <div class="post ">
                <div class="preview">
                    Akfula commented on beta_testers_on_steam_vr_needed Beta testers on Steam VR needed Posted by
                </div>
                <div class="wrap-con-post ">
                    <div class="con-post">
                        I'm interested to take part in beta.
                    </div>
                </div>
            </div>

        </div>

    </div>


    {{--<p>Post</p>--}}
    {{--@foreach ($user->posts as $post)--}}
        {{--<a href="{{ route('post.show', ['id' => $post->id]) }}"> {{ $post->title }} </a>--}}

        {{--<p> submitted {{$post->created_at }} by {{ $user->login }} </p>--}}

        {{--<a href="{{ route('post.show', ['id' => $post->id]) }}">--}}
            {{--{{ $post->comments->count() }} comments</a>--}}
    {{--@endforeach--}}

    {{--<p> Comment </p>--}}
    {{--@foreach($user->comments as $comment)--}}
        {{--<p>{{ $comment->post->title }} by </p>--}}
        {{--<a href={{ route('user.profile', ['id' => $comment->post->user->id ]) }}>--}}
            {{--{{ $comment->post->user->login }}--}}
        {{--</a>--}}

        {{--<p> create {{ $comment->created_at }} </p>--}}
        {{--<p> {{ $comment->content }} </p>--}}
        {{--<a href="{{ route('post.show', ['id' => $comment->post->id]) }}"> full comments </a>--}}

    {{--@endforeach--}}

@stop