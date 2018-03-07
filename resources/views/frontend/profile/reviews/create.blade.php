@extends('frontend.layouts.default')

@section('title')Reviews - @stop

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="list-inline">
                <li>
                    <a href="{{ route('profile.user.show', $user->profile->slug) }}" class="link-blue text-upper js-return">
                        <i class="fo fo-arrow-left fo-small"></i>  Повернутися
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="bg-yellow text-center">
        <div class="v-indent-20"></div>

        <h5 class="text-upper black margin-30">Залишити відгук для</h5>

        <div class="avatar v90">
            <div class="rounded">
                <img src="{{ $user->getAvatar() }}" alt="{{ $user->profile->first_name }}">
            </div>
        </div>

        <a href="{{ route('profile.user.show', $user->profile->slug) }}" class="link-blue name f16 block">{{  $user->profile->first_name }}</a>

        <div class="v-indent-60"></div>
    </div>

    <div class="container text-center step-1">
        <div class="v-indent-120"></div>
        <div class="row">
            <div class="col-md-5 text-right">
                <a href="{{ route('profile.reviews.product.create', $user->profile->slug) }}" class="button-rectang text-center margin-zerro">
                    <i class="fo fo-cook fo-2x"></i>Ваш повар
                </a>
            </div>
            <div class="col-md-2"></div>
            <div class="col-md-5 text-left">
                <a href="{{ route('profile.reviews.client.create', $user->profile->slug) }}" class="button-rectang text-center margin-zerro">
                    <i class="fo fo-man fo-2x"></i>Ваш клієнт
                </a>
            </div>
        </div>
    </div>
@endsection