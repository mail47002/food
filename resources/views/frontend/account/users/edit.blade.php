@extends('frontend.layouts.account')

@section('title')Products - @stop

@section('content')
	<h5 class="text-upper underline-red">Редагувати профіль</h5>
	<hr>
	{{ Form::open(['route' => ['account.user.update', Auth::id()], 'method' => 'put', 'class' => 'contact']) }}
		<p class="message" id="message">Заповніть виділені поля</p>
		<div class="form-group">
			{{ Form::label('name', 'Ім\'я*') }}
			{{ Form::text('name', Auth::user()->name, ['id' => 'input-name']) }}
		</div>

		<div class="v-indent-30"></div>
		<hr>

		<div class="form-group">
			{{ Form::label('phone', 'Телефон*') }}
			<div class="phone js-phone">
				@foreach (Auth::user()->phone as $i => $phone)
					<div>
						{{ Form::text('phone[]', $phone, ['id' => 'input-phone-' . $i, 'class' => 'phone-input']) }}
						<span class="remove js-delete-phone"></span>
					</div>
				@endforeach
			</div>
			<a href="#" class="link-red js-add-phone">+ Додати</a>
		</div>
		<div class="v-indent-30"></div>
		<hr>
		<div class="form-group">
			{{ Form::label('city', 'Населений пункт*') }}
			<div class="marker">
				{{ Form::text('city', Auth::user()->address->city, ['id' => 'input-city']) }}
			</div>
		</div>
		<div class="form-group">
			{{ Form::label('street', 'Вулиця*') }}
			{{ Form::text('street',  Auth::user()->address->street, ['id' => 'input-street']) }}
		</div>
		<div class="form-group">
			{{ Form::label('build', '№ будинку*') }}
			{{ Form::text('build', Auth::user()->address->build, ['id' => 'input-build']) }}
		</div>
		<div class="v-indent-30"></div>
		<hr>
		<div class="form-group">
			{{ Form::label('about', 'Про мене') }}
			{{ Form::textarea('about', Auth::user()->about, ['id' => 'input-about', 'class' => 'account']) }}
		</div>
		<hr>
		{{Form::submit('Зберегти', ['class' => 'button button-red account text-upper']) }}
	{{ Form::close() }}

	<div id="modal_account-update" class="modal fade" role="dialog">
		<div class="modal-dialog">
			<div class="modal-content text-center">
				<div class="moda-header">
					<a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
				</div>
				<div class="modal-body">
					<p><i class="fo fo-ok fo-large red"></i></p>
					<p>Деталі вашого профіля успішно збережені!</p>
				</div>
			</div>
		</div>
	</div>
@stop


@push('scripts')
	<script src="{{ asset('frontend/js/jquery.maskedinput.js') }}" type="text/javascript"></script>
	<script type="text/javascript">
		$('#input-avatar').on('change', function(e) {
			e.preventDefault();

            var data = new FormData();

            data.append('_token', '{{ csrf_token() }}');
            data.append('_method', 'put');
            data.append('image', $('#input-avatar')[0].files[0]);

			$.ajax({
				url: '{{ route('account.user.image.update', auth()->id()) }}',
				method: 'post',
				data: data,
                processData: false,
                contentType: false,
				beforeSend: function() {
                    $('.body-overlay').addClass('active');
                },
				success: function(data) {
				    if (data['success']) {
				        $('.avatar img').attr('src', data['image']);
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
			$('.phone-input').mask('+38 (999) 999 99 99');
		}

		$(document).ready(function() {
			initMaskInput();
		});

		$('.js-add-phone').on('click', function(e) {
			e.preventDefault();

			var i = $('.js-phone > div').length;

			$('.js-phone').append('<div><input id="input-phone-' + i + '" class="phone-input" name="phone[]" type="text"><span class="remove js-delete-phone"></span></div>');

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