@extends('backend.layouts.default')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1 class="heading-title">Страница <small>Создание новой</small></h1>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-default" href="{{ route('pages.index') }}"><i class="la la-arrow-left"></i> Назад</a>
                <button class="btn btn-success" type="submit" form="form-page"><i class="la la-check"></i> Сохранить</button>
            </div>
        </div>
        {{--<div class="panel">--}}
            {{--<div class="panel-body">--}}
                {!! Form::open(['route' => 'pages.store', 'method' => 'post', 'id' => 'form-page']) !!}
                    @include('backend.pages._form')
                {!! Form::close() !!}
            {{--</div>--}}
        {{--</div>--}}
    </div>
@endsection