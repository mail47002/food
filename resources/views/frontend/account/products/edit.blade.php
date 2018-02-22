@extends('frontend.layouts.default')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{ route('account.products.index') }}" class="link-blue back"><i class="fo fo-arrow-left fo-small"></i> Повернутися</a></li>
            </ul>
        </div>
    </div>
    <div class="bg-yellow">
        <h5 class="title-with-indent red">Редагувати страву</h5>
    </div>
    <div class="container-half text-center">
        {{ Form::open(['route' => ['account.products.update', $product->id], 'method' => 'put', 'class' => 'edit']) }}
            <p class="message" id="message">Заповніть виділені поля</p>

            <div class="form-group">
                {{ Form::label('name', 'Назва страви*') }}
                {{ Form::text('name', $product->name, ['id' => 'input-name', 'class' => 'wide']) }}
            </div>

            <div class="form-group">
                {{ Form::label('name', 'Виберіть одну або декілька категорій*') }}
                <div id="input-category" class="catgories clearfix">
                    @foreach ($categories as $category)
                        <div class="col-md-4">
                            {{ Form::checkbox('category[]', $category->id, in_array($category->id, $product->categories()->pluck('id')->toArray()) ? true : false, ['id' => 'cat-' . $category->id]) }}
                            {{ Form::label('cat-' . $category->id, $category->name) }}
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="form-group">
                {{ Form::label('ingredients', 'Інгредієнти*') }}
                <div class="ingredients js-ingredients">
                    @foreach ($product->ingredient as $i => $ingredient)
                        <div>
                            {{ Form::text('ingredient[]', $ingredient, ['id' => 'input-ingredient-' . $i]) }}
                            <span class="remove js-delete-ingredient"></span>
                        </div>
                    @endforeach
                    <a href="#" class="link-red-dark js-add-ingredient">+ Додати</a>
                </div>
            </div>


            <div class="form-group">
                {{ Form::label('description', 'Про страву*') }}
                {{ Form::textarea('description', $product->description, ['id' => 'input-description', 'class' => 'wide']) }}
            </div>

            <div class="form-group">
                {{ Form::label('fotos', 'Додати фото*') }}
                <div id="input-image" class="fotos">
                    @foreach ($product->images as $image)
                        <div class="wrap js-foto">
                            <div class="uploader">
                                <img src="{{ $product->user->directory . 'thumbs/' . $image->image }}">
                                {{ Form::hidden('images[]', $image->image) }}
                            </div>
                            <a href="#" class="pull-left grey1 js-cover-foto {{ $product->image === $image->image ? 'active' : '' }}"><i class="fo fo-check-rounded"></i><span class="hide">Головне</span></a>
                            <a href="#" class="pull-right link-red-dark remove js-delete-foto"><i class="fo fo-close-rounded"></i></a>
                        </div>
                    @endforeach
                    <div class="wrap js-foto">
                        <div class="uploader">
                            <img src="">
                            <div class="round"><i class="fo fo-camera"></i></div>
                            {{ Form::file(null, ['class' => 'input-upload']) }}
                        </div>
                        <a href="#" class="pull-left hide grey1 js-cover-foto"><i class="fo fo-check-rounded"></i><span class="hide">Головне</span></a>
                        <a href="#" class="pull-right link-red-dark hide remove js-delete-foto"><i class="fo fo-close-rounded"></i></a>
                    </div>
                </div>
                {{ Form::hidden('image', $product->image, ['id' => 'cover-image']) }}
            </div>

            <div class="form-group">
                <label for="video">Посилання на відео</label>
                <div class="videos js-video">
                    @if ($product->video)
                        @foreach ($product->video as $i => $video)
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
                    <a href="#" class="link-red-dark js-add-video">+ Додати</a>
                </div>
            </div>

            {{ Form::hidden('product_id', $product->id) }}

            {{ Form::submit('Зберегти', ['class' => 'button button-red']) }}
        {{ Form::close() }}
        <a href="{{ route('account.products.index') }}" class="grey3">Відмінити</a>
    </div>
@stop

@push('scripts')
    <script type="text/javascript">

        // Fotos
        $(document).on('change', '.input-upload', function() {
            var self = $(this),
                i = $('.fotos > .js-foto').length,
                data = new FormData();

            data.append('_token', '{{ csrf_token() }}');
            data.append('image', self[0].files[0]);

            $.ajax({
                url: '{{ url('myaccount/products/image/upload') }}',
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
                success: function(responce) {
                    if (responce) {
                        self.closest('.uploader').find('img').attr('src', responce['url']);
                        self.closest('.uploader').append('<input type="hidden" name="images[]" value="' + responce['image'] + '"/>');

                        if (i == 1) {
                            self.closest('.js-foto').find('.js-main-foto').addClass('active');
                            $('#cover-image').val(responce['image']);
                        }

                        self.closest('.uploader').find('.input-upload').remove();
                    }
                },
                error: function(data) {
                    var data = data.responseJSON;
                }
            });
        });

        $(document).on('click', '.js-delete-foto', function(e) {
            e.preventDefault();

            var self = $(this),
                image = self.closest('.js-foto').find('input[name="images[]"]').val();

            if (image) {
                $.post('{{ url('myaccount/products/image/delete') }}', {
                    '_token': '{{ csrf_token() }}',
                    '_method': 'delete',
                    'image': image
                }).done(function (response) {
                    if (response) {
                        self.parent().remove();

                        if (image == $('#cover-image').val()) {
                            $('#cover-image').val('');
                        }
                    }
                });
            }
        });

        $(document).on('click', '.js-cover-foto', function(e) {
            e.preventDefault();

            $('.fotos .js-cover-foto').removeClass('active');

            $(this).addClass('active');

            $('#cover-image').val($(this).closest('.js-foto').find('input[name="images[]"]').val());
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
                        location = '{{ route('account.products.success') }}';
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