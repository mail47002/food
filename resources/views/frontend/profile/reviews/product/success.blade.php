@extends('frontend.layouts.default')

@section('title')Reviews - @stop

@section('content')
    <div class="bg-yellow text-center">
        <div class="v-indent-120"></div>

        <p><i class="fo fo-cook fo-large red"></i></p>

        <h5 class="text-upper">Ви залишили відгук про повара</h5>

        <div class="v-indent-60"></div>
    </div>


    <div class="container-half text-center">
        <div class="v-indent-40"></div>

        <p>
            <a href="{{ route('account.reviews.index') }}" class="link-grey3 f16">
                Перейти на сторінку моїх відгуків <i class="fo fo-arrow-right fo-small"></i>
            </a>
        </p>
        <p>
            <a href="{{ route('profile.user.show', $user->profile->slug) }}" class="link-grey3 f16">
                Перейти на сторінку повара <i class="fo fo-arrow-right fo-small"></i>
            </a>
        </p>
    </div>
@endsection
