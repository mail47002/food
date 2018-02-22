@extends('frontend.layouts.account')

@section('title')Products - @stop

@section('content')
    @include('frontend.profile.header')

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
            <li class="{{ Helper::isAdvertByDate() ? 'active' : '' }}">
                <a href="{{ route('profile.adverts.index', ['user' => $user->profile->slug, 'type' => 'by_date']) }}" class="link-red text-upper">Меню по датам</a>
            </li>
            <li class="{{ Helper::isAdvertInStock() ? 'active' : '' }}">
                <a href="{{ route('profile.adverts.index', ['user' => $user->profile->slug, 'type' => 'in_stock']) }}" class="link-red text-upper">Готові страви</a>
            </li>
            <li class="{{ Helper::isAdvertPreOrder() ? 'active' : '' }}">
                <a href="{{ route('profile.adverts.index', ['user' => $user->profile->slug, 'type' => 'pre_order']) }}" class="link-red text-upper">Страви під замовлення</a>
            </li>
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
            @else
                @if(request()->has('search'))
                    <div class="empty-search-block">
                        <p>За запитом «{{ request('search') }}» знайдено матеріалів: 0</p>
                        <a href="#" class="button button-red button-empty-block" >Всі страви</a>
                    </div>
                @else
                    <div class="empty-block">
                        <i class="fo fo-dish-search fo-2x block"></i>
                        <p>У повара ще немає об'яв!</p>
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection