<div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
    <div class="product-thumb">
        <div class="image">
            <img src="{{ $product->user->directory . $product->image }}" class="img-responsive" alt="{{ $product->name }}">
        </div>
        <div class="caption">
            <a href="#" class="title link-black">{{ $product->name }}</a>
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