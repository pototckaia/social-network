
<div class="">

    {{ Form::open(array('route' => isset($id_parent) ? [$route_name, $id_parent] : $route_name,
        'method' => $method, 'class' => 'comment_сreate'))
        }}
    <fieldset>
        {{ Form::textarea("content", '',
            array('class' => '', 'placeholder' => 'What are your thoughts?', 'required' => 'required')) }}
    </fieldset>

    {{ Form::hidden('id_post', $id_post) }}
    {{ Form::button( 'Comment', array('class' => 'btn-my', 'type' => 'submit')) }}

    {{ Form::close() }}

</div>
