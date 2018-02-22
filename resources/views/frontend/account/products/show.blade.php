@extends('frontend.layouts.default')

@section('title')Adverts - @stop

@section('content')
	<div class="breadcrumbs">
		<div class="container">
			<ul class="list-inline">
				<li><a href="{{ route('account.products.index') }}" class="link-blue back"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>  До меню страв</a></li>
			</ul>
		</div>
	</div>

	<div class="title-slider bg-yellow">
		<div class="container">
			<div class="owl-carousel">
				@foreach ($product->images as $image)
					<div class="item"><img src="{{ $product->user->directory . $image->image }}"></div>
				@endforeach
			</div>
			<div class="slider-counter"></div>
		</div>
	</div>

	<div class="bg-white">
		<div class="container">
			<div class="row">
				<div class="food-info col-md-9">
					<h1>{{ $product->name }}</h1>
					<div class="rating"><span class="stars medium">4</span>{{ $reviews->total() }} відгуків</div>

					<h5 class="ingredient-title text-upper underline-red">Інгредієнти</h5><hr class="zerro-top">

					<ul class="list-inline ingredient-list">
						@foreach ($product->ingredient as $ingredient)
							<li class="ingredients">{{ $ingredient }}</li>
						@endforeach
					</ul>

					<h5 class="text-upper underline-red">Від повара про страву </h5><hr class="zerro-top">

					<div class="description">
						<p>{{ $product->description }}</p>

						<div class="red-round-border">
							<i>Якщо ви любите запечене блюдо з хрусткою скоринкою, то посипте все сумішшю з панірувальних сухарів і натертого на тертці сиру. Запікайте в духовці при температурі 180-190С. Коли картопля стане м'яким, або помідори з цибулею і кабачками трохи підрум'яняться - овочевий рататуй з баклажанами готовий! Подавайте його до столу з будь-яким улюбленим вами соусом. Підійде сметана, домашній майонез або невеликий шматочок вершкового масла. Як стверджують французи, в будь-якому блюді є два незамінних інгредієнта - це фантазія і любов! Готуйте з задоволенням і радістю!</i>
						</div>
					</div>


					<div class="reviews">
						<h5 class="text-upper underline-red">Відгуки ({{ $reviews->total() }})</h5><hr class="zerro-top">

						@if(count($reviews) > 0)
							<ul class="list-unstyled">

								@foreach($reviews as $review)
									<li class="clearfix">
										<div class="left">
											<div class="avatar">
												<div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>
											</div>
											<a href="#" class="link-blue name">{{ $review->user->name }}</a>
										</div>
										<div class="right bg-yellow">
											<div class="date">{{ $review->created_at }}</div>
											<span class="stars">{{ $review->rating }}</span>
											<div class="message">{{ $review->text }}</div>
										</div>
									</li>
								@endforeach

							</ul>
							<div class="paginate">
								{{ $reviews->links() }}
							</div>
						@else
							No data!
						@endif
					</div>


					<div class="your-cook clearfix">
						<h5 class="text-upper underline-red">Ваш повар</h5><hr class="zerro-top">
						<div class="left">
							<div class="avatar">
								<div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>
							</div>
							<a href="#" class="link-blue name">{{ $product->user->name }}</a>
							<a href="#" class="button button-grey">Зв’язатися</a>
						</div>
						<div class="right">
							{{ $product->user->about }}
						</div>
					</div>

				</div> <!-- col-md-9 -->

				<div class="col-md-3">
					<div class="widget bordered">

						<div class="widget-body">

							<div class="avatar">
								<div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>
								<a href="#" class="link"><i class="fa fa-thumbs-o-up" aria-hidden="true"></i> до улюблених</a>
							</div>
							<a href="#" class="link-blue name">{{ $product->user->name }}</a>
							<div class="rating"><span class="stars">4</span>10 відгуків</div>

							<p class="distance"><i class="fo fo-big fo-marker red"></i>5 км</p>
							<p class="small">{{ Helper::getUserAddress($product->user) }}</p>
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


			@if(count($relatedProducts) > 0)
				<hr>
				<h5 class="text-upper">Інші страви</h5>
				<div class="owl-carousel recent">
					@foreach($relatedProducts as $relatedProduct)
						<div class="item">
							<div class="product-thumb">
								<div class="image">
									<img src="/uploads/food1.jpg" class="img-responsive" alt="">
									<div class="distance"><i class="fo fo-small fo-marker red"></i>5 км</div>
								<!-- class: discount new heart -->
									<div class="sticker"></div>
								</div>

								<div class="caption">
									<a href="/products/1" class="title link-black">{{ $relatedProduct->name }}</a>
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
					@endforeach
				</div>
			@endif

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
