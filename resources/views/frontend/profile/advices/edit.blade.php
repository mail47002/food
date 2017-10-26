@extends('frontend.layouts.default')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{ route('profile.articles.index') }}" class="link-blue back"><i class="fo fo-arrow-left fo-small"></i> Повернутися</a></li>
            </ul>
        </div>
    </div>
    <div class="bg-yellow">
        <h5 class="title-with-indent red">Редагувати страву</h5>
    </div>
    <div class="container-half text-center">
        {{ Form::open(['route' => ['profile.advices.update', $advice->id], 'method' => 'put', 'enctype' => 'multipart/form-data', 'class' => 'edit']) }}
            <p class="message" id="message">Заповніть виділені поля</p>

            <div class="form-group">
                {{ Form::label('name', 'Назва поради*') }}
                {{ Form::text('name', $advice->name, ['id' => 'input-name', 'class' => 'wide']) }}
            </div>

            <div class="form-group">
                {{ Form::label('description', 'Текст поради*') }}
                {{ Form::textarea('description', $advice->description, ['id' => 'input-description', 'class' => 'wide']) }}
            </div>

            <div class="form-group">
                {{ Form::label('fotos', 'Додати фото*') }}
                <div id="input-images" class="fotos">
                    @foreach ($advice->images as $image)
                        <div class="wrap js-foto">
                            <div class="uploader">
                                <img src="{{ $image->thumbnail }}">
                                {{ Form::file(null, ['class' => 'input-upload']) }}
                                {{ Form::hidden('images[]', $image->id) }}
                            </div>
                            <a href="#" class="pull-left grey1 js-main-foto {{ $advice->thumbnail === $image->thumbnail ? 'active' : '' }}"><i class="fo fo-check-rounded"></i><span class="hide">Головне</span></a>
                            <a href="#" class="pull-right link-red-dark remove js-delete-foto"><i class="fo fo-close-rounded"></i></a>
                        </div>
                    @endforeach
                    <div class="wrap js-foto">
                        <div class="uploader">
                            <img src="">
                            <div class="round"><i class="fo fo-camera"></i></div>
                            {{ Form::file(null, ['class' => 'input-upload']) }}
                            {{ Form::hidden('images[]', null) }}
                        </div>
                        <a href="#" class="pull-left hide grey1 js-main-foto"><i class="fo fo-check-rounded"></i><span class="hide">Головне</span></a>
                        <a href="#" class="pull-right link-red-dark hide remove js-delete-foto"><i class="fo fo-close-rounded"></i></a>
                    </div>
                </div>
                {{ Form::hidden('image', null, ['id' => 'advice-image']) }}
            </div>

            <div class="form-group">
                <label for="video">Посилання на відео</label>
                <div class="videos js-video">
                    @if ($advice->video)
                        @foreach ($advice->video as $i => $video)
                            <div>
                                {{ Form::text('video[]', $video, ['id' => 'input-video-' . $i]) }}
                                <span class="remove js-delete-video"></span>
                            </div>
                        @endforeach
                    @else
                        <div>
                            {{ Form::text('video[]', null, ['id' => 'input-video-0']) }}
                            <span class="remove js-delete-video"></span>
                        </div>
                    @endif
                </div>
                <a href="#" class="link-red-dark js-add-video">+ Додати</a>
            </div>

            {{ Form::submit('Зберегти', ['class' => 'button button-red']) }}
        {{ Form::close() }}
        <a href="{{ route('profile.adverts.index') }}" class="grey3">Відмінити</a>
    </div>
@stop

@push('scripts')
    <script type="text/javascript">
        // Video
        $('.js-add-video').on('click', function(e) {
            e.preventDefault();

            var i = $('.js-video > div').length;

            $('.js-video').append('<div><input id="input-video-' + i + '" name="video[]" type="text" /><span class="remove js-delete-video"></span></div>');
        });

        $('body').on('click', '.js-delete-video', function(e) {
            e.preventDefault();

            $(this).parent().remove();

            $('.js-video > div').each(function(i) {
                $(this).attr('id', 'input-video-' + i);
            });
        });

        // Fotos
        $('body').on('change', '.input-upload', function() {
            var self = $(this),
                i = $('.fotos > .js-foto').length,
                id = self.closest('.uploader').find('input[name="images[]"]').val(),
                url =  id ? '{{ url('profile/advices/image') }}/' + id : '{{ url('profile/advices/image/store') }}',
                data = new FormData();

            data.append('_token', '{{ csrf_token() }}');

            if (id) {
                data.append('_method', 'put');
            }

            data.append('image', self[0].files[0]);

            $.ajax({
                url: url,
                method: 'post',
                data: data,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    if ((self.closest('.js-foto').index() + 1) == i) {
                        $('.fotos .js-foto:last-child').clone().appendTo('.fotos');
                        $('.fotos .js-foto:last-child').find('img').attr('src', '');
                        $('.fotos .js-foto:last-child').find(':file').val('');

                        $('.fotos .js-foto:not(:last-child)').find('a').removeClass('hide');
                        $('.fotos .js-foto:not(:last-child)').find('.round').remove();
                    }
                },
                success: function(data) {
                    if (data['success']) {
                        self.closest('.uploader').find('img').attr('src', data['image']['thumbnail']);
                        self.closest('.uploader').find('input[name="images[]"]').val(data['image']['id']);

                        if (i == 1) {
                            self.closest('.js-foto').find('.js-main-foto').addClass('active');
                            $('#advice-image').val(data['image']['id']);
                        }
                    }
                },
                error: function(data) {
                    var data = data.responseJSON;
                }
            });
        });

        $('body').on('click', '.js-main-foto', function(e) {
            e.preventDefault();

            $('.fotos .js-main-foto').removeClass('active');

            $(this).addClass('active');

            $('#advice-image').val($(this).closest('.js-foto').find('input[name="images[]"]').val());
        });

        $('body').on('click', '.js-delete-foto', function(e) {
            e.preventDefault();

            var self = $(this),
                id = $(this).closest('.js-foto').find('input[name="images[]"]').val(),
                data = {
                    '_token': '{{ csrf_token() }}',
                    '_method': 'delete'
                };

            $.post('{{ url('profile/advices/image') }}/' + id, data).done(function(data) {
                if (data['success']) {
                    self.parent().remove();
                }
            });

        });
    </script>
    <script type="text/javascript">
        $(document).on('submit', 'form', function(e) {
            e.preventDefault();

            var form = $(this);

            $.ajax({
                url: form.attr('action'),
                method: form.attr('method'),
                data: form.serialize(),
                beforeSend: function() {
                    $('#message').hide();

                    form.find(':submit').attr('disabled', true);
                    form.find('.has-error').removeClass('has-error');
                    form.find('.error').removeClass('error');

                    $('.body-overlay').addClass('active');
                },
                success: function(data) {
                    if (data['success']) {
                        location = '{{ route('profile.advices.success') }}';
                    }
                },
                error: function(data) {
                    var data = data.responseJSON;

                    form.find(':submit').attr('disabled', false);

                    $('.body-overlay').removeClass('active');

                    $('#message').show();

                    for (name in data.errors) {
                        if (name.indexOf('.') > 0) {
                            var parts = name.split('.');

                            target = form.find('#input-' + parts[0] + '-' + parts[1]);
                        } else {
                            target = form.find('#input-' + name);
                        }

                        target.addClass('error');
                        target.closest('.form-group').addClass('has-error');
                    }
                }
            });
        });
    </script>
@endpush