<div class="wide-thumb">
    <div class="row">
        <div class="col-md-4">
            <div class="image">
                <img class="img-responsive" src="{{ Helper::getProductThumbnailUrl($product) }}" alt="{{ $product->name }}">
            </div>
        </div>
        <div class="col-md-5">
            <div class="caption">
                <a href="{{ route('account.products.show', $product->id) }}" class="title link-black">{{ $product->name }}</a>
                <p><span class="rating"><span class="stars">{{ $product->rating }}</span>{{ count($product->reviews) }} відгуків</span></p>

                @if (count($product->adverts) > 0)
                    @foreach($product->adverts as $advert)
                        @if ($advert->type === 'by_date')
                            <p><a href="#" class="link-red-dark"><i class="fo fo-time"></i> Страва у меню</a></p>
                        @endif

                        @if ($advert->type === 'in_stock')
                            <p><a href="#" class="link-red-dark"><i class="fo fo-dish-ready"></i> Готова страва</a></p>
                        @endif

                        @if ($advert->type === 'pre_order')
                            <p><a href="#" class="link-red-dark"><i class="fo fo-deal"></i> Страва під замовлення</a></p>
                        @endif
                    @endforeach
                @endif
            </div>
        </div>
        <div class="col-md-3 left-border">
            <div class="caption text-center">
                @if (count($product->adverts) > 0)
                    @foreach($product->adverts as $advert)
                        @if ($advert->type === 'by_date')
                            <a href="#" class="button button-grey disabled"><i class="fo fo-time"></i> Додати до меню</a>
                        @else
                            <a href="{{ route('account.adverts.create', ['type' => 'by_date', 'pid' => $product->id]) }}" class="button button-grey"><i class="fo fo-time"></i> Додати до меню</a>
                        @endif

                        @if ($advert->type === 'in_stock')
                            <a href="#" class="button button-grey disabled"><i class="fo fo-dish-ready"></i> Готова страва</a>
                        @else
                            <a href="{{ route('account.adverts.create', ['type' => 'in_stock', 'pid' => $product->id]) }}" class="button button-grey"><i class="fo fo-dish-ready"></i> Готова страва</a>
                        @endif

                        @if ($advert->type === 'pre_order')
                            <a href="#" class="button button-grey disabled"><i class="fo fo-deal"></i> Під замовлення</a>
                        @else
                            <a href="{{ route('account.adverts.create', ['type' => 'pre_order','pid' => $product->id]) }}" class="button button-grey"><i class="fo fo-deal"></i> Під замовлення</a>
                        @endif
                    @endforeach
                @else
                    <a href="{{ route('account.adverts.create', ['type' => 'by_date', 'pid' => $product->id]) }}" class="button button-grey"><i class="fo fo-time"></i> Додати до меню</a>
                    <a href="{{ route('account.adverts.create', ['type' => 'in_stock', 'pid' => $product->id]) }}" class="button button-grey"><i class="fo fo-dish-ready"></i> Готова страва</a>
                    <a href="{{ route('account.adverts.create', ['type' => 'pre_order', 'pid' => $product->id]) }}" class="button button-grey"><i class="fo fo-deal"></i> Під замовлення</a>
                @endif


                <a href="{{ route('account.products.edit', $product->id) }}" class="button-half link-blue"><i class="fo fo-edit fo-small"></i> Редагувати</a>
                <a href="#" class="button-half link-grey js-modal-product-delete" data-toggle="modal" data-target="#modal-product-delete" data-product-id="{{ $product->id }}"><i class="fo fo-delete fo-small"></i> Видалити</a>
            </div>
        </div>
    </div>
</div>