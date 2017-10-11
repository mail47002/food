@extends('frontend.layouts.profile')

@section('title')Products - @stop

@section('content')
	<h5 class="text-upper underline-red">Редагувати профіль</h5>
	<hr>
	{{ Form::open(['route' => ['profile.users.update', Auth::id()], 'method' => 'PUT', 'class' => 'contact']) }}
		<p class="message" id="message">Заповніть виділені поля</p>
		<div class="form-group">
			{{ Form::label('name', 'Ім\'я*', ['for' => 'name']) }}
			{{ Form::text('name', Auth::user()->name, ['id' => 'input-name']) }}
		</div>

		<div class="v-indent-30"></div>
		<hr>

		<div class="form-group">
			{{ Form::label('phone', 'Телефон*', ['for' => 'phone']) }}
			<div class="phone phone-list">
				@foreach (Auth::user()->phone as $i =>$phone)
					<div>
						{{ Form::text('phone[]', $phone, ['id' => 'input-phone-' . $i, 'class' => 'phone-input']) }}
						<span class="remove phone-delete"></span>
					</div>
				@endforeach
			</div>
			<a href="#" class="link-red phone-add">+ Додати</a>
		</div>
		<div class="v-indent-30"></div>
		<hr>
		<div class="form-group">
			{{ Form::label('city', 'Населений пункт*', ['for' => 'city']) }}
			<div class="marker">
				{{ Form::text('city', Auth::user()->address->city, ['id' => 'input-city']) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('street', 'Вулиця*', ['for' => 'street']) }}
			{{ Form::text('street',  Auth::user()->address->street, ['id' => 'input-street']) }}
		</div>
		<div class="form-group">
			{{ Form::label('build', '№ будинку*', ['for' => 'build']) }}
			{{ Form::text('build', Auth::user()->address->build, ['id' => 'input-build']) }}
		</div>
		<div class="v-indent-30"></div>
		<hr>
		<div class="form-group">
			{{ Form::label('about', 'Про мене', ['for' => 'about']) }}
			{{ Form::textarea('about', Auth::user()->about, ['id' => 'input-about', 'class' => 'profile']) }}
		</div>
		<hr>
		{{Form::submit('Зберегти', ['class' => 'button button-red profile text-upper']) }}
	{{ Form::close() }}
@stop


@push('scripts')
	<script src="{{ asset('frontend/js/jquery.maskedinput.js') }}" type="text/javascript"></script>
	<script type="text/javascript">
		$('#input-avatar').on('change', function(e) {
			e.preventDefault();

			var reader = new FileReader();

			reader.onload = function(e) {
				$('.uploader img').attr('src', e.target.result);
			};

			reader.readAsDataURL(e.target.files[0]);
		});
	</script>
	<script type="text/javascript">
		function initMaskInput() {
			$('.phone-input').mask('+38 (999) 999 99 99');
		}

		$(document).ready(function() {
			initMaskInput();
		});

		$('.phone-add').on('click', function(e) {
			e.preventDefault();

			var i = $('.phone-list > div').length;


			$('.phone').append('<div><input id="input-phone-' + i + '" class="phone-input" name="phone[]" type="text"><span class="remove phone-delete"></span></div>');

			initMaskInput();
		});

		$('body').on('click', '.phone-delete', function(e) {
			e.preventDefault();

			$(this).parent().remove();

            $('.phone-list > div').each(function(i) {
				$(this).attr('id', 'input-phone-' + i);
            });
		});
	</script>
	<script type="text/javascript">
		$(document).on('submit', 'form', function(e) {
		    e.preventDefault();

		    var form = $(this),
				data = new FormData(this);

		    data.append('image', $('#input-avatar')[0].files[0]);

		    $.ajax({
				url: form.attr('action'),
				method: form.attr('method'),
				data: data,
                processData: false,
                contentType: false,
				beforeSend: function() {
                    $('#message').hide();

                    form.find('input[type=submit]').attr('disabled', true);
                    form.find('.has-error').removeClass('has-error');
                    form.find('.error').removeClass('error');

                    $('.body-overlay').addClass('active');
                },
				success: function(data) {
				},
                complete: function() {
                    form.find('input[type=submit]').attr('disabled', false);

				    $('.body-overlay').removeClass('active');
                },
                error: function(data) {
                    var data = data.responseJSON,
						target;

                    $('#message').show();

                    for (name in data.errors) {
                        console.log(name);
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