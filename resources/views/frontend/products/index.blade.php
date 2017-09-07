@extends('frontend.layouts.default')
@section('title')Products - @stop
@section('content')

<div class="bg-yellow">
	<div class="filter-block">
		<div class="container">
			<form action="#" class="search">
				<input type="text" placeholder="Пошук">
				<input type="submit" value="search">
			</form>

			<hr>
			<div class="address text-center">
				<i class="fo fo-marker red"></i>Вінниця 
				<a href="#" class="link-blue" data-toggle="modal" data-target="#modal_change_address">Змінити регіон</a>
			</div>
			<hr>
			<ul class="buttons list-inline text-center">
				<li><a href="#" class="button">Супи</a></li>
				<li><a href="#" class="button active">Другі страви</a></li>
				<li><a href="#" class="button">Каші</a></li>
				<li><a href="#" class="button">Десерти і торти</a></li>
				<li><a href="#" class="button active">Зауски</a></li>
				<li><a href="#" class="button active">Салати</a></li>
				<li><a href="#" class="button">Випічка і пироги</a></li>
				<li><a href="#" class="button">Напої</a></li>
				<li><a href="#" class="button">Спеції</a></li>
				<li><a href="#" class="button">Консервація</a></li>
				<li><a href="#" class="button">Алкоголь</a></li>
			</ul>
			<hr>

			<div class="filter-inputs text-center">

						<label for="sorting">Сортутвати по:</label>
						<select name="sorting" id="sorting">
							<option value="">найближчі</option>
							<option value="">найближчі</option>
							<option value="">найближчі</option>
						</select>
			</div>
		</div>

	</div>

	<div class="container">
		<div class="row">
		@for ($i=0; $i < 10; $i++)
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
				<div class="product-thumb">

					<div class="image">
						<img src="/uploads/food1.jpg" class="img-responsive" alt="">
						<div class="distance"><i class="fo fo-small fo-marker red"></i>5 км</div>
					</div>

					<div class="caption">
						<a href="/products/1" class="title link-black">М'ясне рагу з овочами</a>
						<p class="pull-left">
							<span class="rating">
								<span class="stars">{{ rand(0,5) }}</span>
								<span class="block">10 відгуків</span>
							</span>
						</p>
						<div class="pull-right categories-dishes">
							<a href="" class="link-red-dark"><i class="fo fo-time"></i></a>
							<a href="" class="link-red-dark"><i class="fo fo-deal"></i></a>
							<a href="" class="link-red-dark"><i class="fo fo-dish-ready"></i></a>
						</div>
					</div>
				</div>
			</div>
		@endfor
		</div>
	</div>


	<div class="bottom-block text-right">
		<ul class="pagination">
			<li class="disabled"><span><</span></li>
			<li class="active"><span>1</span></li>
			<li><a href="#">2</a></li>
			<li><a href="#">3</a></li>
			<li><a href="#">4</a></li>
			<li class="disabled"><span>...</span></li>
			<li><a href="#">10</a></li>
			<li><a href="#" rel="next">></a></li>
			<p class="count">37 – 47 из 160 объявлений</p>
		</ul><a href="#wrapper" class="btn-top"></a> <!-- Важно!! - не переносить!!! -->

	</div>

</div>

<!-- Modal -->
<div id="modal_change_address" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
		<div class="modal-content text-center">
			<div class="modal-header">
				<a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
				<h4 class="modal-title">Змінити регіон</h4>
			</div>
			<div class="modal-body">
				<p><input type="checkbox" id="ukraine" checked="checked"><label for="ukraine">Уся Україна</label></p>
				<p>Населений пункт</p>
				<p><input class="address full-width" type="text" placeholder="Вінниця (вінницька обл.)"></p>
				<div class="row">
					<div class="col-md-7">
						<p>Вулиця</p>
						<input class="" type="text" placeholder="Соборна">
					</div>
					<div class="col-md-5">
						<p>№ будинку</p>
						<input class="" type="text" placeholder="30">
					</div>
				</div>
				<p></p>
				<a href="#" class="button button-red">Застосувати</a>
			</div>
		</div>

	</div>
</div>

@stop

@section('scripts')
<script>
$( function() {
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