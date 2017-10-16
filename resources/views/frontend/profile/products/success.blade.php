@extends('frontend.layouts.default')

@section('content')
    <div class="bg-yellow text-center">
        <div class="v-indent-30"></div>
        <p><i class="fo fo-ok fo-large red"></i></p>
        <h5 class="text-upper black margin-30">Страва додана до каталогу</h5>
        <div class="v-indent-20"></div>
    </div>
    <div class="container text-center">
        <div class="v-indent-20"></div>
        <p class="f20">Створити оголошення</p>
        <a href="#" class="button-rectang"><i class="fo fo-time fo-2x"></i>Страва на дату</a>
        <a href="#" class="button-rectang"><i class="fo fo-dish-ready fo-2x"></i>Готова страва</a>
        <a href="#" class="button-rectang"><i class="fo fo-deal fo-2x"></i>Страва під замовлення</a>
        <div class="v-indent-40"></div>
        <hr class="w-900">
        <p><a href="{{ route('profile.products.show', session()->get('product')) }}" class="link-grey3 f16">Перейти на сторінку страви <i class="fo fo-arrow-right fo-small"></i></a></p>
        <p><a href="{{ route('profile.products.index') }}" class="link-grey3 f16">Перейти у мій каталог страв <i class="fo fo-arrow-right fo-small"></i></a></p>
    </div>
@endsection