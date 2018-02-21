@auth()
    <!-- Modal Order -->
    <div id="modal_order" class="modal fade" role="dialog">
        <div class="modal-dialog w-710">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
                    <h4 class="modal-title">Оформити замовлення</h4>
                </div>
                <div class="modal-body">
                    <div class="v-indent-20"></div>
                    <div class="step"><span>1</span></div>
                    <div class="f-18 top-10">Для оформлення замовлення, зв'яжіться з поваром страви</div>
                    <div class="js-user"></div>
                    <div id="switchable">
                        <div class="grey3 top-20">або</div>
                        <div class="f18">залиште свій номер телефону,<br> і повар зв’яжиться з вам найближчи</div>
                        <div class="top-20"></div>
                        {{ Form::open(['route' => 'callback.store', 'method' => 'post', 'id' => 'form-callback']) }}
                            <input type="hidden" name="advert_id" value="">
                            <input type="hidden" name="user_id" value="">
                            <a class="button btn-grey-red" href="#" onclick="callback.store()">Відправити</a>
                        {{ Form::close() }}
                    </div>

                    <div class="v-indent-20"></div>
                    <div class="step"><span>2</span></div>
                    <div class="f-18 top-20">Для завершення замовлення обов’язково потрібно підтвердити його</div>


                    {{ Form::open(['route' => 'orders.store', 'method' => 'post', 'id' => 'form-order']) }}
                    <input type="hidden" name="advert_id" value="">
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">

                    <div class="top-20 inline js-buttons">
                        <button class="button button-white text-upper mlr-10" type="button" data-dismiss="modal">Підтвердити пізніше</button>
                        <a class="button button-red text-upper mlr-10" href="#" onclick="order.store()">Підтвердити зараз</a>
                    </div>

                    <div class="info-block red w-480 hidden js-info-block">
                        <p class="text-upper">Замовлення очікує на підтвердження!</p>
                        <div><a href="{{ route('account.orders.index') }}" class="link-grey3 f14">Перейти до моїх замовлень <i class="fo fo-arrow-right fo-small"></i></a></div>
                    </div>
                    {{ Form::close() }}

                </div>
            </div>
        </div>
    </div>
@endauth


@push('scripts')
    <script>
        // Order
        var order = {
            show: function (advertId) {
                $.get('{{ url('api/adverts') }}/' + advertId).done(function (response) {
                    var html = '';

                    if (response.data) {
                        html += '<div class="caption">';
                        html += '<div class="avatar">';
                        html += '<div class="rounded"><img src="' + response.data['user']['profile']['image'] + '" alt="foto"></div>';
                        html += '</div>';
                        html += '<p><a href="#" class="link-blue name">' +  response.data['user']['profile']['first_name'] +'</a></p>';
                        html += '</div>';

                        for (i in response.data['user']['phone']) {
                            html += '<div class="phone red f24">' + response.data['user']['profile']['phone'][i] + '</div>';
                        }

                        $('#modal_order .js-user').html(html);
                        $('#modal_order input[name="advert_id"]').val(advertId);

                        $('#modal_order .alert').remove();
                        $('#modal_order .has-error').removeClass('has-error');
                        $('#modal_order .error').removeClass('error');

                        $('#modal_order').modal('show');
                    }
                });
            },
            store: function () {
                var form = $('#form-order');

                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: form.serialize(),
                    dataType: 'json',
                    beforeSend: function () {
                        $('#modal_order').find('.alert').remove();

                        form.find(':submit').attr('disabled', true);

                        $('.body-overlay').addClass('active');
                    },
                    success: function (response) {
                        if (response.data) {
                            form.find('.js-buttons').toggleClass('hidden');
                            form.find('.js-info-block').toggleClass('hidden');
                        }
                    },
                    error: function () {
                        $('#modal_order .modal-body').before('<div class="alert alert-warning">Ви вже оформили це замовлення!</div>');
                    },
                    complete: function () {
                        form.find(':submit').attr('disabled', false);

                        $('.body-overlay').removeClass('active');
                    }
                })
            }
        };

        // Callback
        var callback = {
            store: function () {
                var form = $('#form-callback');

                $.ajax({
                    url: form.attr('action'),
                    method: form.attr('method'),
                    data: form.serialize(),
                    dataType: 'json',
                    beforeSend: function () {
                        $('#modal_order').find('.alert').remove();

                        form.find(':submit').attr('disabled', true);

                        $('.body-overlay').addClass('active');
                    },
                    success: function (response) {
                        if (response.data) {
                            var html = '';

                            html += '<div id="ok_send" class="grey-block bg-yellow black w-480">';
                            html += '<p class="text-center red"><i class="fo fo-ok fo-2x"></i></p>';
                            html += '<p class="f16">' + response.data['message'] + '</p>';
                            html += '</div>';

                            $('#switchable').addClass('hidden').after(html);
                        }
                    },
                    complete: function () {
                        form.find(':submit').attr('disabled', false);

                        $('.body-overlay').removeClass('active');
                    }
                });
            }
        };


        $('#modal_order').on('hidden.bs.modal', function () {
            $('#modal_order input[name=advert_id]').val('');
            $('#modal_order .js-buttons').removeClass('hidden');
            $('#sw').removeClass('hidden');
            $('#ok_send').remove();

            if (!$('#modal_order .js-info-block').hasClass('hidden')) {
                $('#modal_order .js-info-block').addClass('hidden');
            }
        });
    </script>
@endpush