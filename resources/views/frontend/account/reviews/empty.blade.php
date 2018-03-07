<div class="empty-block">
    @if(Helper::isClientReviews())
        <i class="fo fo-people fo-big block"></i>
        <p>Ви не залишали відгуки про клієнтів!</p>
    @else
        <i class="fo fo-dish-search fo-big block"></i>
        <p>Ви не залишали відгуки про поварів!</p>
        <a href="{{ url('/') }}" class="button button-red button-empty-block">Замовити страву</a>
    @endif
</div>