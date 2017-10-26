@extends('frontend.layouts.default')

@section('title')Advice - @stop

@section('content')
	<div class="breadcrumbs">
		<div class="container">
			<ul class="list-inline">
				<li><a href="{{ route('profile.articles.index') }}" class="link-blue back"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>  До меню статей</a></li>
			</ul>
		</div>
	</div>

	<div class="title-slider bg-yellow">
		<div class="container">
			<div class="owl-carousel">
				@foreach ($advice->images as $image)
					<div class="item"><img src="{{ $image->image }}"></div>
				@endforeach
			</div>
			<div class="slider-counter"></div>
		</div>
	</div>

	<div class="bg-white">
		<div class="container">
			<div class="row">
				<div class="food-info col-md-12">
					<h1>{{ $advice->name }}</h1>
					<div class="rating"><span class="stars medium">4</span>30 відгуків</div>

					<div class="description">
						<p>{{ $advice->description }}</p>
					</div>


					<div class="reviews">
						<h5 class="text-upper underline-red">Відгуки (30)</h5><hr class="zerro-top">
						<ul class="list-unstyled">

							<li class="clearfix">
								<div class="left">
									<div class="avatar">
										<div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>
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
										<div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>
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
												<div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>
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
										<div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>
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
								<div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>
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
			</div>



			<hr>
			<h5 class="text-upper">Інші поради</h5>
			<div class="owl-carousel recent">
				@for ($i=0; $i < 10; $i++)
					<div class="item">
						<div class="advice-thumb">

							<div class="image">
								<img src="/uploads/food1.jpg" class="img-responsive" alt="">
								<div class="distance"><i class="fo fo-small fo-marker red"></i>5 км</div>
							@php $actions=['discount','new', 'heart'] @endphp <!-- class: discount new heart -->
								<div class="sticker {{ $actions[array_rand($actions)] }}"></div>
							</div>

							<div class="caption">
								<a href="/advices/1" class="title link-black">М'ясне рагу з овочами</a>
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


@push('scripts')
	<script type="text/javascript">
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
	</script>
@endpush
