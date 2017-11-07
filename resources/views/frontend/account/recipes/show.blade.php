@extends('frontend.layouts.default')

@section('title')Adverts - @stop

@section('content')
	<div class="breadcrumbs">
	<div class="container">
		<ul class="list-inline">
			<li><a href="{{ route('account.articles.index') }}" class="link-blue back text-upper"><i class="fo fo-arrow-left fo-small"></i>  Назад до моїх статей</a></li>

			<div class="pull-right">
				<a href="{{ route('account.recipes.edit', $recipe->id) }}" class="link-blue"><i class="fo fo-edit fo-inheirt"></i> Редагувати</a>
			</div>
		</ul>
	</div>
</div>


<div class="title-slider with-header bg-yellow">
	<div class="container">
		<h1 class="text-center">{{ $recipe->name }}</h1>
		<div class="owl-carousel">
			@foreach ($recipe->images as $image)
				<div class="item"><img src="{{ $image->image }}" alt="{{ $recipe->name }}"></div>
			@endforeach
		</div>
		<div class="slider-counter"></div>
	</div>
</div>



<div class="bg-white">



	<div class="container">

		<div class="row">
			<div class="food-recipe col-md-9">
				<div class="description f18">
					{{ $recipe->description }}
				</div>

				<h5 class="ingredient-title text-upper underline-red">Інгредієнти</h5><hr class="zerro-top">
				<ul class="ingredient-list">
					@foreach ($recipe->ingredient as $ingredient)
						<li><i class="fo fo-ingredients red"></i> {{ $ingredient }}</li>
					@endforeach
				</ul>

				<h5 class="text-upper underline-red">Етапи приготування</h5><hr class="zerro-top">
				<?php $i = 0; ?>
				<ul class="cooking-steps">
					@foreach($recipe->steps as $step)
					<?php $i++; ?>
					<li>
						<img src="{{ $step->thumbnail }}" alt="step">
						<h5 class="red">Крок {{ $i }}</h5>
						<p>{{ $step->text }} </p>
					</li>
					@endforeach
				</ul>


				<div class="reviews">
					<h5 class="text-upper underline-red">Коментарі</h5><hr class="zerro-top">
					<ul class="list-unstyled">

						<li class="clearfix">
							<div class="left">
								<div class="avatar">
									<div class="rounded"><img src="/uploads/avatar.png alt="foto"></div>
								</div>
							</div>
							<div class="right-empty">
								<div class="your-message">
									<form action="#from-01">
										<textarea name="message" id="" placeholder="Ваша відповідь"></textarea>
										<button class="link-red-dark" type="submit"><i class="fo fo-plane fo-2x"></i></button>
									</form>
								</div>
							</div>
						</li>

						<hr><div class="v-indent-30"></div>

						<li class="clearfix">
							<div class="left">
								<div class="avatar">
									<div class="rounded"><img src="/uploads/avatar.png alt="foto"></div>
								</div>
								<a href="#" class="link-blue name">Вікторія</a>
							</div>

							<div class="right border-grey">
								<div class="date">2 липня 2016</div>
								<div class="message">
									Так как у меня порошковый желатин, поэтому воды наливала столько,чтобы покрыть весь слой желатина... примерно 1/3 стакана.
								</div>
							</div>
						</li>

						<li class="clearfix">
							<div class="left">
								<div class="avatar">
									<div class="rounded"><img src="/uploads/avatar.png alt="foto"></div>
								</div>
								<a href="#" class="link-blue name">Вікторія</a>
							</div>

							<div class="right border-grey">
								<div class="date">2 липня 2016</div>
								<div class="message">
									Так как у меня порошковый желатин, поэтому воды наливала столько,чтобы покрыть весь слой желатина... примерно 1/3 стакана.
								</div>
							</div>
						</li>

						<li class="clearfix">
							<div class="left">
								<div class="avatar">
									<div class="rounded"><img src="/uploads/avatar.png alt="foto"></div>
								</div>
								<a href="#" class="link-blue name">Вікторія</a>
							</div>

							<div class="right border-grey">
								<div class="date">2 липня 2016</div>
								<div class="message">
									Так как у меня порошковый желатин, поэтому воды наливала столько,чтобы покрыть весь слой желатина... примерно 1/3 стакана.
								</div>
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


			</div> <!-- col-md-9 -->

			<div class="col-md-3">
				<div class="widget bordered">

					<div class="widget-body">
						<p class="f14 grey3">15 грудня</p>
						<div class="v-indent-20"></div>
						<hr class="red-border">

						<div class="avatar">
							<div class="rounded"><img src="/uploads/avatar.png alt="foto"></div>
						</div>
						<a href="#" class="link-blue name">Марк</a>
						<div class="rating"><span class="stars">4</span>10 відгуків</div>

						<p class="small">вул. Соборна 20, Вінниця</p>
						<div class="v-indent-20"></div>
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
							<img src="/uploads/article1.jpg" class="img-responsive" alt="">
						</div>

						<div class="caption">
							<a href="/products/1" class="title link-black">М'ясне рагу з овочами</a>
							<p class="bottom">
								Так приятно начать неспешное воскресное утро со вкусных блинчиков и чашки чая.
							</p>
						</div>

					</div>
				</div>
			@endfor
		</div>

	</div> <!-- container -->

</div> <!-- bg-white -->

@stop

@push('scripts')
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
@endpush
