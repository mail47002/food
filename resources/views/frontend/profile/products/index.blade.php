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
        <p>Якщо ви любите запечене блюдо з хрусткою скоринкою, то посипте все сумішшю з панірувальних сухарів і натертого на тертці сиру. Запікайте в духовці при температурі 180-190С. Коли картопля стане м'яким, або помідори з цибулею і кабачками трохи підрум'яняться - овочевий рататуй з баклажанами готовий! Подавайте його до столу з будь-яким улюбленим вами соусом. Підійде сметана, домашній майонез або невеликий шматочок вершкового масла.</p>

        <a href="#" class="link-blue">Показати текст</a>
    </div>


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

    <div class="row">
        @foreach ($products as $product)
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                <div class="product-thumb">

                    <div class="image">
                        <img src="{{ asset($product->image) }}" class="img-responsive" alt="{{ $product->name }}">
                    </div>

                    <div class="caption">
                        <a href="/products/1" class="title link-black">{{ $product->name }}</a>
                        <p class="">
                            <span class="rating">
                                <span class="stars">{{ rand(0,5) }}</span> 10 відгуків
                            </span>
                        </p>
                        <div class="">
                            <a href="" class="link-red-dark"><i class="fo fo-time"></i></a>
                            <a href="" class="link-red-dark"><i class="fo fo-deal"></i></a>
                            <a href="" class="link-red-dark"><i class="fo fo-dish-ready"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

        {{ $products->links() }}
    </div>


    {{-- если пустой поиск  --}}
    <p>если пустой поиск</p>
    <div class="empty-search-block">
        <p>За запитом «Піца на лаваші» знайдено матеріалів: 0</p>
        <a href="#" class="button button-red button-empty-block" >Всі страви</a>
    </div>

    {{-- если 0  --}}
    <p>если Каталог страв (0)</p>
    <div class="empty-block">
        <i class="fo fo-dish-search fo-2x block"></i>
        <p>У повара ще немає страв!</p>
    </div>


    {{-- С дизайном не понятно как срастить --}}
    <div class="row">
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
@endsection