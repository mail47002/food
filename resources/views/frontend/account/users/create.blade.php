@extends('frontend.layouts.default')

@section('content')
    <div class="bg-yellow fixed-bg"></div>
    <div class="container">
        <div class="information text-center">
            <div class="header">Розкажіть про себе</div>
            <div class="body">
                {{ Form::open(['route' => 'account.user.store', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                    <p class="message" id="message">Заповніть виділені поля</p>
                    <div class="form-group">
                        {{ Form::label('name', 'Ім\'я*') }}
                        {{ Form::text('first_name', null, ['id' => 'input-first_name']) }}
                    </div>
                    <div class="form-group site-name">
                        <p>{{ url('') }}</p>
                        {{ Form::label('slug', 'Адреса вашої сторінки') }}
                        {{ Form::text('slug', null, ['id' => 'input-slug']) }}
                    </div>

                    <div class="form-group text-left w-440">
                        {{ Form::label('phone', 'Телефон*') }}
                        <div class="phone js-phone">
                            <div>
                                {{ Form::tel('phone[]', null, ['id' => 'input-phone-0', 'class' => 'phone-input']) }}
                                <span class="remove js-delete-phone"></span>
                            </div>
                        </div>
                        <a href="#" class="link-red-dark js-add-phone">+ Додати</a>
                    </div>

{{--                     <div class="form-group">
                        {{ Form::label('city', 'Населений пункт*') }}
                        <div class="marker">
                            <input id="city" type="text" name="city">
                        </div>
                    </div>

                    <div class="content">
                        <div class="left">
                            <div class="form-group">
                                {{ Form::label('street', 'Вулиця*') }}
                                {{ Form::text('street', null, ['id' => 'input-street']) }}
                            </div>
                        </div>

                        <div class="right">
                            <div class="form-group">
                                {{ Form::label('build', '№ будинку*') }}
                                {{ Form::text('build', null, ['id' => 'input-build']) }}
                            </div>
                        </div>
                    </div> --}}


                    <div class="form-group">
                        {{ Form::label('city', 'Адреса*') }}
                        <div class="marker wide">
                            <input id="input-address" class="wide" type="text" name="address">
                            <input id="input-lat" type="hidden" name="lat">
                            <input id="input-lng" type="hidden" name="lng">
                        </div>
                    </div>

                    <div class="form-group">
                        <p class="text-center f14">Введіть адресу<br>Якщо потрібно підкорегувати адресу, клікніть на мапі або перетягніть маркер</p>
                    </div>
                    {{-- <button id="correct">Виправити</button> --}}
                    <div id="map"></div>



                    <div class="form-group">
                        {{ Form::label('about', 'Про себе') }}
                        {{ Form::textarea('about', null, ['id' => 'about', 'class' => 'wide']) }}
                    </div>

                    <div class="form-group">
                        {{ Form::label('filePhoto', 'Додати фото') }}
                        <div class="uploader profile">
                            <img src="" />
                            <input id="input-image" type="file">
                            <div class="round"><i class="fo fo-camera"></i></div>
                        </div>

                        {{ Form::hidden('image', null) }}
                    </div>

                    <hr>
                    {{Form::submit('Продовжити', ['class' => 'button button-red']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@include('frontend.includes.google_address')

@push('scripts')
    <script type="text/javascript">
        $('#input-image').on('change', function(e) {
            e.preventDefault();

            var data = new FormData();

            data.append('_token', '{{ csrf_token() }}');
            data.append('image', $('#input-image')[0].files[0]);

            $.ajax({
                url: '{{ route('account.image.store') }}',
                method: 'post',
                data: data,
                processData: false,
                contentType: false,
                beforeSend: function() {
                    $('.body-overlay').addClass('active');
                },
                success: function(response) {
                    if (response['success']) {
                        $('.profile img').attr('src', response['image']['url']);
                        $('input[name="image"]').val(response['image']['name']);
                    }
                },
                complete: function() {
                    $('.body-overlay').removeClass('active');
                }
            })
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function () {
            initMaskInput();
        });

        function initMaskInput() {
            $('input[type="tel"]').mask('+38 (999) 999 99 99');
        }

        $('.js-add-phone').on('click', function(e) {
            e.preventDefault();

            var i = $('.js-phone > div').length;

            $('.js-phone').append('<div><input id="input-phone-' + i + '" class="phone-input" name="phone[]" type="tel"><span class="remove js-delete-phone"></span></div>');

            initMaskInput();
        });

        $('body').on('click', '.js-delete-phone', function(e) {
            e.preventDefault();

            $(this).parent().remove();

            $('.js-phone > div').each(function(i) {
                $(this).attr('id', 'input-phone-' + i);
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
                dataType: 'json',
                beforeSend: function() {
                    $('#message').hide();

                    form.find('input[type=submit]').attr('disabled', true);
                    form.find('.has-error').removeClass('has-error');
                    form.find('.error').removeClass('error');

                    $('.body-overlay').addClass('active');
                },
                success: function(response) {
                    if (response['success']) {
                        window.location = response['url'];
                    }
                },
                complete: function () {
                    form.find('input[type=submit]').attr('disabled', false);

                    $('.body-overlay').removeClass('active');
                },
                error: function(data) {
                    var data = data.responseJSON,
                        target;

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

    {{-- Autocomplete --}}
    <script>
    $(function(){
        var cities = [
            'Бершадь', 'Браилов', 'Брацлав', 'Вапнярка', 'Вендичаны', 'Винница', 'Вороновица', 'Гайсин', 'Гнивань', 'Дашев', 'Жмеринка', 'Ильинцы', 'Казатин', 'Калиновка', 'Крыжополь', 'Липовец', 'Литин', 'Могилев', 'Мурованные', 'Немиров', 'Оратов', 'Песчанка', 'Погребище', 'Теплик', 'Томашполь', 'Тростянец', 'Тульчин', 'Тывров', 'Хмельник', 'Чечельник', 'Шаргород', 'Ямполь', 'Берестечко', 'Владимир', 'Голобы', 'Головно', 'Горохов', 'Иваничи', 'Камень', 'Киверцы', 'Ковель', 'Локачи', 'Луцк', 'Любешов', 'Любомль', 'Маневичи', 'Нововолынск', 'Ратно', 'Рожище'
        ];
        $( "#city" ).autocomplete({
            source: cities
        });
    });
    </script>
@endpush