@extends('frontend.layouts.default')
@section('title')Orders - @stop
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
					<li><a href="/profile/orders" class="active">Мої замовлення</a></li>
					<li><a href="/profile/reviews">Мої відгуки</a></li>
					<li><a href="/profile/articles">Мої статті</a></li>
				</ul>

			</div>
		</div>

		<div class="col-md-9">
			<h5 class="text-upper underline-red">Мої замовлення</h5><hr class="zerro-top">

			<div class="v-indent-20"></div>

			<div class="wide-thumb profile-orders">
				<div class="row">
					<div class="col-md-4">
						<div class="image"><img src="/uploads/food1.jpg" class="img-responsive" alt=""></div>
					</div>
					<div class="col-md-5">
						<div class="caption">
							<a href="/adverts/1" class="title link-black">М'ясне рагу з овочами</a>
							<span class="rating"><span class="stars">{{rand(0,5)}}</span>10 відгуків</span>

							<div class="grey-block grey3 wide">
								<p class="text-left"><a href="#" class="link-red"><i class="fo fo-time"></i> Страва у меню</a></p>
								<p class="text-left"><span class="price">80 грн.</span></p>
								<p class="text-left black">15 грудня (обід)</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 left-border">
						<div class="caption text-center">
							<div class="info-block red">
								Замовлення очікує на підтвердження!
							</div>
							<a href="#" class="button button-red v40">Підтвердити замовлення </a>
							<a href="#" class="link-red f14"><i class="fo fo-close-bold fo-small"></i> Відмінити </a>
						</div>
					</div>
				</div>
			</div>

			<div class="wide-thumb profile-orders">
				<div class="row">
					<div class="col-md-4">
						<div class="image"><img src="/uploads/food1.jpg" class="img-responsive" alt=""></div>
					</div>
					<div class="col-md-5">
						<div class="caption">
							<a href="/adverts/1" class="title link-black">М'ясне рагу з овочами</a>
							<span class="rating"><span class="stars">{{rand(0,5)}}</span>10 відгуків</span>
							<div class="grey-block grey3 wide">
								<p class="text-left"><a href="#" class="link-red"><i class="fo fo-dish-ready"></i> Готова страва</a></p>
								<p class="text-left"><span class="price">80 грн.</span></p>
								<p class="text-left black">10 - 15 грудня</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 left-border">
						<div class="caption text-center">
							<div class="info-block grey3">
								<i class="fo fo-sand fo-big"></i> 
								<p class="text">Ваше замовлення не підтверджено</p>
							</div>
							<a href="#" class="link-red f14"><i class="fo fo-close-bold fo-small"></i> Відмінити </a>
						</div>
					</div>
				</div>
			</div>

			<div class="wide-thumb profile-orders">
				<div class="row">
					<div class="col-md-4">
						<div class="image"><img src="/uploads/food1.jpg" class="img-responsive" alt=""></div>
					</div>
					<div class="col-md-5">
						<div class="caption">
							<a href="/adverts/1" class="title link-black">М'ясне рагу з овочами</a>
							<span class="rating"><span class="stars">{{rand(0,5)}}</span>10 відгуків</span>
							<div class="grey-block grey3 wide">
								<p class="text-left"><a href="#" class="link-red"><i class="fo fo-deal"></i> Страва під замовлення</a></p>
								<p class="text-left"><span class="price">80 грн.</span></p>
							</div>
						</div>
					</div>
					<div class="col-md-3 left-border">
						<div class="caption text-center">
							<div class="info-block green-light">
								<i class="fo fo-ok fo-big"></i> 
								<p class="text">Ви клієнт на страву</p>
							</div>
							<a href="#" class="button button-red v40"><i class="fo fo-message"></i> Залишити відгук</a>
						</div>
					</div>
				</div>
			</div>

			<div class="wide-thumb profile-orders">
				<div class="row">
					<div class="col-md-4">
						<div class="image"><img src="/uploads/food1.jpg" class="img-responsive" alt=""></div>
					</div>
					<div class="col-md-5">
						<div class="caption">
							<a href="/adverts/1" class="title link-black">М'ясне рагу з овочами</a>
							<span class="rating"><span class="stars">{{rand(0,5)}}</span>10 відгуків</span>
							<div class="grey-block grey3 wide">
								<i class="fo fo-serving fo-2x"></i> 
								<p class="text">Пропозиція закінчилася</p>
							</div>
						</div>
					</div>
					<div class="col-md-3 left-border">
						<div class="caption text-center">
							<div class="info-block red">
								<i class="fo fo-dish-search"></i> 
								<span class="red">0</span><span class="black">/5</span>
								<p class="text">Залишилося порцій</p>
							</div>
							<a href="#" class="button button-grey v40"><i class="fo fo-message"></i> Ваш відгук</a>
						</div>
					</div>
				</div>
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