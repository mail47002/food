@component('mail::message')
    # Заказ підтверджено

    Повар {{ $order->advert->user->name }} відмовила ваше замовлення

    @component('mail::button', ['url' => ''])
        Перейти на сайт
    @endcomponent

    Це повідомлення надіслано з сайта <a herf="#">{{ config('app.name') }}</a>
@endcomponent