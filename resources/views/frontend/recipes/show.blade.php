@extends('frontend.layouts.default')

@include('frontend.includes.nav')
@section('title')Recipe - @stop
@section('content')
<div class="breadcrumbs">
	<div class="container">
		<ul class="list-inline">
			<li><a href="#" class="link-blue back"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>  До порад</a></li>
		</ul>
	</div>
</div>


<div class="title-slider bg-yellow">
	<div class="container">
		<div class="owl-carousel">
			@foreach($recipe->images as $image)
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
				<h1>{{ $recipe->name }}</h1>
				<div class="rating"><span class="stars medium">4</span>30 відгуків</div>

				<h5 class="text-upper underline-red">Від повара про страву </h5><hr class="zerro-top">

				<div class="description">
						<i>{{ $recipe->description }}</i>
				</div>

			</div> <!-- col-md-9 -->
		</div>



		<hr>
		<h5 class="text-upper">Інші поради</h5>
		<div class="owl-carousel recent">
			<?php for ($i=0; $i < 10; $i++) : ?>
				<div class="item">
					<div class="product-thumb">

						<div class="image">
							<img src="/uploads/food1.jpg" class="img-responsive" alt="">
							<div class="distance"><i class="fo fo-small fo-marker red"></i>5 км</div>
						<?php $actions=['discount','new', 'heart'] ?> <!-- class: discount new heart -->
							<div class="sticker <?php echo $actions[array_rand($actions)] ?>"></div>
						</div>

						<div class="caption">
							<a href="/recipes/1" class="title link-black">М'ясне рагу з овочами</a>
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
