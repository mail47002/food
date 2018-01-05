@extends('frontend.layouts.default')

@include('frontend.includes.nav')
@section('title')Recipes - @stop
@section('content')

<div class="bg-yellow">
	<div class="filter-block">

		<ul class="categories list-inline text-center">
			<li class="active"><a href="#" class="link-red text-upper">Рецепти</a></li>
			<li><a href="{{ route('advices.index') }}" class="link-red text-upper">Поради</a></li>
		</ul>
		<hr class="red-border">

		<div class="container">
			{{ Form::open(['route' => 'recipes.index', 'method' => 'get', 'class' => 'search']) }}
				{{ Form::text('search', null, ['placeholder' => 'Пошук']) }}
				{{ Form::submit('') }}
			{{ Form::close() }}

			<hr>

			<ul class="buttons list-inline text-center">
				<li><a href="#" class="button">Супи</a></li>
				<li><a href="#" class="button active">Другі страви</a></li>
				<li><a href="#" class="button">Каші</a></li>
				<li><a href="#" class="button">Десерти і торти</a></li>
				<li><a href="#" class="button active">Зауски</a></li>
				<li><a href="#" class="button active">Салати</a></li>
				<li><a href="#" class="button">Випічка і пироги</a></li>
				<li><a href="#" class="button">Напої</a></li>
				<li><a href="#" class="button">Спеції</a></li>
				<li><a href="#" class="button">Консервація</a></li>
				<li><a href="#" class="button">Алкоголь</a></li>
			</ul>
			<hr class="red-border">
			<div class="v-indent-20"></div>


		</div>

	</div>

	<div class="container">
		<div class="row">
		@foreach ($recipes as $recipe)
			<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
				<div class="product-thumb">
					<div class="image">
						<img src="{{ asset($recipe->image) }}" class="img-responsive" alt="{{ $recipe->name }}">
					</div>

					<div class="caption">
						<a href="{{ route('recipes.show', $recipe->slug) }}" class="title link-black">{{ $recipe->name }}</a>
						<p class="bottom">
							{{ $recipe->description }}
						</p>
					</div>

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


@stop

@push('scripts')
<script>
	$( function() {
	});
	</script>
@endpush