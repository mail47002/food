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