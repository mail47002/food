@extends('frontend.layouts.account')

@section('content')
    <h5 class="text-upper underline-red">Мої повідомлення</h5><hr class="zerro-top">

    <div class="filter-block">
        <ul class="categories list-inline text-center">
            <li><a href="{{ route('account.notifications.index') }}" class="link-red text-upper">Повідомлення</a></li>
            <li class="active"><a href="{{ route('account.messages.index') }}" class="link-red text-upper">Переписка</a></li>
        </ul>
        <hr class="red-border">
    </div>

    <div class="v-indent-20"></div>

    <div class="tab-content">
        <div id="messages" class="tab-pane fade in active">

            @if(count($messages) > 0)
                @each('frontend.account.messages.item', $messages, 'message')
            @endif

        </div>
    </div>
@endsection