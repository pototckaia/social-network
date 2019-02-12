@extends('layout')

@section('title', 'Home')

@section('css')
@stop

@section('header')
    @include('header_auth', ['auth_user' => $user])
@stop

@section('content')
    
    <div id="feed_post" class="container">


        @foreach ($posts as $post)
            <div class="well">
                <div class="media">
                    <div class="media-body">
                        <h3 class="">{{ $post->title }}</h3>
                        <p class="text-right">By {{ $user->login }}</p>
                        <div> {!!  nl2br($post->content) !!}</div>
                    </div>

                    {{--<div class="comments">--}}
                        {{--<h4>Comments</h4>--}}
                            {{--<div class="media comment">--}}
                                {{--<div class="media-left">--}}
                                    {{--<img src="img_avatar3.png" class="media-object" style="width:45px">--}}
                                {{--</div>--}}

                                {{--<div class="media-body">--}}
                                    {{--<div class="row">--}}
                                        {{--<div class="col-md-8">--}}
                                            {{--<h4 class="media-heading">Имя пользователя 3</h4>--}}
                                            {{--<p>Ответил пользователю 2, Здесь текст, отзыв или комментарий</p>--}}
                                        {{--</div>--}}
                                        {{--<div class="col-sm-1">--}}
                                            {{--<span class="comment-reply"><a href="#" class="reply">ответить</a></span>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--</div>--}}

                    {{--</div>--}}
                </div>
            </div>
        @endforeach

    </div>

@stop