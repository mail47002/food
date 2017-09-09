<nav class="navbar">
	<div class="menu">
		<div class="dropdown">
			<a id="total-menu" class="dropdown-toggle fo fo-menu" href="#" type="button" data-toggle="dropdown"></a>
			<ul class="dropdown-menu" role="menu" aria-labelledby="total-menu">
				<li><a href="{{ url('pro-proekt') }}">Про проект</a></li>
				<li><a href="{{ url('dopomoga') }}">Допомога</a></li>
				<li><a href="{{ url('pravila') }}">Правила</a></li>
				<li><a href="{{ url('umovi-ta-konfidentsiynist') }}">Уммови та конфіденційність</a></li>
				<li><a href="{{ url('zvorotniy-zvyazok') }}">Зворотній зв'язок</a></li>
				<li><a href="#">Карта сайту</a></li>

				<br><br>


				<li class="active"><a href="/adverts">Об'яви (2)</a></li>
				<li class="active"><a href="/products">Блюда (12)</a></li>
				<li class="active"><a href="/temp/add_recipe">add_recipe (15.1)</a></li>


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
			<li><a href="#" class="button button-rounded dish-add"><i class="fo fo-hat fo-indent"></i>Додати страву</a></li>
			@if(Auth::check())
			<li>
				<div class="avatar"><div class="rounded"><img src="/{{ Auth::user()->image }}" alt=""></div></div>
				<a href="/profile" class="link">{{ Auth::user()->name }}</a>
			</li>
			<li class="dropdown messages">
				<a id="messages-menu" class="link" href="#" type="button" data-toggle="dropdown"><i class="fo fo-bell fo-small"><span class="count">3</span></i></a>

				<div class="dropdown-menu" role="menu" aria-labelledby="messages-menu">
					<ul data-simplebar class="overflow">

						<li style="border-left: 5px solid #f00;">{{-- менять цвет --}}
							<a href="#">{{-- Ссылка на сообщение ? --}}
								<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
								<div class="message">
									<strong>Лист від <object><a href="/profile/#" class="link-blue">Вікторії</a></object></strong>
									{{-- Вложеные ссылки - только в <object> --}}
									<p>В принципе вкусно,если сделать для одного ....</p>
									<p class="date">10:15 2 липня 2016</p>
								</div>
							</a>
						</li>

						<li style="border-left: 5px solid #fa0;">
							<a href="#">{{-- Ссылка на сообщение ? --}}
								<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
								<div class="message">
									<strong>Лист від <object><a href="/profile/#" class="link-blue">Вікторії</a></object></strong>
									<p>В принципе вкусно,если сделать для одного ....</p>
									<p class="date">10:15 2 липня 2016</p>
								</div>
							</a>
						</li>

						<li style="border-left: 5px solid #f0a;">
							<a href="#">{{-- Ссылка на сообщение ? --}}
								<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
								<div class="message">
									<strong>Лист від <object><a href="/profile/#" class="link-blue">Вікторії</a></object></strong>
									<p>В принципе вкусно,если сделать для одного ....</p>
									<p class="date">10:15 2 липня 2016</p>
								</div>
							</a>
						</li>

						<li style="border-left: 5px solid #a00;">
							<a href="#">{{-- Ссылка на сообщение ? --}}
								<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
								<div class="message">
									<strong>Лист від <object><a href="/profile/#" class="link-blue">Вікторії</a></object></strong>
									<p>В принципе вкусно,если сделать для одного ....</p>
									<p class="date">10:15 2 липня 2016</p>
								</div>
							</a>
						</li>

						<li style="border-left: 5px solid #0f0;">
							<a href="#">{{-- Ссылка на сообщение ? --}}
								<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
								<div class="message">
									<strong>Лист від <object><a href="/profile/#" class="link-blue">Вікторії</a></object></strong>
									<p>В принципе вкусно,если сделать для одного ....</p>
									<p class="date">10:15 2 липня 2016</p>
								</div>
							</a>
						</li>

						<li style="border-left: 5px solid #0a0;">
							<a href="#">{{-- Ссылка на сообщение ? --}}
								<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
								<div class="message">
									<strong>Лист від <object><a href="/profile/#" class="link-blue">Вікторії</a></object></strong>
									<p>В принципе вкусно,если сделать для одного ....</p>
									<p class="date">10:15 2 липня 2016</p>
								</div>
							</a>
						</li>

						<li style="border-left: 5px solid #0b0;">
							<a href="#">{{-- Ссылка на сообщение ? --}}
								<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
								<div class="message">
									<strong>Лист від <object><a href="/profile/#" class="link-blue">Вікторії</a></object></strong>
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