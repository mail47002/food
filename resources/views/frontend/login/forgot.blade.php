@extends('frontend.layouts.default')

@section('content')


<div class="forgot-page">

	<div class="sign-content text-center">
		<h1 class="text-upper underline-red">Забули пароль</h1>
		<hr>

		<form action="">
			<label for="email">Введіть свій Email</label>
			<input id="email" type="text" placeholder="">

			<input type="submit" class="button button-red" value="Продовжити">
		</form>

	</div>

</div>

@stop