@extends('frontend.layouts.default')
@section('title')Articles - @stop
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
					<li><a href="/profile/reviews">Мої відгуки</a></li>
					<li><a href="/profile/articles" class="active">Мої статті</a></li>
				</ul>

			</div>
		</div>

		<div class="col-md-9">
			<h5 class="text-upper underline-red">Мої статті</h5><hr class="zerro-top">
			<div class="row text-center">
				<div class="col-md-6">
					<a href="#" class="button button-red button-big inline"><i class="fo fo-dish"></i> Новий рецепт</a>
				</div>
				<div class="col-md-6">
					<a href="/articles/new" class="button button-red button-big inline"><i class="fo fo-articles"></i> Нова порада</a>
				</div>
			</div>

			<div class="v-indent-30"></div>
{{-- 			<hr>
			<div class="bg-yellow">
				<div class="row">
					<div class="col-md-6">
						<form action="#" class="search" method="get">
							<input type="text" name="search" placeholder="Пошук">
							<button type="submit" class="btn-search"><i class="fo fo-search fo-small"></i></button>
						</form>
					</div>
					<div class="col-md-6">
						<select name="sorting" id="sorting">
							<option value="all">Всі статі</option>
							<option value="1">Рецепти</option>
							<option value="2">Поради</option>
						</select>
					</div>
				</div>
			</div> --}}

			<div class="filter-block">
				<ul class="categories list-inline text-center">
					<li class="active"><a  data-toggle="tab" href="#recipes" class="link-red text-upper">Рецепти</a></li>
					<li><a  data-toggle="tab" href="#advice" class="link-red text-upper">Поради</a></li>
				</ul>
				<hr class="red-border">
			</div>

			<div class="v-indent-30"></div>

			<div class="tab-content">
				<div id="recipes" class="tab-pane fade in active">

					<form action="#" class="search margin-zerro wide" method="get">
						<input type="text" name="search" placeholder="Пошук">
						<button type="submit" class="btn-search"><i class="fo fo-search"></i></button>
					</form>
					<div class="v-indent-30"></div>

					<div class="wide-thumb profile-article">
						<div class="row">
							<div class="col-md-4">
								<div class="image">
									<img src="/uploads/article1.jpg" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-8">
								<div class="caption">
									<a href="/adverts/1" class="title link-black">Блинные роллы с бананами и шоколадно-ореховой пастой </a>
									<p>
										Так приятно начать неспешное воскресное утро со вкусных блинчиков и чашки чая.
									</p>

									<div class="bottom">
										<a href="#" class="button-filter">Закуски</a>
										<a href="#" class="button-filter">Десерти і торти</a>

										<div class="v-indent-20"></div><hr>
										<p>
											<span class="black">15 грудня 2016</span>
											<a href="#" class="link-blue"><i class="fo fo-message fo-small"></i> 12 коментарів</a>
											<a href="#" class="pull-right link-blue"><i class="fo fo-edit fo-small"></i> Редагувати</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>


				</div>
				<div id="advice" class="tab-pane fade">

					<form action="#" class="search margin-zerro wide" method="get">
						<input type="text" name="search" placeholder="Пошук">
						<button type="submit" class="btn-search"><i class="fo fo-search"></i></button>
					</form>
					<div class="v-indent-30"></div>

					<div class="wide-thumb profile-article">
						<div class="row">
							<div class="col-md-4">
								<div class="image">
									<img src="/uploads/article2.jpg" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-8">
								<div class="caption">
									<a href="/adverts/1" class="title link-black">Япония: что привезти и что попробовать</a>
									<p>
										Визит в Страну восходящего солнца – это шок и восторг одновременно. Наши журналисты побывали на западе страны – в регионе Кансай, увидели храмы Киото, олений заповедник древней столицы Нара, встретились со шпионами ниндзя, ныряльщицами Ама и овладели местным искусством без сожаления спустить все деньги на еду в осакском квартале Дотомбори.
									</p>

									<div class="bottom">
										<div class="v-indent-20"></div><hr>
										<p>
											<span class="black">15 грудня 2016</span>
											<a href="#" class="link-blue"><i class="fo fo-message fo-small"></i> 12 коментарів</a>
											<a href="#" class="pull-right link-blue"><i class="fo fo-edit fo-small"></i> Редагувати</a>
										</p>
									</div>
								</div>
							</div>
						</div>
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