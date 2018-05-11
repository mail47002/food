@extends('frontend.layouts.default')

@section('title')Adverts - @stop

@section('content')
	<div class="signin-page sign-form">
		<div class="sign-content text-center">
			<h2 class="title">Вхід</h2>
			<div class="sign-body">
				<div class="left text-left separator">

					{{ Form::open([ 'route' => 'login', 'method' => 'post']) }}
						<div class="form-group">
							{{ Form::label('email', 'Email') }}
							{{ Form::text('email', null, ['id' => 'input-email']) }}
						</div>
						<div class="form-group">
							{{ Form::label('password', 'Пароль') }}
							{{ Form::password('password', ['id' => 'input-password']) }}
						</div>
						{{Form::submit('Увійти', ['class' => 'button button-red']) }}
					{{ Form::close() }}
					<p><a href="{{ url('password/reset') }}" class="link-blue">Забули пароль</a></p>
				</div>
				<div class="right text-right">
					<a href="{{ url('login/google') }}" class="button login google">Продовжити з Google</a>
					<a href="{{ url('login/facebook') }}" class="button login facebook">Продовжити з Facebook</a>
					<a href="{{ url('login/twitter') }}" class="button login twitter">Продовжити з Twitter</a>

					<p class="signup">Вас ще немає на сайті?  <a href="{{ route('register') }}" class="link-red-dark">Приєднатися зараз</a></p>
				</div>
			</div>
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
                dataType: 'json',
                beforeSend: function() {
                    form.find('input[type=submit]').attr('disabled', true);
                    form.find('.has-error').removeClass('has-error');
                    form.find('.error').removeClass('error');

                    $('.body-overlay').addClass('active');
                },
                success: function(data) {
                    if (data['url']) {
                        location = data['url'];
                    }
                },
                error: function(data) {
                    var data = data.responseJSON;

                    form.find('input[type=submit]').attr('disabled', false);

                    $('.body-overlay').removeClass('active');

                    data.errors.forEach(function(name){
                        var target = form.find('#input-' + name);

                        target.addClass('error');
                        target.closest('.form-group').addClass('has-error');
                    });
                }
            });
        });
	</script>
@endpush