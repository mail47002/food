@extends('frontend.layouts.account')

@section('content')
    <h5 class="text-upper underline-red">Оголошення ({{ $advertsTotal }})</h5>
    <hr class="zerro-top">
    <div class="filter-block">
        <ul class="categories list-inline text-center">
            <li class="{{ Helper::isAdvertByDate() ? 'active' : '' }}">
                <a href="{{ route('account.adverts.index') }}" class="link-red text-upper">Меню по датам</a>
            </li>
            <li class="{{ Helper::isAdvertInStock() ? 'active' : '' }}">
                <a href="{{ route('account.adverts.index', ['type' => 'in_stock']) }}" class="link-red text-upper">Готові страви</a>
            </li>
            <li class="{{ Helper::isAdvertPreOrder() ? 'active' : '' }}">
                <a href="{{ route('account.adverts.index', ['type' => 'pre_order']) }}" class="link-red text-upper">Страви під замовлення</a>
            </li>
        </ul>
        <hr class="red-border">
    </div>

    <div class="tab-content">
        <div id="menu" class="tab-pane fade in active">
            @if(Helper::isAdvertByDate())
                <a href="{{ route('account.adverts.create', ['type' => 'by_date']) }}" class="button button-red button-big">Додати страву до меню</a>
            @endif

                @if(Helper::isAdvertInStock())
                <a href="{{ route('account.adverts.create', ['type' => 'in_stock']) }}" class="button button-red button-big">Додати готову страву</a>
            @endif

                @if(Helper::isAdvertPreOrder())
                <a href="{{ route('account.adverts.create', ['type' => 'pre_order']) }}" class="button button-red button-big">Додати страву під замовлення</a>
            @endif

            <div class="v-indent-30"></div>
            <hr>
            <div class="bg-yellow">
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::open(['route' => 'account.adverts.index', 'method' => 'get', 'class' => 'search']) }}
                            {{ Form::text('search', null, ['placeholder' => 'Пошук']) }}
                            <button type="submit" class="btn-search"><i class="fo fo-search fo-small"></i></button>
                        {{ Form::close() }}
                    </div>
                    {{--<div class="col-md-6">--}}
                        {{--<select name="sorting" id="sorting">--}}
                            {{--<option value="all">Всі страви</option>--}}
                            {{--<option value="1">Готові</option>--}}
                            {{--<option value="2">У меню</option>--}}
                            {{--<option value="3">Під замовлення</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}
                </div>
            </div>

            <div class="v-indent-20"></div>

            {{-- 5.3.1 --}}
            @if (count($adverts) > 0)
                @each('frontend.account.adverts.item', $adverts, 'advert')

                {{ $adverts->appends(request()->all())->links() }}
            @else
                <div class="v-indent-40"></div>
                <div class="empty-block">
                    <i class="fo fo-dish-search fo-2x"></i>
                    <p class="text">У вас немає страв</p>

                    @if(Helper::isAdvertByDate())
                        <a href="{{ route('account.adverts.create', ['type' => 'by_date']) }}" class="button button-red button-big">Додати страву до меню</a>
                    @endif

                    @if(Helper::isAdvertInStock())
                        <a href="{{ route('account.adverts.create', ['type' => 'in_stock']) }}" class="button button-red button-big">Додати готову страву</a>
                    @endif

                    @if(Helper::isAdvertPreOrder())
                        <a href="{{ route('account.adverts.create', ['type' => 'pre_order']) }}" class="button button-red button-big">Додати страву під замовлення</a>
                    @endif
                </div>
            @endif

        </div>
        <div id="ready" class="tab-pane fade">

            {{-- 5.3.2 --}}


            <a href="#" class="button button-red button-big">Додати готову страву</a>
            <div class="v-indent-30"></div>

            <hr>
            <div class="bg-yellow">
                <div class="row">
                    <div class="col-md-6">
                        <form action="#" class="search" method="get">
                            <input type="text" name="search" placeholder="Пошук">
                            <button type="submit" class="btn-search"><i class="fo fo-search fo-small"></i></button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <select name="sorting" id="sorting">
                            <option value="all">Всі страви</option>
                            <option value="1">Готові</option>
                            <option value="2">У меню</option>
                            <option value="3">Під замовлення</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="v-indent-20"></div>


            <div class="wide-thumb account-adverts">
                <div class="row">
                    <div class="col-md-4">
                        <div class="image">
                            <img src="/uploads/food1.jpg" class="img-responsive" alt="">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="caption">
                            <a href="/adverts/1" class="title link-black">М'ясне рагу з овочами</a>

                            <span class="rating">
						<span class="stars">{{rand(0,5)}}</span>10 відгуків
					</span>

                            <p><span class="price">80 грн.</span></p>


                            <p><a href="#" class="link-blue"><i class="fo fo-edit fo-inheirt"></i> Редагувати</a></p>
                            <p><a href="#" class="link-grey"><i class="fo fo-delete fo-inheirt"></i> Відмінити</a></p>

                        </div>
                    </div>
                    <div class="col-md-3 left-border">
                        <div class="caption text-center">
                            <div class="grey-block red">
                                <i class="fo fo-dish-search"></i>
                                <span class="red">2</span><span class="black">/5</span>
                                <p class="text">Залишилося порцій</p>
                            </div>

                            <a href="#" class="button button-green"><i class="fo fo-ok"></i> Клієнти на страву </a>
                            <a href="#" class="button button-orange"><i class="fo fo-peoples"></i> Нові замовленя</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wide-thumb account-adverts">
                <div class="row">
                    <div class="col-md-4">
                        <div class="image">
                            <img src="/uploads/food1.jpg" class="img-responsive" alt="">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="caption">
                            <a href="/adverts/1" class="title link-black">М'ясне рагу з овочами</a>

                            <span class="rating">
						<span class="stars">{{rand(0,5)}}</span>10 відгуків
					</span>

                            <div class="grey-block grey3 wide">
                                <i class="fo fo-serving fo-2x"></i>
                                <p class="text">Пропозиція закінчилася</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3 left-border">
                        <div class="caption text-center">
                            <div class="grey-block red">
                                <i class="fo fo-dish-search"></i>
                                <span class="red">0</span><span class="black">/5</span>
                                <p class="text">Залишилося порцій</p>
                            </div>

                            <a href="#" class="button button-green disabled"><i class="fo fo-ok"></i> Клієнти на страву </a>
                            <a href="#" class="button button-orange disabled"><i class="fo fo-peoples"></i> Нові замовленя</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="paginate">
                <ul class="pagination grey">
                    <li><a href="#" rel="prev"><</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#" rel="next">></a></li>
                </ul>
            </div>

            {{-- Если пусто, выводить этот блок --}}
            <div class="v-indent-40"></div>
            <div class="empty-block">
                <i class="fo fo-dish-search fo-2x"></i>
                <p class="text">У вас немає страв</p>
                <a href="#" class="button button-red button-big">Додати готову страву</a>
            </div>

        </div>
        <div id="order" class="tab-pane fade">

            {{-- 5.3.3 --}}


            <a href="#" class="button button-red button-big">Додати страву під замовлення</a>
            <div class="v-indent-30"></div>

            <hr>
            <div class="bg-yellow">
                <div class="row">
                    <div class="col-md-6">
                        <form action="#" class="search" method="get">
                            <input type="text" name="search" placeholder="Пошук">
                            <button type="submit" class="btn-search"><i class="fo fo-search fo-small"></i></button>
                        </form>
                    </div>
                    <div class="col-md-6">
                        <select name="sorting" id="sorting">
                            <option value="all">Всі страви</option>
                            <option value="1">Готові</option>
                            <option value="2">У меню</option>
                            <option value="3">Під замовлення</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="v-indent-20"></div>


            <div class="wide-thumb account-adverts">
                <div class="row">
                    <div class="col-md-4">
                        <div class="image">
                            <img src="/uploads/food1.jpg" class="img-responsive" alt="">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="caption">
                            <a href="/adverts/1" class="title link-black">М'ясне рагу з овочами</a>

                            <span class="rating">
						<span class="stars">{{rand(0,5)}}</span>10 відгуків
					</span>

                            <p><i class="fo fo-deal red"></i> <span class="price">800 - 2 500 грн.</span></p>

                            <p><a href="#" class="link-blue"><i class="fo fo-edit fo-inheirt"></i> Редагувати</a></p>
                            <p><a href="#" class="link-red-dark font-14"><i class="fo fo-sand-fill fo-inheirt"></i> Призупинити</a></p>
                            <p><a href="#" class="link-grey"><i class="fo fo-delete fo-inheirt"></i> Відмінити</a></p>

                        </div>
                    </div>
                    <div class="col-md-3 left-border">
                        <div class="caption text-center">
                            <div class="grey-block red">
                                <i class="fo fo-dish-search"></i>
                                <span class="red">20</span>
                                <p class="text">Замовлень</p>
                            </div>

                            <a href="#" class="button button-green"><i class="fo fo-ok"></i> Клієнти на страву </a>
                            <a href="#" class="button button-red">Активувати</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="wide-thumb account-adverts">
                <div class="row">
                    <div class="col-md-4">
                        <div class="image">
                            <img src="/uploads/food1.jpg" class="img-responsive" alt="">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="caption">
                            <a href="/adverts/1" class="title link-black">М'ясне рагу з овочами</a>

                            <span class="rating">
						<span class="stars">{{rand(0,5)}}</span>10 відгуків
					</span>

                            <div class="grey-block grey3 wide">
                                <i class="fo fo-serving fo-2x"></i>
                                <p class="text">Пропозиція неактивна</p>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3 left-border">
                        <div class="caption text-center">
                            <div class="grey-block red">
                                <i class="fo fo-dish-search"></i>
                                <span class="red">20</span>
                                <p class="text">Замовлень</p>
                            </div>

                            <a href="#" class="button button-green disabled"><i class="fo fo-ok"></i> Клієнти на страву </a>
                            <a href="#" class="button button-orange disabled"><i class="fo fo-peoples"></i> Нові замовленя</a>
                        </div>
                    </div>
                </div>
            </div>


            <div class="paginate">
                <ul class="pagination grey">
                    <li><a href="#" rel="prev"><</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#" rel="next">></a></li>
                </ul>
            </div>


            {{-- Если пусто, выводить этот блок --}}
            <div class="v-indent-40"></div>
            <div class="empty-block">
                <i class="fo fo-dish-search fo-2x"></i>
                <p class="text">У вас немає страв</p>
                <a href="#" class="button button-red button-big">Додати страву під замовлення</a>
            </div>

        </div>
    </div>

    <p>модальные окна</p>
    <p><a href="#" class="link-blue" data-toggle="modal" data-target="#modal_cancel">Відмінити оголошення ...5.3.5.2</a></p>
    <p><a href="#" class="link-blue" data-toggle="modal" data-target="#modal_clients">Клієнти на страву ...5.3.5.2</a></p>


    {{-- Modal New Orders --}}
    <div id="modal_order" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
                    <h4 class="modal-title">Нові замовлення (<span class="js-orders-total"></span>)</h4>
                </div>
                <div class="modal-body">

                    {{--<div class="alert" --}}{{-- style="display: none;" --}}{{-- >--}}
                        {{--<p>Ваш запит на відмову клієнтам відправлено.</p>--}}
                        {{--<p>Після підтвердження , клієнт буде видаленій зі списку!</p>--}}
                    {{--</div>--}}

                    <div class="content js-content">
                    </div>
                </div>
            </div>

        </div>
    </div>


    {{-- 5.3.5.2 --}}
    <!-- Modal -->
    <div id="modal_advert-delete" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
                    <h4 class="modal-title">Відмінити оголошення</h4>
                </div>
                <div class="modal-body">
                    <h6>М'ясне рагу з овочами</h6>
                    <div class="step"><span>1</span></div>
                    <h5>У вас є 5 клієнтів</h5>
                    <div>Оголошення можна видалити після відмови ваших клієнтів на дану страву.</div>
                    <div>Для відмови клієнтам натисніть кнопку!</div>
                    <a href="#" class="button button-red button-big-modal">Далі</a>
                </div>
            </div>
        </div>
    </div>



    {{-- 5.3.5.2 --}}
    <!-- Modal -->
    <div id="modal_clients" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <div class="modal-header">
                    <a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
                    <a href="#" type="button" class="back link-blue"><i class="fo fo-arrow-left fo-small"></i> Назад</a>
                    <h4 class="modal-title">Клієнти на страву (<span class="js-clients-total"></span>)</h4>
                </div>
                <div class="modal-body">
                    <div class="content js-content">

                        {{--<div class="caption">--}}
                            {{--<div class="avatar">--}}
                                {{--<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>--}}
                            {{--</div>--}}
                            {{--<p><a href="#" class="link-blue name">Марк</a></p>--}}
                            {{--<p class="phone">+38 096 159 15 15</p>--}}
                            {{--<a href="#button" class="button button-green wide">--}}
                                {{--<i class="fo fo-ok"></i>--}}
                                {{--Клієнт--}}
                                {{--<object><a href="#reject" class="reject" title="Відмовити клієнту"><i class="fo fo-close-bold"></i></a></object>--}}
                            {{--</a>--}}
                        {{--</div>--}}

                        {{--<div class="caption">--}}
                            {{--<div class="avatar">--}}
                                {{--<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>--}}
                            {{--</div>--}}
                            {{--<p><a href="#" class="link-blue name">Марк</a></p>--}}
                            {{--<p class="phone">+38 096 159 15 15</p>--}}
                            {{--<a href="#button" class="button button-white wide hover-replace" text="Відмінити запит">Запит на відмову </a>--}}
                        {{--</div>--}}


                    </div>
                    <a href="#" class="button button-red button-big-modal">Відмовити Усім Клієнтам</a>
                </div>
            </div>
        </div>
    </div>

@stop

@push('scripts')
    <script>
        $(function () {
            $("#sorting").selectmenu({
                change: function( e, ui ) {
                    var filter = $("#sorting").val();
                    {{-- Отсюда можна отсылать фильтр выпадайки --}}
                    console.log(filter);
                }
            });

            $(document).tooltip(
                {position: {my: "left top+10"}}
            );
        });
    </script>
    <script type="text/javascript">
        var order = {
            stored: function (advertId) {
                $.post('{{ url('api/orders/stored') }}', {
                    'advert_id': advertId
                }).done(function (responce) {
                    var html = '';

                    if (responce.data.length > 0) {
                        for (i in responce.data) {
                            html += '<div id="order-' + responce.data[i]['id'] + '" class="caption">';
                            html += '<a href="#" class="discard link-red"><i class="fo fo-close-rounded"></i></a>';
                            html += '<div class="avatar">';
                            html += '<div class="rounded"><img src="'+ responce.data[i]['user']['image'] +'" alt="foto"></div>';
                            html += '</div>';
                            html += '<p><a href="#" class="link-blue name">' + responce.data[i]['user']['name'] + '</a></p>';

                            for (j in responce.data[i]['user']['phone']) {
                                html += '<p class="phone">' + responce.data[i]['user']['phone'][j] + '</p>';
                            }

                            html += '<div class="rating"><span class="stars">4</span><p>10 відгуків</p></div>';
                            html += '<a href="javascript:void(0);" class="button button-red wide" onclick="order.confirm(' +  responce.data[i]['id'] + ')">Підтвердити</a>';
                            html += '</div>';
                        }
                    }

                    $('#modal_order .js-orders-total').html(responce.data.length);
                    $('#modal_order .js-content').html(html);

                    $('#modal_order').modal('show');
                });
            },
            confirm: function (orderId) {
                $.post('{{ url('api/orders/') }}/' + orderId + '/confirm').done(function (responce) {
                    if (responce.data.length > 0) {
                        $('#order-' + response.data['id']).remove();
                    }
                });
            },
            confirmed: function (advertId) {
                $.post('{{ url('api/orders/confirmed') }}', {
                    'advert_id': advertId
                }).done(function (responce) {
                    var html = '';

                    if (responce.data.length > 0) {
                        for (i in responce.data) {
                            html += '<div class="caption">';
                            html += '<div class="avatar">';
                            html += '<div class="rounded"><img src="' + responce.data[i]['user']['image'] + '" alt="foto"></div>';
                            html += '</div>';
                            html += '<p><a href="#" class="link-blue name">' + responce.data[i]['user']['name'] + '</a></p>';

                            for (j in responce.data[i]['user']['phone']) {
                                html += '<p class="phone">' + responce.data[i]['user']['phone'][j] + '</p>';
                            }

                            html += '<a href="#button" class="button button-green wide">';
                            html += '<i class="fo fo-ok"></i> Клієнт';
                            html += '<object><a href="javascript:void(0);" class="reject" title="Відмовити клієнту" onclick="order.cancel(' + responce.data[i]['id'] + ')"><i class="fo fo-close-bold"></i></a></object>';
                            html += '</a>';
                            html += '</div>';

                        }
                    }

                    $('#modal_clients .js-clients-total').html(responce.data.length);
                    $('#modal_clients .js-content').html(html);

                    $('#modal_clients').modal('show');
                });
            },
            cancel: function (orderId) {
                $.post('{{ url('api/orders') }}/' + orderId + '/cancel').done(function (responce) {
                    if (responce.data.length > 0) {

                    }
                })
            }
        }
    </script>
@endpush