@extends('frontend.layouts.profile')

@section('content')
	<h5 class="text-upper underline-red">Каталог страв ({{ $products->count() }})</h5>
	<hr class="zerro-top">
	<a href="{{ route('profile.products.create', Auth::id()) }}" class="button button-red button-big">Додати страву до каталогу</a>
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
	@if (count($products) > 0)
		@foreach ($products as $product)
			<div class="wide-thumb">
				<div class="row">
					<div class="col-md-4">
						<div class="image">
							<img src="{{ asset($product->thumbnail) }}" class="img-responsive" alt="{{ $product->name }}">
						</div>
					</div>
					<div class="col-md-5">
						<div class="caption">
							<a href="{{ route('profile.products.show', $product->id) }}" class="title link-black">{{ $product->name }}</a>
							<p><span class="rating"><span class="stars">{{rand(0,5)}}</span>10 відгуків</span></p>
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
							<a href="{{ route('profile.products.edit', $product->id) }}" class="button-half link-blue"><i class="fo fo-edit fo-small"></i> Редагувати</a>
							<a href="#" class="button-half link-grey js-modal-product-delete" data-toggle="modal" data-target="#modal_product-delete" data-product-id="{{ $product->id }}"><i class="fo fo-delete fo-small"></i> Видалити</a>
						</div>
					</div>
				</div>
			</div>
		@endforeach

		{{ $products->links() }}
	@else
		<div class="v-indent-40"></div>
		<div class="empty-block">
			<i class="fo fo-dish-search fo-2x"></i>
			<p class="text">У вас немає страв</p>
			<a href="{{ route('profile.products.create', Auth::id()) }}" class="button button-red button-big">Додати страву до каталогу</a>
		</div>
	@endif

	<div id="modal_product-delete" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content text-center">
				<div class="modal-header">
					<a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
					<h2>Ваше блюдо буде видалено!</h2>
				</div>
				<div class="modal-body">
					<button class="button button-grey" type="button" data-dismiss="modal">Повернутися</button>
					<button class="button button-red js-product-delete" type="button">ПІДТВЕРДИТИ</button>
				</div>
			</div>
		</div>
	</div>
@stop


@push('scripts')
	<script type="text/javascript">
        var id = null;

        $('.js-modal-product-delete').on('click', function() {
			id = $(this).data('product-id');
        });

		$('.js-product-delete').on('click', function(e) {
			e.preventDefault();

			if (id) {
                $.ajax({
                    url: '{{ url('profile/products') }}/' + id,
                    method: 'post',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        '_method': 'delete'
                    },
					beforeSend: function() {
                        $('.body-overlay').addClass('active');
                    },
                    success: function (data) {
						if (data['success']) {
						    location = window.location;
						}
                    }
                });
            }
        });

		$("#sorting").selectmenu({
			change: function( e, ui ) {
				var filter = $("#sorting").val();
				{{-- Отсюда можна отсылать фильтр выпадайки --}}
				console.log(filter);
			}
		});
	</script>
@endpush