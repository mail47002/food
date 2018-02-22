@component('mail::message')
    # Нове повідомлення

    @component('mail::button', ['url' => ''])
        Перейти на сайт
    @endcomponent

    Це повідомлення надіслано з сайта <a herf="#">{{ config('app.name') }}</a>
@endcomponent