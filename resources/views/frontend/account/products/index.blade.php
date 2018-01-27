@extends('frontend.layouts.account')

@section('content')
	<h5 class="text-upper underline-red">Каталог страв ({{ $products->count() }})</h5>
	<hr class="zerro-top">
	<a href="{{ route('account.products.create') }}" class="button button-red button-big">Додати страву до каталогу</a>
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
		@each('frontend.account.products.item', $products, 'product')

		{{ $products->links() }}
	@else
		<div class="v-indent-40"></div>
		<div class="empty-block">
			<i class="fo fo-dish-search fo-2x"></i>
			<p class="text">У вас немає страв</p>
			<a href="{{ route('account.products.create') }}" class="button button-red button-big">Додати страву до каталогу</a>
		</div>
	@endif

	<div id="modal-product-delete" class="modal fade" role="dialog">
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
                    url: '{{ url('myaccount/products') }}/' + id,
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
                    },
                    complete: function() {
                        $('.body-overlay').removeClass('active');
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