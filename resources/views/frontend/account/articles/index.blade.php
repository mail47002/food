@extends('frontend.layouts.account')

@section('content')

			<h5 class="text-upper underline-red">Мої статті</h5><hr class="zerro-top">
			<div class="row text-center">
				<div class="col-md-6">
					<a href="{{ route('account.recipes.create') }}" class="button button-red button-big inline"><i class="fo fo-dish"></i> Новий рецепт</a>
				</div>
				<div class="col-md-6">
					<a href="{{ route('account.advices.create') }}" class="button button-red button-big inline"><i class="fo fo-articles"></i> Нова порада</a>
				</div>
			</div>

			<div class="v-indent-30"></div>
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

									<img src="{{ asset('uploads/' . md5(auth()->id()) . '/' . $recipe->image) }}" class="img-responsive" alt="{{ $recipe->name }}" width="325" height="220">
								</div>
							</div>
							<div class="col-md-8">
								<div class="caption">
									<a href="{{ route('account.recipes.show', $recipe->id) }}" class="title link-black">{{ $recipe->name }} </a>
									<p class="max-height">
										{{ $recipe->description }}
									</p>
									<div class="bottom">
										@foreach($categories as $category)
											@if(in_array($category->id, $recipe->categories()->pluck('id')->toArray()))
											<a href="#" class="button-filter">{{ $category->name }}</a>
											@endif
										@endforeach
										<div class="v-indent-20"></div><hr>
										<p>
											<span class="black">{{ $recipe->created_at }}</span>
											<a href="#" class="link-blue"><i class="fo fo-message fo-small"></i> 12 коментарів</a>
											<a href="{{ route('account.recipes.edit', $recipe->id) }}" class="pull-right link-blue"><i class="fo fo-edit fo-small"></i> Редагувати</a>
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
									<img src="{{ asset('uploads/' . md5(auth()->id()) . '/' . $advice->image) }}" class="img-responsive" alt="{{ $advice->name }}" width="325" height="220">
								</div>
							</div>
							<div class="col-md-8">
								<div class="caption">
									<a href="{{ route('account.advices.show', $advice->id) }}" class="title link-black">{{ $advice->name }}</a>
									<p class="max-height">
										{{ $advice->description }}
									</p>

									<div class="bottom">
										<div class="v-indent-20"></div><hr>
										<p>
											<span class="black">{{ $advice->created_at }}</span>
											<a href="#" class="link-blue"><i class="fo fo-message fo-small"></i> 12 коментарів</a>
											<a href="#" class="pull-right link-grey" data-toggle="modal" data-target="#modal_advice-delete" data-advice-id="{{ $advice->id }}"><i class="fo fo-delete fo-small"></i>  Видалити </a> <a href="{{ route('account.advices.edit', $advice->id) }}" class="pull-right link-blue"> <i class="fo fo-edit fo-small"></i> Редагувати  </a>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>

	<div id="modal_advice-delete" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content text-center">
				<div class="modal-header">
					<a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
					<h2>Ваша порада буде видалена!</h2>
				</div>
				<div class="modal-body">
					<button class="button button-grey" type="button" data-dismiss="modal">Повернутися</button>
					<button class="button button-red js-advice-delete" type="button">ПІДТВЕРДИТИ</button>
				</div>
			</div>
		</div>
	</div>



@stop

@push('scripts')
@push('scripts')
	<script type="text/javascript">
    var id = null;

    $('.link-grey').on('click', function() {
			id = $(this).data('advice-id');
    });

		$('.js-advice-delete').on('click', function(e) {
			e.preventDefault();

			if (id) {
        $.ajax({
            url: '{{ url('account/advices') }}/' + id,
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

	$(document).tooltip(
		{position: {my: "left top+10"}}
	);

</script>
@endpush