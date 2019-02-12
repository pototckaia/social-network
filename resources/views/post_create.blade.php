
@extends('layout')

@section('title', 'Create post')

@section('css')
@stop

@section('content')

    <div class="container">
        <div class="center-block">

            {{ Form::open(array('route' => $route_name, 'method' => $method, 'id' => 'post_сreate')) }}

            {{--<fieldset class="inline-block">--}}
                {{--{{ Form::label('comments_enable', 'Allow comments on the post?', array('class' => '')) }}--}}
                {{--{{  Form::checkbox('comments_enable', '1',--}}
                {{--isset($edit) ? $post->comments_enable : true,--}}
                {{--array('id' => 'comment_enable')) }}--}}
            {{--</fieldset>--}}

            <fieldset class="group-form">
                {{ Form::text('title',
                isset($edit) ? $post->title : '',
                array('class' => '', 'placeholder' => 'Title', 'required' => 'required')) }}
            </fieldset>

            <fieldset>
                {{ Form::textarea("content", isset($edit) ? $post->content : '',
                array('class' => '', 'placeholder' => 'Text')) }}

            </fieldset>

            {{ Form::button( 'Save', array('class' => 'btn-my', 'type' => 'submit')) }}

            {{ Form::close() }}

        </div>
    </div>

@stop