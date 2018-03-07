@extends('frontend.layouts.account')

@section('title')Products - @stop

@section('content')

	<div class="v-indent-40"></div>
	<h1>{{ auth()->user()->profile->first_name }}</h1>
	<p class="grey3">
		<i class="fo fo-marker red"></i> {{ Helper::getUserAddress(auth()->user()) }}
		<a href="{{ route('account.user.edit') }}" class="link-grey">
			<i class="fo fo-edit fo-small fo-indent"></i>Редагувати
		</a>
	</p>
	<div class="rating grey3"><span class="stars medium">4</span>10 відгуків</div>

	<div class="description">
		<p>{{ auth()->user()->about }}</p>
	</div>

	<h5 class="text-upper underline-red">Відгуки ({{ $productReviews + $userReviews }})</h5>
	<hr class="zerro-top">

	<div class="filter-block">
		<ul class="categories list-inline text-center">
			<li class="{{ Helper::isUserReviews() ? 'active' : '' }}">
				<a href="{{ route('account.user.show') }}" class="link-red text-upper">Відгуки про повара ({{ $productReviews }})</a>
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
				@if(Helper::isUserReviews())
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
						<i class="fo fo-people fo-big block"></i>
						<p>Ви ще не робили замовлення. Не має відгуків!</p>
						<a href="{{ url('/') }}" class="button button-red button-empty-block">Замовити страву</a>
					@endif
				@endif
			</div>
		</div>
	</div>
@stop