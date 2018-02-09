@extends('frontend.layouts.account')

@section('content')
    <h5 class="text-upper underline-red">Мої повідомлення</h5><hr class="zerro-top">

    @include('frontend.account.notifications.menu')

    <div class="v-indent-20"></div>

    <div class="tab-content">
        <div id="notice" class="tab-pane fade in active">

            @if(count($notifications) > 0)
                @each('frontend.account.notifications.item', $notifications, 'notification')
            @endif

        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        var url = new URL(window.location),
            id = url.searchParams.get('notify');

        if (id) {
            $('html, body').animate({
                scrollTop: $('#' + id).offset().top
            }, 1500);
        }

    </script>
@endpush