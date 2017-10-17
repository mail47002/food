@extends('frontend.layouts.profile')

@section('content')
    <h5 class="text-upper underline-red">Змінити пароль</h5>
    <hr>
    {{ Form::open(['route' => ['profile.password.update', Auth::id()], 'method' => 'put', 'class' => 'contact']) }}
        <p class="message half" id="message">Заповніть виділені поля</p>
        <div class="form-group">
            {{ Form::label('email', 'Email*', ['for' => 'email']) }}
            {{ Form::text('email', Auth::user()->email, ['id' => 'input-email', 'required' => 'required', 'disabled' => 'disabled', 'class' => 'disabled']) }}
        </div>
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
        {{Form::submit('Зберегти', ['class' => 'button button-red profile text-upper']) }}
    {{ Form::close() }}
    </div>

    <div id="modal_profile-update" class="modal fade" role="dialog">
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
@endsection

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
                    $('#message').hide();

                    form.find('input[type=submit]').attr('disabled', true);
                    form.find('.has-error').removeClass('has-error');
                    form.find('.error').removeClass('error');

                    $('.body-overlay').addClass('active');
                },
                success: function(data) {
                    if (data['success']) {
                        $('#modal_profile-update').modal('show');
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

                        target.addClass('error');
                        target.closest('.form-group').addClass('has-error');
                    }
                }
            });
        });
    </script>
@endpush