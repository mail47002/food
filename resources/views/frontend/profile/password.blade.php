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
					<li><a href="#" class="link-back">Моя сторінка</a></li>
					<li><a href="#" class="active">Про мене</a></li>
					<li><a href="#">Пароль</a></li>
					<li><a href="#">Адреса сторінки</a></li>
				</ul>

			</div>
		</div>

		<div class="col-md-9 match-height">
			<h5 class="text-upper underline-red">Змінити пароль</h5>
			<hr>

			<form action="/store" method="post" class="contact">
				<p class="message" id="message">Заповніть виділені поля</p>
				<label for="email">Email*</label>
				<input name="email" id="email" type="text" required="required" />

				<label for="oldPassword">Старий пароль</label>
				<input name="oldPassword" id="oldPassword" type="text" required="required" />

				<label for="password">Новий пароль</label>
				<input name="password" id="password" type="text" required="required" />

				<label for="rePassword">Повторити пароль</label>
				<input name="rePassword" id="rePassword" type="text" required="required" />


				<div class="v-indent-30"></div>
				<hr>
				<input type="submit" class="button button-red profile" value="Зберегти">
			</form>

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