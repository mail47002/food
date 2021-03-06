@extends('frontend.layouts.account')

@section('content')

	<h5 class="text-upper underline-red">Мої поради</h5><hr class="zerro-top">
	<div class="row text-center">
		<div class="col-md-6">
			<a href="{{ route('account.recipes.create') }}" class="button button-red button-big inline"><i class="fo fo-dish"></i> Новий рецепт</a>
		</div>
		<div class="col-md-6">
			<a href="{{ route('account.advices.create') }}" class="button button-red button-big inline"><i class="fo fo-articles"></i> Нова порада</a>
		</div>
	</div>
	<div class="v-indent-30"></div>
	<hr>

	<div class="bg-yellow profile">
		<div class="row">
			<div class="col-md-6">
				{{ Form::open(['route' => 'account.advices.index', 'method' => 'get', 'class' => 'search']) }}
                    {{ Form::text('search', null, ['placeholder' => 'Пошук']) }}
                    <button type="submit" class="btn-search"><i class="fo fo-search fo-small"></i></button>
                {{ Form::close() }}
			</div>
			<div class="col-md-6">
				<select name="sorting" id="sorting">
					<option value="1">Рецепти</option>
					<option selected value="2">Поради</option>
				</select>
			</div>
		</div>
	</div>
	<div class="v-indent-20"></div>

	<div class="filter-block">
		<ul class="categories list-inline text-center">
			<li><a href="{{route('account.recipes.index')}}" class="link-red text-upper">Рецепти</a></li>
			<li class="active"><a href="#advice" class="link-red text-upper">Поради</a></li>
		</ul>
		<hr class="red-border">
	</div>

	<div class="v-indent-30"></div>


	@foreach($advices as $advice)
	<div class="wide-thumb profile-article">
		<div class="row">
			<div class="col-md-4">
				<div class="image">
					<img src="{{ asset('uploads/' . md5(auth()->id()) . '/' . $advice->image) }}" class="img-responsive" alt="">
				</div>
			</div>
			<div class="col-md-8">
				<div class="caption">
					<a href="{{ route('account.advices.show', $advice->id) }}" class="title link-black">{{ $advice->name }} </a>
					<p class="max-height">
						{{ $advice->description }}
					</p>
					<div class="bottom">
						<div class="v-indent-20"></div><hr>
						<p>
							<span class="black">{{ $advice->created_at }}</span>
							<a href="#" class="link-blue"><i class="fo fo-message fo-small"></i> 12 коментарів</a>
							<a href="{{ route('account.advices.edit', $advice->id) }}" class="pull-right link-blue"><i class="fo fo-edit fo-small"></i> Редагувати</a>
						</p>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach

	<div class="profile">
		<div class="paginate">
			<ul class="pagination grey">
				<li><a href="#" rel="prev"><</a></li>
				<li class="active"><a href="#">1</a></li>
				<li><a href="#">2</a></li>
				<li><a href="#" rel="next">></a></li>
			</ul>
		</div>
	</div>


	<div class="empty-block">
		<i class="fo fo-articles fo-4x"></i>
		<p class="text">У вас немає порад</p>
		<a href="#" class="button button-red button-big">Додати пораду</a>
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