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
            <li class="{{ (!request()->has('type') || (request()->has('type') && request()->get('type') == 'by_date')) ? 'active' : '' }}"><a href="{{ route('profile.adverts.index', ['user' => $user->slug, 'type' => 'by_date']) }}" class="link-red text-upper">Меню по датам</a></li>
            <li class="{{ (request()->has('type') && request()->get('type') == 'in_stock') ? 'active' : '' }}"><a href="{{ route('profile.adverts.index', ['user' => $user->slug, 'type' => 'in_stock']) }}" class="link-red text-upper">Готові страви</a></li>
            <li class="{{ (request()->has('type') && request()->get('type') == 'pre_order') ? 'active' : '' }}"><a href="{{ route('profile.adverts.index', ['user' => $user->slug, 'type' => 'pre_order']) }}" class="link-red text-upper">Страви під замовлення</a></li>
        </ul>
        <hr class="red-border">
    </div>

    <div class="v-indent-30"></div>

    <div class="tab-content">
        <div class="tab-pane fade in active">
            @if (count($adverts) > 0)
                <div class="row">
                    @foreach ($adverts as $advert)
                        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
                            <div class="product-thumb">

                                <div class="image">
                                    <img src="{{ asset($advert->image) }}" class="img-responsive" alt="{{ $advert->name }}">
                                </div>

                                <div class="caption">
                                    <a href="#" class="title link-black">{{ $advert->name }}</a>

                                    @if (!request()->has('type') || (request()->has('type') && request()->get('type') == 'by_date') || (request()->has('type') && request()->get('type') == 'in_stock'))
                                        <p><span class="price">{{ $advert->price }} грн.</span></p>
                                    @elseif (request()->has('type') && request()->get('type') == 'pre_order')
                                        <p><span class="price"><i class="fo fo-deal red"></i> {{ $advert->price }} - {{ $advert->custom_price }} грн.</span></p>
                                    @endif

                                    <p><span class="rating">
                                            <span class="stars">{{ rand(0,5) }}</span> 10 відгуків
                                        </span>
                                    </p>

                                    @if (!request()->has('type') || (request()->has('type') && request()->get('type') == 'by_date'))
                                        @if ($advert->is_everyday)
                                            <p><i class="fo fo-dish-ready red"></i>{{ $advert->date_from->format('d F') }} - {{ $advert->date_from->format('d F') }}</p>
                                        @else
                                            <p><i class="fo fo-time red"></i>{{ $advert->date->format('d F') }} (обід)</p>
                                        @endif
                                    @elseif (request()->has('type') && request()->get('type') == 'in_stock')
                                        <p><i class="fo fo-dish-ready red"></i>{{ $advert->date_from->format('d') }} - {{ $advert->date_from->format('d F') }}</p>
                                    @endif
                                </div>

                                <button type="button" class="button button-grey order">Замовити</button>
                            </div>
                        </div>
                    @endforeach

                </div>

                {{ $adverts->appends(request()->all())->links() }}
            @endif


        </div>
    </div>
@endsection