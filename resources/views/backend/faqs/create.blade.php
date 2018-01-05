@extends('backend.layouts.default')

@push('styles')
    <link href="{{ asset('backend/vendor/summernote/summernote.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1 class="heading-title">FAQs <small>Создание</small></h1>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-default" href="{{ route('admin.faqs.index') }}"><i class="la la-arrow-left"></i> Назад</a>
                <button class="btn btn-success" type="submit" form="form-page"><i class="la la-check"></i> Сохранить</button>
            </div>
        </div>
        {!! Form::open(['route' => 'admin.faqs.store', 'method' => 'post', 'id' => 'form-page']) !!}
            @include('backend.faqs._form')
        {!! Form::close() !!}
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/vendor/summernote/summernote.min.js') }}"></script>
    <script src="{{ asset('backend/js/editor.js') }}"></script>
@endpush