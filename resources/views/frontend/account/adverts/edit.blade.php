@extends('frontend.layouts.default')

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="list-inline">
                <li><a href="{{ route('account.adverts.index') }}" class="link-blue back"><i class="fo fo-arrow-left fo-small"></i>  Повернутися</a></li>
            </ul>
        </div>
    </div>

    <div class="bg-yellow text-center">
        <div class="v-indent-30"></div>
        <img src="{{ $advert->user->directory . $advert->image }}" alt="{{ $advert->name }}" class="inline header-img">
        <h5 class="header-title text-upper black margin-30">{{ $advert->name }}</h5>
        <p class="red f20 margin-zerro">
            @if(Helper::isAdvertByDate($advert->type))
                <i class="fo fo-time fo-2x"></i> Страва на дату
            @endif

            @if(Helper::isAdvertInStock($advert->type))
                <i class="fo fo-dish-ready fo-2x"></i> Готова страва
            @endif

            @if(Helper::isAdvertPreOrder($advert->type))
                <i class="fo fo-deal fo-2x"></i> Під замовлення
            @endif
        </p>
        <div class="v-indent-30"></div>
    </div>

    <div class="container-half text-center">
        {{ Form::open(['route' => ['account.adverts.update', $advert->id], 'method' => 'put', 'class' => 'edit']) }}
        <p class="message" id="message">Заповніть виділені поля</p>

        @if(Helper::isAdvertByDate($advert->type) || Helper::isAdvertInStock($advert->type))
            <div class="form-group">
                <label for="price">Ціна*</label>
                <input name="price" id="input-price" type="text" class="price inline" value="{{ $advert->price }}">
            </div>
        @endif

        @if(Helper::isAdvertPreOrder($advert->type))
            <div class="form-group">
                <label for="price">Ціна*</label>
                <div class="row">
                    <div class="col-sm-6">
                        <input id="input-price" name="price" type="text" class="price inline" value="{{ $advert->price }}">
                    </div>
                    <div class="col-sm-6">
                        <input id="input-custom_price" name="custom_price" type="text" class="price inline" value="{{ $advert->custom_price }}">
                    </div>
                </div>
            </div>
        @endif

        @if(Helper::isAdvertByDate($advert->type))
            <div class="form-group everyday">
                <input id="input-everyday" type="checkbox" name="everyday" value="1" {{ $advert->everyday ? 'checked' : null }}>
                <label for="input-everyday" class="inline">Кожного дня</label>
            </div>

            <div class="form-group">
                <label for="input-date">Дата*</label>
                <div id="one" class="{{ $advert->everyday ? 'hide' : null }}">
                    <input name="date" id="input-date" type="text" class="datepicker inline" value="{{ $advert->date }}">
                </div>

                <div id="two" class="two-in-line {{ $advert->everyday ? null : 'hide' }} }}">
                    <label class="inline">з</label>
                    <input id="input-date_from" type="text" name="date_from" class="datepicker inline" value="{{ $advert->date_from }}">
                    <label class="inline">до</label>
                    <input id="input-date_to" type="text" name="date_to" class="datepicker inline" value="{{ $advert->date_to }}">
                </div>
            </div>

            <div class="form-group">
                <input id="breakfast" type="radio" name="time" value="breakfast" {{ $advert->time == 'breakfast' ? 'checked' : null }}>
                <label for="breakfast" class="inline">Сніданок (до 12:00)</label>

                <input id="dinner" type="radio" name="time" value="dinner" {{ $advert->time == 'dinner' ? 'checked' : null }}>
                <label for="dinner" class="inline">Обід (12:00 - 16:00)</label>

                <input id="supper" type="radio" name="time" value="supper" {{ $advert->time == 'launch' ? 'checked' : null }}>
                <label for="supper" class="inline">Вечеря (після 16:00)</label>
            </div>
        @endif

        @if(Helper::isAdvertInStock($advert->type))
            <div class="form-group">
                <label for="date">Термін придатності*</label>
                <div class="two-in-line">
                    <label class="inline" for="date-from">з</label>
                    <input name="date_from" id="input-date_from" type="text" class="datepicker inline" value="{{ $advert->date_from }}">
                    <label class="inline" for="date-to">до</label>
                    <input name="date_to" id="input-date_to" type="text" class="datepicker inline" value="{{ $advert->date_to }}">
                </div>
            </div>
        @endif

        @if(Helper::isAdvertByDate($advert->type) || Helper::isAdvertInStock($advert->type))
            <div class="form-group">
                <label>Кількість порцій*</label>
                {{ Form::select('quantity', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10], $advert->quantity, ['id' => 'input-quantity']) }}
            </div>
        @endif

        <div class="form-group">
            {{ Form::label('fotos', 'Додати фото*') }}
            <div id="input-image" class="fotos">
                @foreach ($advert->images as $image)
                    <div class="wrap js-foto">
                        <div class="uploader">
                            <img src="{{ auth()->user()->directory . 'thumbs/' . $image->image }}">
                            {{ Form::hidden('images[]', $image->image) }}
                        </div>
                        <a href="#" class="pull-left grey1 js-cover-foto {{ $advert->image === $image->image ? 'active' : '' }}"><i class="fo fo-check-rounded"></i><span class="hide">Головне</span></a>
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
            {{ Form::hidden('image', $advert->image, ['id' => 'cover-image']) }}
        </div>

        <div class="form-group">
            <label>Додаткова інформація*</label>
            <textarea name="description" id="input-description" class="wide">{{ $advert->description }}</textarea>
        </div>

        <label for="">Додати значок</label>
        <div class="stickers">
            <input id="empty" type="radio" name="sticker" value="" {{ $advert->sticker === null ? 'checked' : null }}><label for="empty" class="inline">без значка</label>
            @foreach(['discount','new', 'heart'] as $sticker)
                <input id="{{ $sticker }}" type="radio" name="sticker" value="{{ $sticker }}" {{ $advert->sticker === $sticker ? 'checked' : null }}>
                <label for="{{ $sticker }}" class="inline">
                    <i class="{{ $sticker }}"></i>
                </label>
            @endforeach
        </div>

        {{--<div class="form-group">--}}
            {{--<label>Населений пункт*</label>--}}
            {{--<div class="marker inline wide">--}}
                {{--<input id="input-city" name="city" type="text" class="wide" value="{{ $advert->address->city }}">--}}
            {{--</div>--}}
        {{--</div>--}}

        {{--<div class="form-group">--}}
            {{--<div class="address">--}}
                {{--<div class="left inline">--}}
                    {{--<label>Вулиця*</label>--}}
                    {{--<input id="input-street" name="street" type="text" value="{{ $advert->address->street }}">--}}
                {{--</div>--}}
                {{--<div class="right inline">--}}
                    {{--<label>№ будинку*</label>--}}
                    {{--<input id="input-build" name="build" type="text" value="{{ $advert->address->build }}">--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}

        <div class="form-group">
            {{ Form::label('city', 'Адреса*') }}
            <div class="marker wide">
                <input id="address" class="wide" type="text" name="address" value="{{ auth()->user()->profile->address }}">
                <input id="lat" type="hidden" name="lat" value="{{ auth()->user()->profile->lat }}">
                <input id="lng" type="hidden" name="lng" value="{{ auth()->user()->profile->lng }}">
            </div>
        </div>

        <div class="form-group">
            <p class="text-center f14">Введіть адресу<br>Якщо потрібно підкорегувати адресу, клікніть на мапі або перетягніть маркер</p>
        </div>
        {{-- <button id="correct">Виправити</button> --}}
        <div id="map"></div>

        <div class="grey-block bg-yellow black wide">
            <p class="red zerro-bottom"><i class="fo fo-phone"></i></p>
            <p class="zerro-top">Ваш телефон</p>

            @foreach(auth()->user()->profile->phone as $phone)
                <p class="f20 margin-zerro">{{ $phone }}</p>
            @endforeach

            <p class="grey2 f14">Номер телефону можна змінити на сторінці редагування профіля </p>
        </div>

        <div class="hidden">
            <input type="hidden" name="name" value="{{ $advert->name }}">
            <input type="hidden" name="product_id" value="{{ $advert->product_id }}">
            <input type="hidden" name="type" value="{{ $advert->type }}">
        </div>

        <input type="submit" class="button button-red zerro-bottom" value="Створити оголошення">
        <p><a href="{{ route('account.adverts.index') }}" class="link-grey">Відмінити</a></p>
        {{ Form::close() }}

    </div>
@stop

@include('frontend.includes.google_address')

@push('scripts')
    <script type="text/javascript">
        $('#change-foto').on('click', function() {
            if ($(this).is(':checked')) {
                $('.fotos').closest('.form-group').removeClass('hidden');
            } else {
                $('.fotos').closest('.form-group').addClass('hidden');
            }
        });
    </script>
    <script type="text/javascript">
        // Fotos
        $(document).on('change', '.input-upload', function() {
            var self = $(this),
                i = $('.fotos > .js-foto').length,
                data = new FormData();

            data.append('_token', '{{ csrf_token() }}');
            data.append('image', self[0].files[0]);

            $.ajax({
                url: '{{ url('myaccount/adverts/image/store') }}',
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
                $.post('{{ url('myaccount/adverts/image/delete') }}', {
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
                success: function(responce) {
                    if (responce['success']) {
                        location = '{{ route('account.adverts.index') }}'
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
            })
        });
    </script>
    <script>
        jQuery(function($){
            $("#count").selectmenu();

            $(".datepicker").datepicker({
                dateFormat: "yy-mm-dd"
            });

            $('#input-everyday').on('change', function() {
                if($(this).is(":checked")) {
                    $('#one').hide();
                    $('#two').show();
                } else {
                    $('#one').show();
                    $('#two').hide();
                }
            });
        });
    </script>
@endpush