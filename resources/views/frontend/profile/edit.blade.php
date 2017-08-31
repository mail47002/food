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
			<h5 class="text-upper underline-red">Редагувати профіль</h5>
			<hr>

			<form action="/store" method="post" class="contact">
				<p class="message" id="message">Заповніть виділені поля</p>
				<label for="name">Ім'я*</label>
				<input name="name" id="name" type="text" required="required" />

				<label for="phone">Телефон*</label>
				<div class="phone">
					<div><input id="phone" name="phone[]" class="phone-input" type="text" required="required" /><span class="remove"></span></div>

					<a href="#" id="clonePhone" class="link-red">+ Додати</a>
				</div>

				<div class="v-indent-30"></div>
				<hr>

				<label for="city">Населений пункт*</label>
				<div class="marker"><input name="city" id="city" type="text" required="required" /></div>

				{{-- ?? в дизайне нету ?? --}}
				<div class="content">
					<div class="left">
						<label for="street">Вулиця</label>
						<input name="street" id="street" type="text" required="required" />
					</div>
					<div class="right">
						<label for="house">№ будинку*</label>
						<input name="house" id="house" type="text" required="required" />
					</div>
				</div>

				<div class="v-indent-30"></div>
				<hr>

				<label for="about">Про себе</label>
				<textarea name="about" id="about" type="text" class="profile"></textarea>

				<hr>
				<input type="submit" class="button button-red profile" value="Продовжити">
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

{{-- mask --}}
<script src="/assets/js/jquery.maskedinput.js"></script>
<script>
	jQuery(function($){
		$(".phone-input").mask("+38 (999) 999-9999");
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

{{-- Clone Phone Input --}}
<script>
	jQuery(function($){
		var inputPhone = '<div><input name="phone[]" class="phone-input" type="text"><span class="remove"></span></div>';
		$("#clonePhone").on("click", function(e){
			e.preventDefault();
			$(inputPhone).insertBefore(this);
			$(".phone-input").mask("+38 (999) 999-9999");
		});
		$('body').on('click', '.phone .remove', function(){
			$(this).parent().remove();
		});
	});
</script>
@stop