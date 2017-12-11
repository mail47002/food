@extends('frontend.layouts.default')

@include('frontend.includes.nav')
@section('title')Recipes - @stop
@section('content')

<div class="bg-yellow">
	<div class="filter-block">
		<div class="container">

			{{ Form::open(['route' => 'recipes.index', 'method' => 'get', 'class' => 'search']) }}
				{{ Form::text('search', null, ['placeholder' => 'Пошук']) }}
				{{ Form::submit('') }}
			{{ Form::close() }}
		</div>
	</div>

	<div class="tab-content">
		<div class="tab-pane fade in active">
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
								</div>
							</div>
						</div>
					@endforeach
				</div>
			</div>


			<div class="bottom-block text-right">
				{{ $recipes->appends(request()->all())->links() }}
				<a href="#wrapper" class="btn-top"></a> <!-- Важно!! - не переносить!!! -->
			</div>

		</div>
		<div id="byorder" class="tab-pane fade">
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

@stop

@push('scripts')
<script>
	$( function() {
	});
	</script>
@endpush