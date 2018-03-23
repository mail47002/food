<div class="item">
    <div class="product-thumb">

        <div class="image">
            <img src="/uploads/food1.jpg" class="img-responsive" alt="">

            @auth
                <div class="distance">
                    <i class="fo fo-small fo-marker red"></i>
                    {{ Geo::getDistance(['lat' => auth()->user()->profile->lat, 'lng' => auth()->user()->profile->lng], ['lat' => $advert->lat, 'lng' => $advert->lng]) }} км
                </div>
            @endauth

            <div class="sticker {{ $advert->sticker }}"></div>
        </div>

        <div class="caption">
            <a href="/adverts/1" class="title link-black">{{ $advert->name }}</a>
            <p>
                <span class="price">{{ $advert->price }} грн.</span>
                <span class="rating">
                    <span class="stars"><?=rand(0,5)?></span>10 відгуків
                </span>
            </p>
            <p><i class="time"></i>15 грудня (обід)</p>
        </div>

        <button type="button" class="button button-grey order">Замовити</button>

    </div>
</div>