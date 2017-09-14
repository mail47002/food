@extends('backend.layouts.default')

@push('styles')
    <link href="{{ asset('backend/vendor/summernote/summernote.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <h1 class="heading-title">Страница <small>Создание новой</small></h1>
            </div>
            <div class="col-md-6 text-right">
                <a class="btn btn-default" href="{{ route('admin.pages.index') }}"><i class="la la-arrow-left"></i> Назад</a>
                <button class="btn btn-success" type="submit" form="form-page"><i class="la la-check"></i> Сохранить</button>
            </div>
        </div>
        {!! Form::open(['route' => 'admin.pages.store', 'method' => 'post', 'id' => 'form-page']) !!}
            @include('backend.pages._form')
        {!! Form::close() !!}
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('backend/vendor/summernote/summernote.min.js') }}"></script>
    <script type="text/javascript">
        (function($) {
            $('#summernote').summernote({
                height: 300,
                onImageUpload: function(files) {
                    uploadFiles(this, files);
                }
            });

            function uploadFiles(editor, files) {
                var data = new FormData();

                for (var i = 0; i < files.length; i++) {
                    data.append('file', files[i]);

                    $.ajax({
                        url: '{{ route('admin.uploads.store') }}',
                        method: 'post',
                        data: data,
                        processData: false,
                        contentType: false,
                        success: function (json) {
                            if (json['success']) {
                                editor.summernote('insertImage', json['success'], function($image) {
                                    $image.attr('src', json['success']);
                                });
                            }
                        }
                    });
                }
            }
        })(jQuery);
    </script>
@endpush