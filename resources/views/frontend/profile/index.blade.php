@extends('frontend.layouts.default')
@section('title')Products - @stop
@section('content')

<div class="container">
	<div class="row flex-md">
		<div class="col-md-3 match-height">
			<div class="left-sidebar bg-yellow text-center">

				<div class="avatar">
					<div class="rounded"><img src="{{$profile['image']}}" alt="foto"></div>
				</div>

				<div class="phones fo fo-phone fo-indent fo-left red">
					<div class="inline black">
						@foreach (json_decode($profile['phone']) as $value)
							<p>{{$value}}</p>
						@endforeach
					</div>
				</div>

				<a href="{{ route('profile.edit') }}" class="button button-grey fo fo-edit fo-left fo-small">Редагувати профіль</a>

				<ul class="menu">
					<li><a href="/profile" class="active">Про мене</a></li>
					<li><a href="/profile/products">Каталог страв</a></li>
					<li><a href="#">Оголошення </a></li>
					<li><a href="#">Мої повідомлення <span class="badge">3</span></a></li>
					<li><a href="#">Мої замовлення</a></li>
					<li><a href="#">Мої відгуки</a></li>
					<li><a href="#">Мої статті</a></li>
				</ul>

			</div>
		</div>

		<div class="col-md-9 match-height">
			<div class="v-indent-40"></div>
			<h1>{{$profile['name']}}</h1>
			<p class="grey3">
				<i class="fo fo-big fo-marker red"></i> {{$adresses['street']}} {{$adresses['build']}}, {{$adresses['city']}}
				&nbsp;&nbsp;&nbsp;<a href="{{-- {{ route('profile.adresses') }} --}}" class="link-grey"><i class="fo fo-edit fo-small fo-indent"></i>Редагувати</a>
			</p>
			<div class="rating grey3"><span class="stars medium">4</span>30 відгуків</div>

			<div class="description">
				<p>{{$profile['about']}}</p>

				{{-- <div class="red-round-border">
					<i>Якщо ви любите запечене блюдо з хрусткою скоринкою, то посипте все сумішшю з панірувальних сухарів і натертого на тертці сиру. Запікайте в духовці при температурі 180-190С. Коли картопля стане м'яким, або помідори з цибулею і кабачками трохи підрум'яняться - овочевий рататуй з баклажанами готовий! Подавайте його до столу з будь-яким улюбленим вами соусом. Підійде сметана, домашній майонез або невеликий шматочок вершкового масла. Як стверджують французи, в будь-якому блюді є два незамінних інгредієнта - це фантазія і любов! Готуйте з задоволенням і радістю!</i>
				</div> --}}
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



			<div class="reviews">
				<h5 class="text-upper underline-red">Відгуки (30)</h5><hr class="zerro-top">
				<ul class="list-unstyled">
<!--    -->
					<li class="with-image bg-yellow clearfix">
						<div class="title">
							<p class="date">2 липня 2016</p>
							<p class="black">Відгук для <a href="#" class="link-blue">Оксана</a> про <a href="#" class="link-blue">М'ясне рагу з овочами</a></p>
						</div>
						<div class="left">
							<div class="avatar">
								<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
							</div>
							<a href="#" class="link-blue name">Вікторія</a>
						</div>

						<div class="right">
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
						<div class="image">
							<img src="/uploads/avatar.jpg" alt="foto">
						</div>
					</li>
<!--    -->
					<li class="with-image bg-yellow clearfix">
						<div class="title">
							<p class="date">2 липня 2016</p>
							<p class="black">Відгук про клієнта <a href="#" class="link-blue">Оксана</a></p>
						</div>
						<div class="left">
							<div class="avatar">
								<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
							</div>
							<a href="#" class="link-blue name">Вікторія</a>
						</div>

						<div class="right">
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
						<div class="image">
							<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
						</div>
					</li>

			</ul>
		</div>

		</div>
	</div>
</div>
@stop


@section('scripts')
<script>
// $( function() {
// 	$('.match-height').matchHeight();
// });
</script>
@stop