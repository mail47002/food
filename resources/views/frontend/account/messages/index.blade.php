@extends('frontend.layouts.account')

@section('content')
    <h5 class="text-upper underline-red">Мої повідомлення</h5><hr class="zerro-top">

    @include('frontend.account.notifications.menu')

    <div class="v-indent-20"></div>

    <div class="tab-content">
        <div id="messages" class="tab-pane fade in active">

            @if(count($threads) > 0)
                @each('frontend.account.messages.item', $threads, 'thread')
            @endif

        </div>
    </div>
@endsection