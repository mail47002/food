@extends('frontend.layouts.default')

@include('frontend.includes.nav')
@section('title')Adverts - @stop

@section('content')
	<div class="bg-yellow">
		<div class="filter-block">
			<div class="container">
				@include('frontend.adverts.search')
				<hr>
				<div class="address text-center">
					<i class="fo fo-big fo-marker red"></i><span id="address">Соборна, буд. 10/2, Вінниця</span>
					<a href="#" class="link-blue" data-toggle="modal" data-target="#modal_change_address">Змінити регіон</a>

					<div class="slider-distance">
						<label for="distance">Радіус: </label><input type="text" id="distance" readonly />
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

	@include('frontend.adverts.address')
	@include('frontend.includes.order')
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