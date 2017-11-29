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


					<div class="prices-input text-center">
						<label for="">Ціновий діапазон</label>
						<input type="text" placeholder="">
						<label for="">&#x2014;</label>
						<input type="text" placeholder="">
						<label for="">грн.</label>

						<input type="submit" class="button btn-filter" value="OK">
					</div>
				</div>
			</div>
			@endif

			@if (request()->has('type') && request()->get('type') == 'in_stock')
				<div class="filter-block">
						<div class="filter-inputs container">
							<div class="row">
								<div class="col-md-9">
									<div class="prices-input p0">
										<label for="">Ціновий діапазон</label>
										<input type="text" placeholder="">
										<label for="">&#x2014;</label>
										<input type="text" placeholder="">
										<label for="">грн.</label>
										<input type="submit" class="button btn-filter" value="OK">
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
									<div class="prices-input p0">
										<label for="">Ціновий діапазон</label>
										<input type="text" placeholder="">
										<label for="">&#x2014;</label>
										<input type="text" placeholder="">
										<label for="">грн.</label>
										<input type="submit" class="button btn-filter" value="OK">
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


			<div class="container">
				<div class="row">
					@foreach ($adverts as $advert)
						<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
							<div class="product-thumb">
								<div class="image">
									<img src="{{ asset($advert->image) }}" class="img-responsive" alt="{{ $advert->name }}">
									<div class="distance"><i class="fo fo-small fo-marker red"></i>5 км</div>
									@php $actions=['discount','new', 'heart']; @endphp <!-- class: discount new heart -->
									<div class="sticker {{ $actions[array_rand($actions)] }}"></div>
								</div>

								<div class="caption">
									<a href="{{ route('adverts.show', $advert->slug) }}" class="title link-black">{{ $advert->name }}</a>
									<p>
										@if (!request()->has('type') || (request()->has('type') && request()->get('type') == 'by_date') || (request()->has('type') && request()->get('type') == 'in_stock'))
											<span class="price">{{ $advert->price }} грн.</span>
										@endif

										@if (request()->has('type') && request()->get('type') == 'pre_order')
											<span class="price"><i class="fo fo-deal red"></i> {{ $advert->price }} - {{ $advert->custom_price }} грн.</span>
										@endif
									</p>
									<p>
										<span class="rating">
											<span class="stars">{{rand(0,5)}}</span> відгуків
										</span>
									</p>

									@if (!request()->has('type') || (request()->has('type') && request()->get('type') == 'by_date'))
										<p><i class="fo fo-time red"></i>15 грудня (обід)</p>
									@endif

									@if (request()->has('type') && request()->get('type') == 'in_stock')
										<p><i class="fo fo-dish-ready red" title="Термін придатності"></i> 10 - 15 грудня</p>
									@endif
								</div>

								<button type="button" class="button button-grey order">Замовити</button>

							</div>
					</div>
					@endforeach
				</div>
			</div>


			<div class="bottom-block text-right">
				{{ $adverts->appends(request()->all())->links() }}
				<a href="#wrapper" class="btn-top"></a> <!-- Важно!! - не переносить!!! -->
			</div>


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

<!-- Modal -->
<div id="modal_change_address" class="modal fade" role="dialog">
	<div class="modal-dialog">

		<!-- Modal content-->
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
		        cid: [],
				type: '{{ request()->input('type', 'by_date') }}'
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
            },
			filtering: function () {
                location = '{{ url('') }}/?cid=' + filter.options.cid.join(',') + '&type=' + filter.options.type;
            }
		};

		filter.init();
	</script>
@endpush