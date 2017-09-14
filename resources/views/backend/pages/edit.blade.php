@extends('backend.layouts.default')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1 class="heading-title">Страница <small>Редактирование</small></h1>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-default" href="{{ route('pages.index') }}"><i class="la la-arrow-left"></i> Назад</a>
                <button class="btn btn-success" type="submit" form="form-page"><i class="la la-check"></i> Сохранить</button>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session('success') }}
            </div>
        @endif
        {!! Form::open(['route' => ['pages.update', $page->id], 'method' => 'put', 'id' => 'form-page']) !!}
            @include('backend.pages._form')
        {!! Form::close() !!}
    </div>
@endsection