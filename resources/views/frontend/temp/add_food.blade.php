@extends('frontend.layouts.default')
@section('title')7.1 add_food - @stop
@section('content')

<div class="bg-yellow">
	<h5 class="title-with-indent black"><i class="fo fo-hat fo-4x red block"></i>Створити Оголошення</h5>
</div>

<div class="container add-food-select">
	<div class="row">
		<div class="col-sm-5 col-md-offset-1 col-md-4 text-center">
			<label for="sorting">Виберіть страву з вашого каталога</label>
			<select name="sorting" id="sorting" class="v-indent-40">
				<option value="1">Картопля</option>
				<option value="2">Піца</option>
			</select>
		</div>
		<div class="col-sm-2 col-md-2 text-center">
			<p class="lined grey2">або</p>
		</div>
		<div class="col-sm-5 col-md-4 text-center">
			<label for="">Це ваша нова страва</label>
			<a href="#" class="button button-red full-width text-upper">Додати до каталогу</a>
		</div>
	</div>
</div>

@stop


@section('scripts')
<script>
$( function() {
	$("#sorting").prop('selectedIndex', -1); {{-- Пустое поле в выпадайке --}}
	$("#sorting").selectmenu({
		change: function( e, ui ) {
			var filter = $("#sorting").val();
			{{-- Отсюда можна отсылать фильтр выпадайки --}}
			console.log(filter);
		}
	});

});
</script>
@stop