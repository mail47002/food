@extends('frontend.layouts.default')
@section('title')Adverts - @stop
@section('content')


<div class="bg-yellow text-center">
	<div class="v-indent-30"></div>
	<img src="/uploads/food1.jpg" alt="" class="inline">
	<h5 class="text-upper black margin-30">Рагу з молодої картоплі з лососем і цукіні</h5>
	<div class="v-indent-20"></div>
</div>

<div class="container text-center">
	<p class="f20">Тип оголошення</p>

	<a href="#" class="button-rectang"><i class="fo fo-time fo-2x"></i>Страва на дату</a>
	<a href="#" class="button-rectang"><i class="fo fo-dish-ready fo-2x"></i>Готова страва</a>
	<a href="#" class="button-rectang"><i class="fo fo-deal fo-2x"></i>Страва під замовлення</a>


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