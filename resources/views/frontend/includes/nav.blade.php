<nav class="navbar">
	<div class="menu">
		<div class="dropdown">
			<a id="total-menu" class="dropdown-toggle fo fo-menu" href="#" type="button" data-toggle="dropdown"></a>
			<ul class="dropdown-menu" role="menu" aria-labelledby="total-menu">
				<li class="hidden-md hidden-lg"><a href="/" class="logo link"><img src="/frontend/images/logo.svg" alt="Mealisha"></a></li>
				<li><a href="{{ url('page/pro-proekt') }}">Про проект</a></li>
				<li><a href="{{ url('page/faqs') }}">Допомога</a></li>
				<li><a href="{{ url('page/pravila') }}">Правила</a></li>
				<li><a href="{{ url('page/umovi-ta-konfidentsiynist') }}">Уммови та конфіденційність</a></li>
				<li><a href="{{ url('page/feedback') }}">Зворотній зв'язок</a></li>
				<li><a href="#">Карта сайту</a></li>
{{-- <hr>
				<li class="active"><a href="/temp/user.index">user_page (4.1)</a></li>
<hr>
				<li class="active"><a href="/temp/account.writemessage">account.writemessage (5.4.4)</a></li>
				<li class="active"><a href="/temp/account.mydish">food_my_dish (21.1)</a></li> 
				<li class="active"><a href="/temp/account.myproduct">food_my_product (21.2)</a></li>
				<li class="active"><a href="/temp/account.myrecipe">food_my_recipe (21.3)</a></li>
				<li class="active"><a href="/temp/account.myadvice">food_my_advice (21.4)</a></li>
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

 --}}
			</ul>
		</div>
	</div>
	<div class="container">
		<ul class="list-inline pull-left">
			<li class="hidden-xm"><a href="/" class="logo link"><img src="/frontend/images/logo.svg" alt="Mealisha"></a></li>
			<li><a href="#" class="button button-white button-rounded"><i class="fo fo-dish-search fo-indent"></i>Знайти страву</a></li>
			<li class="btn-articles hidden-xm">
				<a href="#" class="button button-rounded"><i class="fo fo-book fo-indent"></i>Статті<i class="angle-down"></i></a>
				<ul class="hover">
					<li><a href="/recipes"><i class="fo fo-dish fo-indent"></i>Рецепти</a></li>
					<li><a href="/advices"><i class="fo fo-articles fo-indent"></i>Поради</a></li>
				</ul>
			</li>
		</ul>
		<ul class="list-inline pull-right">
			@if (auth()->check())
				<li class="hidden-xm"><a href="{{ route('account.products.create') }}" class="button button-rounded dish-add"><i class="fo fo-hat fo-indent"></i>Додати страву</a></li>
                @if(auth()->user()->profile)
                    <li class="hidden-xm">
                        <div class="avatar">
                            <div class="rounded">
								<img src="{{ auth()->user()->getAvatar() }}" alt="{{ auth()->user()->profile->name }}">
							</div>
                        </div>
                        <a href="{{ route('account.user.show') }}" class="link">{{ auth()->user()->profile->first_name }}</a>
                    </li>
                @endif

               @if(!Request::is('myaccount/create'))

				@if(($unreadNotificationsCount = auth()->user()->unreadNotifications()->count()) > 0)
					<li class="dropdown messages">
						<a id="messages-menu" class="link" href="#" type="button" data-toggle="dropdown">
							<i class="fo fo-bell fo-small">
								<span class="count">{{ $unreadNotificationsCount }}</span>
							</i>
						</a>

						@if($unreadNotifications = auth()->user()->unreadNotifications()->take(5)->get())
							<div class="dropdown-menu" role="menu" aria-labelledby="messages-menu">
								<ul data-simplebar class="overflow">{{-- data-simplebar - прокрутка --}}
									@each('frontend.includes.notification', $unreadNotifications, 'notification')
								</ul>
								<div class="bottom">
									<a href="{{ route('account.notifications.index') }}" class="link-blue">Все</a>
								</div>
							</div>
						@endif
					</li>
				@else
					<li class="hidden-xm">
						<a href="{{ route('account.notifications.index') }}" class="link">
							<i class="fo fo-bell fo-small"></i>
						</a>
					</li>
				@endif

				<li><a href="#" onclick="wishlist.show()" class="link js-wishlist"><i class="fo fo-like fo-small"></i></a></li>

			@endif
				<li class="hidden-xm"><a href="{{ url('logout') }}" class="link"><i class="fo fo-exit fo-small"></i></a></li>

			@else
				<li class="hidden-xm"><a href="#" class="button button-rounded dish-add" data-toggle="modal" data-target="#modal_login"><i class="fo fo-hat fo-indent"></i>Додати страву</a></li>
				<li class="hidden-xm"><a class="link" href="{{ url('login') }}">Вхід</a></li>
				<li class="hidden-xm"><a class="link" href="{{ url('register') }}">Реєстрація</a></li>
			@endif

{{-- правое меню на мобильном --}}
			<li class="account-dropdown hidden-md hidden-lg">

				<a class="link" href="#" data-toggle="collapse" data-target="#account-menu" aria-expanded="false"><i class="fo fo-man fo-small"></i></a>

				<ul id="account-menu" class="account-menu collapse">
					<li class="head-link"><a href="#" class="button button-rounded button-red"><i class="fo fo-hat fo-indent"></i>Додати страву</a></li>

					@if(auth()->check())
						<li><a href="#">Про мене</a></li>
						<li><a href="#">Відгуки</a></li>
						<li><a href="#">Каталог страв</a></li>
						<li><a href="#">Оголошення</a></li>

						<li class="dropdown">
							<a href="#" class="carret" data-toggle="collapse" data-target="#account-menu-messages" aria-expanded="false">Мої повідомлення</a>
							<ul id="account-menu-messages" class="collapse">
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