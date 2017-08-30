@extends('frontend.layouts.empty')

@section('content')


<div class="bg-yellow fixed-bg"></div>
<div class="container">
	<div class="information text-center">
		<div class="header">Розкажіть про себе</div>
		<div class="body">
			<form action="/store" enctype="multipart/form-data" method="post">
				<p class="message" id="message">Заповніть виділені поля</p>
				<label for="name">Ім'я*</label>
				<input name="name" id="name" type="text" required="required" />

				<label for="url">Адреса вашої сторінки</label>
				<input name="url" id="url" type="text" required="required" />

				<div class="phone">
					<label for="phone">Телефон*</label>
					<input id="phone" name="phone[]" class="phone-input" type="text" required="required" />

					<a href="#" id="clonePhone" class="link-red">+ Додати</a>
				</div>


				<label for="city">Населений пункт*</label>
				<input name="city" id="city" type="text" class="wide marker" required="required" />

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

				<label for="about">Про себе</label>
				<textarea name="about" id="about" type="text" class="wide"></textarea>

				<label for="filePhoto">Додати фото</label>
				<div class="uploader" onclick="$('#filePhoto').click()">
					<img src=""/>
					<div class="round"><i class="fo fo-camera"></i></div>
					<input type="file" name="avatar" id="filePhoto" />
				</div>

				<hr>
				<input type="submit" class="button button-red" value="Продовжити">
			</form>
		</div>
	</div>
</div>


@stop


@section('styles')
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 @stop

@section('scripts')

{{-- mask --}}
<script src="/assets/js/jquery.maskedinput.js"></script>
<script>
	jQuery(function($){
		$(".phone-input").mask("+3 (999) 999-9999");
	});
</script>

{{-- Clone Phone Input --}}
<script>
	jQuery(function($){
		var inputPhone = '<input name="phone[]" class="phone-input" type="text" placeholder="">';
		$("#clonePhone").on("click", function(){
			$(inputPhone).insertBefore(this);
			$(".phone-input").mask("+3 (999) 999-9999");
		});
	});
</script>


{{-- Autocomplete --}}
	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script>
	$( function() {
		var availableTags = [
			'Бершадь',
			'Браилов',
			'Брацлав',
			'Вапнярка',
			'Вендичаны',
			'Винница',
			'Вороновица',
			'Гайсин',
			'Гнивань',
			'Дашев',
			'Жмеринка',
			'Ильинцы',
			'Казатин',
			'Калиновка',
			'Крыжополь',
			'Липовец',
			'Литин',
			'Могилев',
			'Мурованные',
			'Немиров',
			'Оратов',
			'Песчанка',
			'Погребище',
			'Теплик',
			'Томашполь',
			'Тростянец',
			'Тульчин',
			'Тывров',
			'Хмельник',
			'Чечельник',
			'Шаргород',
			'Ямполь',
			'Берестечко',
			'Владимир',
			'Голобы',
			'Головно',
			'Горохов',
			'Иваничи',
			'Камень',
			'Киверцы',
			'Ковель',
			'Локачи',
			'Луцк',
			'Любешов',
			'Любомль',
			'Маневичи',
			'Нововолынск',
			'Ратно',
			'Рожище'
		];
		$( "#city" ).autocomplete({
			source: availableTags
		});
	} );
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
					$('#message').addClass("error");
				}
		});
	});
</script>
@stop