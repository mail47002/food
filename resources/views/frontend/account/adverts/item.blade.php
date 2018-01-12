<div class="wide-thumb account-adverts">
    <div class="row">
        <div class="col-md-4">
            <div class="image">
                <img src="{{ Helper::getAdvertThumbnailUrl($advert) }}" class="img-responsive" alt="{{ $advert->name }}">
            </div>
        </div>
        <div class="col-md-5">
            <div class="caption">
                <a href="{{ route('account.adverts.show', $advert->id) }}" class="title link-black">{{ $advert->name }}</a>

                <span class="rating">
                    <span class="stars">{{ $advert->product->rating }}</span>{{ count($advert->product->reviews) }} відгуків
                </span>

                <p><span class="price">{{ $advert->price }} грн.</span></p>

                @if(Helper::isAdvertByDate())
                    @if($advert->everyday)
                        <p><i class="fo fo-dish-ready red"></i>{{ Date::parse($advert->date_from)->format('d F') }} - {{ Date::parse($advert->date_to)->format('d F') }}</p>
                    @else
                        <p><i class="fo fo-time red"></i>{{ Date::parse($advert->date)->format('d F') }} ({{ Helper::getHumanAdvertTime($advert->time) }})</p>
                    @endif
                @endif

                <p><a href="{{ route('account.adverts.edit', $advert->id) }}" class="link-blue"><i class="fo fo-edit fo-inheirt"></i> Редагувати</a></p>
                <p><a href="#" class="link-grey js-modal-advert-delete" data-toggle="modal" data-target="#modal_advert-delete"><i class="fo fo-delete fo-inheirt"></i> Відмінити</a></p>
            </div>
        </div>
        <div class="col-md-3 left-border">
            <div class="caption text-center">
                <div class="grey-block red">
                    <i class="fo fo-dish-search"></i>
                    <span class="red">XX</span><span class="black">/{{ $advert->quantity }}</span>
                    <p class="text">Залишилося порцій</p>
                </div>

                <a href="#" class="button button-green" data-toggle="modal" data-target="#modal_clients">
                    <i class="fo fo-ok"></i> Клієнти на страву
                </a>
                <a href="#" class="button button-orange js-orders" data-id="{{ $advert->id }}">
                    <i class="fo fo-peoples"></i> Нові замовленя
                </a>
            </div>
        </div>
    </div>
</div>