@extends('frontend.layouts.default')
@section('title')Adverts edit - @stop
@section('content')
<div class="breadcrumbs">
	<div class="container">
		<ul class="list-inline">
			<li><a href="#" class="link-blue back"><i class="fo fo-arrow-left fo-small"></i>  Повернутися</a></li>
		</ul>
	</div>
</div>


<div class="bg-yellow">
	<h5 class="title-with-indent red">Редагувати рецепт</h5>
</div>

<div class="container-half text-center">

	{{ Form::open([ 'route' => 'recipes.update', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'edit']) }}
		<p class="message" id="message">Заповніть виділені поля</p>

		<label for="name">Заголовок рецепту*</label>
		<input name="id" value="{{ $recipe->id }}" type="hidden" />
		<input name="name" id="name" type="text" value="{{ $recipe->name }}" class="wide" required="required" />

		<label for="phone">Виберіть одну або декілька категорій*</label>
		<div class="catgories clearfix">
			@php $i = 0; @endphp
			@foreach ($categories as $category)
				@php $i++; @endphp
				@php $on = 0; @endphp
				@foreach ($recipe->categories as $categories)
					@if ($categories->category_id == $category->id)
						@php $on = 1;	@endphp
					@endif
				@endforeach
				@if ($on == 1)
					<div class="col-md-4">
						<input id="cat{{ $i }}" checked="checked" type="checkbox" name="categories[]" value="{{ $category->id }}"><label for="cat{{ $i }}">{{ $category->name }}</label>
					</div>
				@else
					<div class="col-md-4">
						<input id="cat{{ $i }}" type="checkbox" name="category[]" value="{{ $category->id }}"><label for="cat{{ $i }}">{{ $category->name }}</label>
					</div>
				@endif
			@endforeach
		</div>

		<label for="ingredient">Інгредієнти*</label>
		<div class="ingredients">
			@foreach ($recipe->ingredients as $ingredient)
				<div><input id="ingredient" name="ingredients[]" type="text" required="required" value="{{ $ingredient }}" /><span class="remove"></span></div>
			@endforeach
			<a href="#" id="cloneIngredient" class="link-red-dark">+ Додати</a>
		</div>

		<label for="description">Вступний текст</label>
		<textarea name="description" value="{{ $recipe->description }}" id="description" type="description" class="wide"></textarea>


		<label for="foto">Фото</label>
		<div class="fotos">
			<input type="hidden" id="main" name="main" value="0">
		@if ($recipe->images)
			@foreach ($recipe->images as $recipeImage)
				<div class="wrap">
					<div class="uploader">
						<img src="{!! asset($recipeImage->image) !!}"/>
						<input type="file" value="{{ $recipeImage->image }}" name="images[]" id="foto-{{$recipeImage->recipe_image_id}}" />
						<div class="round"><i class="fo fo-camera"></i></div>
					</div>

					{{-- Решить как обозначать "Головне" фото и дописать скрипт --}}
					<a href="#" data-main="0" data-id="{{$recipeImage->recipe_image_id}}" class="pull-left grey1"><i class="fo fo-check-rounded"></i><span class="hide">Головне</span></a>
					{{-- Добавить скрипт на удаление фото --}}
					<a href="#" data-id="{{$recipeImage->recipe_image_id}}" class="pull-right link-red-dark remove"><i class="fo fo-close-rounded"></i></a>
				</div>
			@endforeach
		@endif
			{{-- Это пустой блок - для нового фото --}}
			<div class="wrap empty">
				<input type="hidden" id="main" name="image" value="0">
				<div class="uploader">
					<img src=""/>
					<input type="file" name="images[]" id="foto" />
					<div class="round"><i class="fo fo-camera"></i></div>
				</div>
				<a href="#" class="pull-left hide grey1"><i class="fo fo-check-rounded"></i><span class="hide">Головне</span></a>
				<a href="#" class="pull-right link-red-dark hide remove"><i class="fo fo-close-rounded"></i></a>
			</div>
		</div>


		<label for="recipe">Спосіб приготування</label>
		<div class="recipes">
			@foreach($recipe->steps as $step)
			<div>
				<span class="title">Крок {{ $step->sort_order}}</span><span class="remove"></span>
				<div class="uploader">
					<img src="{!! asset($step->image) !!}"/>
					<input type="file" name="step_images[]" value="{{ $step->image }}" id="image" />
					<div class="round"><i class="fo fo-camera"></i></div>
				</div>
				{{-- Удаление фото?? Нужно?? --}}
				<textarea id="recipe" name="step_texts[]" type="text" required="required">{{ $step->text}}</textarea>
			</div>
			@endforeach
			<a href="#" id="cloneRecipe" class="link-red-dark">+ Додати</a>
		</div>



		<label for="video">Посилання на відео</label>
		<div class="videos">
			@foreach($recipe->videos as $video)
			<div><input id="video" name="videos[]" type="text" value="{{ $video }}" required="required" /><span class="remove"></span></div>
			@endforeach
			<a href="#" id="cloneVideo" class="link-red-dark">+ Додати</a>
		</div>

		<input type="submit" class="button button-red" value="Оновити рецепт">
	{{ Form::close() }}

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

{{-- Клонируем шаг рецепта --}}
		var count = 0;
		var inputRecipe = $('.recipes > div').clone();
		$("#cloneRecipe").on("click", function(e){
			e.preventDefault();

			count++;
			recipeCount = $('.recipes').children().length; // Для номера "Крок"
			var newBlock = inputRecipe.clone();
			newBlock.find('#image').attr('id', 'image'+count);
			newBlock.find('.title').text('Крок '+recipeCount);

			$(newBlock).insertBefore(this);

			document.getElementById('image'+count)
					.addEventListener('change', handleImage, false);
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
			newBlock.find('a.grey1').attr('data-main', i);

			$('.fotos').append(newBlock);
			document.getElementById('foto'+i)
					.addEventListener('change', handleImage, false);
			$("a.grey1").on("click", function(e){
				e.preventDefault();
				$(this).addClass('active');
				console.log($(this).data('main'));
				$("#main").val($(this).data('main'));
			});
		});



		$('body').on('click', '.remove', function(e){
			e.preventDefault();
			$(this).parent().remove();
		});

	});


{{-- Загрузка картинок --}}
	document.getElementById('foto')
			.addEventListener('change', handleImage, false);

	document.getElementById('image')
			.addEventListener('change', handleImage, false);


</script>

@stop
