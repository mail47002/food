@extends('frontend.layouts.default')

@include('frontend.includes.nav')
@section('title')Adverts - @stop
@section('content')

<div class="signin-page sign-form">
	<div class="sign-content text-center">
		<h2 class="title">Вхід</h2>
		<div class="sign-body">

			<div class="left text-left separator">

				<form action="">
					<label for="email">Email</label>
					<input id="email" type="text" placeholder="">

					<label for="password">Пароль</label>
					<input id="password" type="password" placeholder="">

					<input type="submit" class="button button-red" value="Увійти">
				</form>

				<p><a href="#" class="link-blue">Забули пароль</a></p>

			</div>

			<div class="right text-right">
				<a href="#" class="button login google">Продовжити з Google</a>
				<a href="#" class="button login facebook">Продовжити з Facebook</a>
				<a href="#" class="button login twitter">Продовжити з Twitter</a>

				<p class="signup">Вас ще немає на сайті?  <a href="?page=signup" class="link-red">Приєднатися зараз</a></p>
			</div>

		</div>

	</div>
</div>

@stop