@extends('frontend.layouts.account')

@section('title')Products - @stop

@section('content')
    <div class="v-indent-40"></div>
    <h1>{{ $user->name }}</h1>
    <p class="grey3">
        <i class="fo fo-big fo-marker red"></i> вул. {{ $user->address->street }} {{ $user->address->build }}, {{ $user->address->city }}
    </p>
    <div class="rating grey3"><span class="stars medium">4</span>10 відгуків</div>

    <div class="description">
        <p>{{ $user->about }}</p>

        <a href="#" class="link-blue">Показати текст</a>
    </div>


    <h5 class="text-upper underline-red">Оголошення</h5><hr class="zerro-top">

    <div class="v-indent-30"></div>

    {{ Form::open(['route' => ['account.adverts.index', $user->slug], 'method' => 'get', 'class' => 'search margin-zerro']) }}
        {{ Form::text('search', null, ['placeholder' => 'Пошук']) }}
        <button type="submit" class="btn-search"><i class="fo fo-search fo-small"></i></button>
    {{ Form::close() }}

    @foreach ($categories as $category)
        <a href="#" class="button-filter top-20">{{ $category->name }}</a>
    @endforeach


    <div class="filter-block">
        <ul class="categories list-inline text-center">
            <li class="{{ Helper::isAdvertByDate() ? 'active' : '' }}"><a href="{{ route('profile.adverts.index', ['user' => $user->slug, 'type' => 'by_date']) }}" class="link-red text-upper">Меню по датам</a></li>
            <li class="{{ Helper::isAdvertInStock() ? 'active' : '' }}"><a href="{{ route('profile.adverts.index', ['user' => $user->slug, 'type' => 'in_stock']) }}" class="link-red text-upper">Готові страви</a></li>
            <li class="{{ Helper::isAdvertPreOrder() ? 'active' : '' }}"><a href="{{ route('profile.adverts.index', ['user' => $user->slug, 'type' => 'pre_order']) }}" class="link-red text-upper">Страви під замовлення</a></li>
        </ul>
        <hr class="red-border">
    </div>

    <div class="v-indent-30"></div>

    <div class="tab-content">
        <div class="tab-pane fade in active">
            @if(count($adverts) > 0)
                <div class="row">
                    @each('frontend.profile.adverts.item', $adverts, 'advert')
                </div>
                {{ $adverts->appends(request()->all())->links() }}
            @endif
        </div>
    </div>
@endsection