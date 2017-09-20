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


<div class="bg-yellow">
	<h5 class="title-with-indent red">Нова страва</h5>
</div>

<div class="container-half text-center">

	<form action="/store" method="post" class="edit">
		<p class="message" id="message">Заповніть виділені поля</p>

		<label for="title">Назва страви*</label>
		<input name="title" id="title" type="text" class="wide" required="required" />

		<label for="phone">Виберіть одну або декілька категорій*</label>
		<div class="catgories clearfix">
			<div class="col-md-4">
				<input id="cat1" type="checkbox" name="category[]" value=""><label for="cat1">Супи</label>
				<input id="cat2" type="checkbox" name="category[]" value="" checked="checked"><label for="cat2">Другі страви</label>
				<input id="cat3" type="checkbox" name="category[]" value=""><label for="cat3">Каші</label>
				<input id="cat4" type="checkbox" name="category[]" value=""><label for="cat4">Салати</label>
			</div>
			<div class="col-md-4">
				<input id="cat5" type="checkbox" name="category[]" value=""><label for="cat5">Закуски</label>
				<input id="cat6" type="checkbox" name="category[]" value=""><label for="cat6">Десерти і торти</label>
				<input id="cat7" type="checkbox" name="category[]" value="" checked="checked"><label for="cat7">Віипічка і пироги</label>
				<input id="cat8" type="checkbox" name="category[]" value=""><label for="cat8">Консервація</label>
			</div>
			<div class="col-md-4">
				<input id="cat9" type="checkbox" name="category[]" value=""><label for="cat9">Спеції</label>
				<input id="cat10" type="checkbox" name="category[]" value=""><label for="cat10">Напої</label>
				<input id="cat11" type="checkbox" name="category[]" value=""><label for="cat11">Алкоголь</label>
			</div>
		</div>

		<label for="ingredient">Інгредієнти*</label>
		<div class="ingredients">
			<div><input id="ingredient" name="ingredients[]" type="text" required="required" /><span class="remove"></span></div>

			<a href="#" id="cloneIngredient" class="link-red-dark">+ Додати</a>
		</div>

		<label for="text">Про страву*</label>
		<textarea name="text" id="text" type="text" class="wide" required="required" /></textarea>


		<label for="foto">Додати фото</label>
		<div class="fotos">
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

		<label for="video">Посилання на відео</label>
		<div class="videos">
			<div><input id="video" name="videos[]" type="text" required="required" /><span class="remove"></span></div>

			<a href="#" id="cloneVideo" class="link-red-dark">+ Додати</a>
		</div>

		<input type="submit" class="button button-red" value="Створити рецепт">
	</form>

</div>



@stop


@section('scripts')
{{-- Clone --}}
<script>
	jQuery(function($){
		var inputIngredient = '<div><input name="ingredients[]" type="text"/><span class="remove"></span></div>';
		$("#cloneIngredient").on("click", function(e){
			e.preventDefault();
			$(inputIngredient).insertBefore(this);
		});

		var inputVideo = '<div><input name="videos[]" type="text"/><span class="remove"></span></div>';
		$("#cloneVideo").on("click", function(e){
			e.preventDefault();
			$(inputVideo).insertBefore(this);
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
</script>

@stop