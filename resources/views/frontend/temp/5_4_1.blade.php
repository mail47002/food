@extends('frontend.layouts.default')
@section('content')

<div class="container">
	<div class="row flex-md">
		<div class="col-md-3">
			<div class="left-sidebar bg-yellow text-center">

				<div class="avatar">
					<div class="rounded"><img src="http://lorempixel.com/212/212/" alt="foto"></div>
				</div>

				<div class="phones fo fo-phone fo-indent fo-left red">
					<div class="inline black">
							<p>000</p>
					</div>
				</div>

				<a href="#" class="button button-grey">Редагувати профіль</a>

				<ul class="menu">
					<li><a href="/profile">Про мене</a></li>
					<li><a href="/profile/products">Каталог страв</a></li>
					<li><a href="/profile/adverts">Оголошення </a></li>
					<li><a href="/profile/messages">Мої повідомлення <span class="badge">3</span></a></li>
					<li><a href="/profile/orders">Мої замовлення</a></li>
					<li><a href="/profile/reviews">Мої відгуки</a></li>
					<li><a href="/profile/articles" class="active">Мої статті</a></li>
				</ul>

			</div>
		</div>




		<div class="col-md-9">
			<h5 class="text-upper underline-red">Мої повідомлення</h5><hr class="zerro-top">

			<div class="filter-block">
				<ul class="categories list-inline text-center">
					<li><a href="#" class="link-red text-upper active">Повідомлення</a></li>
					<li><a href="#" class="link-red text-upper">Переписка</a></li>
				</ul>
				<hr class="red-border">
			</div>

			<div class="v-indent-20"></div>

			<div class="wide-thumb profile-messages email">
				<div class="left">
					<div class="title">Лист від <a href="/profile/#" class="link-blue">Вікторії</a></div>
					<div class="avatar"><div class="rounded"><img src="http://lorempixel.com/50/50/" alt="foto"></div></div>
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
					<div class="avatar"><div class="rounded"><img src="http://lorempixel.com/50/50/" alt="foto"></div></div>
					<div class="message">
						<p>Зателефонуйте, будь ласка, по номеру +3 (096) 125 45 78 Я хочу замовити страву <a href="#" class="link-blue">М'ясне рагу з овочами</a> </p>
					</div>

					<div class="image hidden-xs"><img src="http://lorempixel.com/133/90/" alt=""></div>
				</div>
				<div class="right left-border">
					<p class="date">10:15 2 липня 2016</p>
				</div>
			</div>

			<div class="wide-thumb profile-messages clients">
				<div class="left with-image">
					<div class="title">Вам зробила замовлення <a href="/profile/#" class="link-blue">Марія</a> на страву з меню</div>
					<div class="avatar"><div class="rounded"><img src="http://lorempixel.com/50/50/" alt="foto"></div></div>
					<div class="message">
						<p><a href="#" class="link-blue">М'ясне рагу з овочами</a> </p>
						<p><i class="fo fo-time red"></i>15 грудня (обід) <span class="price">80 грн.</span></p>
					</div>

					<div class="image hidden-xs"><img src="http://lorempixel.com/133/90/" alt=""></div>
				</div>
				<div class="right left-border">
					<p class="date">10:15 2 липня 2016</p>
					<a href="#" class="button button-orange"><i class="fo fo-ok"></i> Підтвердити</a>
				</div>
			</div>

			<div class="wide-thumb profile-messages order">
				<div class="left with-image">
					<div class="title">Повар <a href="/profile/#" class="link-blue">Оксана</a> відмовила на замовленняя</div>
					<div class="avatar"><div class="rounded"><img src="http://lorempixel.com/50/50/" alt="foto"></div></div>
					<div class="message">
						<p><a href="#" class="link-blue">М'ясне рагу з овочами</a> </p>
						<p><i class="fo fo-time red"></i>15 грудня (обід) <span class="price">80 грн.</span></p>
					</div>

					<div class="image hidden-xs"><img src="http://lorempixel.com/133/90/" alt=""></div>
				</div>
				<div class="right left-border">
					<p class="date">10:15 2 липня 2016</p>
				</div>
			</div>

			<div class="wide-thumb profile-messages order-discard">
				<div class="left with-image">
					<div class="title">Повар <a href="/profile/#" class="link-blue">Оксана</a> відмовила на замовленняя</div>
					<div class="avatar"><div class="rounded"><img src="http://lorempixel.com/50/50/" alt="foto"></div></div>
					<div class="message">
						<p><a href="#" class="link-blue">М'ясне рагу з овочами</a> </p>
						<p><i class="fo fo-time red"></i>15 грудня (обід) <span class="price">80 грн.</span></p>
					</div>

					<div class="image hidden-xs"><img src="http://lorempixel.com/133/90/" alt=""></div>
				</div>
				<div class="right left-border">
					<p class="date">10:15 2 липня 2016</p>
					<a href="#" class="button button-red"><i class="fo fo-close-bold fo-small"></i> Підтвердити</a>
				</div>
			</div>

			<div class="wide-thumb profile-messages review">
				<div class="left with-image">
					<div class="title">Повар <a href="/profile/#" class="link-blue">Оксана</a> відповіла на ваш відгук про страву</div>
					<div class="avatar"><div class="rounded"><img src="http://lorempixel.com/50/50/" alt="foto"></div></div>
					<div class="message">
						<p><a href="#" class="link-blue">М'ясне рагу з овочами</a> </p>
						<p class="rating"><span class="stars">{{rand(0,5)}}</span></p>
						<p>В принципе вкусно,если сделать для одного раза,а так: гарнир...</p>
					</div>

					<div class="image hidden-xs"><img src="http://lorempixel.com/133/90/" alt=""></div>
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

					<div class="image hidden-xs"><img src="http://lorempixel.com/133/90/" alt=""></div>
				</div>
				<div class="right left-border">
					<p class="date">10:15 2 липня 2016</p>
				</div>
			</div>


			<div class="wide-thumb profile-messages success">
				<div class="left with-image">
					<div class="title">Повар <a href="/profile/#" class="link-blue">Оксана</a> підтвердила ваше замовлення</div>
					<div class="avatar"><div class="rounded"><img src="http://lorempixel.com/50/50/" alt="foto"></div></div>
					<div class="message">
						<p><a href="#" class="link-blue">М'ясне рагу з овочами</a> </p>
						<p><i class="fo fo-time red"></i>15 грудня (обід) <span class="price">80 грн.</span></p>
					</div>

					<div class="image hidden-xs"><img src="http://lorempixel.com/133/90/" alt=""></div>
				</div>
				<div class="right left-border">
					<p class="date">10:15 2 липня 2016</p>
				</div>
			</div>


		</div>





	</div>
</div>

@stop
