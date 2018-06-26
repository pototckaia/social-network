@extends('layout')

@section('title', $post->title)


@section('content')
    <div class="container">
        <div class="center-block">

            <div class="post">
                <div>Posted by <a href="{{ route('profile.get', ['user' => $owner->login]) }}"> </a></div>
                <h1> {{ $post->title }} </h1>
                <div> {{ $post->content }} </div>
            </div>

            <div class="add_comment">
                <div>Comment as <a href="{{route('profile.get', ['user' => $auth_user->login])}}">
                        {{  $auth_user->login }}
                    </a></div>
                {{ Form::open(array('route' => 'comment.', 'method' => 'put', 'id' => 'post_operation')) }}

                <fieldset class="group-form">
                    {{ Form::text('title', '', array('class' => '', 'placeholder' => 'Title', 'required' => 'required')) }}
                    @include('error_by_key', ['key' => 'title', 'type' => 'text'])
                </fieldset>

                <fieldset class="inline-block">
                    {{ Form::label('comments_enable', 'Allow comments on the post?', array('class' => '')) }}
                    {{  Form::checkbox('comments_enable', true, array('id' => 'comment_enable')) }}
                </fieldset>

                <fieldset>
                    {{ Form::textarea("content", '', array('class' => '', 'placeholder' => 'Text(optional)', 'form' => 'post_operation')) }}
                </fieldset>
                {{ Form::button( 'Save change', array('class' => 'btn-my', 'type' => 'submit')) }}
                {{ Form::close() }} }}
            </div>
        </div>

@stop