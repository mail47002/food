<div class="wide-thumb account-orders">
    <div class="row">
        <div class="col-md-4">
            <div class="image"><img src="{{ Helper::getAdvertThumbnailUrl($order->advert) }}" class="img-responsive" alt=""></div>
        </div>
        <div class="col-md-5">
            <div class="caption">
                <a href="{{ route('account.adverts.show', $order->advert->id) }}" class="title link-black">{{ $order->advert->name }}</a>
                <span class="rating"><span class="stars">{{rand(0,5)}}</span>10 відгуків</span>

                <div class="grey-block grey3 wide">
                    <p class="text-left">
                        <a href="{{ route('account.adverts.show', $order->advert->slug) }}" class="link-red">
                            @if(Helper::isAdvertByDate($order->advert->type))
                                <i class="fo fo-dish-ready red"></i>
                            @endif

                            @if(Helper::isAdvertInStock($order->advert->type))
                                <i class="fo fo-time red"></i>
                            @endif

                            @if(Helper::isAdvertPreOrder($order->advert->type))
                                    <i class="fo fo-dish-ready red"></i>
                            @endif

                            {{ Helper::getHumanAdvertType($order->advert->type) }}
                        </a>
                    </p>

                    <p class="text-left">
                        @if(Helper::isAdvertByDate($order->advert->type) || Helper::isAdvertPreOrder($order->advert->type))
                            <span class="price">{{ $order->price }} грн.</span>
                        @endif

                            @if(Helper::isAdvertPreOrder($order->advert->type))
                                <span class="price">{{ $order->price }} - {{ $order->custom_price }} грн.</span>
                            @endif
                    </p>

                    <p class="text-left black">15 грудня (обід)</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 left-border">
            <div class="caption text-center">
                @if(!Helper::isOrderConfirmed($order->type))
                    <div class="info-block red">
                        Замовлення очікує на підтвердження!
                    </div>

                    @if(auth()->id() !== $order->user_id)
                        {{ Form::open(['route' => ['account.orders.confirm', $order->id], 'method' => 'put']) }}
                        <button class="button button-red v40">Підтвердити замовлення</button>
                        {{ Form::close() }}
                    @endif

                    {{ Form::open(['route' => ['account.orders.destroy', $order->id], 'method' => 'delete']) }}
                        <button class="link-red f14" type="submit"><i class="fo fo-close-bold fo-small"></i> Відмінити</button>
                    {{ Form::close() }}
                @endif

                @if(Helper::isOrderConfirmed($order->type))
                    <div class="info-block green-light">
                        <i class="fo fo-ok fo-big"></i>
                        <p class="text">Ви клієнт на страву</p>
                    </div>

                    <a href="#" class="button button-red v40"><i class="fo fo-message"></i> Залишити відгук</a>
                @endif
            </div>
        </div>
    </div>
</div>