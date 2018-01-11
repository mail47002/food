<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 advert">
    <div class="product-thumb">
        <div class="image">
            <img src="{{ Helper::getAdvertThumbnailUrl($advert) }}" class="img-responsive" alt="{{ $advert->name }}">
            <div class="distance"><i class="fo fo-small fo-marker red"></i>5 км</div>
            <div class="sticker {{ $advert->sticker }}"></div>
        </div>

        <div class="caption">
            <a href="{{ route('adverts.show', $advert->slug) }}" class="title link-black">{{ $advert->name }}</a>
            <p>
                @if(Helper::isAdvertByDate() || Helper::isAdvertInStock())
                    <span class="price">{{ $advert->price }} грн.</span>
                @endif

                @if(Helper::isAdvertPreOrder())
                    <span class="price"><i class="fo fo-deal red"></i> {{ $advert->price }} - {{ $advert->custom_price }} грн.</span>
                @endif
            </p>
            <p>
                <span class="rating">
                    <span class="stars">{{ $advert->product->rating }}</span> {{ count($advert->product->reviews) }} відгуків
                </span>
            </p>

            @if (Helper::isAdvertByDate())
                <p><i class="fo fo-time red"></i>{{ Date::parse($advert->date)->format('d F') }} ({{ Helper::getHumanAdvertTime($advert->time) }})</p>
            @endif

            @if (Helper::isAdvertInStock())
                <p><i class="fo fo-dish-ready red" title="Термін придатності"></i> {{ Date::parse($advert->date)->format('d F') }} - {{ Date::parse($advert->date)->format('d F') }}</p>
            @endif
        </div>

        <button type="button" class="button button-grey order js-order" data-id="{{ $advert->id }}" {{ auth()->id() === $advert->user_id ? 'disabled' : '' }}>Замовити</button>
    </div>
</div>