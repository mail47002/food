@extends('frontend.layouts.default')
@section('title')Adverts - @stop
@section('content')
<div class="breadcrumbs">
	<div class="container">
		<ul class="list-inline">
			<li><a href="#" class="link-blue back"><i class="fo fo-arrow-left fo-small"></i>  Повернутися</a></li>
		</ul>
	</div>
</div>


<div class="bg-yellow text-center">
	<div class="v-indent-30"></div>
	<img src="/uploads/food1.jpg" alt="" class="inline">
	<h5 class="text-upper black margin-30">Рагу з молодої картоплі з лососем і цукіні</h5>
	<p class="red f20 margin-zerro"><i class="fo fo-dish-ready fo-2x"></i> Готова страва</p>
	<div class="v-indent-30"></div>
</div>

<div class="container-half text-center">

	<form action="/store" method="post" class="edit">
		<p class="message" id="message">Заповніть виділені поля</p>

		<label for="price">Ціна*</label>
		<input name="price" id="price" type="text" class="price inline" required="required" />

		<label for="date">Термін придатності*</label>
		<div class="two-in-line">
			<label class="inline" for="date-from">з</label>
			<input name="date-from" id="date-from" type="text" class="datepicker inline" required="required" />
			<label class="inline" for="date-to">до</label>
			<input name="date-to" id="date-to" type="text" class="datepicker inline" required="required" />
		</div>

		<label for="count">Кількість порцій*</label>
		<select name="count" id="count">
			<option selected="selected" disabled="disabled">Виберіть кількість</option>
			<option value="1">1</option>
			<option value="2">2</option>
		</select>

		<div class="replace-foto">
			<input id="replace-foto" type="checkbox" name="replace-foto" value=""><label for="replace-foto" class="inline">Замінити фото</label>
		</div>

		<div class="fotos hide">
		<input type="hidden" id="titleFoto" name="title_foto" value="0">
			<div class="wrap">
				<div class="uploader">
					<img src=""/>
					<input type="file" name="image[]" id="foto" />
					<div class="round"><i class="fo fo-camera"></i></div>
				</div>
{{-- Решить как обозначать "Головне" фото и дописать скрипт --}}
				<a href="#" class="pull-left hide grey1"><i class="fo fo-check-rounded"></i><span class="hide">Головне</span></a>
				<a href="#" class="pull-right link-red-dark hide remove"><i class="fo fo-close-rounded"></i></a>
			</div>
		</div>

		<label for="text">Додаткова інформація*</label>
		<textarea name="text" id="text" type="text" class="wide" required="required" /></textarea>

		<label for="">Додати значок</label>
		<div class="stickers">
			<input id="discount" type="radio" name="type" value="discount"><label for="discount" class="inline"><i class="discount"></i></label>
			<input id="new" type="radio" name="type" value="new"><label for="new" class="inline"><i class="new"></i></label>
			<input id="like" type="radio" name="type" value="like"><label for="like" class="inline"><i class="heart"></i></label>
		</div>

		<label for="city">Населений пункт*</label>
		<div class="marker inline wide">
			<input id="city" required="required" name="city" type="text" class="wide">
		</div>

		<div class="address">
			<div class="left inline">
				<label for="street">Вулиця*</label>
				<input id="street" required="required" name="street" type="text" value="">
			</div>
			<div class="right inline">
				<label for="build">№ будинку*</label>
				<input id="build" required="required" name="build" type="text" value="">
			</div>
		</div>


		<div class="grey-block bg-yellow black wide">
			<p class="red zerro-bottom"><i class="fo fo-phone"></i></p>
			<p class="zerro-top">Ваш телефон</p>
			<p class="f20 margin-zerro">+38 096 159 15 15</p>
			<p class="f20 margin-zerro">+38 093 159 15 15</p>
			<p class="grey2 f14">Номер телефону можна змінити на сторінці редагування профіля </p>
		</div>


		<input type="submit" class="button button-red zerro-bottom" value="Створити оголошення">
		<p><a href="#" class="link-grey">Відмінити</a></p>
	</form>

</div>



@stop


@section('scripts')

<script>
	jQuery(function($){

		$("#count").selectmenu();
		$(".datepicker").datepicker({
			dateFormat: "dd.mm.yy"
		});

		$('#replace-foto').on('change', function() {
			if($(this).is(":checked")) {
				$('.fotos').show();
			} else {
				$('.fotos').hide();
			}
		});

{{-- Клонируем фото --}}
		var i = 0;
		var fotos = $('.fotos > div').clone();
		$('body').on('change', '.fotos .uploader:last input:file', function (){
			$(this).closest('.wrap').find('a').show();
			// Спрятать иконку
			$(this).closest('.wrap').find('.round').hide();

			i++;
			var newBlock = fotos.clone();
			newBlock.find('#foto').attr('id', 'foto'+i);

			$('.fotos').append(newBlock);
			document.getElementById('foto'+i)
					.addEventListener('change', handleImage, false);
		});



		$('body').on('click', '.remove', function(e){
			e.preventDefault();
			$(this).parent().remove();
		});

	});

{{-- Загрузка картинок --}}
	document.getElementById('foto')
			.addEventListener('change', handleImage, false);

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
</script>3


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

@stop

@section('styles')
	{{-- <link rel="stylesheet" href="/assets/css/jquery-ui.css"> --}}
 @stop