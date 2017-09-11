@extends('frontend.layouts.default')

@section('title')Adverts - @stop

@section('content')
<div class="breadcrumbs">
	<div class="container">
		<ul class="list-inline">
			<li><a href="#" class="link-blue back"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>  До меню страв</a></li>
		</ul>
	</div>
</div>


<div class="title-slider bg-yellow">
	<div class="container">
		<div class="owl-carousel">
			<div class="item"><img src="/uploads/product1.jpg" alt=""></div>
			<div class="item"><img src="/uploads/product1.jpg" alt=""></div>
		</div>
		<div class="slider-counter"></div>
	</div>
</div>



<div class="bg-white">



	<div class="container">

		<div class="row">
			<div class="food-info col-md-9">
				<h1>Рагу з молодої картоплі з лососем і цукіні</h1>
				<div class="rating"><span class="stars medium">4</span>30 відгуків</div>

				<h5 class="ingredient-title text-upper underline-red">Інгредієнти</h5><hr class="zerro-top">
				<ul class="list-inline ingredient-list">
					<li class="ingredients">Картопля</li>
					<li class="ingredients">картопля</li>
					<li class="ingredients">картопля</li>
				</ul>

				<h5 class="text-upper underline-red">Від повара про страву </h5><hr class="zerro-top">

				<div class="description">
					<p>Якщо ви любите запечене блюдо з хрусткою скоринкою, то посипте все сумішшю з панірувальних сухарів і натертого на тертці сиру. Запікайте в духовці при температурі 180-190С. Коли картопля стане м'яким, або помідори з цибулею і кабачками трохи підрум'яняться - овочевий рататуй з баклажанами готовий! Подавайте його до столу з будь-яким улюбленим вами соусом. Підійде сметана, домашній майонез або невеликий шматочок вершкового масла. </p>
					<p> Як стверджують французи, в будь-якому блюді є два незамінних інгредієнта - це фантазія і любов! Готуйте з задоволенням і радістю!</p>

					<div class="red-round-border">
						<i>Якщо ви любите запечене блюдо з хрусткою скоринкою, то посипте все сумішшю з панірувальних сухарів і натертого на тертці сиру. Запікайте в духовці при температурі 180-190С. Коли картопля стане м'яким, або помідори з цибулею і кабачками трохи підрум'яняться - овочевий рататуй з баклажанами готовий! Подавайте його до столу з будь-яким улюбленим вами соусом. Підійде сметана, домашній майонез або невеликий шматочок вершкового масла. Як стверджують французи, в будь-якому блюді є два незамінних інгредієнта - це фантазія і любов! Готуйте з задоволенням і радістю!</i>
					</div>
				</div>


				<div class="reviews">
					<h5 class="text-upper underline-red">Відгуки (30)</h5><hr class="zerro-top">
					<ul class="list-unstyled">

						<li class="clearfix">
							<div class="left">
								<div class="avatar">
									<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
								</div>
								<a href="#" class="link-blue name">Вікторія</a>
							</div>
							<div class="right bg-yellow">
								<div class="date">2 липня 2016</div>
								<span class="stars">4</span>
								<div class="message">
									В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.
								</div>
							</div>
						</li>

						<li class="clearfix">
							<div class="left">
								<div class="avatar">
									<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
								</div>
								<a href="#" class="link-blue name">Вікторія</a>
							</div>

							<div class="right bg-yellow">
								<div class="date">2 липня 2016</div>
								<span class="stars">4</span>
								<div class="message">
									В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.
								</div>

								<div class="answer clearfix">
									<div class="title">Ваша відповідь</div>
									<div class="message">
										В принципе вкусно,если сделать для одного раза,а так: гарнир
									</div>
									<div class="right-avatar">
										<div class="avatar">
											<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
										</div>
									</div>
								</div>

								<div class="message">
									В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.
								</div>

								<hr>
								<a href="#" class="link-blue pull-right">Приховати</a>

							</div>
						</li>

						<li class="clearfix">
							<div class="left">
								<div class="avatar">
									<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
								</div>
								<a href="#" class="link-blue name">Марія</a>
							</div>
							<div class="right bg-yellow">
								<div class="date">2 липня 2016</div>
								<span class="stars">4</span>
								<div class="message">
									В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.
								</div>

								<hr>
								<a href="#" class="link-red pull-left">Відповісти</a>
								<a href="#" class="link-blue pull-right">Показати все</a>
							</div>
						</li>

					</ul>
					<div class="paginate">
						<ul class="pagination grey">
							<li><a href="#" rel="prev"><</a></li>
							<li><a href="#">1</a></li>
							<li><a href="#">2</a></li>
							<li class="active"><span>3</span></li>
							<li><a href="#">4</a></li>
							<li class="disabled"><span>...</span></li>
							<li><a href="#">10</a></li>
							<li><a href="#" rel="next">></a></li>
						</ul>
					</div>
				</div>


				<div class="your-cook clearfix">
					<h5 class="text-upper underline-red">Ваш повар</h5><hr class="zerro-top">
					<div class="left">
						<div class="avatar">
							<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
						</div>
						<a href="#" class="link-blue name">Марк</a>
						<a href="#" class="button button-grey">Зв’язатися</a>
					</div>
					<div class="right">
						<p>Вітаю! Мене звуть Марк. Моя професія тісно пов'язана з комп'ютерами, але при цьому у мене багато різних захоплень. Одне з них - приготування їжі, я дуже люблю готувати різні страви, якими активно пригощаю всіх своїх близьких.</p>
						<p>Всі рецепти, які ви бачите на сайті, приготовлені, сфотографовані і випробувані мною особисто. Моя професія тісно пов'язана з комп'ютерами, але при цьому у мене багато різних захоплень. Одне з них - приготування їжі, я дуже люблю готувати різні страви, якими активно пригощаю всіх своїх близьких.</p>
					</div>
				</div>

			</div> <!-- col-md-9 -->

			<div class="col-md-3">
				<div class="widget bordered">

					<div class="widget-body">

						<div class="avatar">
							<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
							<a href="#" class="link"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> до улюблених</a>
						</div>
						<a href="#" class="link-blue name">Марк</a>
						<div class="rating"><span class="stars">4</span>10 відгуків</div>

						<p class="distance"><i class="fo fo-big fo-marker red"></i>5 км</p>
						<p class="small">вул. Соборна 20, Вінниця</p>
						<hr>

						<div class="clearfix text-center">
							<a href="#" class="button-square"><i class="fo fo-big fo-dish-ready"></i>уже готова страва</a>
							<a href="#" class="button-square"><i class="fo fo-big fo-deal"></i>страва під замовлення</a>
							<a href="#" class="button-square"><i class="fo fo-big fo-time"></i>страва у меню</a>
						</div>

					</div>

					<div class="widget-footer">
						<ul class="socials justify list-unstyled">
							<li><a href="#" class="fa fa-facebook"></a></li>
							<li><a href="#" class="fa fa-vk"></a></li>
							<li><a href="#" class="fa fa-instagram"></a></li>
							<li><a href="#" class="fa fa-pinterest-p"></a></li>
							<li class="hover-open">
								<a href="#" class="fa fa-ellipsis-h"></a>
								<ul class="hover list-unstyled">
									<li><a href="#" class="">Google+</a></li>
									<li><a href="#" class="">LinkedIn</a></li>
									<li><a href="#" class="">ok</a></li>
								</ul>
							</li>
						</ul>
					</div>
				</div>
			</div> <!-- col-md-3 -->
		</div>



		<hr>
		<h5 class="text-upper">Інші страви</h5>
		<div class="owl-carousel recent">
			@for ($i=0; $i < 10; $i++)
				<div class="item">
					<div class="product-thumb">

						<div class="image">
							<img src="/uploads/food1.jpg" class="img-responsive" alt="">
							<div class="distance"><i class="fo fo-small fo-marker red"></i>5 км</div>
						@php $actions=['discount','new', 'heart'] @endphp <!-- class: discount new heart -->
							<div class="sticker {{ $actions[array_rand($actions)] }}"></div>
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
								<a href=""><i class="time"></i></a>
								<a href=""><i class="deal"></i></a>
								<a href=""><i class="dish-ready"></i></a>
							</div>
						</div>

					</div>
				</div>
			@endfor
		</div>

	</div> <!-- container -->

</div> <!-- bg-white -->



@stop


@section('scripts')

	$('.title-slider .owl-carousel').on('initialized.owl.carousel changed.owl.carousel', function(e) {
			if (!e.namespace) return;
			var carousel = e.relatedTarget;
			$('.slider-counter').text(carousel.relative(carousel.current()) + 1 + '/' + carousel.items().length);
		}).owlCarousel({
			items: 1,
			loop:true,
			margin:0,
			nav:true,
			navText: [ '', '' ],
			dots: false
		});



	$('.recent').owlCarousel({
		loop:true,
		margin:10,
		nav:true,
		dots: false,
		responsive:{
			0:{
				items:1
			},
			600:{
				items:2
			},
			1000:{
				items:4
			}
		}
	});

@stop
