@if(Helper::isClientReviews())
    <div class="empty-block">
        <i class="fo fo-dish-search fo-big block"></i>
        <p>У повара ще немає відгуків!</p>

        @if($hasOrder)
            <a href="{{ route('profile.reviews.create', $user->profile->slug) }}" class="button button-red button-empty-block">Залишити відгук</a>
        @else
            <a href="#" class="button button-red button-empty-block" data-toggle="modal" data-target="#modal_warning">Залишити відгук</a>
        @endif
    </div>
@else
    <div class="empty-block">
        <i class="fo fo-people fo-big block"></i>
        <p>Це ваш клієнт!</p>
        <a href="#" class="button button-red button-empty-block" data-toggle="modal" data-target="#modal_warning">Залишити відгук</a>
    </div>
@endif