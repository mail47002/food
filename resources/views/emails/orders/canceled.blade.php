@component('mail::message')
    # Заказ отменен

    Повар {{ $order->advert->user->name }} відмовила на замовлення

    @component('mail::button', ['url' => ''])
        Перейти на сайт
    @endcomponent

    Це повідомлення надіслано з сайта <a herf="#">{{ config('app.name') }}</a>
@endcomponent