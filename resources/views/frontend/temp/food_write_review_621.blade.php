@extends('frontend.layouts.default')
@section('title')Adverts - @stop
@section('content')
<div class="breadcrumbs">
	<div class="container">
		<ul class="list-inline">
			<li><a href="#" class="link-blue text-upper"><i class="fo fo-arrow-left fo-small"></i>  Повернутися</a></li>
		</ul>
	</div>
</div>


<div class="bg-yellow text-center">
	<div class="v-indent-20"></div>

	<h5 class="text-upper black margin-30">Залишити відгук для</h5>

	<div class="avatar v90">
		<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
	</div>
	<a href="#" class="link-blue name f16 block">Вікторія</a>

	<div class="v-indent-60"></div>
</div>


<div class="container-half text-center">

	<form action="/store" method="post" class="edit">
		<p class="message" id="message">Заповніть виділені поля</p>

		<label for="food">Виберіть страву, яку замовляли*</label>
		<select name="food" class="food wide" id="food" required="required">
			<option value="">Борщ</option>
			<option value="">Картошка</option>
			<option value="">рагу</option>
		</select>


		<label for="rating">Оцініть повара і страву*</label>
		<div class="rating with-hover">
			<fieldset>
				<input type="radio" id="s_5" name="rating"   value="5" />   <label class = "full" for="s_5"   title="5"></label>
				<input type="radio" id="s_4.5" name="rating" value="4.5" /> <label class="half" for="s_4.5" title="4.5"></label>
				<input type="radio" id="s_4" name="rating"   value="4" />   <label class = "full" for="s_4"   title="4"></label>
				<input type="radio" id="s_3.5" name="rating" value="3.5" /> <label class="half" for="s_3.5" title="3.5"></label>
				<input type="radio" id="s_3" name="rating"   value="3" />   <label class = "full" for="s_3"   title="3"></label>
				<input type="radio" id="s_2.5" name="rating" value="2.5" /> <label class="half" for="s_2.5" title="2.5"></label>
				<input type="radio" id="s_2" name="rating"   value="2" />   <label class = "full" for="s_2"   title="2"></label>
				<input type="radio" id="s_1.5" name="rating" value="1.5" /> <label class="half" for="s_1.5" title="1.5"></label>
				<input type="radio" id="s_1" name="rating"   value="1" />   <label class = "full" for="s_1"   title="1"></label>
			</fieldset>
		</div>

		<label for="text">Напишіть відгук*</label>
		<textarea name="text" id="text" type="text" class="wide" required="required" placeholder="Ваш відгук" /></textarea>


		<input type="submit" class="button button-red zerro-bottom" value="Відправити">

		<div class="v-indent-60"></div>

	</form>

</div>

{{-- Показывать этот блок во время Ajax запроса --}}
<div id="loading" class="loading hide"><img src="/assets/images/loading.gif" alt="loading"></div>



@stop


@section('scripts')
	<script>
	$(function(){

		$(".food").selectmenu({
			change: function( e, ui ) {
				var filter = $("#food").val();
				{{-- Отсюда можна отсылать фильтр выпадайки --}}
				console.log(filter);
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
	</script>
@stop