@extends('frontend.layouts.default')
@section('title')Products - @stop
@section('content')

<div class="container">
	<div class="row flex-md">
		<div class="col-md-3">
			<div class="left-sidebar bg-yellow text-center">

				<div class="avatar">
					<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
				</div>

				<div class="phones fo fo-phone fo-indent fo-left red">
					<div class="inline black">
						<p>+38 012 345 67 89</p>
						<p>+38 012 345 67 89</p>
					</div>
				</div>

				<a href="#" class="link link-grey3"><i class="fo fo-like fo-small"></i> до улюблених</a>
				<div class="v-indent-20"></div>
				<a href="#" class="button button-grey left-icon"><i class="fo fo-message"></i> Залишити відгук</a>
				<div class="v-indent-20"></div>
				<a href="#" class="button button-grey left-icon"><i class="fo fo-edit fo-small"></i> Зв'язатися</a>

				<ul class="menu">
					<li><a href="/user/reviews">Відгуки</a></li>
					<li><a href="/user/products">Каталог страв</a></li>
					<li><a href="/user/adverts" class="active">Оголошення </a></li>
					<li><a href="/user/articles">Статті</a></li>
				</ul>

			</div>
		</div>

		<div class="col-md-9">
			<div class="v-indent-40"></div>
			<h1>Марк</h1>
			<p class="grey3">
				<i class="fo fo-big fo-marker red"></i> вул. Соборна 20, Вінниця
			</p>
			<div class="rating grey3"><span class="stars medium">4</span>10 відгуків</div>

			<div class="description">
				<p>Якщо ви любите запечене блюдо з хрусткою скоринкою, то посипте все сумішшю з панірувальних сухарів і натертого на тертці сиру. Запікайте в духовці при температурі 180-190С. Коли картопля стане м'яким, або помідори з цибулею і кабачками трохи підрум'яняться - овочевий рататуй з баклажанами готовий! Подавайте його до столу з будь-яким улюбленим вами соусом. Підійде сметана, домашній майонез або невеликий шматочок вершкового масла.</p>

				<a href="#" class="link-blue">Показати текст</a>
			</div>


			<h5 class="text-upper underline-red">Оголошення</h5><hr class="zerro-top">

			<div class="v-indent-30"></div>

			<form action="#" class="search margin-zerro" method="get">
				<input type="text" name="search" placeholder="Пошук">
				<button type="submit" class="btn-search"><i class="fo fo-search"></i></button>
			</form>

			<a href="#" class="button-filter top-20">Супи</a>
			<a href="#" class="button-filter top-20">Другі страви</a>
			<a href="#" class="button-filter top-20">Салати</a>
			<a href="#" class="button-filter top-20">Випічка і пироги</a>
			<a href="#" class="button-filter top-20">Каші </a>
			<a href="#" class="button-filter top-20">Закуски</a>
			<a href="#" class="button-filter top-20">Десерти і торти</a>


			<div class="filter-block">
				<ul class="categories list-inline text-center">
					<li><a href="#" class="link-red text-upper active">Меню по датам</a></li>
					<li><a href="#" class="link-red text-upper">Готові страви</a></li>
					<li><a href="#" class="link-red text-upper">Страви під замовлення</a></li>
				</ul>
				<hr class="red-border">
			</div>

			<div class="v-indent-30"></div>

			<div class="row">
			@for ($i=0; $i < 4; $i++)
				<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
					<div class="product-thumb">

						<div class="image">
							<img src="/uploads/food1.jpg" class="img-responsive" alt="">
						</div>

						<div class="caption">
							<a href="/products/1" class="title link-black">М'ясне рагу з овочами</a>
							<p class="">
								<span class="price">80 грн.</span>
								<span class="rating">
									<span class="stars">{{ rand(0,5) }}</span> 10 відгуків
								</span>
							</p>
							<p><i class="fo fo-time red"></i>15 грудня (обід)</p>
						</div>

						<button type="button" class="button button-grey order">Замовити</button>
					</div>
				</div>
			@endfor
			</div>



		</div>
	</div>
</div>
@stop