@extends('frontend.layouts.default')

@section('content')
    <div class="bg-yellow text-center">
        <div class="v-indent-30"></div>
        <p><i class="fo fo-ok fo-large red"></i></p>
        <h5 class="text-upper black margin-30">Оголошення додано до</h5>
        <div class="v-indent-20"></div>
        <p class="red f20 margin-zerro"><i class="fo fo-time fo-2x"></i> Страва на дату</p>
    </div>
    <div class="container text-center">
        <div class="v-indent-20"></div>
        <hr class="w-900">
        <p><a href="{{ route('account.products.show', session()->get('product')) }}" class="link-grey3 f16">Перейти на сторінку страви <i class="fo fo-arrow-right fo-small"></i></a></p>
        <p><a href="{{ route('account.products.index') }}" class="link-grey3 f16">Перейти у мій каталог страв <i class="fo fo-arrow-right fo-small"></i></a></p>
    </div>
@endsection