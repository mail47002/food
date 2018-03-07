@extends('frontend.layouts.default')

@section('title')Reviews - @stop

@section('content')
    <div class="breadcrumbs">
        <div class="container">
            <ul class="list-inline">
                <li>
                    <a href="{{ route('profile.reviews.create', $user->profile->slug) }}" class="link-blue text-upper js-return">
                        <i class="fo fo-arrow-left fo-small"></i>  Повернутися
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="bg-yellow text-center">
        <div class="v-indent-20"></div>

        <h5 class="text-upper black margin-30">Відгук про клієнта</h5>

        <div class="avatar v90">
            <div class="rounded"><img src="{{ $user->getAvatar() }}" alt="{{ $user->profile->first_name }}"></div>
        </div>

        <a href="{{ route('profile.user.show', $user->profile->slug) }}" class="link-blue name f16 block">{{  $user->profile->first_name }}</a>

        <div class="v-indent-60"></div>
    </div>

    <div class="container-half text-center">
        {{ Form::open(['route' => ['profile.reviews.client.store', $user->profile->slug], 'method' => 'post', 'class' => 'edit']) }}
        {{ Form::hidden('type', 'client') }}

        <p class="message" id="message">Заповніть виділені поля</p>


        <div class="form-group">
            <label>Оцініть клієнта*</label>
            <div id="input-rating" class="rating with-hover">
                <fieldset>
                    <input type="radio" id="s_5" name="rating" value="5" />
                    <label class = "full" for="s_5" title="5"></label>
                    <input type="radio" id="s_4" name="rating" value="4" />
                    <label class = "full" for="s_4" title="4"></label>
                    <input type="radio" id="s_3" name="rating" value="3" />
                    <label class = "full" for="s_3" title="3"></label>
                    <input type="radio" id="s_2" name="rating" value="2" />
                    <label class = "full" for="s_2" title="2"></label>
                    <input type="radio" id="s_1" name="rating" value="1" />
                    <label class = "full" for="s_1" title="1"></label>
                </fieldset>
            </div>
        </div>

        <div class="form-group">
            <label>Напишіть відгук*</label>
            <textarea id="input-text" name="text" type="text" class="wide" placeholder="Ваш відгук"></textarea>
        </div>

        <input type="submit" class="button button-red zerro-bottom" value="Відправити">

        {{ Form::close() }}

        <div class="v-indent-60"></div>
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

                    form.find(':submit').attr('disabled', true);
                    form.find('.has-error').removeClass('has-error');
                    form.find('.error').removeClass('error');

                    $('.body-overlay').addClass('active');
                },
                success: function(response) {
                    if (response['success']) {
                        window.location = '{{ route('profile.reviews.client.success', $user->profile->slug) }}'
                    }
                },
                error: function(data) {
                    var data = data.responseJSON;

                    form.find(':submit').attr('disabled', false);

                    $('.body-overlay').removeClass('active');

                    $('#message').show();

                    for (name in data.errors) {
                        var target = form.find('#input-' + name);

                        target.addClass('error');
                        target.closest('.form-group').addClass('has-error');
                    }
                }
            })
        });
    </script>
@endpush