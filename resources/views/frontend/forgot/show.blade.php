@extends('frontend.layouts.default')

@section('content')
	<div class="forgot-page">
		<div class="sign-content text-center">
			<h1 class="text-upper underline-red">Забули пароль</h1>
			<hr>
			{{ Form::open(['route' => 'password.forgot', 'method' => 'post']) }}
				<div class="form-group">
					{{ Form::label('email', 'Введіть свій Email') }}
					{{ Form::text('email', null, ['id' => 'input-email']) }}
				</div>
				{{Form::submit('Продовжити', ['class' => 'button button-red']) }}
			{{ Form::close() }}
		</div>
	</div>
@stop

@push('scripts')
	<script type="text/javascript">
		$(document).on('submit', 'form', function(e) {
			e.preventDefault();

			var form = $(this);

			$.ajax({
				url: form.attr('action'),
				method: form.attr('method'),
				data: form.serialize(),
				beforeSend: function() {
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
					var data = data.responseJSON;

					for (name in data.errors) {
						var target = form.find('#input-' + name);

						target.addClass('error');
						target.closest('.form-group').addClass('has-error');
					}
				}
			});
		});
	</script>
@endpush