@extends('frontend.layouts.default')
@section('title')Products - @stop
@section('content')

<div class="container">
	<div class="row flex-md">
		<div class="col-md-3">
			<div class="left-sidebar bg-yellow text-center">

				<div class="avatar">
					<div class="uploader profile">
						<img src="/{{$profile['image']}}" alt="foto">
						<input type="file" name="avatar" id="filePhoto" />
						<div class="round"><i class="fo fo-camera"></i></div>
					</div>
				</div>
				{{-- ToDo: upload to server --}}

				<ul class="menu">
					<li><a href="{{ route('profile.index') }}" class="link-back">Моя сторінка</a></li>
					<li><a href="{{ route('profile.edit') }}">Про мене</a></li>
					<li><a href="{{ route('profile.password') }}"  class="active">Пароль</a></li>
					<li><a href="{{ route('profile.nickname') }}">Адреса сторінки</a></li>
				</ul>

			</div>
		</div>

		<div class="col-md-9">
			<h5 class="text-upper underline-red">Змінити пароль</h5>
			<hr>
			{{ Form::open([ 'route' => 'profile.updatePassword', 'method' => 'POST', 'class' => 'contact']) }}
				<p class="message half" id="message">Заповніть виділені поля</p>
				{{ Form::label('email', 'Email*', ['for' => 'email']) }}
				{{ Form::text('email', 'ussr983@gmail.com', ['id' => 'email', 'required' => 'required', 'disabled' => 'disabled', 'class' => 'disabled']) }}

				{{ Form::label('oldPassword', 'Старий пароль', ['for' => 'oldPassword']) }}
				{{ Form::password('oldPassword', null, ['id' => 'oldPassword', 'required' => 'required']) }}
				{!! $errors->first('oldPassword', 'erorr oldPassword') !!}
				@if (isset($error))
					{{$error}}
				@endif
				{{ Form::label('password', 'Новий пароль', ['for' => 'password']) }}
				{{ Form::password('password', null, ['id' => 'password', 'required' => 'required']) }}
				{!! $errors->first('password', 'erorr password') !!}

				{{ Form::label('password_confirmation', 'Повторити пароль', ['for' => 'password_confirmation']) }}
				{{ Form::password('password_confirmation', null, ['id' => 'password_confirmation', 'required' => 'required']) }}
				{!! $errors->first('password_confirmation', 'erorr password_confirmation') !!}
				<div class="v-indent-30"></div>
				<hr>
				{{Form::submit('Зберегти', ['class' => 'button button-red profile text-upper']) }}
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop


@section('scripts')

{{-- Validation --}}
<script src="/assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script>
	$( function() {
		$('form').validate({
				// make sure error message isn't displayed
				errorPlacement: function () { },
				// set the errorClass as a random string to prevent label disappearing when valid
				errorClass : "bob",
				// use highlight and unhighlight
				highlight: function (element, errorClass, validClass) {
						$(element.form).find("label[for=" + element.id + "]")
						.addClass("error");
				},
				unhighlight: function (element, errorClass, validClass) {
						$(element.form).find("label[for=" + element.id + "]")
						.removeClass("error");
				},
				invalidHandler: function(form, validator) {
					$('.message').addClass("error");
				},
				rules: {
					password: "required",
					confirm: {
						equalTo: "#password"
					}
				}
		});
	});
</script>

{{-- File Upload --}}
<script>
var imageLoader = document.getElementById('filePhoto');
		imageLoader.addEventListener('change', handleImage, false);
function handleImage(e) {
	var reader = new FileReader();
	reader.onload = function (event) {
		$('.uploader img').attr('src',event.target.result);
	}
	reader.readAsDataURL(e.target.files[0]);
}
</script>

@stop