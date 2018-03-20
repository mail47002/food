@extends('frontend.layouts.account')
@section('title')Reviews - @stop

@section('content')
    <h5 class="text-upper underline-red">Мої відгуки ({{ $productReviews + $userReviews }})</h5>
    <hr class="zerro-top">

    <div class="filter-block">
        <ul class="categories list-inline text-center">
            <li class="{{ Helper::isProductReviews() ? 'active' : '' }}">
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
    <script type="text/javascript">
        $('form').on('submit', function (e) {
            e.preventDefault();

            var form = $(this);

            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                beforeSend: function () {
                    $('.body-overlay').addClass('active');
                },
                success: function (response) {
                    if (response.data) {
                        var el = $('#review-' + response.data.product_review_id),
                            html = '';

                        html += '<div class="title">Ваша відповідь</div>';
                        html += '<div class="message">' + response.data.text + '</div>';
                        html += '<div class="right-avatar">';
                        html += '<div class="avatar">';
                        html += '<div class="rounded">';
                        html += '<img src="{{ auth()->user()->getAvatar() }}" alt="{{ auth()->user()->profile->first_name }}">';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';

                        el.find('.js-answer').html(html);
                        el.find('.your-message').remove();
                    }
                },
                complete: function () {
                    $('.body-overlay').removeClass('active');
                },
                error: function(response){
                    var response = response.responseJSON;

                    for (name in response.errors) {
                        $('[name="' + name + '"]').addClass('error').closest('.form-group').addClass('has-error');
                    }
                }
            });
        });
    </script>
@endpush