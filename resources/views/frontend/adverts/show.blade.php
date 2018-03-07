@extends('frontend.layouts.default')

@include('frontend.includes.nav')
@section('title')Adverts - @stop

@section('content')
	<div class="breadcrumbs">
		<div class="container">
			<ul class="list-inline">
				<li>
					<a href="#" class="link-blue back">
						<i class="fa fa-long-arrow-left" aria-hidden="true"></i>  До меню страв
					</a>
				</li>
			</ul>
		</div>
	</div>

	<div class="title-slider bg-yellow">
		<div class="container">
			<div class="owl-carousel">
				@foreach($advert->images as $image)
					<div class="item"><img src="{{ $advert->user->directory . $image->image }}" alt="{{ $advert->name }}"></div>
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
					<div class="rating">
						<span class="stars medium">4</span>{{ $reviews->total() }} відгуків
					</div>

					<h5 class="text-upper underline-red">Від повара про страву </h5><hr class="zerro-top">

					<div class="description">
						<p>{{ $advert->product->description }}</p>

						<div class="red-round-border">
							<i>{{ $advert->description }}</i>
						</div>
					</div>

					@if(count($reviews) > 0)
						<div class="reviews">
							<h5 class="text-upper underline-red">Відгуки ({{ $reviews->total() }})</h5>
							<hr class="zerro-top">

							<ul class="list-unstyled">
								@each('frontend.adverts.review', $reviews, 'entity')
							</ul>

							{{ $reviews->appends(request()->all())->links() }}
						</div>
					@endif


					<div class="your-cook clearfix">
						<h5 class="text-upper underline-red">Ваш повар</h5><hr class="zerro-top">
						<div class="left">
							<div class="avatar">
								<div class="rounded">
									<img src="{{ $advert->user->getAvatar() }}" alt="{{ $advert->user->profile->first_name }}">
								</div>
							</div>

							@if(auth()->guest())
								<a href="#" class="link-blue name" data-toggle="modal" data-target="#modal_login">{{ $advert->user->profile->first_name }}</a>
							@else
								<a href="{{ route('profile.user.show', $advert->user->profile->slug) }}" class="link-blue name">{{ $advert->user->profile->first_name }}</a>
							@endif

							@if(auth()->guest())
								<button type="button" class="button button-grey" data-toggle="modal" data-target="#modal_login">Зв’язатися</button>
							@elseif(auth()->id() !== $advert->user_id)
								<a href="{{ route('account.messages.show', $advert->user->profile->slug) }}" class="button button-grey">Зв’язатися</a>
							@endif
						</div>
						<div class="right">
							<p>{{ $advert->user->profile->about }}</p>
						</div>
					</div>

				</div> <!-- col-md-9 -->

				<div class="col-md-3">
					<div class="widget">
						<div class="widget-header">{{ $advert->price }} <small>грн.</small></div>

						<div class="widget-body">
							@if($advert->sticker)
								<div class="stickers">
									<i class="{{ $advert->sticker }}"></i>
								</div>
							@endif

							<p><i class="time medium"></i> 10 – 15 грудня</p>
							<p class="distance"><i class="fo fo-big fo-marker red"></i>5 км</p>
							<p class="small">{{ Helper::getUserAddress($advert->user) }}</p>
							<hr class="red-border">

							<div class="avatar">
								<div class="rounded">
									<img src="{{ $advert->user->getAvatar() }}" alt="{{ $advert->user->profile->first_name }}">
								</div>
								<a href="javascript:void(0);" onclick="wishlist.add({{ $advert->user_id }})" class="link">
									<i class="fo fo-like fo-small"></i> до улюблених
								</a>
							</div>
							<a href="{{ route('profile.user.show', $advert->user->profile->slug) }}" class="link-blue name">{{ $advert->user->profile->first_name }}</a>
							<div class="rating"><span class="stars">4</span>10 відгуків</div>
							<p>
								@if(auth()->guest())
									<button class="button button-red wide" data-toggle="modal" data-target="#modal_login">Замовити</button>
								@else
									<button class="button button-red wide" onclick="order.show({{ $advert->id }})">Замовити</button>
								@endif
							</p>
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

	@include('frontend.includes.order');
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
