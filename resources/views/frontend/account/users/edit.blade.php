@extends('frontend.layouts.account')

@section('title')Products - @stop

@section('content')
	<h5 class="text-upper underline-red">Редагувати профіль</h5>
	<hr>
	{{ Form::open(['route' => ['account.user.update'], 'method' => 'put', 'class' => 'contact']) }}
		<p class="message" id="message">Заповніть виділені поля</p>
		<div class="form-group">
			{{ Form::label('name', 'Ім\'я*') }}
			{{ Form::text('first_name', auth()->user()->profile->first_name, ['id' => 'input-first_name']) }}
		</div>

		<div class="v-indent-30"></div>
		<hr>

		<div class="form-group">
			{{ Form::label('phone', 'Телефон*') }}
			<div class="phone js-phone">
				@foreach (auth()->user()->profile->phone as $i => $phone)
					<div>
						{{ Form::tel('phone[]', $phone, ['id' => 'input-phone-' . $i, 'class' => 'phone-input']) }}
						<span class="remove js-delete-phone"></span>
					</div>
				@endforeach
			</div>
			<a href="#" class="link-red js-add-phone">+ Додати</a>
		</div>
		<div class="v-indent-30"></div>
		<hr>
		{{--<div class="form-group">--}}
			{{--{{ Form::label('city', 'Населений пункт*') }}--}}
			{{--<div class="marker">--}}
				{{--{{ Form::text('city', auth()->user()->profile->city, ['id' => 'input-city']) }}--}}
			{{--</div>--}}
		{{--</div>--}}
		{{--<div class="form-group">--}}
			{{--{{ Form::label('street', 'Вулиця*') }}--}}
			{{--{{ Form::text('street',  auth()->user()->profile->street, ['id' => 'input-street']) }}--}}
		{{--</div>--}}
		{{--<div class="form-group">--}}
			{{--{{ Form::label('build', '№ будинку*') }}--}}
			{{--{{ Form::text('build', auth()->user()->profile->build, ['id' => 'input-build']) }}--}}
		{{--</div>--}}

		<div class="form-group">
			{{ Form::label('city', 'Адреса*') }}
			<div class="marker wide">
				<input id="input-address" class="wide" type="text" name="address" value="{{ auth()->user()->profile->address }}">
				<input id="input-lat" type="hidden" name="lat" value="{{ auth()->user()->profile->lat }}">
				<input id="input-lng" type="hidden" name="lng" value="{{ auth()->user()->profile->lng }}">
			</div>
		</div>

		<div class="form-group">
			<p class="text-center f14">Введіть адресу<br>Якщо потрібно підкорегувати адресу, клікніть на мапі або перетягніть маркер</p>
		</div>
		{{-- <button id="correct">Виправити</button> --}}
		<div id="map"></div>


		<div class="v-indent-30"></div>
		<hr>
		<div class="form-group">
			{{ Form::label('about', 'Про мене') }}
			{{ Form::textarea('about', auth()->user()->profile->about, ['id' => 'input-about', 'class' => 'account']) }}
		</div>
		<hr>
		{{Form::submit('Зберегти', ['class' => 'button button-red account text-upper']) }}
	{{ Form::close() }}

    @include('frontend.account.users.success')
@stop

@include('frontend.includes.google_address')


@push('scripts')
	<script type="text/javascript">
		$('#input-avatar').on('change', function(e) {
			e.preventDefault();

            var data = new FormData();

            data.append('_token', '{{ csrf_token() }}');
            data.append('_method', 'put');
            data.append('image', $('#input-avatar')[0].files[0]);

			$.ajax({
				url: '{{ route('account.image.update') }}',
				method: 'post',
				data: data,
                processData: false,
                contentType: false,
				beforeSend: function() {
                    $('.body-overlay').addClass('active');
                },
				success: function(data) {
				    if (data['success']) {
				        window.location.reload();
					}
                },
				complete: function() {
                    $('.body-overlay').removeClass('active');
                }
			})
		});
	</script>
	<script type="text/javascript">
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
				success: function(data) {
				    if (data['success']) {
                        $('#modal_account-update').modal('show');
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
@endpush