@extends('backend.layouts.default')

@push('styles')
    <link href="{{ asset('backend/vendor/summernote/summernote.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1 class="heading-title">FAQs <small>Редактирование</small></h1>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-default" href="{{ route('admin.faqs.index') }}"><i class="la la-arrow-left"></i> Назад</a>
                <button class="btn btn-success" type="submit" form="form-page"><i class="la la-check"></i> Сохранить</button>
            </div>
        </div>
        @if (session('success'))
            <div class="alert alert-success alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                {{ session('success') }}
            </div>
        @endif
        {!! Form::open(['route' => ['admin.faqs.update', $faqs->id], 'method' => 'put', 'id' => 'form-page']) !!}
            @include('backend.faqs._form')
        {!! Form::close() !!}
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/vendor/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('backend/js/editor.js') }}"></script>
@endpush