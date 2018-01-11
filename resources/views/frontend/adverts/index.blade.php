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
					@if (in_array($category->id, $filter['cid']))
						<li><a href="javascript:void(0);" class="button active" data-id="{{ $category->id }}">{{ $category->name }}</a></li>
					@else
						<li><a href="javascript:void(0);" class="button" data-id="{{ $category->id }}">{{ $category->name }}</a></li>
					@endif
				@endforeach
			</ul>
			<hr>
		</div>
		<ul class="categories list-inline text-center">
			<li class="{{ (!request()->has('type') || (request()->has('type') && request()->get('type') == 'by_date')) ? 'active' : '' }}"><a href="{{ route('adverts.index', ['type' => 'by_date']) }}" class="link-red text-upper">Меню по датам</a></li>
			<li class="{{ (request()->has('type') && request()->get('type') == 'in_stock') ? 'active' : '' }}"><a href="{{ route('adverts.index', ['type' => 'in_stock']) }}" class="link-red text-upper">Готові страви</a></li>
			<li class="{{ (request()->has('type') && request()->get('type') == 'pre_order') ? 'active' : '' }}"><a href="{{ route('adverts.index', ['type' => 'pre_order']) }}" class="link-red text-upper">Страви під замовлення</a></li>
		</ul>
		<hr class="red-border">
	</div>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			@if (!request()->has('type') || (request()->has('type') && request()->get('type') == 'by_date'))
				<div class="filter-block">
				<div class="filter-inputs container">
					<div class="row">
						<div class="col-md-3">
							<input type="text" name="date" class="datepicker full-width" placeholder="Дата">
						</div>
						<div class="checkboxes col-md-6">
							<input type="checkbox" id="breakfast"><label for="breakfast">Сніданок (до 12:00)</label>

							<input type="checkbox" id="dinner" checked="checked"><label for="dinner">Обід (12:00 - 16:00)</label>

							<input type="checkbox" id="supper" checked="checked"><label for="supper">Вечеря (після 16:00)</label>
						</div>
						<div class="col-md-3">
							<label for="sorting" class="grey3">Сортутвати по:</label>
							<select name="sorting" class="sorting" id="sorting">
								<option value="">найближчі</option>
								<option value="">найближчі</option>
								<option value="">найближчі</option>
							</select>
						</div>
					</div>


					<div class="prices-input text-center js-filter-price">
						<label>Ціновий діапазон</label>
						<input type="text" name="price_from">
						<label>&#x2014;</label>
						<input type="text" name="price_to">
						<label for="">грн.</label>

						<input type="button" class="button btn-filter js-btn-filter" value="OK">
					</div>
				</div>
			</div>
			@endif

			@if (request()->has('type') && request()->get('type') == 'in_stock')
				<div class="filter-block">
						<div class="filter-inputs container">
							<div class="row">
								<div class="col-md-9">
									<div class="prices-input p0 js-filter-price">
										<label>Ціновий діапазон</label>
										<input type="text" name="price_from">
										<label for="">&#x2014;</label>
										<input type="text" name="price_to">
										<label>грн.</label>
										<input type="button" class="button btn-filter js-btn-filter" value="OK">
									</div>
								</div>
								<div class="col-md-3">
									<label for="sorting-ready" class="grey3">Сортутвати по:</label>
									<select name="sorting-ready" class="sorting" id="sorting-ready">
										<option value="">найближчі</option>
										<option value="">найближчі</option>
										<option value="">найближчі</option>
									</select>
								</div>
							</div>
						</div>
					</div>
			@endif

			@if (request()->has('type') && request()->get('type') == 'pre_order')
				<div class="filter-block">
						<div class="filter-inputs container">
							<div class="row">
								<div class="col-md-9">
									<div class="prices-input p0 js-filter-price">
										<label>Ціновий діапазон</label>
										<input type="text" name="price_from">
										<label>&#x2014;</label>
										<input type="text" name="price_to">
										<label>грн.</label>
										<input type="button" class="button btn-filter js-btn-filter" value="OK">
									</div>
								</div>
								<div class="col-md-3">
									<label for="sorting-order" class="grey3">Сортутвати по:</label>
									<select name="sorting-order" class="sorting" id="sorting-order">
										<option value="">найближчі</option>
										<option value="">найближчі</option>
										<option value="">найближчі</option>
									</select>
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
	{{-- 2.2 --}}
		<div id="byready" class="tab-pane fade">



			<div class="container">
				<div class="row">
					@foreach ($adverts as $advert)
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
							<div class="product-thumb">
								<div class="image">
									<img src="{{ asset($advert->product->image) }}" class="img-responsive" alt="{{ $advert->name }}">
									<div class="distance"><i class="fo fo-small fo-marker red"></i>5 км</div>
									@php $actions=['discount','new', 'heart']; @endphp <!-- class: discount new heart -->
									<div class="sticker {{ $actions[array_rand($actions)] }}"></div>
								</div>

								<div class="caption">
									<a href="#" class="title link-black">{{ $advert->name }}</a>
									<p>
										<span class="price">{{ $advert->price }} грн.</span>
										<span class="rating">
											<span class="stars">{{rand(0,5)}}</span> відгуків
										</span>
									</p>
									<p><i class="fo fo-dish-ready red" title="Термін придатності"></i> 10 - 15 грудня</p>
								</div>

								<button type="button" class="button button-grey order">Замовити</button>

							</div>
					</div>
					@endforeach
				</div>
			</div>

			<div class="bottom-block text-right">
				<ul class="pagination">
					<li class="disabled"><span><</span></li>
					<li class="active"><span>1</span></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li class="disabled"><span>...</span></li>
					<li><a href="#">10</a></li>
					<li><a href="#" rel="next">></a></li>
					<p class="count">37 – 47 из 160 объявлений</p>
				</ul><a href="#wrapper" class="btn-top"></a> <!-- Важно!! - не переносить!!! -->
			</div>
		</div>
	{{-- 2.3 --}}
		<div id="byorder" class="tab-pane fade">



			<div class="container">
				<div class="row">
					@foreach ($adverts as $advert)
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
							<div class="product-thumb">
								<div class="image">
									<img src="{{ asset($advert->product->image) }}" class="img-responsive" alt="{{ $advert->name }}">
									<div class="distance"><i class="fo fo-small fo-marker red"></i>5 км</div>
									@php $actions=['discount','new', 'heart']; @endphp <!-- class: discount new heart -->
									<div class="sticker {{ $actions[array_rand($actions)] }}"></div>
								</div>

								<div class="caption">
									<a href="#" class="title link-black">{{ $advert->name }}</a>
									<p><span class="price"><i class="fo fo-deal red"></i> 800 - 2500 грн.</span></p>
									<p><span class="rating"><span class="stars">{{ rand(0,5) }}</span> 10 відгуків</span></p>
								</div>

								<button type="button" class="button button-grey order">Замовити</button>

							</div>
					</div>
					@endforeach
				</div>
			</div>


			<div class="bottom-block text-right">
				<ul class="pagination">
					<li class="disabled"><span><</span></li>
					<li class="active"><span>1</span></li>
					<li><a href="#">2</a></li>
					<li><a href="#">3</a></li>
					<li><a href="#">4</a></li>
					<li class="disabled"><span>...</span></li>
					<li><a href="#">10</a></li>
					<li><a href="#" rel="next">></a></li>
					<p class="count">37 – 47 из 160 объявлений</p>
				</ul><a href="#wrapper" class="btn-top"></a> <!-- Важно!! - не переносить!!! -->
			</div>
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


@auth()
	<!-- Modal Order -->
	<div id="modal_order" class="modal fade" role="dialog">
		<div class="modal-dialog w-710">
			<div class="modal-content text-center">
				<div class="modal-header">
					<a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
					<h4 class="modal-title">Оформити замовлення</h4>
				</div>
				<div class="modal-body">
					<div class="v-indent-20"></div>
					<div class="step"><span>1</span></div>
					<div class="f-18 top-10">Для оформлення замовлення, зв'яжіться з поваром страви</div>
					<div class="js-user"></div>
					<div class="v-indent-20"></div>
					<div class="step"><span>2</span></div>
					<div class="f-18 top-20">Для завершення замовлення обов’язково потрібно підтвердити його</div>

					{{ Form::open(['route' => 'adverts.order', 'method' => 'post']) }}
						<input type="hidden" name="advert_id" value="">
						<input type="hidden" name="user_id" value="{{ auth()->id() }}">

						<div class="top-20 inline js-buttons">
							<button class="button button-white text-upper mlr-10" type="button" data-dismiss="modal">Підтвердити пізніше</button>
							<button class="button button-red text-upper mlr-10" type="submit">Підтвердити зараз</button>
						</div>

						<div class="info-block red w-480 hidden js-info-block">
							<p class="text-upper">Замовлення очікує на підтвердження!</p>
							<div><a href="#" class="link-grey3 f14">Перейти до моїх замовлень та підтвердити <i class="fo fo-arrow-right fo-small"></i></a></div>
						</div>
					{{ Form::close() }}

				</div>
			</div>
		</div>
	</div>
@endauth

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
				type: '{{ request()->input('type', 'by_date') }}',
                cid: [],
				price_from: null,
				price_to: null
			},
			init: function () {
		        // Category
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

                // Price
				$('.js-btn-filter').on('click', function (e) {
					e.preventDefault();

					var el = $(this).closest('.js-filter-price');

					filter.options.price_from = el.find('input[name="price_from"]').val();
                    filter.options.price_to = el.find('input[name="price_to"]').val();

                    filter.filtering();
                })
            },
			filtering: function () {
		        var url = '{{ url('') }}/?type=' + filter.options.type;

		        if (filter.options.cid.length > 0) {
		            url += '&cid=' + filter.options.cid.join(',');
				}

                if (filter.options.price_from) {
                    url += '&price_from=' + filter.options.price_from;
                }

                if (filter.options.price_to) {
                    url += '&price_to=' + filter.options.price_to;
                }

                location = url;
            }
		};

		filter.init();
	</script>
	<script>
		$('.advert .js-order').on('click', function () {
		    var advertId  = $(this).data('id');

            if (advertId) {
                $.get('{{ url('api/adverts') }}/' + advertId).done(function (response) {
					if (response['status'] === 'success') {
                    	var html = '';

                    	html += '<div class="caption">';
						html += '<div class="avatar">';
						html += '<div class="rounded"><img src="' + response['advert']['user']['image'] + '" alt="foto"></div>';
						html += '</div>';
                        html += '<p><a href="#" class="link-blue name">' +  response['advert']['user']['name'] +'</a></p>';
                        html += '</div>';

                        for (i in response['advert']['user']['phone']) {
                        	html += '<div class="phone red f24">' + response['advert']['user']['phone'][i] + '</div>';
						}

						$('#modal_order .js-user').empty().append(html);
                        $('#modal_order input[name=advert_id]').val(advertId);

                        $('#modal_order').modal('show');
					}
                });
            }
        });

        $('#modal_order').on('hidden.bs.modal', function () {
            $('#modal_order input[name=advert_id]').val('');
            $('#modal_order .js-buttons').removeClass('hidden');

            if (!$('#modal_order .js-info-block').hasClass('hidden')) {
                $('#modal_order .js-info-block').addClass('hidden');
            }
		});

        $('#modal_order form').on('submit', function (e) {
            e.preventDefault();

            var form = $(this);

            $.ajax({
				url: form.attr('action'),
				method: form.attr('method'),
				data: form.serialize(),
				dataType: 'json',
				beforeSend: function () {
				    $('#modal_order').find('.alert').remove();

					form.find(':submit').attr('disabled', true);

                    $('.body-overlay').addClass('active');
                },
				success: function (json) {
					if (json['status'] === 'success') {
                        form.find('.js-buttons').toggleClass('hidden');
                        form.find('.js-info-block').toggleClass('hidden');
					}

                    if (json['status'] === 'warning') {
                        $('#modal_order .modal-body').before('<div class="alert alert-warning">Ви вже оформили це замовлення!</div>');
                    }
                },
				complete: function () {
                    form.find(':submit').attr('disabled', false);

                    $('.body-overlay').removeClass('active');
                }
			})
        })
	</script>
@endpush