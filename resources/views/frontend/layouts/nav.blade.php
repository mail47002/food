<nav class="navbar">
	<div class="menu">
		<div class="dropdown">
			<a id="total-menu" class="dropdown-toggle fo fo-menu" href="#" type="button" data-toggle="dropdown"></a>
			<ul class="dropdown-menu" role="menu" aria-labelledby="total-menu">
				<li><a href="{{ url('pro-proekt') }}">Про проект</a></li>
				<li><a href="{{ url('faqs') }}">Допомога</a></li>
				<li><a href="{{ url('pravila') }}">Правила</a></li>
				<li><a href="{{ url('umovi-ta-konfidentsiynist') }}">Уммови та конфіденційність</a></li>
				<li><a href="{{ url('feedback') }}">Зворотній зв'язок</a></li>
				<li><a href="#">Карта сайту</a></li>
<hr>
				<li class="active"><a href="/temp/user.index">user_page (4.1)</a></li>
<hr>
				<li class="active"><a href="/temp/profile.mydish">food_my_dish (21.1)</a></li>
				<li class="active"><a href="/temp/profile.myproduct">food_my_product (21.2)</a></li>
				<li class="active"><a href="/temp/profile.myrecipe">food_my_recipe (21.3)</a></li>
				<li class="active"><a href="/temp/profile.myadvice">food_my_advice (21.4)</a></li>
<hr>
				<li class="active"><a href="/adverts">Об'яви (2)</a></li>
				<li class="active"><a href="/products">Блюда (12)</a></li>
				<li class="active"><a href="/temp/temp.add_food">add_food (7.1)</a></li>
				<li class="active"><a href="/temp/temp.add_food_new_dish">add_food_new_dish (7.2)</a></li>
				<li class="active"><a href="/temp/temp.add_food_new_dish_2">add_food_new_dish (7.4.1)</a></li>
				<li class="active"><a href="/temp/temp.add_food_new_dish_742">add_food_new_dish (7.4.2)</a></li>
				<li class="active"><a href="/temp/temp.add_food_new_dish_75">add_food_new_dish (7.5)</a></li>
				<li class="active"><a href="/temp/temp.add_recipe">add_recipe (15.1)</a></li>


			</ul>
		</div>
	</div>
	<div class="container">
		<ul class="list-inline pull-left">
			<li><a href="/" class="logo link">Logo</a></li>
			<li><a href="#" class="button button-white button-rounded"><i class="fo fo-dish-search fo-indent"></i>Знайти страву</a></li>
			<li class="btn-articles">
				<a href="#" class="button button-rounded"><i class="fo fo-book fo-indent"></i>Статті<i class="angle-down"></i></a>
				<ul class="hover">
					<li><a href="#"><i class="fo fo-dish fo-indent"></i>Рецепти</a></li>
					<li><a href="#"><i class="fo fo-articles fo-indent"></i>Поради</a></li>
				</ul>
			</li>
		</ul>
		<ul class="list-inline pull-right">
			<li><a href="#" class="button button-rounded dish-add" data-toggle="modal" data-target="#modal_login"><i class="fo fo-hat fo-indent"></i>Додати страву</a></li>
			@if(Auth::check())
			<li>
				<div class="avatar"><div class="rounded"><img src="/{{ Auth::user()->image }}" alt=""></div></div>
				<a href="/profile" class="link">{{ Auth::user()->name }}</a>
			</li>
			<li class="dropdown messages">
				<a id="messages-menu" class="link" href="#" type="button" data-toggle="dropdown"><i class="fo fo-bell fo-small"><span class="count">3</span></i></a>

				<div class="dropdown-menu" role="menu" aria-labelledby="messages-menu">
					<ul data-simplebar class="overflow">{{-- data-simplebar - прокрутка --}}

						<li class="top-message email">{{-- менять цвет --}}
							<a href="#">{{-- Ссылка на сообщение ? --}}
								<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
								<div class="message">
									<strong><object>Лист від <a href="/profile/#" class="link-blue">Вікторії</a></object></strong>
									{{-- Вложеные ссылки - только в <object> --}}
									<p>В принципе вкусно,если сделать для одного ....</p>
									<p class="date">10:15 2 липня 2016</p>
								</div>
							</a>
						</li>

						<li class="top-message phone">
							<a href="#">{{-- Ссылка на сообщение ? --}}
								<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
								<div class="message">
									<strong><object>Повідомлення від <a href="/profile/#" class="link-blue">Вікторії</object></strong>
									<p>В принципе вкусно,если сделать для одного ....</p>
									<p class="date">10:15 2 липня 2016</p>
								</div>
							</a>
						</li>

						<li class="top-message clients">
							<a href="#">{{-- Ссылка на сообщение ? --}}
								<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
								<div class="message">
									<strong><object>Вам зробила замовлення <a href="/profile/#" class="link-blue">Марія</a> на страву з меню</object></strong>
									<p>В принципе вкусно,если сделать для одного ....</p>
									<p class="date">10:15 2 липня 2016</p>
								</div>
							</a>
						</li>

						<li class="top-message order">
							<a href="#">{{-- Ссылка на сообщение ? --}}
								<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
								<div class="message">
									<strong><object>Повар <a href="/profile/#" class="link-blue">Оксана</a> відмовила на замовленняя</object></strong>
									<p>В принципе вкусно,если сделать для одного ....</p>
									<p class="date">10:15 2 липня 2016</p>
								</div>
							</a>
						</li>

						<li class="top-message review">
							<a href="#">{{-- Ссылка на сообщение ? --}}
								<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
								<div class="message">
									<strong><object>Повар <a href="/profile/#" class="link-blue">Оксана</a> відповіла на ваш відгук про страву</object></strong>
									<p>В принципе вкусно,если сделать для одного ....</p>
									<p class="date">10:15 2 липня 2016</p>
								</div>
							</a>
						</li>

						<li class="top-message deleted">
							<a href="#">{{-- Ссылка на сообщение ? --}}
								<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
								<div class="message">
									<strong><object>Ваше оголошення видалено</object></strong>
									<p>В принципе вкусно,если сделать для одного ....</p>
									<p class="date">10:15 2 липня 2016</p>
								</div>
							</a>
						</li>

					</ul>
					<div class="bottom"><a href="/profile/messages" class="link-blue">Все</a></div>
				</div>
			</li>

			<li><a href="#" class="link" data-toggle="modal" data-target="#modal_likes"><i class="fo fo-like fo-small"></i></a></li>
			<li><a href="/logout" class="link"><i class="fo fo-exit fo-small"></i></a></li>
			@else
			<li><a class="link" href="/login">Вхід</a></li>
			<li><a class="link" href="/registration">Реєстрація</a></li>
			@endif
		</ul>
	</div>
</nav>