@extends('frontend.layouts.account')

@section('content')
    <h5 class="text-upper underline-red">Мої замовлення</h5><hr class="zerro-top">

    <div class="v-indent-20"></div>

    @if($orders->count() > 0)
        @each('frontend.account.orders.item', $orders, 'order')
        {{ $orders->links() }}
    @else
        <p>У Вас ще не має заказів</p>
    @endif

    {{--<div class="wide-thumb account-orders">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-4">--}}
                {{--<div class="image"><img src="/uploads/food1.jpg" class="img-responsive" alt=""></div>--}}
            {{--</div>--}}
            {{--<div class="col-md-5">--}}
                {{--<div class="caption">--}}
                    {{--<a href="/adverts/1" class="title link-black">М'ясне рагу з овочами</a>--}}
                    {{--<span class="rating"><span class="stars">{{rand(0,5)}}</span>10 відгуків</span>--}}
                    {{--<div class="grey-block grey3 wide">--}}
                        {{--<p class="text-left"><a href="#" class="link-red"><i class="fo fo-dish-ready"></i> Готова страва</a></p>--}}
                        {{--<p class="text-left"><span class="price">80 грн.</span></p>--}}
                        {{--<p class="text-left black">10 - 15 грудня</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 left-border">--}}
                {{--<div class="caption text-center">--}}
                    {{--<div class="info-block grey3">--}}
                        {{--<i class="fo fo-sand fo-big"></i>--}}
                        {{--<p class="text">Ваше замовлення не підтверджено</p>--}}
                    {{--</div>--}}
                    {{--<a href="#" class="link-red f14"><i class="fo fo-close-bold fo-small"></i> Відмінити </a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="wide-thumb account-orders">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-4">--}}
                {{--<div class="image"><img src="/uploads/food1.jpg" class="img-responsive" alt=""></div>--}}
            {{--</div>--}}
            {{--<div class="col-md-5">--}}
                {{--<div class="caption">--}}
                    {{--<a href="/adverts/1" class="title link-black">М'ясне рагу з овочами</a>--}}
                    {{--<span class="rating"><span class="stars">{{rand(0,5)}}</span>10 відгуків</span>--}}
                    {{--<div class="grey-block grey3 wide">--}}
                        {{--<p class="text-left"><a href="#" class="link-red"><i class="fo fo-deal"></i> Страва під замовлення</a></p>--}}
                        {{--<p class="text-left"><span class="price">80 грн.</span></p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 left-border">--}}
                {{--<div class="caption text-center">--}}
                    {{--<div class="info-block green-light">--}}
                        {{--<i class="fo fo-ok fo-big"></i>--}}
                        {{--<p class="text">Ви клієнт на страву</p>--}}
                    {{--</div>--}}
                    {{--<a href="#" class="button button-red v40"><i class="fo fo-message"></i> Залишити відгук</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--<div class="wide-thumb account-orders">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-4">--}}
                {{--<div class="image"><img src="/uploads/food1.jpg" class="img-responsive" alt=""></div>--}}
            {{--</div>--}}
            {{--<div class="col-md-5">--}}
                {{--<div class="caption">--}}
                    {{--<a href="/adverts/1" class="title link-black">М'ясне рагу з овочами</a>--}}
                    {{--<span class="rating"><span class="stars">{{rand(0,5)}}</span>10 відгуків</span>--}}
                    {{--<div class="grey-block grey3 wide">--}}
                        {{--<i class="fo fo-serving fo-2x"></i>--}}
                        {{--<p class="text">Пропозиція закінчилася</p>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--<div class="col-md-3 left-border">--}}
                {{--<div class="caption text-center">--}}
                    {{--<div class="info-block red">--}}
                        {{--<i class="fo fo-dish-search"></i>--}}
                        {{--<span class="red">0</span><span class="black">/5</span>--}}
                        {{--<p class="text">Залишилося порцій</p>--}}
                    {{--</div>--}}
                    {{--<a href="#" class="button button-grey v40"><i class="fo fo-message"></i> Ваш відгук</a>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}



@endsection

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