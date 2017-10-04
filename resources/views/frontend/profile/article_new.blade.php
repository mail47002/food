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
	<h5 class="title-with-indent red">Нова порада</h5>
</div>

<div class="container-half text-center">

	{{ Form::open([ 'route' => 'articles.create', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'edit']) }}
		<p class="message" id="message">Заповніть виділені поля</p>

		<label for="name">Заголовок поради*</label>
		<input name="name" id="name" type="text" class="wide" required="required" />

		<label for="description">Текст*</label>
		<textarea name="description" id="description" type="text" class="wide" required="required" /></textarea>


		<label for="foto">Додати фото*</label>
		<div class="fotos">
		<input type="hidden" id="titleFoto" name="main" value="0">
			<div class="wrap">
				<div class="uploader">
					<img src=""/>
					<input type="file" name="images[]" id="foto" />
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

		<input type="submit" class="button button-red" value="Створити пораду">
	{{ Form::close() }}

</div>



@stop


@section('scripts')
{{-- Clone --}}
<script>
	jQuery(function($){

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
