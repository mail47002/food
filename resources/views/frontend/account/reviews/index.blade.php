@extends('frontend.layouts.account')
@section('title')Reviews - @stop

@section('content')
    <h5 class="text-upper underline-red">Мої відгуки ({{ $productReviews + $userReviews }})</h5>
    <hr class="zerro-top">

    <div class="filter-block">
        <ul class="categories list-inline text-center">
            <li class="{{ Helper::isUserReviews() ? 'active' : '' }}">
                <a href="{{ route('account.reviews.index') }}" class="link-red text-upper">Відгуки про поварів ({{ $productReviews }})</a>
            </li>
            <li class="{{ Helper::isClientReviews() ? 'active' : '' }}">
                <a href="{{ route('account.reviews.index', ['type' => 'clients']) }}" class="link-red text-upper">Відгуки про клієнтів ({{  $userReviews }})</a>
            </li>
        </ul>
        <hr class="red-border">
    </div>

    <div class="tab-content">
        <div class="tab-pane fade in active">
            <div class="reviews profile-reviews">
                @if (count($reviews) > 0)
                    <ul class="list-unstyled">
                        @each('frontend.account.reviews.item', $reviews, 'entity')
                    </ul>

                    {{ $reviews->appends(request()->all())->links() }}
                @else
                    @include('frontend.account.reviews.empty')
                @endif
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $( function() {
            $("#sorting").selectmenu({
                change: function( e, ui ) {
                    var filter = $("#sorting").val();
                    {{-- Отсюда можна отсылать фильтр выпадайки --}}
                    console.log(filter);
                }
            });
            $(document).tooltip(
                {position: {my: "left top+10"}}
            );
        });
    </script>
@endpush