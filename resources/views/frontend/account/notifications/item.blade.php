{{-- Order stored --}}
@if($notification->type === 'App\Notifications\OrderCreated')
    <div class="wide-thumb profile-messages clients">
        <div class="left with-image">
            <div class="title">Вам зробила замовлення <a href="{{ route('profile.user.show', $notification->data['user']['slug']) }}" class="link-blue">{{ $notification->data['user']['name'] }}</a> на страву з меню</div>
            <div class="avatar">
                <div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>
            </div>
            <div class="message">
                <p><a href="#" class="link-blue">{{ $notification->data['advert']['name'] }}</a> </p>
                @if(Helper::isAdvertByDate($notification->data['advert']['type']))
                    @if($notification->data['advert']['everyday'])
                        <p><i class="fo fo-dish-ready red"></i>{{ Date::parse($notification->data['advert']['date_from'])->format('d F') }} - {{ Date::parse($notification->data['advert']['date_to'])->format('d F') }}</p>
                    @else
                        <p><i class="fo fo-time red"></i>{{ Date::parse($notification->data['advert']['date'])->format('d F') }} ({{ Helper::getHumanAdvertTime($notification->data['advert']['time']) }})</p>
                    @endif
                @endif

                @if(Helper::isAdvertInStock($notification->data['advert']['type']))
                    <p><i class="fo fo-time red"></i> {{ Date::parse($notification->data['advert']['date'])->format('d F') }} ({{ Helper::getHumanAdvertTime($notification->data['advert']['time']) }})</p>
                @endif

                @if(Helper::isAdvertPreOrder($notification->data['advert']['type']))
                    <p><i class="fo fo-dish-ready red"></i> {{ Date::parse($notification->data['advert']['date_from'])->format('d F') }} - {{ Date::parse($notification->data['advert']['date_to'])->format('d F') }}</p>
                @endif
            </div>
        </div>
        <div class="right left-border">
            <p class="date">{{ Date::parse($notification->created_at)->format('H:i d F Y') }}</p>

            @if(auth()->id() === $notification->data['advert']['user']['id'] && $notification->order && Helper::isOrderCreated($notification->order->status))
                {{ Form::open(['route' => ['account.orders.confirm', $notification->order->id], 'method' => 'put']) }}
                    <button class="button button-orange" type="submit">
                        <i class="fo fo-ok"></i> Підтвердити
                    </button>
                {{ Form::close() }}
            @endif
        </div>
    </div>
@endif

{{-- Order confirmed --}}
@if($notification->type === 'App\Notifications\OrderConfirmed')
    <div class="wide-thumb profile-messages success">
        <div class="left with-image">
        	<div class="title">Повар <a href="{{ route('profile.user.show', $notification->data['advert']['user']['slug']) }}" class="link-blue">{{ $notification->data['advert']['user']['name'] }}</a> підтвердила ваше замовлення</div>
            <div class="avatar">
                <div class="rounded">
                    <img src="http://lorempixel.com/50/50/" alt="foto">
                </div>
            </div>
            <div class="message">
                <p><a href="#" class="link-blue">{{ $notification->order['advert']['name'] }}</a> </p>
                <p><i class="fo fo-time red"></i>15 грудня (обід) <span class="price">{{ $notification->data['order']['price'] }} грн.</span></p>
            </div>
        </div>
        <div class="right left-border">
            <p class="date">{{ Date::parse($notification->created_at)->format('H:i d F Y') }}</p>
        </div>
    </div>
@endif

{{-- Order canceled --}}
@if($notification->type === 'App\Notifications\OrderCanceled')
    <div class="wide-thumb profile-messages order-discard">
        <div class="left with-image">
            <div class="title">Повар <a href="{{ route('profile.user.show', $notification->data['advert']['user']['slug']) }}" class="link-blue">{{ $notification->data['advert']['user']['name'] }}</a> відмовила на замовленняя</div>
            <div class="avatar">
                <div class="rounded">
                    <img src="/uploads/avatar.png" alt="foto">
                </div>
            </div>
            <div class="message">
                <p><a href="#" class="link-blue">{{ $notification->data['advert']['name'] }}</a> </p>
                <p><i class="fo fo-time red"></i>15 грудня (обід) <span class="price">{{ $notification->data['order']['price'] }} грн.</span></p>
            </div>
        </div>
        <div class="right left-border">
            <p class="date">{{ Date::parse($notification->created_at)->format('H:i d F Y') }}</p>

            @if($notification->order && Helper::isOrderCanceled($notification->order->status))
                {{ Form::open(['route' => ['account.orders.destroy', $notification->order->id], 'method' => 'delete']) }}
                    <button class="button button-red" type="submit"><i class="fo fo-close-bold fo-small"></i> Підтвердити</button>
                {{ Form::close() }}
            @endif
        </div>
    </div>
@endif

{{-- Order deleted --}}
@if($notification->type === 'App\Notifications\AdvertDeleted')
    <div class="wide-thumb profile-messages deleted">
        <div class="left with-image">
            <div class="title">Ваше оголошення видалено</div>
            <div class="message">
                <p><a href="#" class="link-grey">М'ясне рагу з овочами</a> </p>
                <p><i class="fo fo-time red"></i>15 грудня (обід) <span class="price">80 грн.</span></p>
            </div>
        </div>
        <div class="right left-border">
            <p class="date">{{ Date::parse($notification->created_at)->format('H:i d F Y') }}</p>
        </div>
    </div>
@endif

{{-- Callback stored --}}
@if($notification->type === 'App\Notifications\CallbackStored')
    <div class="wide-thumb profile-messages phone">
        <div class="left with-image">

            <div class="title">Повідомлення від <a href="{{ route('profile.user.show', $notification->data['user']['slug']) }}" class="link-blue">{{ $notification->data['user']['name']}}</a></div>
            <div class="avatar">
                <div class="rounded">
                    <img src="/uploads/avatar.png" alt="foto">
                </div>
            </div>
            <div class="message">
                <p>Зателефонуйте, будь ласка, по номеру {{ $notification->data['phone'] }}<br>Я хочу замовити страву <a href="{{ route('account.adverts.show', $notification->data['advert']['id']) }}" class="link-blue">{{ $notification->data['advert']['name'] }}</a> </p>
            </div>
        </div>
        <div class="right left-border">
            <p class="date">{{ Date::parse($notification->created_at)->format('H:i d F Y') }}</p>
        </div>
    </div>
@endif

{{--<div class="wide-thumb profile-messages email">--}}
{{--<div class="left">--}}
{{--<div class="title">Лист від <a href="/profile/#" class="link-blue">Вікторії</a></div>--}}
{{--<div class="avatar"><div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div></div>--}}
{{--<div class="message">--}}
{{--<p>В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховата, но...</p>--}}
{{--</div>--}}

{{--</div>--}}
{{--<div class="right left-border">--}}
{{--<p class="date">10:15 2 липня 2016</p>--}}
{{--<a href="#" class="button button-blue-medium"><i class="fo fo-back"></i> Відповісти</a>--}}
{{--</div>--}}
{{--</div>--}}


{{--<div class="wide-thumb profile-messages order">--}}
{{--<div class="left with-image">--}}
{{--<div class="title">Повар <a href="/profile/#" class="link-blue">Оксана</a> відмовила на замовленняя</div>--}}
{{--<div class="avatar"><div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div></div>--}}
{{--<div class="message">--}}
{{--<p><a href="#" class="link-blue">М'ясне рагу з овочами</a> </p>--}}
{{--<p><i class="fo fo-time red"></i>15 грудня (обід) <span class="price">80 грн.</span></p>--}}
{{--</div>--}}

{{--<div class="image hidden-xs"><img src="/uploads/food2.jpg" alt=""></div>--}}
{{--</div>--}}
{{--<div class="right left-border">--}}
{{--<p class="date">10:15 2 липня 2016</p>--}}
{{--</div>--}}
{{--</div>--}}

{{--<div class="wide-thumb profile-messages review">--}}
{{--<div class="left with-image">--}}
{{--<div class="title">Повар <a href="/profile/#" class="link-blue">Оксана</a> відповіла на ваш відгук про страву</div>--}}
{{--<div class="avatar"><div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div></div>--}}
{{--<div class="message">--}}
{{--<p><a href="#" class="link-blue">М'ясне рагу з овочами</a> </p>--}}
{{--<p class="rating"><span class="stars">{{rand(0,5)}}</span></p>--}}
{{--<p>В принципе вкусно,если сделать для одного раза,а так: гарнир...</p>--}}
{{--</div>--}}

{{--<div class="image hidden-xs"><img src="/uploads/food2.jpg" alt=""></div>--}}
{{--</div>--}}
{{--<div class="right left-border">--}}
{{--<p class="date">10:15 2 липня 2016</p>--}}
{{--<a href="#" class="button button-green"><i class="fo fo-message"></i> Відповісти</a>--}}
{{--</div>--}}
{{--</div>--}}