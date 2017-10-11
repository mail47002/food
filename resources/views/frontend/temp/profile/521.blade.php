@extends('frontend.layouts.profile')

@section('content')



			<h5 class="text-upper underline-red">Каталог страв (3)</h5><hr class="zerro-top">
			<a href="#" class="button button-red button-big">Додати страву до каталогу</a>
			<div class="v-indent-30"></div>

			<hr>
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
							<option value="all">Всі страви</option>
							<option value="1">Готові</option>
							<option value="2">У меню</option>
							<option value="3">Під замовлення</option>
						</select>
					</div>
				</div>
			</div>

			<div class="v-indent-20"></div>

			<div class="wide-thumb">
				<div class="row">
					<div class="col-md-4">
						<div class="image">
							<img src="/uploads/food1.jpg" class="img-responsive" alt="">
						</div>
					</div>
					<div class="col-md-5">
						<div class="caption">
							<a href="/adverts/1" class="title link-black">product</a>
							<p>
								<span class="rating">
									<span class="stars">{{rand(0,5)}}</span>10 відгуків
								</span>
							</p>
							<p><a href="#" class="link-red-dark"><i class="fo fo-time"></i> Страва у меню</a></p>
							<p><a href="#" class="link-red-dark"><i class="fo fo-dish-ready"></i> Готова страва</a></p>
							<p><a href="#" class="link-red-dark"><i class="fo fo-deal"></i> Страва під замовлення</a></p>
						</div>
					</div>
					<div class="col-md-3 left-border">
						<div class="caption text-center">
							<a href="#" class="button button-grey"><i class="fo fo-time"></i> Додати до меню</a>
							<a href="#" class="button button-grey disabled"><i class="fo fo-dish-ready"></i> Готова страва</a>
							<a href="#" class="button button-grey"><i class="fo fo-deal"></i> Під замовлення</a>
							<a href="#" class="button-half link-blue"><i class="fo fo-edit fo-small"></i> Редагувати</a>
							<a href="#" class="button-half link-grey"><i class="fo fo-delete fo-small"></i> Видалити</a>
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

			<div class="v-indent-40"></div>
			<div class="empty-block">
				<i class="fo fo-dish-search fo-2x"></i>
				<p class="text">У вас немає страв</p>
				<a href="#" class="button button-red button-big">Додати страву до меню</a>
			</div>


@endsection

@push('scripts')
<script>
$( function() {
	$("#sorting").selectmenu({
		change: function( e, ui ) {
			var filter = $("#sorting").val();
			{{-- Отсюда можна отсылать фильтр выпадайки --}}
			console.log(filter);
		}
	});
});
</script>
@endpush