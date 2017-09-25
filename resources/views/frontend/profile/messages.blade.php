@extends('frontend.layouts.default')
@section('title')Messages - @stop
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
					<li><a href="/profile/messages"  class="active">Мої повідомлення</a></li>
					<li><a href="/profile/orders">Мої замовлення</a></li>
					<li><a href="/profile/reviews">Мої відгуки</a></li>
					<li><a href="/profile/articles">Мої статті</a></li>
				</ul>

			</div>
		</div>

		<div class="col-md-9">
			<h5 class="text-upper underline-red">Мої повідомлення</h5><hr class="zerro-top">

			<div class="filter-block">
				<ul class="categories list-inline text-center">
					<li class="active"><a data-toggle="tab" href="#notice" class="link-red text-upper">Повідомлення</a></li>
					<li><a data-toggle="tab" href="#messages" class="link-red text-upper">Переписка</a></li>
				</ul>
				<hr class="red-border">
			</div>

			<div class="v-indent-20"></div>

			<div class="tab-content">
				<div id="notice" class="tab-pane fade in active">

			<div class="wide-thumb profile-messages email">
				<div class="left">
					<div class="title">Лист від <a href="/profile/#" class="link-blue">Вікторії</a></div>
					<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
					<div class="message">
						<p>В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховата, но...</p>
					</div>

				</div>
				<div class="right left-border">
					<p class="date">10:15 2 липня 2016</p>
					<a href="#" class="button button-blue-medium"><i class="fo fo-back"></i> Відповісти</a>
				</div>
			</div>

			<div class="wide-thumb profile-messages phone">
				<div class="left with-image">

					<div class="title">Повідомлення від <a href="/profile/#" class="link-blue">Вікторії</a></div>
					<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
					<div class="message">
						<p>Зателефонуйте, будь ласка, по номеру +3 (096) 125 45 78 Я хочу замовити страву <a href="#" class="link-blue">М'ясне рагу з овочами</a> </p>
					</div>

					<div class="image hidden-xs"><img src="/uploads/food2.jpg" alt=""></div>
				</div>
				<div class="right left-border">
					<p class="date">10:15 2 липня 2016</p>
				</div>
			</div>

			<div class="wide-thumb profile-messages clients">
				<div class="left with-image">
					<div class="title">Вам зробила замовлення <a href="/profile/#" class="link-blue">Марія</a> на страву з меню</div>
					<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
					<div class="message">
						<p><a href="#" class="link-blue">М'ясне рагу з овочами</a> </p>
						<p><i class="fo fo-time red"></i>15 грудня (обід) <span class="price">80 грн.</span></p>
					</div>

					<div class="image hidden-xs"><img src="/uploads/food2.jpg" alt=""></div>
				</div>
				<div class="right left-border">
					<p class="date">10:15 2 липня 2016</p>
					<a href="#" class="button button-orange"><i class="fo fo-ok"></i> Підтвердити</a>
				</div>
			</div>

			<div class="wide-thumb profile-messages order">
				<div class="left with-image">
					<div class="title">Повар <a href="/profile/#" class="link-blue">Оксана</a> відмовила на замовленняя</div>
					<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
					<div class="message">
						<p><a href="#" class="link-blue">М'ясне рагу з овочами</a> </p>
						<p><i class="fo fo-time red"></i>15 грудня (обід) <span class="price">80 грн.</span></p>
					</div>

					<div class="image hidden-xs"><img src="/uploads/food2.jpg" alt=""></div>
				</div>
				<div class="right left-border">
					<p class="date">10:15 2 липня 2016</p>
				</div>
			</div>

			<div class="wide-thumb profile-messages order-discard">
				<div class="left with-image">
					<div class="title">Повар <a href="/profile/#" class="link-blue">Оксана</a> відмовила на замовленняя</div>
					<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
					<div class="message">
						<p><a href="#" class="link-blue">М'ясне рагу з овочами</a> </p>
						<p><i class="fo fo-time red"></i>15 грудня (обід) <span class="price">80 грн.</span></p>
					</div>

					<div class="image hidden-xs"><img src="/uploads/food2.jpg" alt=""></div>
				</div>
				<div class="right left-border">
					<p class="date">10:15 2 липня 2016</p>
					<a href="#" class="button button-red"><i class="fo fo-close-bold fo-small"></i> Підтвердити</a>
				</div>
			</div>

			<div class="wide-thumb profile-messages review">
				<div class="left with-image">
					<div class="title">Повар <a href="/profile/#" class="link-blue">Оксана</a> відповіла на ваш відгук про страву</div>
					<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
					<div class="message">
						<p><a href="#" class="link-blue">М'ясне рагу з овочами</a> </p>
						<p class="rating"><span class="stars">{{rand(0,5)}}</span></p>
						<p>В принципе вкусно,если сделать для одного раза,а так: гарнир...</p>
					</div>

					<div class="image hidden-xs"><img src="/uploads/food2.jpg" alt=""></div>
				</div>
				<div class="right left-border">
					<p class="date">10:15 2 липня 2016</p>
					<a href="#" class="button button-green"><i class="fo fo-message"></i> Відповісти</a>
				</div>
			</div>

			<div class="wide-thumb profile-messages deleted">
				<div class="left with-image">
					<div class="title">Ваше оголошення видалено</div>
					<div class="message">
						<p><a href="#" class="link-grey">М'ясне рагу з овочами</a> </p>
						<p><i class="fo fo-time red"></i>15 грудня (обід) <span class="price">80 грн.</span></p>
					</div>

					<div class="image hidden-xs"><img src="/uploads/food2.jpg" alt=""></div>
				</div>
				<div class="right left-border">
					<p class="date">10:15 2 липня 2016</p>
				</div>
			</div>





			</div>
			<div id="messages" class="tab-pane fade">

				<a class="wide-thumb profile-letters unread" href="#">
					<object><a href="#" class="delete"><i class="fo fo-delete fo-small"></i></a></object>
					<div class="avatar-title"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
					<div class="col">
						<div class="title">
							<object><a href="#" class="link-blue">Іван</a></object>
							<span class="date">10:15 2 липня 2016</span>
						</div>
						<div class="message">
							<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
							<p>В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховата, но... впечатление от блюда осталось приятное! для разнообразия... приготовить можно).</p>
						</div>
					</div>
				</a>

				<a class="wide-thumb profile-letters read" href="#">
					<object><a href="#" class="delete"><i class="fo fo-delete fo-small"></i></a></object>
					<div class="avatar-title"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
					<div class="col">
						<div class="title">
							<object><a href="#" class="link-blue">Іван</a></object>
							<span class="date">10:15 2 липня 2016</span>
						</div>
						<div class="message">
							<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
							<p>В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховата, но... впечатление от блюда осталось приятное! для разнообразия... приготовить можно).</p>
						</div>
					</div>
				</a>

				<a class="wide-thumb profile-letters read" href="#">
					<object><a href="#" class="delete"><i class="fo fo-delete fo-small"></i></a></object>
					<div class="avatar-title"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
					<div class="col">
						<div class="title">
							<object><a href="#" class="link-blue">Іван</a></object>
							<span class="date">10:15 2 липня 2016</span>
						</div>
						<div class="message">
							<p>В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховата, но... впечатление от блюда осталось приятное! для разнообразия... приготовить можно).</p>
						</div>
					</div>
				</a>

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