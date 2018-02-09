{{ Form::open(['route' => 'adverts.index', 'method' => 'get', 'class' => 'search']) }}
    {{ Form::text('search', null, ['placeholder' => 'Пошук']) }}
    {{ Form::submit('') }}
{{ Form::close() }}