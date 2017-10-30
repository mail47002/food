<nav class="navbar">
	<div class="menu">
		<div class="dropdown">
			<a id="total-menu" class="dropdown-toggle fo fo-menu" href="#" type="button" data-toggle="dropdown"></a>
			<ul class="dropdown-menu" role="menu" aria-labelledby="total-menu">
				<li class="hidden-md hidden-lg"><a href="/" class="logo link">Logo</a></li>
				<li><a href="{{ url('pro-proekt') }}">Про проект</a></li>
				<li><a href="{{ url('faqs') }}">Допомога</a></li>
				<li><a href="{{ url('pravila') }}">Правила</a></li>
				<li><a href="{{ url('umovi-ta-konfidentsiynist') }}">Уммови та конфіденційність</a></li>
				<li><a href="{{ url('feedback') }}">Зворотній зв'язок</a></li>
				<li><a href="#">Карта сайту</a></li>
<hr>
				<li class="active"><a href="/temp/user.index">user_page (4.1)</a></li>
<hr>
				<li class="active"><a href="/temp/profile.writemessage">profile.writemessage (5.4.4)</a></li>
				{{-- <li class="active"><a href="/temp/profile.mydish">food_my_dish (21.1)</a></li> --}}
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
				<li class="active"><a href="/temp/temp.food_write_review_620">food_write_review_620 (6.2.0)</a></li>
				<li class="active"><a href="/temp/temp.food_write_review_621">food_write_review_621 (6.2.1)</a></li>
				<li class="active"><a href="/temp/temp.food_write_review_626">food_write_review_626 (6.2.6)</a></li>
				<li class="active"><a href="/temp/temp.404">404</a></li>
<br>
<br>
<br>
<br>


			</ul>
		</div>
	</div>
	<div class="container">
		<ul class="list-inline pull-left">
			<li class="hidden-xm"><a href="/" class="logo link">Logo</a></li>
			<li><a href="#" class="button button-white button-rounded"><i class="fo fo-dish-search fo-indent"></i>Знайти страву</a></li>
			<li class="btn-articles hidden-xm">
				<a href="#" class="button button-rounded"><i class="fo fo-book fo-indent"></i>Статті<i class="angle-down"></i></a>
				<ul class="hover">
					<li><a href="#"><i class="fo fo-dish fo-indent"></i>Рецепти</a></li>
					<li><a href="#"><i class="fo fo-articles fo-indent"></i>Поради</a></li>
				</ul>
			</li>
		</ul>
		<ul class="list-inline pull-right">
			@if (Auth::check())
				<li class="hidden-xm"><a href="{{ route('profile.products.create') }}" class="button button-rounded dish-add"><i class="fo fo-hat fo-indent"></i>Додати страву</a></li>
				<li class="hidden-xm">
					<div class="avatar">
						<div class="rounded"><img src="{{ asset(Auth::user()->image) }}" alt="{{ Auth::user()->name }}"></div>
					</div>
					<a href="{{ route('profile.user.show', Auth::id()) }}" class="link">{{ Auth::user()->name }}</a>
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
				<li class="hidden-xm"><a href="{{ url('logout') }}" class="link"><i class="fo fo-exit fo-small"></i></a></li>
			@else
				<li class="hidden-xm"><a href="#" class="button button-rounded dish-add" data-toggle="modal" data-target="#modal_login"><i class="fo fo-hat fo-indent"></i>Додати страву</a></li>
				<li class="hidden-xm"><a class="link" href="{{ url('login') }}">Вхід</a></li>
				<li class="hidden-xm"><a class="link" href="{{ url('register') }}">Реєстрація</a></li>
			@endif

{{-- правое меню на мобильном --}}
			<li class="profile-dropdown hidden-md hidden-lg">

				<a class="link" href="#" data-toggle="collapse" data-target="#profile-menu" aria-expanded="false"><i class="fo fo-man fo-small"></i></a>

				<ul id="profile-menu" class="profile-menu collapse">
					<li class="head-link"><a href="#" class="button button-rounded button-red"><i class="fo fo-hat fo-indent"></i>Додати страву</a></li>

					@if(Auth::check())
						<li><a href="#">Про мене</a></li>
						<li><a href="#">Відгуки</a></li>
						<li><a href="#">Каталог страв</a></li>
						<li><a href="#">Оголошення</a></li>

						<li class="dropdown">
							<a href="#" class="carret" data-toggle="collapse" data-target="#profile-menu-messages" aria-expanded="false">Мої повідомлення</a>
							<ul id="profile-menu-messages" class="collapse">
								<li><a href="#" class="grey3">Повідомлення</a></li>
								<li><a href="#" class="grey3">Переписка</a></li>
							</ul>
						</li>

						<li><a href="#">Мої замовлення</a></li>
						<li><a href="#">Мої відгуки</a></li>
						<li><a href="#">Мої статті</a></li>
						<li class="no-border"><a href="#" class="grey3">Редагувати профіль</a></li>
						<li class="no-border"><a href="#" class="grey3">Вийти <i class="fo fo-exit fo-small"></i></a></li>
					@else

						<li class="no-border head-link"><a href="/login" class="button button-rounded">Увійти</a></li>
						<li class="head-link"><a href="/registration" class="button button-rounded">Зареєструватися</a></li>
						<li class="social-head">Вхід через соцмережі</li>
						<li class="social"><a href="#" class="login google">Google</a></li>
						<li class="social"><a href="#" class="login facebook">Facebook</a></li>
						<li class="social"><a href="#" class="login twitter">Twitter</a></li>

					@endif


				</ul>

			</li>
		</ul>
	</div>
</nav>