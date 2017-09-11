@extends('frontend.layouts.default')

@section('content')
	<div class="forgot-page">
		<div class="sign-content text-center">
			<h1 class="text-upper underline-red">Забули пароль</h1>
			<hr>

			{!! Form::open(['route' => 'forgot', 'method' => 'post']) !!}
				{!! Form::label('email', 'Введіть свій Email', ['for' => 'email']) !!}
				{!! Form::email('email', null, ['id' => 'email']) !!}
				{!! $errors->first('email', '<label class="control-label">:message</label>') !!}
				{!! Form::submit('Продовжити', ['class' => 'button button-red']) !!}
			{!! Form::close() !!}

		</div>
	</div>
@endsection