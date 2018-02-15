@extends('frontend.layouts.default')

@section('content')
    <div class="step step-1">
        <div class="bg-yellow">
            <h5 class="title-with-indent black"><i class="fo fo-hat fo-4x red block"></i>Створити Оголошення</h5>
        </div>

        <div class="container add-food-select">
            <div class="row">
                <div class="col-sm-5 col-md-offset-1 col-md-4 text-center">
                    <label>Виберіть страву з вашого каталога</label>
                    <select name="product" class="v-indent-40">
                        <option value="">Виберіть страву</option>
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-sm-2 col-md-2 text-center">
                    <p class="lined grey2">або</p>
                </div>
                <div class="col-sm-5 col-md-4 text-center">
                    <label for="">Це ваша нова страва</label>
                    <a href="{{ route('account.products.create') }}" class="button button-red full-width text-upper">Додати до каталогу</a>
                </div>
            </div>
        </div>
    </div>

    <div class="step step-2 hidden">
        <div class="breadcrumbs">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="{{ route('account.adverts.index') }}" class="link-blue back"><i class="fo fo-arrow-left fo-small"></i>  Повернутися</a></li>
                </ul>
            </div>
        </div>

        <div class="bg-yellow text-center">
            <div class="v-indent-30"></div>
            <img src="" alt="" class="inline header-img">
            <h5 class="header-title text-upper black margin-30"></h5>
            <p class="red f20 margin-zerro">
                @if(Helper::isAdvertByDate())
                    <i class="fo fo-time fo-2x"></i> Страва на дату
                @endif

                @if(Helper::isAdvertInStock())
                    <i class="fo fo-dish-ready fo-2x"></i> Готова страва
                @endif

                @if(Helper::isAdvertPreOrder())
                    <i class="fo fo-deal fo-2x"></i>  Під замовлення
                @endif
            </p>
            <div class="v-indent-30"></div>
        </div>

        <div class="container-half text-center">

            {{ Form::open(['route' => 'account.adverts.store', 'method' => 'post', 'class' => 'edit']) }}
                <p class="message" id="message">Заповніть виділені поля</p>

                @if(Helper::isAdvertByDate() || Helper::isAdvertInStock())
                    <div class="form-group">
                        <label for="price">Ціна*</label>
                        <input name="price" id="input-price" type="text" class="price inline"/>
                    </div>
                @endif

                @if(Helper::isAdvertPreOrder())
                    <div class="form-group">
                        <label for="price">Ціна*</label>
                        <div class="row">
                            <div class="col-sm-6">
                                <input id="input-price" name="price" type="text" class="price inline"/>
                            </div>
                            <div class="col-sm-6">
                                <input id="input-custom_price" name="custom_price" type="text" class="price inline"/>
                            </div>
                        </div>
                    </div>
                @endif

                @if(Helper::isAdvertByDate())
                    <div class="form-group everyday">
                        <input id="input-everyday" type="checkbox" name="everyday" value="1">
                        <label for="input-everyday" class="inline">Кожного дня</label>
                    </div>

                    <div class="form-group">
                        <label for="input-date">Дата*</label>
                        <div id="one">
                            <input name="date" id="input-date" type="text" class="datepicker inline"/>
                        </div>

                        <div id="two" class="hide two-in-line">
                            <label class="inline">з</label>
                            <input id="input-date_from" type="text" name="date_from" class="datepicker inline"/>
                            <label class="inline">до</label>
                            <input id="input-date_to" type="text" name="date_to" class="datepicker inline"/>
                        </div>
                    </div>

                    <div class="form-group">
                        <input id="breakfast" type="radio" name="time" value="breakfast" checked>
                        <label for="breakfast" class="inline">Сніданок (до 12:00)</label>

                        <input id="dinner" type="radio" name="time" value="dinner">
                        <label for="dinner" class="inline">Обід (12:00 - 16:00)</label>

                        <input id="supper" type="radio" name="time" value="supper">
                        <label for="supper" class="inline">Вечеря (після 16:00)</label>
                    </div>
                @endif

                @if(Helper::isAdvertInStock())
                    <div class="form-group">
                        <label for="date">Термін придатності*</label>
                        <div class="two-in-line">
                            <label class="inline" for="date-from">з</label>
                            <input name="date_from" id="input-date_from" type="text" class="datepicker inline" />
                            <label class="inline" for="date-to">до</label>
                            <input name="date_to" id="input-date_to" type="text" class="datepicker inline" />
                        </div>
                    </div>
                @endif

                @if(Helper::isAdvertByDate() || Helper::isAdvertInStock())
                    <div class="form-group">
                        <label>Кількість порцій*</label>
                        {{ Form::select('quantity', [1 => 1, 2 => 2, 3 => 3, 4 => 4, 5 => 5, 6 => 6, 7 => 7, 8 => 8, 9 => 9, 10 => 10], null, ['id' => 'input-quantity']) }}
                    </div>
                @endif

                <div class="form-group">
                    <input id="change-foto" type="checkbox" name="change_images">
                    <label for="change-foto">Змінити фото</label>
                </div>

                <div class="form-group hidden">
                    {{ Form::label('fotos', 'Додати фото*') }}
                    <div id="input-image" class="fotos">
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
                    {{ Form::hidden('image', null, ['id' => 'cover-image']) }}
                </div>

                <div class="form-group">
                    <label>Додаткова інформація*</label>
                    <textarea name="description" id="input-description" class="wide"></textarea>
                </div>

                <label>Додати значок</label>
                <div class="stickers">
                    <input id="empty" type="radio" name="sticker" value="" checked><label for="empty" class="inline">без значка</label>
                    @foreach(Helper::getAdvertStickers() as $sticker)
                        <input id="{{ $sticker }}" type="radio" name="sticker" value="{{ $sticker }}">
                        <label for="{{ $sticker }}" class="inline">
                            <i class="{{ $sticker }}"></i>
                        </label>
                    @endforeach
                </div>

                <div class="form-group">
                    <label>Населений пункт*</label>
                    <div class="marker inline wide">
                        <input id="input-city" name="city" type="text" class="wide" value="{{ auth()->user()->address->city }}">
                    </div>
                </div>

                <div class="form-group">
                    <div class="address">
                        <div class="left inline">
                            <label>Вулиця*</label>
                            <input id="input-street" name="street" type="text" value="{{ auth()->user()->address->street }}">
                        </div>
                        <div class="right inline">
                            <label>№ будинку*</label>
                            <input id="input-build" name="build" type="text" value="{{ auth()->user()->address->build }}">
                        </div>
                    </div>
                </div>


                <div class="grey-block bg-yellow black wide">
                    <p class="red zerro-bottom"><i class="fo fo-phone"></i></p>
                    <p class="zerro-top">Ваш телефон</p>

                    @foreach(auth()->user()->phone as $phone)
                        <p class="f20 margin-zerro">{{ $phone }}</p>
                    @endforeach

                    <p class="grey2 f14">Номер телефону можна змінити на сторінці редагування профіля </p>
                </div>

                <div class="hidden">
                    <input type="hidden" name="name">
                    <input type="hidden" name="product_id">

                    @if(Helper::isAdvertByDate())
                        <input type="hidden" name="type" value="by_date">
                    @endif

                    @if(Helper::isAdvertInStock())
                        <input type="hidden" name="type" value="in_stock">
                    @endif

                    @if(Helper::isAdvertPreOrder())
                        <input type="hidden" name="type" value="pre_order">
                    @endif
                </div>

                <input type="submit" class="button button-red zerro-bottom" value="Створити оголошення">
                <p><a href="{{ route('account.adverts.index') }}" class="link-grey">Відмінити</a></p>

            {{ Form::close() }}

        </div>
    </div>

@stop


@push('scripts')
    <script type="text/javascript">
        var url = new URL(location)
            productId = url.searchParams.get('pid');

        if (productId) {
            $('select[name=product]').val(productId);

            if ($('select[name=product]').val() == productId) {
                getProduct(productId);
            }
        }

        $('select[name=product]').on('change', function() {
            var productId = $(this).val();

            if (productId) {
                getProduct(productId);
            }
        });

        function getProduct(productId) {
            $.ajax({
                url: '{{ url('api/products') }}/' + productId,
                method: 'get',
                dataType: 'json',
                beforeSend: function () {
                    $('.body-overlay').addClass('active');
                },
                success: function (responce) {
                    if (responce) {
                        var url = '{{ asset('uploads/' . Helper::getUserDirHash(auth()->user()) . '/thumbs') }}/';

                        $('html, body').scrollTop(0);

                        $('.header-img').attr('src', url + responce['data']['image']);
                        $('.header-title').text(responce['data']['name']);

                        $('input[name=product_id]').val(responce['data']['id']);
                        $('input[name=name]').val(responce['data']['name']);
                        $('input[name=image]').val( responce['data']['image']);
                    }
                },
                complete: function () {
                    $('.step-1').addClass('hidden');
                    $('.step-2').removeClass('hidden');

                    $('.body-overlay').removeClass('active');
                }
            });
        }
    </script>
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
                url: '{{ url('myaccount/adverts/image/upload') }}',
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
                success: function(data) {
                   if (data['success']) {
                       location = '{{ route('account.adverts.success') }}'
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