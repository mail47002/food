@extends('frontend.layouts.default')

@section('content')
    <div class="bg-yellow text-center">
        <div class="v-indent-30"></div>
        <p><i class="fo fo-ok fo-large red"></i></p>
        <h5 class="text-upper black margin-30">Порада додана до каталогу</h5>
        <div class="v-indent-20"></div>
    </div>
    <div class="container text-center">
        <p><a href="{{ route('profile.articles.index') }}" class="link-grey3 f16">Перейти у мій каталог статей <i class="fo fo-arrow-right fo-small"></i></a></p>
    </div>
@endsection