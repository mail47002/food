@extends('frontend.layouts.default')
@section('title')Products - @stop
@section('content')

<div class="container">
	<div class="row flex-md">
		<div class="col-md-3">
			<div class="left-sidebar bg-yellow text-center">

				<div class="avatar">
					<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
				</div>

				<div class="phones fo fo-phone fo-indent fo-left red">
					<div class="inline black">
						<p>+38 012 345 67 89</p>
						<p>+38 012 345 67 89</p>
					</div>
				</div>

				<a href="#" class="link link-grey3"><i class="fo fo-like fo-small"></i> до улюблених</a>
				<div class="v-indent-20"></div>
				<a href="#" class="button button-grey left-icon"><i class="fo fo-message"></i> Залишити відгук</a>
				<div class="v-indent-20"></div>
				<a href="#" class="button button-grey left-icon"><i class="fo fo-edit fo-small"></i> Зв'язатися</a>

				<ul class="menu">
					<li><a href="/user/reviews" class="active">Відгуки</a></li>
					<li><a href="/user/products">Каталог страв</a></li>
					<li><a href="/user/adverts">Оголошення </a></li>
					<li><a href="/user/articles">Статті</a></li>
				</ul>

			</div>
		</div>

		<div class="col-md-9">
			<div class="v-indent-40"></div>
			<h1>Марк</h1>
			<p class="grey3">
				<i class="fo fo-big fo-marker red"></i> вул. Соборна 20, Вінниця
			</p>
			<div class="rating grey3"><span class="stars medium">4</span>10 відгуків</div>

			<div class="description">
				<p>Якщо ви любите запечене блюдо з хрусткою скоринкою, то посипте все сумішшю з панірувальних сухарів і натертого на тертці сиру. Запікайте в духовці при температурі 180-190С. Коли картопля стане м'яким, або помідори з цибулею і кабачками трохи підрум'яняться - овочевий рататуй з баклажанами готовий! Подавайте його до столу з будь-яким улюбленим вами соусом. Підійде сметана, домашній майонез або невеликий шматочок вершкового масла.</p>

				<a href="#" class="link-blue">Показати текст</a>
			</div>


			<div class="reviews">
				<h5 class="text-upper underline-red">Відгуки (30)</h5><hr class="zerro-top">
				<h6 class="zerro-bottom">Відгуки про повара (25)</h6>
				<ul class="list-unstyled">

					<li class="clearfix">
						<div class="left">
							<div class="avatar">
								<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
							</div>
							<a href="#" class="link-blue name">Вікторія</a>
						</div>
						<div class="right bg-yellow with-image">
							<div class="blk-left">
								<div class="date">2 липня 2016</div>
								<div><a href="#" class="link-blue f16">М'ясне рагу з овочами</a></div>
								<span class="stars">4</span>
								<div class="message">
									В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.
								</div>
							</div>
							<div class="blk-right"><img src="/uploads/food2.jpg" ></div>
						</div>
					</li>

					<li class="clearfix">
						<div class="left">
							<div class="avatar">
								<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
							</div>
							<a href="#" class="link-blue name">Вікторія</a>
						</div>

						<div class="right bg-yellow with-image">
							<div class="blk-left">
								<div class="date">2 липня 2016</div>
								<div><a href="#" class="link-blue f16">М'ясне рагу з овочами</a></div>
								<span class="stars">4</span>
								<div class="message">
									В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.
								</div>

								<div class="collapse" id="collapse_01">

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

									<div class="message" id="message_01">
										В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.
									</div>

								</div>

								<hr>
								<a href="#" class="link-red pull-left"><i class="fo fo-back"></i> Відповісти</a>
								<a href="#collapse_01" class="link-blue pull-right" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_01" opened="Приховати" closed="Показати все" /></a>

							</div>
							<div class="blk-right"><img src="/uploads/food2.jpg" ></div>

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

			{{-- если 0  --}}
			<h6 class="zerro-bottom">Відгуки від клієнтів (0)</h6>
			<div class="empty-block">
				<i class="fo fo-dish-search fo-big block"></i>
				<p>У повара ще немає відгуків!</p>
				<a href="#" class="button button-red button-empty-block" data-toggle="modal" data-target="#modal_warning">Залишити відгук</a>
			</div>


			<div class="reviews">
				<h6 class="zerro-bottom">Відгуки від поварів (5)</h6>
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

							<div class="collapse" id="collapse_02">

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

							</div>

							<hr>
							<a href="#" class="link-red pull-left"><i class="fo fo-back"></i> Відповісти</a>
							<a href="#collapse_02" class="link-blue pull-right" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_02" opened="Приховати" closed="Показати все" /></a>

						</div>
					</li>

				</ul>

				{{-- если 0  --}}
				<h6 class="zerro-bottom">Відгуки від поварів (0)</h6>
				<div class="empty-block">
					<i class="fo fo-people fo-big block"></i>
					<p>Це ваш клієнт!</p>
					<a href="#" class="button button-red button-empty-block" data-toggle="modal" data-target="#modal_warning">Залишити відгук</a>
				</div>
			</div>


		</div>
	</div>
</div>


<!-- Modal -->
<div id="modal_warning" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content text-center">
			<a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
			<div class="modal-body">
				<p class="f18">Спершу зробіть замовлення, щоб залишити відгук про повара</p>

				<a href="#" class="button button-red button-big-modal">Замовити страву</a>
			</div>
		</div>
	</div>
</div>

@stop