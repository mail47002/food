@component('mail::message')
    # Повідомлення від {{ $user->name }}

    Зателефонуйте, будь ласка, за номером {{ $phone }}.
    Я хочу замовити страву <a href="#">{{ $advert->name }}</a>

    Це повідомлення надіслано з сайта <a herf="#">{{ config('app.name') }}</a>
@endcomponent