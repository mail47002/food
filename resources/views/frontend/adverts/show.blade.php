@extends('frontend.layouts.default')

@include('frontend.includes.nav')
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
			@foreach($advert->images as $image)
				<div class="item"><img src="{{ $image }}" alt=""></div>
			@endforeach
		</div>
		<div class="slider-counter"></div>
	</div>
</div>



<div class="bg-white">


	<div class="container">

		<div class="row">
			<div class="food-info col-md-9">
				<h1>{{ $advert->name }}</h1>
				<div class="rating"><span class="stars medium">4</span>30 відгуків</div>

				<h5 class="text-upper underline-red">Від повара про страву </h5><hr class="zerro-top">

				<div class="description">
					<p>{{ $advert->product->description }}</p>

					<div class="red-round-border">
						<i>{{ $advert->description }}</i>
					</div>
				</div>

				@if (count($reviews) > 0)
					<div class="reviews">
					<h5 class="text-upper underline-red">Відгуки (30)</h5><hr class="zerro-top">
					<ul class="list-unstyled">

						@foreach ($reviews as $review)
							<li class="clearfix">
								<div class="left">
									<div class="avatar">
										<div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>
									</div>
									<a href="#" class="link-blue name">{{ $review->user->name }}</a>
								</div>
								<div class="right bg-yellow">
									<div class="date">2 липня 2016</div>
									<span class="stars">4</span>
									<div class="message">{{ $review->text }}</div>
								</div>
							</li>
						@endforeach

						{{--<li class="clearfix">--}}
							{{--<div class="left">--}}
								{{--<div class="avatar">--}}
									{{--<div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>--}}
								{{--</div>--}}
								{{--<a href="#" class="link-blue name">Вікторія</a>--}}
							{{--</div>--}}

							{{--<div class="right bg-yellow">--}}
								{{--<div class="date">2 липня 2016</div>--}}
								{{--<span class="stars">4</span>--}}
								{{--<div class="message">--}}
									{{--В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.--}}
								{{--</div>--}}

								{{--<div class="answer clearfix">--}}
									{{--<div class="title">Ваша відповідь</div>--}}
									{{--<div class="message">--}}
										{{--В принципе вкусно,если сделать для одного раза,а так: гарнир--}}
									{{--</div>--}}
									{{--<div class="right-avatar">--}}
										{{--<div class="avatar">--}}
											{{--<div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>--}}
										{{--</div>--}}
									{{--</div>--}}
								{{--</div>--}}

								{{--<div class="message">--}}
									{{--В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.--}}
								{{--</div>--}}

								{{--<hr>--}}
								{{--<a href="#" class="link-blue pull-right">Приховати</a>--}}

							{{--</div>--}}
						{{--</li>--}}

						{{--<li class="clearfix">--}}
							{{--<div class="left">--}}
								{{--<div class="avatar">--}}
									{{--<div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>--}}
								{{--</div>--}}
								{{--<a href="#" class="link-blue name">Марія</a>--}}
							{{--</div>--}}
							{{--<div class="right bg-yellow">--}}
								{{--<div class="date">2 липня 2016</div>--}}
								{{--<span class="stars">4</span>--}}
								{{--<div class="message">--}}
									{{--В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.--}}
								{{--</div>--}}

								{{--<hr>--}}
								{{--<a href="#" class="link-red pull-left">Відповісти</a>--}}
								{{--<a href="#" class="link-blue pull-right">Показати все</a>--}}
							{{--</div>--}}
						{{--</li>--}}

					</ul>

						{{ $reviews->links() }}

					{{--<div class="paginate">--}}
						{{--<ul class="pagination grey">--}}
							{{--<li><a href="#" rel="prev"><</a></li>--}}
							{{--<li><a href="#">1</a></li>--}}
							{{--<li><a href="#">2</a></li>--}}
							{{--<li class="active"><span>3</span></li>--}}
							{{--<li><a href="#">4</a></li>--}}
							{{--<li class="disabled"><span>...</span></li>--}}
							{{--<li><a href="#">10</a></li>--}}
							{{--<li><a href="#" rel="next">></a></li>--}}
						{{--</ul>--}}
					{{--</div>--}}
				</div>
				@endif


				<div class="your-cook clearfix">
					<h5 class="text-upper underline-red">Ваш повар</h5><hr class="zerro-top">
					<div class="left">
						<div class="avatar">
							<div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>
						</div>
						<a href="#" class="link-blue name">{{ $advert->user->name }}</a>
						<a href="#" class="button button-grey">Зв’язатися</a>
					</div>
					<div class="right">
						<p>{{ $advert->user->about }}</p>
					</div>
				</div>

			</div> <!-- col-md-9 -->

			<div class="col-md-3">
				<div class="widget">
					<div class="widget-header">{{ $advert->price }} <small>грн.</small></div>

					<div class="widget-body">
						<div class="stickers">
							<i class="discount"></i>
							<i class="new"></i>
							<i class="heart"></i>
						</div>
						<p><i class="time medium"></i> 10 – 15 грудня</p>
						<p class="distance"><i class="fo fo-big fo-marker red"></i>5 км</p>
						<p class="small">вул. Соборна 20, Вінниця</p>
						<hr class="red-border">

						<div class="avatar">
							<div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>
							<a href="javascript:void(0);" onclick="wishlist.add({{ $advert->user->id }})" class="link"><i class="fo fo-like fo-small"></i> до улюблених</a>
						</div>
						<a href="#" class="link-blue name">{{ $advert->user->name }}</a>
						<div class="rating"><span class="stars">4</span>10 відгуків</div>

						<p><a href="#" class="button button-red wide" data-toggle="modal" data-target="#modal_order">Замовити</a></p>
						<p class="medium">або вибрати</p>
						<div class="clearfix">
							<a href="#" class="button-square pull-left"><i class="fo fo-big fo-dish-ready"></i>уже готова страва</a>
							<a href="#" class="button-square pull-right"><i class="fo fo-big fo-deal"></i>страва під замовлення</a>
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
			<?php for ($i=0; $i < 10; $i++) : ?>
				<div class="item">
					<div class="product-thumb">

						<div class="image">
							<img src="/uploads/food1.jpg" class="img-responsive" alt="">
							<div class="distance"><i class="fo fo-small fo-marker red"></i>5 км</div>
						<?php $actions=['discount','new', 'heart'] ?> <!-- class: discount new heart -->
							<div class="sticker <?= $actions[array_rand($actions)] ?>"></div>
						</div>

						<div class="caption">
							<a href="/adverts/1" class="title link-black">М'ясне рагу з овочами</a>
							<p>
								<span class="price">80 грн.</span>
								<span class="rating"><span class="stars"><?=rand(0,5)?></span>10 відгуків</span>
							</p>
							<p><i class="time"></i>15 грудня (обід)</p>
						</div>

						<button type="button" class="button button-grey order">Замовити</button>

					</div>
				</div>
			<?php endfor ?>
		</div>

	</div> <!-- container -->

</div> <!-- bg-white -->


<!-- Modal Order -->
<div id="modal_order" class="modal fade" role="dialog">
	<div class="modal-dialog w-710">
		<div class="modal-content text-center">
			<div class="modal-header">
				<a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
				<h4 class="modal-title">Оформити замовлення</h4>
			</div>
			<div class="modal-body">
				<div class="v-indent-20"></div>
				<div class="step"><span>1</span></div>
				<div class="f-18 top-10">Для оформлення замовлення, зв'яжіться з поваром страви</div>
				<div class="caption">
					<div class="avatar">
						<div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>
					</div>
					<p><a href="#" class="link-blue name">Марк</a></p>
				</div>
				<div class="phone red f24">+38 (096) 159-1515</div>
				<div class="phone red f24">+38 (096) 159-1515</div>

				<div id="switchable">
					<div class="grey3 top-20">або</div>
					<div class="f18">залиште свій номер телефону,<br> і повар зв’яжиться з вам найближчи</div>
					<div class="top-20">
						<input type="text" class="phone-input w-440 text-center">
						<button id="submit_phone" type="submit" class="button btn-grey-red">Відправити</button>
					</div>
				</div>

				{{-- 3.4.2 --}}
				<div id="ok_send" class="grey-block bg-yellow black w-480 hide">
					<p class="text-center red"><i class="fo fo-ok fo-2x"></i></p>
					<p class="f16">Ваш телефон відправлено</p>
				</div>



				<div class="v-indent-20"></div>
				<div class="step"><span>2</span></div>
				<div class="f-18 top-20">Для завершення замовлення обов’язково потрібно підтвердити його</div>

				<div class="top-20 inline">
					<a href="#" class="button button-white text-upper mlr-10">Підтвердити пізніше</a>
					<a href="#" class="button button-red text-upper mlr-10">Підтвердити зараз</a>
				</div>

				{{-- 3.4.3 --}}
				<div class="info-block red w-480">
					<p class="text-upper">Замовлення очікує на підтвердження!</p>
					<div><a href="#" class="link-grey3 f14">Перейти до моїх замовлень та підтвердити <i class="fo fo-arrow-right fo-small"></i></a></div>
				</div>

			</div>
		</div>
	</div>
</div>


@stop


@push('scripts')
	<script>
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
