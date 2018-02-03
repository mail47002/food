@extends('frontend.layouts.default')

@include('frontend.includes.nav')
@section('title')Adverts - @stop

@section('content')
	<div class="bg-yellow">
		<div class="filter-block">
			<div class="container">

				{{ Form::open(['route' => 'adverts.index', 'method' => 'get', 'class' => 'search']) }}
					{{ Form::text('search', null, ['placeholder' => 'Пошук']) }}
					{{ Form::submit('') }}
				{{ Form::close() }}

				<hr>
				<div class="address text-center">
					<i class="fo fo-big fo-marker red"></i>Соборна, буд. 10/2, Вінниця
					<a href="#" class="link-blue" data-toggle="modal" data-target="#modal_change_address">Змінити регіон</a>

					<div class="slider-distance">
						<label for="distance">Радіус: </label><input type="text" id="distance" readonly />
						<div id="slider"></div>
					</div>
				</div>
				<hr>
				<ul class="buttons list-inline text-center js-filter-category">
					@foreach ($categories as $category)
						<li><a href="javascript:void(0);" class="button {{ in_array($category->id, $filter['cid']) ? 'active' : '' }}" data-id="{{ $category->id }}">{{ $category->name }}</a></li>
					@endforeach
				</ul>
				<hr>
			</div>
			<ul class="categories list-inline text-center">
				<li class="{{ Helper::isAdvertByDate() ? 'active' : '' }}"><a href="{{ route('adverts.index', ['type' => 'by_date']) }}" class="link-red text-upper">Меню по датам</a></li>
				<li class="{{ Helper::isAdvertInStock() ? 'active' : '' }}"><a href="{{ route('adverts.index', ['type' => 'in_stock']) }}" class="link-red text-upper">Готові страви</a></li>
				<li class="{{ Helper::isAdvertPreOrder() ? 'active' : '' }}"><a href="{{ route('adverts.index', ['type' => 'pre_order']) }}" class="link-red text-upper">Страви під замовлення</a></li>
			</ul>
			<hr class="red-border">
		</div>

		<div class="tab-content">
			<div class="tab-pane fade in active">
				@if(Helper::isAdvertByDate())
					<div class="filter-block">
						<div class="filter-inputs container">
							<div class="row">
								<div class="col-md-3">
									<input type="text" name="date" class="datepicker full-width" value="{{ request()->get('date') }}" placeholder="Дата">
								</div>
								<div class="checkboxes col-md-6">
									<input type="checkbox" id="breakfast" name="time" value="breakfast" {{ in_array('breakfast', $filter['time']) ? 'checked' : '' }}>
									<label for="breakfast">Сніданок (до 12:00)</label>

									<input type="checkbox" id="dinner" name="time" value="dinner" {{ in_array('dinner', $filter['time']) ? 'checked' : '' }}>
									<label for="dinner">Обід (12:00 - 16:00)</label>

									<input type="checkbox" id="supper" name="time" value="supper" {{ in_array('supper', $filter['time']) ? 'checked' : '' }}>
									<label for="supper">Вечеря (після 16:00)</label>
								</div>
								<div class="col-md-3">
									@include('frontend.includes.sort_order')
								</div>
							</div>

							<div class="row">
								@include('frontend.includes.price_range')
							</div>
						</div>
					</div>
				@endif

				@if(Helper::isAdvertInStock())
					<div class="filter-block">
						<div class="filter-inputs container">
							<div class="row">
								<div class="col-md-9">
									@include('frontend.includes.price_range')
								</div>
								<div class="col-md-3">
									@include('frontend.includes.sort_order')
								</div>
							</div>
						</div>
					</div>
				@endif

				@if(Helper::isAdvertPreOrder())
					<div class="filter-block">
						<div class="filter-inputs container">
							<div class="row">
								<div class="col-md-9">
									@include('frontend.includes.price_range')
								</div>
								<div class="col-md-3">
									@include('frontend.includes.sort_order')
								</div>
							</div>
						</div>
					</div>
				@endif

				@if(count($adverts) > 0)
					<div class="container">
						<div class="row">
							@each('frontend.adverts.item', $adverts, 'advert')
						</div>
					</div>


					<div class="bottom-block text-right">
						{{ $adverts->appends(request()->all())->links() }}
						<a href="#wrapper" class="btn-top"></a> <!-- Важно!! - не переносить!!! -->
					</div>
				@else
					No data!
				@endif

			</div>
		</div>
	</div>

	<!-- Modal Address -->
	<div id="modal_change_address" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content text-center">
				<div class="modal-header">
					<a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
					<h4 class="modal-title">Змінити регіон</h4>
				</div>
				<div class="modal-body">
					<p><input type="checkbox" id="ukraine" checked="checked"><label for="ukraine">Уся Україна</label></p>
					<p>Населений пункт</p>
					<p>
						<select class="address full-width">
							@foreach($cities as $city)
								<option value="{{ $city->id }}">{{ $city->name }}</option>
							@endforeach
						</select>
					</p>
					<div class="row">
						<div class="col-md-7">
							<p>Вулиця</p>
							<input class="" type="text" placeholder="Соборна">
						</div>
						<div class="col-md-5">
							<p>№ будинку</p>
							<input class="" type="text" placeholder="30">
						</div>
					</div>
					<p></p>
					<a href="#" class="button button-red">Застосувати</a>
				</div>
			</div>

		</div>
	</div>

	@include('frontend.adverts.order');
@stop

@push('scripts')
	<script>
		$( function() {
			$("#slider").slider({
				orientation: "horizontal",
				range: "min",
				value:5,
				min: 0,
				max: 50,
				step: 1,
				slide: function(event, ui) {
					if (ui.value < 5) return false; // restrict 0 - 5 km
					$("#distance").val(ui.value + " км");
				}
			});

			$("#distance").val($("#slider").slider("value") + " км");

			$(".sorting").selectmenu({
				change: function( e, ui ) {
					var filter = $("#sorting").val();
					{{-- Отсюда можна отсылать фильтр выпадайки --}}
					console.log(filter);
				}
			});

			$(".datepicker").datepicker({
				dateFormat: "dd.mm.yy"
			});

			$(document).tooltip(
					{position: {my: "left top+10"}}
				);
		});
	</script>
	<script>
		var filter = {
		    options: {
				type: '{{ request()->get('type', 'by_date') }}',
                cid: [],
				price_from: '',
				price_to: '',
				date: '',
				time: []
			},
			init: function () {
		        // Categories filter
                $('.js-filter-category').on('click', 'a', function (e) {
                    e.preventDefault();

                    $(this).toggleClass('active');

                    $('.js-filter-category li').each(function (i, el) {
                        if ($(el).children('.button').hasClass('active')) {
                            filter.options.cid.push($(el).children('.button').data('id'));
                        }
                    });

                    filter.filtering();
                });

                // Other filters
				$('.js-btn-filter').on('click', function (e) {
					e.preventDefault();

					var el = $(this).closest('.filter-block');

					if (filter.options.type == 'by_date') {
					    filter.options.date = el.find('input[name="date"]').val();

                        filter.options.time = [];

					    el.find('input[name="time"]:checked').each(function (i, item) {
							filter.options.time.push($(item).val());
                        });
					}

					filter.options.price_from = el.find('input[name="price_from"]').val();
                    filter.options.price_to = el.find('input[name="price_to"]').val();

					filter.filtering();
                })
            },
			filtering: function () {
		        var url = '{{ url('') }}/';

		        for (i in filter.options) {
		            url += (i == 'type') ? '?' : '&';
		            url += i + '=' + filter.options[i];
				}

                location = url;
            }
		};

		filter.init();
	</script>
@endpush