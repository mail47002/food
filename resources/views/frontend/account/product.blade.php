@extends('frontend.layouts.default')
@section('title')My Dish - @stop
@section('content')
<div class="breadcrumbs">
	<div class="container">
		<ul class="list-inline">
			<li><a href="/profile/products" class="link-blue back text-upper"><i class="fo fo-arrow-left fo-small"></i>  Назад у мій каталог оголошень</a></li>

			<div class="pull-right">
				<a href="/profile/products/edit/{{ $product->id }}" class="link-blue"><i class="fo fo-edit fo-inheirt"></i> Редагувати</a>
				<a href="#" class="link-grey"><i class="fo fo-delete fo-inheirt"></i> Видалити</a>
			</div>
		</ul>
	</div>
</div>


<div class="title-slider bg-yellow">
	<div class="container">
		<div class="owl-carousel">
			<div class="item"><img src="{{ asset($product->image) }}" alt=""></div>
			@if(!empty($product->productImages))
			@foreach($product->productImages as $image)
			<div class="item"><img src="{{ asset($image->image) }}" alt=""></div>
			@endforeach
			@endif
		</div>
		<div class="slider-counter"></div>
	</div>
</div>



<div class="bg-white">



	<div class="container">

		<div class="row">
			<div class="food-info col-md-9">
				<h1>{{ $product->name }}</h1>
				<div class="rating grey3 f14"><span class="stars medium inline">4</span>30 відгуків</div>

				<h5 class="ingredient-title text-upper underline-red">Інгредієнти</h5><hr class="zerro-top">
				<ul class="list-inline ingredient-list">
					@if(!empty($product->ingredients))
						@foreach(json_decode($product->ingredients) as $ingredient)
							<li><i class="fo fo-ingredients red"></i> {{ $ingredient }}</li>
						@endforeach
					@endif
				</ul>

				<h5 class="text-upper underline-red">Від повара про страву </h5><hr class="zerro-top">

				<div class="description">
					{!! $product->description !!}
				</div>


				<div class="reviews">
					<h5 class="text-upper underline-red">Відгуки (30)</h5><hr class="zerro-top">
					<ul class="list-unstyled">
						@if(!empty($product->reviews))
						@foreach($product->reviews as $review)
						<li class="clearfix">
							<div class="left">
								<div class="avatar">
									<div class="rounded"><img src="{{ asset($review->user->image) }}" alt="foto"></div>
								</div>
								<a href="#" class="link-blue name">{{ $review->user->name }}</a>
							</div>

							<div class="right bg-yellow">
								<div class="date">{{ $review->created_at }}</div>
								<span class="stars">{{ $review->rating }}</span>
								<div class="message">
									{{ $review->text }}
								</div>
								@if(!empty($review->answer))
								<div class="collapse" id="collapse_02">
									<div class="answer clearfix">
										<div class="title">Ваша відповідь</div>
										<div class="message">
											{{ $review->answer->text}}
										</div>
										<div class="right-avatar">
											<div class="avatar">
												<div class="rounded"><img src="{{ asset($profile->image) }}" alt="foto"></div>
											</div>
										</div>
									</div>
								</div>
								@else
								<div class="collapse your-message" id="collapse_your_answer_from_01">
									<form action="#from-01">
										<textarea name="message" id="" placeholder="Ваша відповідь"></textarea>
										<button class="link-red-dark" type="submit"><i class="fo fo-plane fo-2x"></i></button>
									</form>
								</div>
								@endif
								<hr>
								@if(empty($review->answer))
								<a href="#collapse_your_answer_from_01" class="your-message-link pull-left"  data-toggle="collapse" aria-expanded="false" aria-controls="collapse_your_answer_from_01" opened="Відмінити" closed="Відповісти" /></a>
								@endif
								<a href="#collapse_02" class="link-blue pull-right" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_02" opened="Приховати" closed="Показати все" /></a>

							</div>
						</li>
						@endforeach
						@endif
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
							<div class="rounded"><img src="{{ asset($profile->image) }}" alt="foto"></div>
						</div>
						<a href="#" class="link-blue name">{{ $profile->name }}</a>
						{{-- <a href="#" class="button button-grey">Зв’язатися</a> --}}
					</div>
					<div class="right">
						{!! $profile->about !!}
					</div>
				</div>

			</div> <!-- col-md-9 -->

			<div class="col-md-3">
				<div class="widget bordered">

					<div class="widget-body">

						<div class="avatar">
							<div class="rounded"><img src="{{ asset($profile->image) }}" alt="foto"></div>
						</div>
						<a href="#" class="link-blue name">{{ $profile->name }}</a>
						<div class="rating"><span class="stars">4</span>10 відгуків</div>
						<p class="small">{{$profile->adresses['street']}} {{$profile->adresses['build']}}, {{$profile->adresses['city']}}</p>
					</div>

					<div class="widget-footer">
						<ul class="socials justify list-unstyled">
							<li><a href="#" class="fo fo-facebook"></a></li>
							<li><a href="#" class="fo fo-google"></a></li>
							<li><a href="#" class="fo fo-instagram"></a></li>
							<li><a href="#" class="fo fo-twitter"></a></li>
							<li class="hover-open">
								<a href="#" class="fo fo-ellipsis-h">...</a>
								<ul class="hover list-unstyled">
									<li><a href="#" class="">VK</a></li>
									<li><a href="#" class="">LinkedIn</a></li>
									<li><a href="#" class="">OK</a></li>
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
<script>
$( function() {
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
});
</script>
@stop
