@extends('frontend.layouts.default')
@section('title')Product - @stop
@section('content')
<div class="breadcrumbs">
	<div class="container">
		<ul class="list-inline">
			<li><a href="#" class="link-blue back"><i class="fo fo-arrow-left fo-small"></i>  Повернутися</a></li>
		</ul>
	</div>
</div>


<div class="bg-yellow">
	<h5 class="title-with-indent red">Редагувати страву</h5>
</div>

<div class="container-half text-center">
	{{ Form::open([ 'route' => 'profile.products.productUpdate', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'class' => 'edit']) }}
		<p class="message" id="message">Заповніть виділені поля</p>

		<label for="name">Назва страви*</label>
		<input name="id" value="{{ $product->id }}" type="hidden" />
		<input name="name" id="name" value="{{ $product->name }}" type="text" class="wide" required="required" />

		<label for="phone">Виберіть одну або декілька категорій*</label>
		<div class="catgories clearfix">
			@php $i = 0; @endphp
			@foreach ($categories as $category)
				@php $i++; @endphp
				@php $on = 0; @endphp
				@foreach ($product->productToCatecory as $productToCatecory)
					@if ($productToCatecory->category_id == $category->id)
						@php $on = 1;	@endphp
					@endif
				@endforeach
				@if ($on == 1)
					<div class="col-md-4">
						<input id="cat{{ $i }}" checked="checked" type="checkbox" name="category[]" value="{{ $category->id }}"><label for="cat{{ $i }}">{{ $category->name }}</label>
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
			@foreach (json_decode($product->ingredients) as $ingredient)
				<div><input id="ingredient" name="ingredients[]" type="text" required="required" value="{{ $ingredient }}" /><span class="remove"></span></div>
			@endforeach
			<a href="#" id="cloneIngredient" class="link-red-dark">+ Додати</a>
		</div>

		<label for="text">Про страву*</label>
		<textarea name="text" id="text" type="text" class="wide" required="required" />
			{!! $product->description !!}
		</textarea>


		<label for="foto">Фото</label>
		<div class="fotos">
			<div class="wrap">
					<input type="hidden" id="titleFoto" name="images[]" value="0">
					<div class="uploader">
						<img src="{!! asset($product->image) !!}"/>
						<input type="file" name="images[]" id="foto-0" />
						<div class="round"><i class="fo fo-camera"></i></div>
					</div>

					{{-- Решить как обозначать "Головне" фото и дописать скрипт --}}
					<a href="#" data-id="0" class="pull-left grey1"><i class="fo fo-check-rounded"></i><span class="hide">Головне</span></a>
					{{-- Добавить скрипт на удаление фото --}}
					<a href="#" data-id="0" class="pull-right link-red-dark remove"><i class="fo fo-close-rounded"></i></a>
				</div>
		@if ($product->productImages)
			@foreach ($product->productImages as $productImage)
				<div class="wrap">
					<input type="hidden" id="titleFoto" name="images[]" value="0">
					<div class="uploader">
						<img src="{!! asset($productImage->image) !!}"/>
						<input type="file" name="images[]" id="foto-{{$productImage->product_image_id}}" />
						<div class="round"><i class="fo fo-camera"></i></div>
					</div>

					{{-- Решить как обозначать "Головне" фото и дописать скрипт --}}
					<a href="#" data-id="{{$productImage->product_image_id}}" class="pull-left grey1"><i class="fo fo-check-rounded"></i><span class="hide">Головне</span></a>
					{{-- Добавить скрипт на удаление фото --}}
					<a href="#" data-id="{{$productImage->product_image_id}}" class="pull-right link-red-dark remove"><i class="fo fo-close-rounded"></i></a>
				</div>
			@endforeach
		@endif
			{{-- Это пустой блок - для нового фото --}}
			<div class="wrap empty">
				<input type="hidden" id="titleFoto" name="image" value="0">
				<div class="uploader">
					<img src=""/>
					<input type="file" name="images[]" id="foto" />
					<div class="round"><i class="fo fo-camera"></i></div>
				</div>
				<a href="#" class="pull-left hide grey1"><i class="fo fo-check-rounded"></i><span class="hide">Головне</span></a>
				<a href="#" class="pull-right link-red-dark hide remove"><i class="fo fo-close-rounded"></i></a>
			</div>
		</div>

		<label for="video">Посилання на відео</label>
		<div class="videos">
			<div><input id="video" name="videos[]" type="text" required="required" /><span class="remove"></span></div>

			<a href="#" id="cloneVideo" class="link-red-dark">+ Додати</a>
		</div>

		<input type="submit" class="button button-red" value="Створити страву">
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
		var inputVideo = '<div><input name="videos[]" type="text"/><span class="remove"></span></div>';
		$("#cloneVideo").on("click", function(e){
			e.preventDefault();
			$(inputVideo).insertBefore(this);
		});
{{-- Клонируем фото --}}
		var i = 0;
		var fotos = $('.fotos .wrap.empty').clone(); {{-- Клонировать пустой блок --}}
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