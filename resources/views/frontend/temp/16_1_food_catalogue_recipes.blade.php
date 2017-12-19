@extends('frontend.layouts.default')
@section('content')

<div class="bg-yellow">
	<div class="filter-block">

		<ul class="categories list-inline text-center">
			<li class="active"><a href="#" class="link-red text-upper">Рецепти</a></li>
			<li><a href="/temp/temp.16_2_food_catalogue_advices" class="link-red text-upper">Поради</a></li>
		</ul>
		<hr class="red-border">

		<div class="container">
			<form action="#" class="search">
				<input type="text" placeholder="Пошук">
				<input type="submit" value="search">
			</form>

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
			<hr class="red-border">
			<div class="v-indent-20"></div>


		</div>

	</div>

	<div class="container">
		<div class="row">
		@for ($i=0; $i < 10; $i++)
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
				<div class="product-thumb">
					<div class="image">
						<img src="/uploads/food1.jpg" class="img-responsive" alt="">
					</div>

					<div class="caption">
						<a href="#" class="title link-black">М'ясне рагу з овочами</a>
						<p class="bottom">
							Так приятно начать неспешное воскресное утро со вкусных блинчиков и чашки чая.
						</p>
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


@stop