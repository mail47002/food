<nav class="navbar">
	<div class="menu">
		<div class="dropdown">
			<a id="total-menu" class="dropdown-toggle fo fo-menu" href="#" type="button" data-toggle="dropdown"></a>
			<ul class="dropdown-menu" role="menu" aria-labelledby="total-menu">
				<li><a href="{{ url('pro-proekt') }}">Про проект</a></li>
				<li><a href="{{ url('faqs') }}">Допомога</a></li>
				<li><a href="{{ url('pravila') }}">Правила</a></li>
				<li><a href="{{ url('umovi-ta-konfidentsiynist') }}">Уммови та конфіденційність</a></li>
				<li><a href="{{ url('zvorotniy-zvyazok') }}">Зворотній зв'язок</a></li>
				<li><a href="#">Карта сайту</a></li>

				<br><br>

				<li class="active"><a href="/adverts">Об'яви (2)</a></li>
				<li class="active"><a href="/products">Блюда (12)</a></li>
				<li class="active"><a href="/profile">Profile (5)</a></li>
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
			<li><a class="link" href="{{ url('login') }}">Вхід</a></li>
			<li><a class="link" href="{{ url('register') }}">Реєстрація</a></li>
		</ul>
	</div>
</nav>