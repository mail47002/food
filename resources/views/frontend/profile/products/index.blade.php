@extends('frontend.layouts.account')

@section('title')Products - @stop

@section('content')
    @include('frontend.profile.header')

    <h5 class="text-upper underline-red">Каталог страв ({{ $products->count() }})</h5><hr class="zerro-top">

    <div class="v-indent-30"></div>

    <form action="#" class="search margin-zerro" method="get">
        <input type="text" name="search" placeholder="Пошук">
        <button type="submit" class="btn-search"><i class="fo fo-search"></i></button>
    </form>

    @foreach ($categories as $category)
        <a href="#" class="button-filter top-20">{{ $category->name }}</a>
    @endforeach

    <div class="v-indent-30"></div>

    @if(count($products) > 0)
        <div class="row">
            @each('frontend.profile.products.item', $products, 'product')

            {{ $products->appends(request()->all())->links() }}
        </div>
    @else
        @if(request()->has('search'))
            <div class="empty-search-block">
                <p>За запитом «{{ request('search') }}» знайдено матеріалів: 0</p>
                <a href="#" class="button button-red button-empty-block" >Всі страви</a>
            </div>
        @else
            <div class="empty-block">
                <i class="fo fo-dish-search fo-2x block"></i>
                <p>У повара ще немає страв!</p>
            </div>
        @endif
    @endif

    {{-- С дизайном не понятно как срастить --}}
    {{--<div class="row">--}}
        {{--<div class="bottom-block text-right">--}}
            {{--<ul class="pagination">--}}
                {{--<li class="disabled"><span><</span></li>--}}
                {{--<li class="active"><span>1</span></li>--}}
                {{--<li><a href="#">2</a></li>--}}
                {{--<li><a href="#">3</a></li>--}}
                {{--<li><a href="#">4</a></li>--}}
                {{--<li class="disabled"><span>...</span></li>--}}
                {{--<li><a href="#">10</a></li>--}}
                {{--<li><a href="#" rel="next">></a></li>--}}
                {{--<p class="count">37 – 47 из 160 объявлений</p>--}}
            {{--</ul><a href="#wrapper" class="btn-top"></a> <!-- Важно!! - не переносить!!! -->--}}
        {{--</div>--}}
    {{--</div>--}}
@endsection