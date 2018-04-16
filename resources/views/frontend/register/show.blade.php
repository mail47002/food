@extends('frontend.layouts.empty')

@section('content')
    <div class="signup-page sign-form" style="background-image: url({{ asset('frontend/images/signup.jpg') }});">
        <div class="sign-content text-center">
            <div class="sign-header">
                <a href="#" class="back" onclick="window.history.back();"></a>
                <h3 class="title">ласкаво просимо</h3>
                <p>Готуйте свої улюблені страви і отримуйте винагороду! <br>Замовляйте будь-яку страву і будьте впевнені, що вона найкращої якості!</p>
            </div>
            <div class="sign-body">
                <div class="left separator">
                    {{ Form::open(['route' => 'register', 'method' => 'post']) }}
                        <div class="form-group">
                            {{ Form::label('email', 'Email') }}
                            {{ Form::email('email', null, ['id' => 'input-email']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::label('password', 'Пароль') }}
                            {{ Form::password('password', ['id' => 'input-password']) }}
                        </div>
                        <div class="form-group">
                            {!! Recaptcha::render() !!}
                        </div>
                        {{ Form::submit('Зареєструватися', ['class' => 'button button-red']) }}
                    {{ Form::close()}}
                    <p class="terms">Зареєструвавшись або увійшовши, я визнаю і згоден з <a href="#" class="link-blue">Умовами сайту</a> та <a href="#" class="link-blue">Правилами конфіденційністі</a>.</p>
                </div>
                <div class="right text-right">
                    <a href="{{ url('login/google') }}" class="button login google">Продовжити з Google</a>
                    <a href="{{ url('login/facebook') }}" class="button login facebook">Продовжити з Facebook</a>
                    <a href="{{ url('login/twitter') }}" class="button login twitter">Продовжити з Twitter</a>
                </div>
            </div>
            <div class="sign-footer">
                <span>Вже є аккаунт?</span>
                <a href="{{ url('login') }}" class="link-red">Увійти</a>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
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
                success: function(response) {
                    if (response['success']) {
                        $('#wrapper').html(response.message);
                    }
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