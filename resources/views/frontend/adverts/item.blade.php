<div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 advert">
    <div class="product-thumb">
        <div class="image">
            <a href="{{ route('adverts.show', $advert->slug) }}">
                <img src="{{ $advert->user->directory . 'thumbs/' . $advert->image }}" class="img-responsive" alt="{{ $advert->name }}">
            </a>
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
                    <br>
                @endif

                {{-- TO DO: Вывести рейтинг --}}

                <span class="rating">
                    <span class="stars">0</span> 0 відгуків
                </span>
            </p>

            @if(Helper::isAdvertByDate())
                <p>
                    <i class="fo fo-time red"></i>
                    {{ Date::parse($advert->date)->format('d F') }} ({{ Helper::getHumanAdvertTime($advert->time) }})
                </p>
            @endif

            @if(Helper::isAdvertInStock())
                <p>
                    <i class="fo fo-dish-ready red" title="Термін придатності"></i>
                    {{ Date::parse($advert->date)->format('d F') }} - {{ Date::parse($advert->date)->format('d F') }}
                </p>
            @endif
        </div>

        @if(auth()->guest())
            <button type="button" class="button button-grey order" data-toggle="modal" data-target="#modal_login">Замовити</button>
        @else
            <button type="button" class="button button-grey order" onclick="order.show({{ $advert->id }})">Замовити</button>
        @endif
    </div>
</div>