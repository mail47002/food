@extends('frontend.layouts.default')

@section('title')Adverts - @stop

@section('content')
	<div class="bg-yellow">
		<div class="filter-block">
			<div class="container">
				@include('frontend.adverts.search')
				<hr>
				<div class="address text-center">
					<i class="fo fo-big fo-marker red"></i>
					<span class="js-filter-address">{{ $filter['address'] }}</span>


					<a href="#" class="link-blue" data-toggle="modal" data-target="#modal_change_address">Змінити регіон</a>

					<div class="slider-distance">
						<label for="distance">Радіус: </label>
						<input type="text" id="distance" readonly>
						<div id="slider"></div>
					</div>
				</div>
				<hr>
				@include('frontend.adverts.category')
				<hr>
			</div>
			@include('frontend.adverts.type')
			<hr class="red-border">
		</div>

		<div class="tab-content">
			<div class="tab-pane active">
				@include('frontend.adverts.filter')

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

	@include('frontend.includes.order')

	<!-- Modal Address -->
	<div id="modal_change_address" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content text-center">
				<div class="modal-header">
					<a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
					<h4 class="modal-title">Змінити регіон</h4>
				</div>
				<p class="modal-body contact">
				<p style="display: inline-block;">
					<input id="input-country" type="checkbox" {{ $filter['country'] == 1 ? 'checked' : '' }}><label for="input-country">Вся Україна</label>
				</p>

				{{--<p>Населений пункт</p>--}}
				{{--<div class="marker">--}}
				{{--<input id="city" type="text" placeholder="" class="wide">--}}
				{{--</div>--}}
				{{--<input id="city_id" name="city_id" type="hidden" value="">--}}

				{{--<div class="row text-left">--}}
				{{--<div class="col-md-offset-1 col-md-6">--}}
				{{--<p>Вулиця</p>--}}
				{{--<input id="street" class="" type="text" placeholder="Соборна">--}}
				{{--</div>--}}
				{{--<div class="col-md-3">--}}
				{{--<p>№ будинку</p>--}}
				{{--<input id="number" class="" type="text" placeholder="30">--}}
				{{--</div>--}}
				{{--</div>--}}


				<div class="form-group">
					{{ Form::label('city', 'Адреса*') }}
					<div class="marker wide">
						<input id="input-address" class="wide" type="text" name="address" value="{{ $filter['address'] }}" {{ $filter['country'] == 1 ? 'disabled' : '' }}>
						<input id="input-lat" type="hidden" name="lat" value="{{ $filter['location'][0] }}">
						<input id="input-lng" type="hidden" name="lng" value="{{ $filter['location'][1] }}">
					</div>
				</div>

				<div class="form-group">
					<p class="text-center f14 label-map" style="{{ !auth()->check() ? 'display: none;' : 'display: block;' }}">Введіть адресу<br>Якщо потрібно підкорегувати адресу, клікніть на мапі або перетягніть маркер</p>
				</div>
				{{-- <button id="correct">Виправити</button> --}}
				<div id="map" style="{{ !auth()->check() ? 'display: none;' : 'display: block;' }}"></div>


				<p></p>

				<button class="button button-red button-big " onclick="filter.filtering()">Застосувати</button>
			</div>
		</div>
	</div>
@stop

@include('frontend.includes.google_address')


@push('scripts')
	<script type="text/javascript">
		$( function() {
			$("#slider").slider({
				orientation: "horizontal",
				range: "min",
				value: {{ $filter['distance'] }},
				min: 0,
				max: 50,
				step: 1,
				slide: function(event, ui) {
					if (ui.value < 5) return false; // restrict 0 - 5 km

					filter.options.distance = ui.value;

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

        // Country & regions
        $('#input-country').on('change', function () {
            if ($(this).is(':checked')) {
                $('input[name="address"]').prop('disabled', true);
                $('.label-map').hide();
                $('#map').hide();
            } else {
                $('input[name="address"]').prop('disabled', false);
                $('.label-map').show();
                $('#map').show();
            }
        });

		var filter = {
		    options: {
				type: '{{ request()->get('type', 'by_date') }}',
				country: {{ $filter['country'] }},
                location: [
					{{ $filter['location'][0] }},
					{{ $filter['location'][1] }}
				],
				address: '{{ $filter['address'] }}',
                distance: {{ $filter['distance'] }},
                cid: [],
				price_from: '',
				price_to: '',
				date: '',
				time: []
			},
			init: function () {
		        // Location & radius

		        // Categories filter
                $('.js-filter-category').on('click', 'a', function (e) {
                    e.preventDefault();

                    $(this).toggleClass('active');

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
                });
            },
			filtering: function () {
                var url = '{{ url('/') }}/';

                filter.options.address = $('input[name="address"]').val();
                filter.options.location = [
                    $('input[name="lat"]').val(),
					$('input[name="lng"]').val()
				];

                filter.options.cid = [];

                $('.js-filter-category li').each(function (i, el) {
                    if ($(el).children('.button').hasClass('active')) {
                        filter.options.cid.push($(el).children('.button').data('id'));
                    }
                });

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