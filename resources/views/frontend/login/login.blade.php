@extends('frontend.layouts.default')

@section('title')Adverts - @stop

@section('content')
	<div class="signin-page sign-form">
		<div class="sign-content text-center">
			<h2 class="title">Вхід</h2>
			<div class="sign-body">
				<div class="left text-left separator">
					{!! Form::open(['route' => 'login', 'method' => 'post']) !!}
						{!! Form::label('email', 'Email', ['for' => 'email']) !!}
						{!! Form::email('email', null, ['id' => 'email']) !!}
						{!! $errors->first('email', '<label class="control-label">:message</label>') !!}
						{!! Form::label('password', 'Пароль', ['for' => 'password']) !!}
						{!! Form::password('password', null, ['id' => 'password']) !!}
						{!! $errors->first('password', '<label class="control-label">:message</label>') !!}
						{!! Form::submit('Увійти', ['class' => 'button button-red']) !!}
					{!! Form::close() !!}
					<p><a href="{{ url('password/reset') }}" class="link-blue">Забули пароль?</a></p>
				</div>
				<div class="right text-right">
					<a href="#" class="button login google">Продовжити з Google</a>
					<a href="#" class="button login facebook">Продовжити з Facebook</a>
					<a href="#" class="button login twitter">Продовжити з Twitter</a>
					<p class="signup">Вас ще немає на сайті?  <a href="{{ route('register') }}" class="link-red">Приєднатися зараз</a></p>
				</div>
			</div>
		</div>
	</div>
@endsection