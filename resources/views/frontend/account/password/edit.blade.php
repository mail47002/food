@extends('frontend.layouts.account')

@section('content')
    <h5 class="text-upper underline-red">Змінити пароль</h5>
    <hr>
    {{ Form::open(['route' => ['account.password.update'], 'method' => 'put', 'class' => 'contact']) }}
        <div class="form-group">
            {{ Form::label('email', 'Email*', ['for' => 'email']) }}
            {{ Form::text('email', Auth::user()->email, ['id' => 'input-email', 'required' => 'required', 'disabled' => 'disabled', 'class' => 'disabled']) }}
        </div>
        <div class="v-indent-30"></div>
        <hr>
        <p class="message half" id="message">Заповніть виділені поля</p>
        <div class="form-group">
            {{ Form::label('old_password', 'Старий пароль', ['for' => 'old_password']) }}
            {{ Form::password('old_password', ['id' => 'input-old_password']) }}
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Новий пароль', ['for' => 'password']) }}
            {{ Form::password('password', ['id' => 'input-password']) }}
        </div>
        <div class="form-group">
            {{ Form::label('password_confirm', 'Повторити пароль', ['for' => 'password_confirmation']) }}
            {{ Form::password('password_confirm', ['id' => 'input-password_confirm']) }}
        </div>
        <div class="v-indent-30"></div>
        <hr>
        {{Form::submit('Зберегти', ['class' => 'button button-red account text-upper']) }}
    {{ Form::close() }}
    </div>

    @include('frontend.account.users.success')
@endsection

@push('scripts')
    <script src="{{ asset('frontend/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('frontend/js/additional-methods.min.js') }}"></script>
    <script src="{{ asset('frontend/js/messages_uk.js') }}"></script>

    <script type="text/javascript">
        $('form').validate({ // initialize the plugin
            rules: {
                old_password: {
                    required: true
                },
                password: {
                    required: true,
                    minlength: 6
                },
                password_confirm: {
                    equalTo: "#input-password"
                }
            },
            submitHandler: function (form) {

                var form = $(form);
                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: form.serialize(),
                    beforeSend: function() {
                        $('#message').hide();

                        form.find('input[type=submit]').attr('disabled', true);
                        form.find('.has-error').removeClass('has-error');
                        form.find('.error').removeClass('error');

                        $('.body-overlay').addClass('active');
                    },
                    success: function(response) {
                        if (response['success']) {
                            $('#modal_account-update').modal('show');
                        }
                    },
                    complete: function() {
                        form.find('input[type=submit]').attr('disabled', false);

                        $('.body-overlay').removeClass('active');
                    },
                    error: function(data) {
                        var data = data.responseJSON;

                        $('#message').show();

                        for (name in data.errors) {
                            var target = form.find('#input-' + name);

                            target.after('<label class="error">'+data.errors[name][0]+'</label>');

                            target.addClass('error');
                            target.closest('.form-group').addClass('has-error');
                        }
                    }
                });

            }
        });

    </script>
@endpush