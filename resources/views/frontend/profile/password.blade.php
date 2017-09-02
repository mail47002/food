@extends('frontend.layouts.default')

@include('frontend.layouts.nav')
@section('title')Products - @stop
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-3 match-height">
			<div class="left-sidebar bg-yellow text-center">

				<div class="avatar">
					<div class="uploader profile">
						<img src="{{$profile['image']}}" alt="foto">
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

		<div class="col-md-9 match-height">
			<h5 class="text-upper underline-red">Змінити пароль</h5>
			<hr>
			{{ Form::open([ 'route' => 'profile.updatePassword', 'method' => 'POST', 'class' => 'contact']) }}
				<p class="message" id="message">Заповніть виділені поля</p>
				{{ Form::label('email', 'Email*', ['for' => 'email']) }}
				{{ Form::text('email', 'ussr983@gmail.com', ['id' => 'email', 'required' => 'required']) }}

				{{ Form::label('oldPassword', 'Старий пароль', ['for' => 'oldPassword']) }}
				{{ Form::password('oldPassword', null, ['id' => 'oldPassword', 'required' => 'required']) }}

				{{ Form::label('password', 'Новий пароль', ['for' => 'password']) }}
				{{ Form::password('password', null, ['id' => 'password', 'required' => 'required']) }}

				{{ Form::label('confirm', 'Повторити пароль', ['for' => 'confirm']) }}
				{{ Form::password('confirm', null, ['id' => 'confirm', 'required' => 'required']) }}
				<div class="v-indent-30"></div>
				<hr>
				{{Form::submit('Зберегти', ['class' => 'button button-red profile']) }}
			{{ Form::close() }}
		</div>
	</div>
</div>
@stop


@section('scripts')
<script>
$( function() {
	$('.match-height').matchHeight();
});
</script>

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