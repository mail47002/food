@extends('frontend.layouts.default')

@include('frontend.layouts.nav')
@section('title')Adverts - @stop
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
				<i class="marker big"></i>Соборна, буд. 10/2, Вінниця 
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
		</div>
		<ul class="categories list-inline text-center">
			<li><a href="#" class="link-red text-upper active">Меню по датам</a></li>
			<li><a href="#" class="link-red text-upper">Готові страви</a></li>
			<li><a href="#" class="link-red text-upper">Страви під замовлення</a></li>
		</ul>
		<hr class="red-border">
		<div class="filter-inputs container">
			<div class="row">
				<div class="col-md-3">
					<select name="date" class="full-width">
						<option value="">Дата</option>
					</select>
				</div>
				<div class="checkboxes col-md-6">
					<input type="checkbox" id="breakfast"><label for="breakfast">Сніданок (до 12:00)</label>

					<input type="checkbox" id="dinner" checked="checked"><label for="dinner">Обід (12:00 - 16:00)</label>

					<input type="checkbox" id="supper" checked="checked"><label for="supper">Вечеря (після 16:00)</label>
				</div>
				<div class="col-md-3">
					<label for="sorting">Сортутвати по:</label>
					<select name="sorting" id="sorting">
						<option value="">найближчі</option>
						<option value="">найближчі</option>
						<option value="">найближчі</option>
					</select>
				</div>
			</div>


			<div class="prices-input text-center">
				<label for="">Ціновий діапазон</label>
				<input type="text" placeholder="">
				<label for="">-</label>
				<input type="text" placeholder="">
				<label for="">грн.</label>

				<input type="submit" class="button btn-filter" value="OK">
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
		<?php for ($i=0; $i < 10; $i++) : ?> 
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
				<div class="product-thumb">

					<div class="image">
						<img src="/uploads/food1.jpg" class="img-responsive" alt="">
						<div class="distance"><i class="marker"></i> 5 км</div>
					@php $actions=['discount','new', 'heart']; @endphp <!-- class: discount new heart -->
						<div class="sticker {{ $actions[array_rand($actions)] }}"></div>
					</div>

					<div class="caption">
						<a href="/adverts/1" class="title link-black">М'ясне рагу з овочами</a>
						<p>
							<span class="price">80 грн.</span>
							<span class="rating">
								<span class="stars">{{rand(0,5)}}</span>10 відгуків
							</span>
						</p>
						<p><i class="time"></i>15 грудня (обід)</p>
					</div>

					<button type="button" class="button button-grey order">Замовити</button>

				</div>
			</div>
		<?php endfor ?>
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
				<a href="#" type="button" class="close" data-dismiss="modal"></a>
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