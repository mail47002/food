@extends('frontend.layouts.profile')

@section('content')
    <h5 class="text-upper underline-red">Оголошення ({{ $adverts->total() }})</h5><hr class="zerro-top">
    <div class="filter-block">
        <ul class="categories list-inline text-center">
            <li class="{{ (!request()->has('type') || (request()->has('type') && request()->get('type') == 'by_date')) ? 'active' : '' }}"><a href="{{ route('profile.adverts.index', ['type' => 'by_date']) }}" class="link-red text-upper">Меню по датам</a></li>
            <li class="{{ (request()->has('type') && request()->get('type') == 'in_stock') ? 'active' : '' }}"><a href="{{ route('profile.adverts.index', ['type' => 'in_stock']) }}" class="link-red text-upper">Готові страви</a></li>
            <li class="{{ (request()->has('type') && request()->get('type') == 'pre_order') ? 'active' : '' }}"><a href="{{ route('profile.adverts.index', ['type' => 'pre_order']) }}" class="link-red text-upper">Страви під замовлення</a></li>
        </ul>
        <hr class="red-border">
    </div>

    <div class="tab-content">
        <div id="menu" class="tab-pane fade in active">

            @if (!request()->has('type') || (request()->has('type') && request()->get('type') == 'by_date'))
                <a href="{{ route('profile.adverts.create', ['type' => 'by_date']) }}" class="button button-red button-big">Додати страву до меню</a>
            @endif

            @if (request()->has('type') && request()->get('type') == 'in_stock')
                <a href="{{ route('profile.adverts.create', ['type' => 'in_stock']) }}" class="button button-red button-big">Додати готову страву</a>
            @endif

            @if (request()->has('type') && request()->get('type') == 'pre_order')
                <a href="{{ route('profile.adverts.create', ['type' => 'pre_order']) }}" class="button button-red button-big">Додати страву під замовлення</a>
            @endif

            <div class="v-indent-30"></div>

            <hr>
            <div class="bg-yellow">
                <div class="row">
                    <div class="col-md-6">
                        {{ Form::open(['route' => 'profile.adverts.index', 'method' => 'get', 'class' => 'search']) }}
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
                @foreach ($adverts as $advert)
                    <div class="wide-thumb profile-adverts">

                        <div class="row">
                            <div class="col-md-4">
                                <div class="image">
                                    <img src="{{ asset('uploads/' . md5(auth()->id()) . '/' . $advert->image) }}" class="img-responsive" alt="{{ $advert->name }}">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="caption">
                                    <a href="{{ route('profile.adverts.show', $advert->id) }}" class="title link-black">{{ $advert->name }}</a>

                                    <span class="rating">
                                <span class="stars">{{rand(0,5)}}</span>10 відгуків
                            </span>

                                    <p><span class="price">{{ $advert->price }} грн.</span></p>

                                    @if (!request()->has('type') || (request()->has('type') && request()->get('type') == 'by_date'))
                                        @if ($advert->is_everyday)
                                            <p><i class="fo fo-dish-ready red"></i>{{ $advert->date_from->format('d F') }} - {{ $advert->date_from->format('d F') }}</p>
                                        @else
                                            <p><i class="fo fo-time red"></i>{{ $advert->date->format('d F') }} (обід)</p>
                                        @endif
                                    @endif

                                    <p><a href="{{ route('profile.adverts.edit', $advert->id) }}" class="link-blue"><i class="fo fo-edit fo-inheirt"></i> Редагувати</a></p>
                                    <p><a href="#" class="link-grey js-modal-advert-delete" data-toggle="modal" data-target="#modal_advert-delete"><i class="fo fo-delete fo-inheirt"></i> Відмінити</a></p>

                                </div>
                            </div>
                            <div class="col-md-3 left-border">
                                <div class="caption text-center">
                                    <div class="grey-block red">
                                        <i class="fo fo-dish-search"></i>
                                        <span class="red">2</span><span class="black">/5</span>
                                        <p class="text">Залишилося порцій</p>
                                    </div>

                                    <a href="#" class="button button-green" data-toggle="modal" data-target="#modal_clients"><i class="fo fo-ok"></i> Клієнти на страву </a>
                                    <a href="#" class="button button-orange"><i class="fo fo-peoples"></i> Нові замовленя</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{ $adverts->appends(request()->all())->links() }}
            @else
                <div class="v-indent-40"></div>
                <div class="empty-block">
                    <i class="fo fo-dish-search fo-2x"></i>
                    <p class="text">У вас немає страв</p>

                    @if (!request()->has('type') || (request()->has('type') && request()->get('type') == 'by_date'))
                        <a href="{{ route('profile.adverts.create', ['type' => 'by_date']) }}" class="button button-red button-big">Додати страву до меню</a>
                    @endif

                    @if (request()->has('type') && request()->get('type') == 'in_stock')
                        <a href="{{ route('profile.adverts.create', ['type' => 'in_stock']) }}" class="button button-red button-big">Додати готову страву</a>
                    @endif

                    @if (request()->has('type') && request()->get('type') == 'pre_order')
                        <a href="{{ route('profile.adverts.create', ['type' => 'pre_order']) }}" class="button button-red button-big">Додати страву під замовлення</a>
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


            <div class="wide-thumb profile-adverts">
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

            <div class="wide-thumb profile-adverts">
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


            <div class="wide-thumb profile-adverts">
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

            <div class="wide-thumb profile-adverts">
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
    <p><a href="#" class="link-blue" data-toggle="modal" data-target="#modal_order">Замовлення ... 5.3.4</a></p>
    <p><a href="#" class="link-blue" data-toggle="modal" data-target="#modal_cancel">Відмінити оголошення ...5.3.5.2</a></p>
    <p><a href="#" class="link-blue" data-toggle="modal" data-target="#modal_clients">Клієнти на страву ...5.3.5.2</a></p>



    {{-- 5.3.4 --}}
    <!-- Modal -->
    <div id="modal_order" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content text-center">
                <div class="modal-header">
                    <a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
                    <h4 class="modal-title">Нові замовлення (30)</h4>
                </div>
                <div class="modal-body">

                    <div class="alert" {{-- style="display: none;" --}} >
                        <p>Ваш запит на відмову клієнтам відправлено.</p>
                        <p>Після підтвердження , клієнт буде видаленій зі списку!</p>
                    </div>

                    <div class="content">
                        {{-- Нові замовлення --}}
                        @for($i=0;$i<4;$i++)
                            <div class="caption">
                                <a href="#" class="discard link-red"><i class="fo fo-close-rounded"></i></a>
                                <div class="avatar">
                                    <div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
                                </div>
                                <p><a href="#" class="link-blue name">Марк</a></p>
                                <p class="phone">+38 096 159 15 15</p>
                                <div class="rating">
                                    <span class="stars">4</span>
                                    <p>10 відгуків</p>
                                </div>
                                <a href="#" class="button button-red wide">Підтвердити</a>
                            </div>
                        @endfor

                        {{-- Клієнти на страву --}}
                        <div class="caption">
                            <div class="avatar">
                                <div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
                            </div>
                            <p><a href="#" class="link-blue name">Марк</a></p>
                            <p class="phone">+38 096 159 15 15</p>
                            <div class="rating">
                                <span class="stars">4</span>
                                <p>10 відгуків</p>
                            </div>
                            <a href="#button" class="button button-green wide">
                                <i class="fo fo-ok"></i>
                                Клієнт
                                <object><a href="#reject" class="reject" title="Відмовити клієнту"><i class="fo fo-close-bold"></i></a></object>
                            </a>
                            <a href="#" class="button button-grey wide"><i class="fo fo-message"></i> Відгук</a>
                        </div>

                        <div class="caption">
                            <div class="avatar">
                                <div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
                            </div>
                            <p><a href="#" class="link-blue name">Марк</a></p>
                            <p class="phone">+38 096 159 15 15</p>
                            <div class="rating">
                                <span class="stars">4</span>
                                <p>10 відгуків</p>
                            </div>
                            <a href="#button" class="button button-white wide hover-replace" text="Відмінити запит">Запит на відмову </a>
                            <a href="#" class="button button-grey wide"><i class="fo fo-message"></i> Відгук</a>
                        </div>

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
                    <h4 class="modal-title">Клієнти на страву (10)</h4>
                </div>
                <div class="modal-body">
                    <div class="content">

                        <div class="caption">
                            <div class="avatar">
                                <div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
                            </div>
                            <p><a href="#" class="link-blue name">Марк</a></p>
                            <p class="phone">+38 096 159 15 15</p>
                            <a href="#button" class="button button-green wide">
                                <i class="fo fo-ok"></i>
                                Клієнт
                                <object><a href="#reject" class="reject" title="Відмовити клієнту"><i class="fo fo-close-bold"></i></a></object>
                            </a>
                        </div>

                        <div class="caption">
                            <div class="avatar">
                                <div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
                            </div>
                            <p><a href="#" class="link-blue name">Марк</a></p>
                            <p class="phone">+38 096 159 15 15</p>
                            <a href="#button" class="button button-white wide hover-replace" text="Відмінити запит">Запит на відмову </a>
                        </div>

                        <a href="#" class="button button-red button-big-modal">Відмовити Усім Клієнтам</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

@stop

@push('scripts')
    <script>
        $( function() {
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
@endpush