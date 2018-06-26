@extends('layout')

@section('title', $title)

@section('css')
    {{--    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">--}}
@stop

@section('content')
    <div class="container">
        <div class="center-block">
            <div class="title-post">
                <h1>
                    {{ $title }}
                </h1>

                {{ Form::open(array('route' => $route_name, 'method' => $method, 'id' => 'post_operation')) }}

                <fieldset class="group-form">
                    {{ Form::text('title',
                    isset($edit) ? $post->title : ' ',
                    array('class' => '', 'placeholder' => 'Title', 'required' => 'required')) }}

                </fieldset>

                <fieldset class="inline-block">
                    {{ Form::label('comments_enable', 'Allow comments on the post?', array('class' => '')) }}
                    {{  Form::checkbox('comments_enable', '1',
                    isset($edit) ? $post->comments_enable : true,
                    array('id' => 'comment_enable')) }}
                </fieldset>

                <fieldset>
                    {{ Form::textarea("content",
                    isset($edit) ? $post->content : ' ',
                    array('class' => '', 'placeholder' => 'Text(optional)', 'form' => 'post_operation')) }}

                </fieldset>
                    {{ Form::button( 'Save', array('class' => 'btn-my', 'type' => 'submit')) }}
                {{ Form::close() }}

            </div>
        </div>

@stop