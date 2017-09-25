@extends('frontend.layouts.default')
@section('title')Reviews - @stop
@section('content')

<div class="container profile">
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
					<li><a href="/profile">Про мене</a></li>
					<li><a href="/profile/products">Каталог страв</a></li>
					<li><a href="/profile/adverts">Оголошення </a></li>
					<li><a href="/profile/messages">Мої повідомлення <span class="badge">3</span></a></li>
					<li><a href="/profile/orders">Мої замовлення</a></li>
					<li><a href="/profile/reviews" class="active">Мої відгуки</a></li>
					<li><a href="/profile/articles">Мої статті</a></li>
				</ul>

			</div>
		</div>

		<div class="col-md-9">
			<h5 class="text-upper underline-red">Мої відгуки</h5><hr class="zerro-top">

			<div class="filter-block">
				<ul class="categories list-inline text-center">
					<li class="active"><a data-toggle="tab" href="#cooks" class="link-red text-upper">Відгуки про поварів (20)</a></li>
					<li><a data-toggle="tab" href="#clients" class="link-red text-upper">Відгуки про клієнтів (10)</a></li>
				</ul>
				<hr class="red-border">
			</div>

{{-- 5.7.1 --}}
			<div class="tab-content">
				<div id="cooks" class="tab-pane fade in active">

					<div class="reviews profile-reviews">
						<ul class="list-unstyled">

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

									<div class="collapse" id="collapse_cook_01">

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

									<div class="v-indent-20 top-10">
										<a href="#collapse_cook_01" class="link-blue pull-left" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_cook_01" opened="Приховати" closed="Показати все" /></a>
									</div>



									<div class="collapse your-message" id="collapse_your_answer_cook_01">
										<form action="#cook-01">
											<textarea name="message" id="" placeholder="Ваша відповідь"></textarea>
											<button class="link-red-dark" type="submit"><i class="fo fo-plane fo-2x"></i></button>
										</form>
									</div>

									<hr>
									<a href="#collapse_your_answer_cook_01" class="your-message-link pull-right"  data-toggle="collapse" aria-expanded="false" aria-controls="collapse_your_answer_cook_01" opened="Відмінити" closed="Відповісти" /></a>

								</div>
								<div class="image">
									<img src="/uploads/food1.jpg" alt="foto">
								</div>
							</li>

					</ul>
				</div>


				<div class="paginate">
					<ul class="pagination grey">
						<li><a href="#" rel="prev"><</a></li>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#" rel="next">></a></li>
					</ul>
				</div>

			</div>
{{-- 5.7.2 --}}
			<div id="clients" class="tab-pane fade">

				<div class="reviews profile-reviews">
					<ul class="list-unstyled">

						<li class="with-image bg-yellow clearfix">
							<div class="title">
								<p class="date">2 липня 2016</p>
								<p class="black">Відгук про клієнта <a href="#" class="link-blue">Оксана</a></p>
							</div>
							<div class="left">
							</div>

							<div class="right">
								<div class="date">2 липня 2016</div>
								<span class="stars">4</span>
								<div class="message">
									В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.
								</div>

								<div class="collapse" id="collapse_client_01">

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

									<div class="v-indent-20 top-10">
										<a href="#collapse_client_01" class="link-blue pull-left" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_client_01" opened="Приховати" closed="Показати все" /></a>
									</div>



									<div class="collapse your-message" id="collapse_your_answer_client_01">
										<form action="#client-01">
											<textarea name="message" id="" placeholder="Ваша відповідь"></textarea>
											<button class="link-red-dark" type="submit"><i class="fo fo-plane fo-2x"></i></button>
										</form>
									</div>

								<hr>
								<a href="#collapse_your_answer_client_01" class="your-message-link pull-right"  data-toggle="collapse" aria-expanded="false" aria-controls="collapse_your_answer_client_01" opened="Відмінити" closed="Відповісти" /></a>

							</div>
							<div class="image">
								<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
							</div>
						</li>

					</ul>
				</div>


				<div class="paginate">
					<ul class="pagination grey">
						<li><a href="#" rel="prev"><</a></li>
						<li class="active"><a href="#">1</a></li>
						<li><a href="#">2</a></li>
						<li><a href="#" rel="next">></a></li>
					</ul>
				</div>

			</div>
		</div>


	</div>
</div>

@stop

@section('scripts')
<script>
$( function() {
	$("#sorting").selectmenu({
		change: function( e, ui ) {
			var filter = $("#sorting").val();
			{{-- Отсюда можна отсылать фильтр выпадайки --}}
			console.log(filter);
		}
	});

	$(document).tooltip(
			{position: {my: "left top+10"}}
		);
});
</script>
@stop