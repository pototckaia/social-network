
@if ($errors->has($key))
    <div class=
            @if ($type == 'block')
                "error-block"
            @elseif ($type == 'text')
                "error-text"
            @endif
    >

        <p> {{ $errors->first($key) }} </p>
    </div>
    {{--<div class="damage errors">--}}
        {{--<ul class="all_error">--}}
        {{--@foreach ($errors->get($key) as $error)--}}
            {{--<li class="error">--}}
                {{--{{$error}}--}}
            {{--</li>--}}
        {{--@endforeach--}}

        {{--</ul>--}}
    {{--</div>--}}
@endif