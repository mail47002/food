@extends('frontend.layouts.default')

@section('content')


<div class="bg-yellow fixed-bg"></div>
<div class="container">
	<div class="information text-center">
		<div class="header">Розкажіть про себе</div>
		<div class="body">
			<form action="" enctype="multipart/form-data" method="post">
				<label for="name">Ім'я*</label>
				<input id="name" type="text" placeholder="">

				<label for="url">Адреса вашої сторінки</label>
				<input id="url" type="text" placeholder="">


				<label for="phone">Телефон*</label>
				<div class="phone">
					<input id="phone" name="phone[]" class="phone-input" type="text" placeholder="">

					<a href="#" id="clonePhone" class="link-red">+ Додати</a>
				</div>


				<label for="city">Населений пункт*</label>
				<input id="city" type="text" placeholder="" class="wide marker">

				<div class="content">
					<div class="left">
						<label for="street">Вулиця</label>
						<input id="street" type="text" placeholder="">
					</div>
					<div class="right">
						<label for="house">№ будинку*</label>
						<input id="house" type="text" placeholder="">
					</div>
				</div>

				<label for="about">Про себе</label>
				<textarea id="about" type="text" placeholder="" class="wide"></textarea>

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
@stop