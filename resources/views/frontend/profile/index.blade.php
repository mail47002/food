@extends('frontend.layouts.default')
@section('title')Products - @stop
@section('content')

<div class="container">
	<div class="row flex-md">
		<div class="col-md-3">
			<div class="left-sidebar bg-yellow text-center">

				<div class="avatar">
					<div class="rounded"><img src="/{{$profile['image']}}" alt="foto"></div>
				</div>

				<div class="phones fo fo-phone fo-indent fo-left red">
					<div class="inline black">
						@foreach (json_decode($profile['phone']) as $value)
							<p>{{$value}}</p>
						@endforeach
					</div>
				</div>

				<a href="{{ route('profile.edit') }}" class="button button-grey">Редагувати профіль</a>

				<ul class="menu">
					<li><a href="/profile" class="active">Про мене</a></li>
					<li><a href="/profile/products">Каталог страв</a></li>
					<li><a href="/profile/adverts">Оголошення </a></li>
					<li><a href="/profile/messages">Мої повідомлення <span class="badge">3</span></a></li>
					<li><a href="/profile/orders">Мої замовлення</a></li>
					<li><a href="/profile/reviews">Мої відгуки</a></li>
					<li><a href="/profile/articles">Мої статті</a></li>
				</ul>

			</div>
		</div>

		<div class="col-md-9">
			<div class="v-indent-40"></div>
			<h1>{{$profile['name']}}</h1>
			<p class="grey3">
				<i class="fo fo-marker red"></i> {{$profile->adresses['street']}} {{$profile->adresses['build']}}, {{$profile->adresses['city']}}
				&nbsp;&nbsp;&nbsp;<a href="{{-- {{ route('profile.adresses') }} --}}" class="link-grey"><i class="fo fo-edit fo-small fo-indent"></i>Редагувати</a>
			</p>
			<div class="rating grey3"><span class="stars medium">4</span>10 відгуків</div>

			<div class="description">
				<p>{{$profile['about']}}</p>

				{{-- <div class="red-round-border">
					<i>Якщо ви любите запечене блюдо з хрусткою скоринкою, то посипте все сумішшю з панірувальних сухарів і натертого на тертці сиру. Запікайте в духовці при температурі 180-190С. Коли картопля стане м'яким, або помідори з цибулею і кабачками трохи підрум'яняться - овочевий рататуй з баклажанами готовий! Подавайте його до столу з будь-яким улюбленим вами соусом. Підійде сметана, домашній майонез або невеликий шматочок вершкового масла. Як стверджують французи, в будь-якому блюді є два незамінних інгредієнта - це фантазія і любов! Готуйте з задоволенням і радістю!</i>
				</div> --}}
			</div>

			<h5 class="text-upper underline-red">Відгуки (15)</h5><hr class="zerro-top">


			<div class="reviews">
				<h6 class="zerro-bottom">Відгуки про повара (10)</h6>

				<ul class="list-unstyled">
					@foreach($reviewsTo as $reviewTo)
					<li class="clearfix">
						<div class="left">
							<div class="avatar">
								<div class="rounded"><img src="/{{$reviewTo->advert->user->image}}" alt="foto"></div>
							</div>
							<a href="#" class="link-blue name">{{$reviewTo->advert->user->name}}</a>
						</div>

						<div class="right bg-yellow with-image">
							<div class="blk-left">
								<div class="date">{{$reviewTo->created_at}}</div>
								<div><a href="#" class="link-blue f16">{{$reviewTo->advert->name}}</a></div>
								<span class="stars">{{$reviewTo->rating}}</span>
								<div class="message">
									{{$reviewTo->text}}
								</div>

								@if ($reviewTo->answer)
								<div class="collapse" id="collapse_to_{{$reviewTo->answer->id}}">

									<div class="answer clearfix">
										<div class="title">Ваша відповідь</div>
										<div class="message">
											{{$reviewTo->answer->text}}
										</div>
										<div class="right-avatar">
											<div class="avatar">
												<div class="rounded"><img src="/{{$profile['image']}}" alt="foto"></div>
											</div>
										</div>
									</div>

									<div class="message" id="message_01">
										В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.
									</div>

								</div>
								@endif

								<div class="collapse your-message" id="collapse_your_answer_to_{{$reviewTo->id}}">
									<form action="#to-{{$reviewTo->id}}">
										<textarea name="message" id="" placeholder="Ваша відповідь"></textarea>
										<button class="link-red-dark" type="submit"><i class="fo fo-plane fo-2x"></i></button>
									</form>
								</div>

								<hr>

								<a href="#collapse_your_answer_to_{{$reviewTo->id}}" class="your-message-link pull-right"  data-toggle="collapse" aria-expanded="false" aria-controls="collapse_your_answer_to_{{$reviewTo->id}}" opened="Відмінити" closed="Відповісти" /></a>

								@if ($reviewTo->answer)
								<a href="#collapse_to_{{$reviewTo->answer->id}}" class="link-blue pull-left" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_to_{{$reviewTo->answer->id}}" opened="Приховати" closed="Показати все" /></a>
								@endif

							</div>
							<div class="blk-right"><img src="/{{$reviewTo->advert->product->image}}" ></div>

						</div>
					</li>
					@endforeach
				</ul>

				@if (count($reviewsTo) < 1)
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


			<div class="reviews">
				<h6 class="zerro-bottom">Відгуки від поварів (5)</h6>
				<ul class="list-unstyled">
				@foreach ($reviewsFrom as $reviewFrom)
					@foreach ($reviewFrom->reviews as $from)
					<!-- {{dump($from)}} -->
					<li class="clearfix">
						<div class="left">
							<div class="avatar">
								<div class="rounded"><img src="/{{$from->user->image}}" alt="foto"></div>
							</div>
							<a href="#" class="link-blue name">{{$from->user->name}}</a>
						</div>
						<div class="right bg-yellow">
							<div class="date">{{$from->created_at}}</div>
							{{-- <p class="black"><a href="#" class="link-blue">{{$reviewFrom->name}}</a></p> --}}
							<span class="stars">{{$from->rating}}</span>
							<div class="message">
								{{$from->text}}
							</div>
							@if ($from->answer)
							<div class="collapse" id="collapse_from_{{$from->answer->id}}">
								<div class="answer clearfix">
									<div class="title">Ваша відповідь</div>
									<div class="message">
										{{$from->answer->text}}
									</div>
									<div class="right-avatar">
										<div class="avatar">
											<div class="rounded"><img src="/{{$profile['image']}}" alt="foto"></div>
										</div>
									</div>
								</div>
							</div>
							@endif

							<div class="collapse your-message" id="collapse_your_answer_{{$from->id}}">
								<form action="#from-{{$from->id}}">
									<textarea name="message" id="" placeholder="Ваша відповідь"></textarea>
									<button class="link-red-dark" type="submit"><i class="fo fo-plane fo-2x"></i></button>
								</form>
							</div>

							<hr>

							<a href="#collapse_your_answer_{{$from->id}}" class="your-message-link pull-right"  data-toggle="collapse" aria-expanded="false" aria-controls="collapse_your_answer_{{$from->id}}" opened="Відмінити" closed="Відповісти" /></a>

							@if ($from->answer)
							<a href="#collapse_from_{{$from->answer->id}}" class="link-blue pull-left" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_from_{{$from->answer->id}}" opened="Приховати" closed="Показати все" /></a>
							@endif

						</div>
					</li>
					@endforeach
				@endforeach
				</ul>

				@if (count($reviewsFrom) < 1)
				<div class="empty-block">
					<i class="fo fo-people fo-big block"></i>
					<p>Ви ще не робили замовлення. Не має відгуків!</p>
					<a href="#" class="button button-red button-empty-block" data-toggle="modal" data-target="#modal_warning">Замовити страву</a>
				</div>
				@endif

			</div>


		</div>
	</div>
</div>
@stop