@extends('frontend.layouts.empty')

@section('content')

<div class="signup-page sign-form" style="background-image: url('uploads/signup.jpg');">
	<div class="sign-content text-center">
		<div class="sign-header">
			<a href="#" class="back" onclick="window.history.back();"></a>
			<h3 class="title">ласкаво просимо</h3>
			<p>Готуйте свої улюблені страви і отримуйте винагороду! <br>Замовляйте будь-яку страву, і будьте впевнені, що вона найкращої якості!</p>
		</div>
		<div class="sign-body">

			<div class="left separator">

				{{ Form::open([ 'route' => 'login.register', 'method' => 'POST']) }}
					{{ Form::label('email', 'Email', ['for' => 'email']) }}
					{{ Form::email('email', null, ['id' => 'email', 'placeholder' => 'Email']) }}
					{!! $errors->first('email', '<label class="control-label alert">:message</label>') !!}
					{{ Form::label('password', 'Пароль', ['for' => 'password']) }}
					{{ Form::password('password', null, ['id' => 'password', 'placeholder' => 'password']) }}
					{!! $errors->first('password', '<label class="control-label alert">:message</label>') !!}
					<div class="g-recaptcha" data-sitekey="6LeUqiwUAAAAAPhKjaHyn1nYY30E0Do4WfJOZWOu"></div>
					{{Form::submit('Зареєструватися', ['class' => 'button button-red']) }}
				{{ Form::close() }}

				<p class="terms">Зареєструвавшись або увійшовши, я визнаю і згоден з <a href="#" class="link-blue">умовами сайту</a> та <a href="#" class="link-blue">правилами конфіденційністі</a>.</p>

			</div>

			<div class="right text-right">
				<a href="#" class="button login google">Продовжити з Google</a>
				<a href="#" class="button login facebook">Продовжити з Facebook</a>
				<a href="#" class="button login twitter">Продовжити з Twitter</a>
			</div>

		</div>
		<div class="sign-footer">
			<span>Вже є аккаунт?</span>
			<a href="{{ route('login') }}" class="link-red">Увійти</a>
		</div>
	</div>
</div>
@stop

@section('scripts')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
@stop