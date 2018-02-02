@component('mail::message')
    # Нове замовлення

    Вам зрибила замовлення {{ $order->user->name }} на готову страву

    @component('mail::button', ['url' => ''])
        Перейти на сайт
    @endcomponent

    Це повідомлення надіслано з сайта <a herf="#">{{ config('app.name') }}</a>
@endcomponent