@extends('frontend.layouts.default')

@section('title')Adverts - @stop

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{ route('account.adverts.index') }}" class="link-blue back"><i class="fa fa-long-arrow-left" aria-hidden="true"></i>  До оголошень</a></li>
            </ul>
        </div>
    </div>
@endsection