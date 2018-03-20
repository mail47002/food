@extends('frontend.layouts.account')

@section('title')Products - @stop

@section('content')
    @include('frontend.profile.header')

    <h5 class="text-upper underline-red">Відгуки ({{ $productReviews + $userReviews }})</h5>
    <hr class="zerro-top">

    <div class="filter-block">
        <ul class="categories list-inline text-center">
            <li class="{{ Helper::isProductReviews() ? 'active' : '' }}">
                <a href="{{ route('profile.user.show', $user->profile->slug) }}" class="link-red text-upper">
                    Відгуки про повара ({{ $productReviews }})
                </a>
            </li>
            <li class="{{ Helper::isClientReviews() ? 'active' : '' }}">
                <a href="{{ route('profile.user.show', ['slug' => $user->profile->slug, 'type' => 'clients']) }}" class="link-red text-upper">
                    Відгуки від поварів ({{ $userReviews }})
                </a>
            </li>
        </ul>
        <hr class="red-border">
    </div>

    <div class="reviews">
        @if(count($reviews) > 0)
            <ul class="list-unstyled">
                @each('frontend.profile.user.review', $reviews, 'entity')
            </ul>

            {{ $reviews->appends(request()->all())->links() }}
        @else
            @include('frontend.profile.user.empty')
        @endif
    </div>


    <!-- Modal -->
    <div id="modal_warning" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
                <div class="modal-body">
                    <p class="f18">Спершу зробіть замовлення, щоб залишити відгук про повара</p>

                    <a href="#" class="button button-red button-big-modal">Замовити страву</a>
                </div>
            </div>
        </div>
    </div>

@endsection