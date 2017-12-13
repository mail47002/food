<div class="wide-thumb account-orders">
    <div class="row">
        <div class="col-md-4">
            <div class="image"><img src="{{ HtmlHelper::getAdvertThumbnailUrl($order->advert) }}" class="img-responsive" alt=""></div>
        </div>
        <div class="col-md-5">
            <div class="caption">
                <a href="{{ route('account.adverts.show', $order->advert->id) }}" class="title link-black">{{ $order->advert->name }}</a>
                <span class="rating"><span class="stars">{{rand(0,5)}}</span>10 відгуків</span>

                <div class="grey-block grey3 wide">
                    <p class="text-left"><a href="#" class="link-red"><i class="fo fo-time"></i> Страва у меню</a></p>
                    <p class="text-left"><span class="price">{{ $order->advert->price }} грн.</span></p>
                    <p class="text-left black">15 грудня (обід)</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 left-border">
            <div class="caption text-center">
                <div class="info-block red">
                    Замовлення очікує на підтвердження!
                </div>
                <a href="#" class="button button-red v40">Підтвердити замовлення </a>
                <a href="#" class="link-red f14"><i class="fo fo-close-bold fo-small"></i> Відмінити </a>
            </div>
        </div>
    </div>
</div>