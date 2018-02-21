@extends('frontend.layouts.account')

@section('content')
    <h5 class="text-upper underline-red">Змінити адресу сторінки</h5>
    <hr>
    {{ Form::open([ 'route' => ['account.slug.update'], 'method' => 'put', 'class' => 'contact']) }}
        <p class="message" id="message">Заповніть виділені поля</p>
        <div class="form-group">
            {{ Form::label('slug', 'Адреса вашої сторінки*') }}
            <div class="url">
                <span class="left">{{ url('') }}/</span>
                {{ Form::text('slug', Auth::user()->profile->slug, ['id' => 'input-slug']) }}
            </div>
        </div>
        <div class="v-indent-30"></div>
        <hr>
        {{ Form::submit('Зберегти', ['class' => 'button button-red profile text-upper']) }}
        <a href="{{ route('account.user.show', Auth::id()) }}" class="button dismiss profile">Скасувати</a>
    {{ Form::close() }}

    @include('frontend.account.users.success')
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
                        target = form.find('#input-' + name);

                        target.addClass('error');
                        target.closest('.form-group').addClass('has-error');
                    }
                }
            });
        });
    </script>
@endpush