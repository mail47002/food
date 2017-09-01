@extends('frontend.layouts.default')

@include('frontend.layouts.nav')
@section('title')Adverts - @stop
@section('content')
<div class="breadcrumbs">
	<div class="container">
		<ul class="list-inline">
			<li><a href="#" class="link-blue back"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>  Повернутися</a></li>
		</ul>
	</div>
</div>


<div class="bg-yellow">
	<h5 class="title-with-indent red">Новий рецепт</h5>
</div>

<div class="container-half text-center">

	<form action="/store" method="post" class="edit">
		<p class="message" id="message">Заповніть виділені поля</p>

		<label for="title">Заголовок рецепту*</label>
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

			<a href="#" id="cloneIngredient" class="link-red">+ Додати</a>
		</div>

		<label for="text">Вступний текст</label>
		<textarea name="text" id="text" type="text" class="wide"></textarea>

{{-- уточнить загрузка с перетаскиванием?? одна или неск. картинок?? --}}
		<label for="image">Додати фото</label>
		<div class="uploader">
			<img src=""/>
			<input type="file" name="image" id="image" />
			<div class="round"><i class="fo fo-camera"></i></div>
		</div>


		<label for="recipe">Спосіб приготування</label>
		<div class="recipes">
			<div>
				<span class="title">Крок 1</span><span class="remove"></span>
				<div class="uploader">
					<img src=""/>
					<input type="file" name="image" id="image" />
					<div class="round"><i class="fo fo-camera"></i></div>
				</div>
				<textarea id="recipe" name="recipes[]" type="text" required="required" /></textarea>
			</div>

			<a href="#" id="cloneRecipe" class="link-red">+ Додати</a>
		</div>



		<label for="video">Посилання на відео</label>
		<div class="videos">
			<div><input id="video" name="videos[]" type="text" required="required" /><span class="remove"></span></div>

			<a href="#" id="cloneVideo" class="link-red">+ Додати</a>
		</div>

		<input type="submit" class="button button-red" value="Створити рецепт">
	</form>

</div>



@stop


@section('scripts')
{{-- Clone Phone Input --}}
<script>
	jQuery(function($){
		var inputIngredient = '<div><input name="ingredients[]" type="text"/><span class="remove"></span></div>';
		$("#cloneIngredient").on("click", function(e){
			e.preventDefault();
			$(inputIngredient).insertBefore(this);
		});

		var inputRecipe = $('.recipes > div').clone();
		$("#cloneRecipe").on("click", function(e){
			e.preventDefault();
			$(inputRecipe.clone()).insertBefore(this);
		});

		var inputVideo = '<div><input name="videos[]" type="text"/><span class="remove"></span></div>';
		$("#cloneVideo").on("click", function(e){
			e.preventDefault();
			$(inputVideo).insertBefore(this);
		});

		$('body').on('click', '.remove', function(){
			$(this).parent().remove();
		});
	});
</script>

@stop
