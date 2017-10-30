@extends('frontend.layouts.profile')

@section('title')Products - @stop

@section('content')

	<div class="v-indent-40"></div>
	<h1>{{ auth()->user()->name }}</h1>
	<p class="grey3">
		<i class="fo fo-marker red"></i> {{ auth()->user()->address->street }} {{ auth()->user()->address->build }}, {{ auth()->user()->address->city }}
		&nbsp;&nbsp;&nbsp;<a href="{{ route('profile.user.edit', auth()->id()) }}" class="link-grey"><i class="fo fo-edit fo-small fo-indent"></i>Редагувати</a>
	</p>
	<div class="rating grey3"><span class="stars medium">4</span>10 відгуків</div>

	<div class="description">
		<p>{{ auth()->user()->about }}</p>
	</div>

	<h5 class="text-upper underline-red">Відгуки (0)</h5><hr class="zerro-top">

	<div class="reviews">
		<h6 class="zerro-bottom">Відгуки про повара (0)</h6>

		@if (count($products) > 0)
			<ul class="list-unstyled">
				@foreach ($products as $product)
					@if(count($product->reviews) > 0)
						@foreach($product->reviews as $review)
							<li class="clearfix">
								<div class="left">
									<div class="avatar">
										<div class="rounded"><img src="{{ asset($review->user->image) }}"></div>
									</div>
									<a href="#" class="link-blue name">{{ $review->user->name }}</a>
								</div>

								<div class="right bg-yellow with-image">
									<div class="blk-left">
										<div class="date">{{ $review->created_at }}</div>
										<div><a href="#" class="link-blue f16">{{ $review->product->name }}</a></div>
										<span class="stars">{{ $review->rating }}</span>
										<div class="message">{{$review->text}}</div>

										@if ($review->answer)
											<div class="collapse" id="collapse_to_{{ $review->answer->id }}">
												<div class="answer clearfix">
													<div class="title">Ваша відповідь</div>
													<div class="message">{{$review->answer->text}}</div>
													<div class="right-avatar">
														<div class="avatar">
															<div class="rounded"><img src="{{ asset($review->user->image) }}"></div>
														</div>
													</div>
												</div>
												<div class="message" id="message_01">
													В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.
												</div>
											</div>
										@endif

										<div class="collapse your-message" id="collapse_your_answer_to_{{ $review->id }}">
											<form action="#to-{{$review->id}}">
												<textarea name="message" id="" placeholder="Ваша відповідь"></textarea>
												<button class="link-red-dark" type="submit"><i class="fo fo-plane fo-2x"></i></button>
											</form>
										</div>

										<hr>

										<a href="#collapse_your_answer_to_{{$review->id}}" class="your-message-link pull-right"  data-toggle="collapse" aria-expanded="false" aria-controls="collapse_your_answer_to_{{$review->id}}" opened="Відмінити" closed="Відповісти" /></a>

										@if ($review->answer)
											<a href="#collapse_to_{{$review->answer->id}}" class="link-blue pull-left" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_to_{{ $review->answer->id }}" opened="Приховати" closed="Показати все" /></a>
										@endif

									</div>
									<div class="blk-right"><img src=" {{ asset($review->product->image) }}" ></div>

								</div>
							</li>
						@endforeach
					@endif
				@endforeach
			</ul>
		@else
			<div class="empty-block">
				<i class="fo fo-dish-search fo-big block"></i>
				<p>У вас ще немає відгуків!</p>
			</div>
		@endif

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

	@if (count($reviews) > 0)
		<div class="reviews">
			<h6 class="zerro-bottom">Відгуки від поварів (0)</h6>
			<ul class="list-unstyled">

				@foreach ($reviews as $review)
					<li class="clearfix">
						<div class="left">
							<div class="avatar">
								<div class="rounded"><img src="{{ asset($review->user->image) }}"></div>
							</div>
							<a href="#" class="link-blue name">{{ $review->user->name }}</a>
						</div>
						<div class="right bg-yellow">
							<div class="date">{{ $review->created_at }}</div>
							{{-- <p class="black"><a href="#" class="link-blue">{{$reviewFrom->name}}</a></p> --}}
							<span class="stars">{{ $review->rating }}</span>
							<div class="message">{{ $review->text }}</div>

							@if ($review->answer)
								<div class="collapse" id="collapse_from_{{$review->answer->id}}">
									<div class="answer clearfix">
										<div class="title">Ваша відповідь</div>
										<div class="message">{{$review->answer->text}}</div>
										<div class="right-avatar">
											<div class="avatar">
												<div class="rounded"><img src="{{ asset($review->user->image) }}"></div>
											</div>
										</div>
									</div>
								</div>
							@endif

							<div class="collapse your-message" id="collapse_your_answer_{{ $review->id }}">
								<form action="#from-{{ $review->id }}">
									<textarea name="message" id="" placeholder="Ваша відповідь"></textarea>
									<button class="link-red-dark" type="submit"><i class="fo fo-plane fo-2x"></i></button>
								</form>
							</div>

							<hr>

							<a href="#collapse_your_answer_{{ $review->id }}" class="your-message-link pull-right"  data-toggle="collapse" aria-expanded="false" aria-controls="collapse_your_answer_{{ $review->id }}" opened="Відмінити" closed="Відповісти" /></a>

							@if ($review->answer)
								<a href="#collapse_from_{{ $review->answer->id }}" class="link-blue pull-left" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_from_{{ $review->answer->id }}" opened="Приховати" closed="Показати все" /></a>
							@endif

						</div>
					</li>
				@endforeach

			</ul>

		@else
			<div class="empty-block">
				<i class="fo fo-people fo-big block"></i>
				<p>Ви ще не робили замовлення. Не має відгуків!</p>
				<a href="#" class="button button-red button-empty-block" data-toggle="modal" data-target="#modal_warning">Замовити страву</a>
			</div>
		@endif

	</div>

@stop