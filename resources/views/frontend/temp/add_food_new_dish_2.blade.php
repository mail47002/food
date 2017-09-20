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
	<p class="red f20 margin-zerro"><i class="fo fo-time fo-2x"></i> Страва на дату</p>
	<div class="v-indent-30"></div>
</div>

<div class="container-half text-center">

	<form action="/store" method="post" class="edit">
		<p class="message" id="message">Заповніть виділені поля</p>

		<label for="price">Ціна*</label>
		<input name="price" id="price" type="text" class="price inline" required="required" />

		<div class="everyday">
			<input id="repeat" type="checkbox" name="repeat" value=""><label for="repeat" class="inline">Кожного дня</label>
		</div>

		<label for="date">Дата*</label>
		<div id="one">
			<input name="date" id="date" type="text" class="datepicker inline" required="required" />
		</div>

		<div id="two" class="hide two-in-line">
			<label class="inline" for="date-from">з</label>
			<input name="date-from" id="date-from" type="text" class="datepicker inline" required="required" />
			<label class="inline" for="date-to">до</label>
			<input name="date-to" id="date-to" type="text" class="datepicker inline" required="required" />
		</div>

		<div>
			<input id="breakdest" type="radio" name="type" value="breakdest"><label for="breakdest" class="inline">Сніданок (до 12:00)</label>
			<input id="dinner" type="radio" name="type" value="dinner"><label for="dinner" class="inline">Обід (12:00 - 16:00)</label>
			<input id="launch" type="radio" name="type" value="launch"><label for="launch" class="inline">Вечеря (після 16:00)</label>
		</div>


		<label for="count">Кількість порцій*</label>
		<select name="count" id="count">
			<option selected="selected" disabled="disabled">Виберіть кількість</option>
			<option value="1">1</option>
			<option value="2">2</option>
		</select>


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

		$('#repeat').on('change', function() {
			if($(this).is(":checked")) {
				$('#one').hide();
				$('#two').show();
			} else {
				$('#one').show();
				$('#two').hide();
			}
		});

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