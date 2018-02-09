@if($notification->type === 'App\Notifications\OrderCreated')
    <li class="top-message clients">
        <a href="{{ route('account.notifications.index', ['notify' => $notification->id]) }}">
            <div class="avatar">
                <div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
            </div>
            <div class="message">
                <strong><object>Вам зробила замовлення <a href="/account/#" class="link-blue">{{ $notification->data['user']['name'] }}</a> на страву з меню</object></strong>
                <p>В принципе вкусно,если сделать для одного ....</p>
                <p class="date">{{ Date::parse($notification->created_at)->format('H:i d F Y') }}</p>
            </div>
        </a>
    </li>
@endif

@if($notification->type === 'App\Notifications\OrderConfirmed')
    <li class="top-message ">
        <a href="{{ route('account.notifications.index', ['notify' => $notification->id]) }}">
            <div class="avatar">
                <div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
            </div>
            <div class="message">
                <strong><object>Повар <a href="/account/#" class="link-blue">{{ $notification->data['advert']['user']['name'] }}</a> підтвердила ваше замовлення</object></strong>
                <p>В принципе вкусно,если сделать для одного ....</p>
                <p class="date">{{ Date::parse($notification->created_at)->format('H:i d F Y') }}</p>
            </div>
        </a>
    </li>
@endif

@if($notification->type === 'App\Notifications\OrderCanceled')
    <li class="top-message order">
        <a href="{{ route('account.notifications.index', ['notify' => $notification->id]) }}">
            <div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>
            <div class="message">
                <strong><object>Повар <a href="/account/#" class="link-blue">{{ $notification->data['advert']['user']['name'] }}</a> відмовила на замовленняя</object></strong>
                <p>В принципе вкусно,если сделать для одного ....</p>
                <p class="date">{{ Date::parse($notification->created_at)->format('H:i d F Y') }}</p>
            </div>
        </a>
    </li>
@endif

@if($notification->type === 'App\Notifications\CallbackStored')
    <li class="top-message phone">
        <a href="{{ route('account.notifications.index', ['notify' => $notification->id]) }}">
            <div class="avatar">
                <div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
            </div>
            <div class="message">
                <strong><object>Повідомлення від <a href="/account/#" class="link-blue">{{ $notification->data['user']['name'] }}</a></object></strong>
                <p>В принципе вкусно,если сделать для одного ....</p>
                <p class="date">{{ Date::parse($notification->created_at)->format('H:i d F Y') }}</p>
            </div>
        </a>
    </li>
@endif

@if($notification->type === 'App\Notifications\AdvertDeleted')
    <li class="top-message deleted">
        <a href="{{ route('account.notifications.index', ['notify' => $notification->id]) }}">
            <div class="avatar">
                <div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
            </div>
            <div class="message">
                <strong><object>Ваше оголошення видалено</object></strong>
                <p>В принципе вкусно,если сделать для одного ....</p>
                <p class="date">{{ Date::parse($notification->created_at)->format('H:i d F Y') }}</p>
            </div>
        </a>
    </li>
@endif

{{--<li class="top-message email">--}}{{-- менять цвет --}}
    {{--<a href="#">--}}{{-- Ссылка на сообщение ? --}}
        {{--<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>--}}
        {{--<div class="message">--}}
            {{--<strong><object>Лист від <a href="/account/#" class="link-blue">Вікторії</a></object></strong>--}}
            {{-- Вложеные ссылки - только в <object> --}}
            {{--<p>В принципе вкусно,если сделать для одного ....</p>--}}
            {{--<p class="date">10:15 2 липня 2016</p>--}}
        {{--</div>--}}
    {{--</a>--}}
{{--</li>--}}

{{--<li class="top-message review">--}}
    {{--<a href="#">--}}{{-- Ссылка на сообщение ? --}}
        {{--<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>--}}
        {{--<div class="message">--}}
            {{--<strong><object>Повар <a href="/account/#" class="link-blue">Оксана</a> відповіла на ваш відгук про страву</object></strong>--}}
            {{--<p>В принципе вкусно,если сделать для одного ....</p>--}}
            {{--<p class="date">10:15 2 липня 2016</p>--}}
        {{--</div>--}}
    {{--</a>--}}
{{--</li>--}}