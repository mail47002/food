@extends('frontend.layouts.empty')

@section('content')


<div class="bg-yellow fixed-bg"></div>
<div class="container">
	<div class="information text-center">
		<div class="header">Розкажіть про себе</div>
		<div class="body">
			{{ Form::open([ 'route' => 'login.information', 'method' => 'POST', 'enctype' => 'multipart/form-data']) }}
				<p class="message" id="message">Заповніть виділені поля</p>
				{{ Form::label('name', 'Ім\'я*', ['for' => 'name']) }}
				{{ Form::text('name', null, ['id' => 'name', 'required' => 'required']) }}
				{!! $errors->first('name', '<label class="control-label">:message</label>') !!}

				{{ Form::label('nickname', 'Адреса вашої сторінки', ['for' => 'nickname']) }}
				{{ Form::text('nickname', null, ['id' => 'nickname']) }}

				{{ Form::label('phone', 'Телефон*', ['for' => 'phone']) }}
				<div class="phone">
					{{ Form::text('phone[]', null, ['id' => 'phone', 'class' => 'phone-input', 'required' => 'required']) }}
					{!! $errors->first('phone[]', '<label class="control-label">:message</label>') !!}
					<a href="#" id="clonePhone" class="link-red">+ Додати</a>
				</div>

				{{ Form::label('city', 'Населений пункт*', ['for' => 'city']) }}
				{{ Form::text('city', null, ['id' => 'city', 'class' => 'wide marker', 'required' => 'required']) }}
				{!! $errors->first('city', '<label class="control-label">:message</label>') !!}
				<div class="content">
					<div class="left">
						{{ Form::label('street', 'Вулиця*', ['for' => 'street']) }}
						{{ Form::text('street', null, ['id' => 'street', 'required' => 'required']) }}
					</div>

					<div class="right">
						{{ Form::label('build', '№ будинку*', ['for' => 'build']) }}
						{{ Form::text('build', null, ['id' => 'build', 'required' => 'required']) }}
					</div>
				</div>

				{{ Form::label('about', 'Про себе', ['for' => 'about']) }}
				{{ Form::textarea('about', null, ['id' => 'about', 'class' => 'wide']) }}

				{{ Form::label('filePhoto', 'Додати фото', ['for' => 'filePhoto']) }}
				<div class="uploader" onclick="$('#filePhoto').click()">
					<img src=""/>
					<div class="round"><i class="fo fo-camera"></i></div>
					{{ Form::file('image', ['id' => 'filePhoto']) }}
					{{-- <input type="file" name="image" id="filePhoto" /> --}}
				</div>

				<hr>
				{{Form::submit('Продовжити', ['class' => 'button button-red']) }}
			{{ Form::close() }}
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
		$(".phone-input").mask("+38 (999) 999-9999");
	});
</script>

{{-- Clone Phone Input --}}
<script>
	jQuery(function($){
		var inputPhone = '<input name="phone[]" class="phone-input" type="text" placeholder="">';
		$("#clonePhone").on("click", function(){
			$(inputPhone).insertBefore(this);
			$(".phone-input").mask("+38 (999) 999-9999");
		});
	});
</script>


{{-- Autocomplete --}}
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