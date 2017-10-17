@extends('frontend.layouts.profile')

@section('content')

			<h5 class="text-upper underline-red">Мої статті</h5><hr class="zerro-top">
			<div class="row text-center">
				<div class="col-md-6">
					<a href="{{ route('profile.recipes.create') }}" class="button button-red button-big inline"><i class="fo fo-dish"></i> Новий рецепт</a>
				</div>
				<div class="col-md-6">
					<a href="{{ route('profile.advices.create') }}" class="button button-red button-big inline"><i class="fo fo-articles"></i> Нова порада</a>
				</div>
			</div>

			<div class="v-indent-30"></div>
{{-- 			<hr>
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
							<option value="all">Всі статі</option>
							<option value="1">Рецепти</option>
							<option value="2">Поради</option>
						</select>
					</div>
				</div>
			</div> --}}

			<div class="filter-block">
				<ul class="categories list-inline text-center">
					<li class="active"><a  data-toggle="tab" href="#recipes" class="link-red text-upper">Рецепти</a></li>
					<li><a  data-toggle="tab" href="#article" class="link-red text-upper">Поради</a></li>
				</ul>
				<hr class="red-border">
			</div>

			<div class="v-indent-30"></div>

			<div class="tab-content">
				<div id="recipes" class="tab-pane fade in active">

					<form action="#" class="search margin-zerro wide" method="get">
						<input type="text" name="search" placeholder="Пошук">
						<button type="submit" class="btn-search"><i class="fo fo-search"></i></button>
					</form>
					<div class="v-indent-30"></div>
					@foreach($recipes as $recipe)
					<div class="wide-thumb profile-article">
						<div class="row">
							<div class="col-md-4">
								<div class="image">
									<img src="{{ asset($recipe->image) }}" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-8">
								<div class="caption">
									<a href="{{ route('profile.recipes.show', $recipe->id) }}" class="title link-black">{{ $recipe->name }} </a>
									<p class="max-height">
										{{ $recipe->description }}
									</p>

									<div class="bottom">
										@foreach($categories as $category)
											@if(in_array($category->id, $recipe->categories->pluck('category_id')->toArray()))
											<a href="#" class="button-filter">{{ $category->name }}</a>
											@endif
										@endforeach
										<div class="v-indent-20"></div><hr>
										<p>
											<span class="black">{{ $recipe->created_at }}</span>
											<a href="#" class="link-blue"><i class="fo fo-message fo-small"></i> 12 коментарів</a>
											<a href="{{ route('profile.recipes.edit', $recipe->id) }}" class="pull-right link-blue"><i class="fo fo-edit fo-small"></i> Редагувати</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div id="article" class="tab-pane fade">

					<form action="#" class="search margin-zerro wide" method="get">
						<input type="text" name="search" placeholder="Пошук">
						<button type="submit" class="btn-search"><i class="fo fo-search"></i></button>
					</form>
					<div class="v-indent-30"></div>
					@foreach($advices as $advice)
					<div class="wide-thumb profile-article">
						<div class="row">
							<div class="col-md-4">
								<div class="image">
									<img src="{{ asset($advice->image) }}" class="img-responsive" alt="">
								</div>
							</div>
							<div class="col-md-8">
								<div class="caption">
									<a href="{{ route('profile.advices.show', $advice->id) }}" class="title link-black">{{ $advice->name }}</a>
									<p class="max-height">
										{{ $advice->description }}
									</p>

									<div class="bottom">
										<div class="v-indent-20"></div><hr>
										<p>
											<span class="black">{{ $advice->created_at }}</span>
											<a href="#" class="link-blue"><i class="fo fo-message fo-small"></i> 12 коментарів</a>
											<a href="{{ route('profile.advices.edit', $advice->id) }}" class="pull-right link-blue"><i class="fo fo-edit fo-small"></i> Редагувати</a>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>





@stop

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

	$(document).tooltip(
			{position: {my: "left top+10"}}
		);
});
</script>
@endpush