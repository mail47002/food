@if($notification->type === 'App\Notifications\OrderCreated')
    <li class="top-message clients">
        <a href="#">{{-- Ссылка на сообщение ? --}}
            <div class="avatar">
                <div class="rounded"><img src="{{ asset($notification->data['image']) }}" alt="foto"></div>
            </div>
            <div class="message">
                <storng><object>{!! $notification->data['title'] !!}</object></storng>
                <p class="date">{{ $notification->created_at }}</p>
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

{{--<li class="top-message phone">--}}
    {{--<a href="#">--}}{{-- Ссылка на сообщение ? --}}
        {{--<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>--}}
        {{--<div class="message">--}}
            {{--<strong><object>Повідомлення від <a href="/account/#" class="link-blue">Вікторії</object></strong>--}}
            {{--<p>В принципе вкусно,если сделать для одного ....</p>--}}
            {{--<p class="date">10:15 2 липня 2016</p>--}}
        {{--</div>--}}
    {{--</a>--}}
{{--</li>--}}

{{--<li class="top-message clients">--}}
    {{--<a href="#">--}}{{-- Ссылка на сообщение ? --}}
        {{--<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>--}}
        {{--<div class="message">--}}
            {{--<strong><object>Вам зробила замовлення <a href="/account/#" class="link-blue">Марія</a> на страву з меню</object></strong>--}}
            {{--<p>В принципе вкусно,если сделать для одного ....</p>--}}
            {{--<p class="date">10:15 2 липня 2016</p>--}}
        {{--</div>--}}
    {{--</a>--}}
{{--</li>--}}

{{--<li class="top-message order">--}}
    {{--<a href="#">--}}{{-- Ссылка на сообщение ? --}}
        {{--<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>--}}
        {{--<div class="message">--}}
            {{--<strong><object>Повар <a href="/account/#" class="link-blue">Оксана</a> відмовила на замовленняя</object></strong>--}}
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

{{--<li class="top-message deleted">--}}
    {{--<a href="#">--}}{{-- Ссылка на сообщение ? --}}
        {{--<div class="avatar"><div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div></div>--}}
        {{--<div class="message">--}}
            {{--<strong><object>Ваше оголошення видалено</object></strong>--}}
            {{--<p>В принципе вкусно,если сделать для одного ....</p>--}}
            {{--<p class="date">10:15 2 липня 2016</p>--}}
        {{--</div>--}}
    {{--</a>--}}
{{--</li>--}}