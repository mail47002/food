@extends('frontend.layouts.account')

@section('title')Products - @stop

@section('content')

	<div class="v-indent-30"></div>
	<h1>{{ auth()->user()->profile->first_name }}</h1>
	<p class="grey3">
		<i class="fo fo-marker red"></i> {{ auth()->user()->profile->address }}
		<a href="{{ route('account.user.edit') }}" class="link-grey">
			<i class="fo fo-edit fo-small fo-indent"></i>Редагувати
		</a>
	</p>
	<div class="rating grey3"><span class="stars medium">{{ $userReviews }}</span>{{ $userReviews }} відгуків</div>

	<div class="description">
		<p>{{ auth()->user()->about }}</p>
	</div>

{{-- 	<h5 class="text-upper underline-red">Відгуки ({{ $productReviews + $userReviews }})</h5>
	<hr class="zerro-top"> --}}

	<div class="filter-block">
		<ul class="categories list-inline text-center">
			<li class="{{ Helper::isProductReviews() ? 'active' : '' }}">
				<a href="{{ route('account.user.show') }}" class="link-red text-upper">Відгуки від клієнтів ({{ $productReviews }})</a>
			</li>
			<li class="{{ Helper::isClientReviews() ? 'active' : '' }}">
				<a href="{{ route('account.user.show', ['type' => 'clients']) }}" class="link-red text-upper">Відгуки від поварів ({{ $userReviews }})</a>
			</li>
		</ul>
		<hr class="red-border">
	</div>

	<div class="tab-content">
		<div class="tab-pane fade in active">
			<div class="reviews">
				@if(Helper::isProductReviews())
					@if(count($reviews) > 0)
						<ul class="list-unstyled">
							@each('frontend.account.users.review', $reviews, 'entity')
						</ul>

						{{ $reviews->appends(request()->all())->links() }}
					@else
						<div class="empty-block">
							<i class="fo fo-dish-search fo-big block"></i>
							<p>У вас ще немає відгуків!</p>
						</div>
					@endif
				@else
					@if($hasOrder)

					@else
						<div class="empty-block">
							<i class="fo fo-people fo-big block"></i>
							<p>Ви ще не робили замовлення. Не має відгуків!</p>
							<a href="{{ url('/') }}" class="button button-red button-empty-block">Замовити страву</a>
						</div>
					@endif
				@endif
			</div>
		</div>
	</div>
@stop

@push('scripts')
	<script type="text/javascript">
		$('form').on('submit', function (e) {
			e.preventDefault();

			var form = $(this);

			$.ajax({
				url: form.attr('action'),
				method: form.attr('method'),
				data: form.serialize(),
				beforeSend: function () {
					$('.body-overlay').addClass('active');
				},
				success: function (response) {
					if (response.data) {
						var el = $('#review-' + response.data.product_review_id),
							html = '';

						html += '<div class="title">Ваша відповідь</div>';
						html += '<div class="message">' + response.data.text + '</div>';
						html += '<div class="right-avatar">';
						html += '<div class="avatar">';
						html += '<div class="rounded">';
						html += '<img src="{{ auth()->user()->getAvatar() }}" alt="{{ auth()->user()->profile->first_name }}">';
						html += '</div>';
						html += '</div>';
						html += '</div>';

						el.find('.js-answer').html(html);
						el.find('.your-message').remove();
					}
				},
				complete: function () {
					$('.body-overlay').removeClass('active');
				},
				error: function(response){
					var response = response.responseJSON;

					for (name in response.errors) {
						$('[name="' + name + '"]').addClass('error').closest('.form-group').addClass('has-error');
					}
				}
			});
		});
	</script>
@endpush