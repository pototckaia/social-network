@section('css')
    @parent
    <link type="text/css" rel="stylesheet" href="{{ asset("css/errors.css") }}">

@stop

@if ($errors->has($key))
    <div class="damage errors">
        <ul class="all_error">
        @foreach ($errors->get($key) as $error)
            <li class="error">
                {{$error}}
            </li>
        @endforeach

        </ul>
    </div>
@endif