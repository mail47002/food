@extends('frontend.layouts.account')

@section('title')Products - @stop

@section('content')
    @include('frontend.profile.header')

    <div class="reviews">
        <h5 class="text-upper underline-red">Відгуки (30)</h5><hr class="zerro-top">
        <h6 class="zerro-bottom">Відгуки про повара (25)</h6>
        <ul class="list-unstyled">

            <li class="clearfix">
                <div class="left">
                    <div class="avatar">
                        <div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>
                    </div>
                    <a href="#" class="link-blue name">Вікторія</a>
                </div>

                <div class="right bg-yellow with-image">
                    <div class="blk-left">
                        <div class="date">2 липня 2016</div>
                        <div><a href="#" class="link-blue f16">М'ясне рагу з овочами</a></div>
                        <span class="stars">4</span>
                        <div class="message">
                            В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.
                        </div>

                        <div class="collapse" id="collapse_01">

                            <div class="answer clearfix">
                                <div class="title">Ваша відповідь</div>
                                <div class="message">
                                    В принципе вкусно,если сделать для одного раза,а так: гарнир
                                </div>
                                <div class="right-avatar">
                                    <div class="avatar">
                                        <div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>
                                    </div>
                                </div>
                            </div>

                            <div class="message" id="message_01">
                                В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.
                            </div>

                        </div>

                        <div class="collapse your-message" id="collapse_your_answer_about_01">
                            <form action="#about-01">
                                <textarea name="message" id="" placeholder="Ваша відповідь"></textarea>
                                <button class="link-red-dark" type="submit"><i class="fo fo-plane fo-2x"></i></button>
                            </form>
                        </div>

                        <hr>
                        <a href="#collapse_your_answer_about_01" class="your-message-link pull-left"  data-toggle="collapse" aria-expanded="false" aria-controls="collapse_your_answer_about_01" opened="Відмінити" closed="Відповісти" /></a>

                        <a href="#collapse_01" class="link-blue pull-right" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_01" opened="Приховати" closed="Показати все" /></a>

                    </div>
                    <div class="blk-right"><img src="/uploads/food2.jpg" ></div>

                </div>
            </li>


        </ul>
        <div class="paginate">
            <ul class="pagination grey">
                <li><a href="#" rel="prev"><</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li class="active"><span>3</span></li>
                <li><a href="#">4</a></li>
                <li class="disabled"><span>...</span></li>
                <li><a href="#">10</a></li>
                <li><a href="#" rel="next">></a></li>
            </ul>
        </div>
    </div>

    {{-- если 0  --}}
    <h6 class="zerro-bottom">Відгуки від клієнтів (0)</h6>
    <div class="empty-block">
        <i class="fo fo-dish-search fo-big block"></i>
        <p>У повара ще немає відгуків!</p>
        <a href="#" class="button button-red button-empty-block" data-toggle="modal" data-target="#modal_warning">Залишити відгук</a>
    </div>


    <div class="reviews">
        <h6 class="zerro-bottom">Відгуки від поварів (5)</h6>
        <ul class="list-unstyled">

            <li class="clearfix">
                <div class="left">
                    <div class="avatar">
                        <div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>
                    </div>
                    <a href="#" class="link-blue name">Вікторія</a>
                </div>

                <div class="right bg-yellow">
                    <div class="date">2 липня 2016</div>
                    <span class="stars">4</span>
                    <div class="message">
                        В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.
                    </div>

                    <div class="collapse" id="collapse_02">

                        <div class="answer clearfix">
                            <div class="title">Ваша відповідь</div>
                            <div class="message">
                                В принципе вкусно,если сделать для одного раза,а так: гарнир
                            </div>
                            <div class="right-avatar">
                                <div class="avatar">
                                    <div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>
                                </div>
                            </div>
                        </div>

                        <div class="message">
                            В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.
                        </div>

                    </div>

                    <div class="collapse your-message" id="collapse_your_answer_from_01">
                        <form action="#from-01">
                            <textarea name="message" id="" placeholder="Ваша відповідь"></textarea>
                            <button class="link-red-dark" type="submit"><i class="fo fo-plane fo-2x"></i></button>
                        </form>
                    </div>

                    <hr>

                    <a href="#collapse_your_answer_from_01" class="your-message-link pull-left"  data-toggle="collapse" aria-expanded="false" aria-controls="collapse_your_answer_from_01" opened="Відмінити" closed="Відповісти" /></a>

                    <a href="#collapse_02" class="link-blue pull-right" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_02" opened="Приховати" closed="Показати все" /></a>

                </div>
            </li>

        </ul>

        {{-- если 0  --}}
        <h6 class="zerro-bottom">Відгуки від поварів (0)</h6>
        <div class="empty-block">
            <i class="fo fo-people fo-big block"></i>
            <p>Це ваш клієнт!</p>
            <a href="#" class="button button-red button-empty-block" data-toggle="modal" data-target="#modal_warning">Залишити відгук</a>
        </div>
    </div>


    <!-- Modal -->
    <div id="modal_warning" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content text-center">
                <a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
                <div class="modal-body">
                    <p class="f18">Спершу зробіть замовлення, щоб залишити відгук про повара</p>

                    <a href="#" class="button button-red button-big-modal">Замовити страву</a>
                </div>
            </div>
        </div>
    </div>

@endsection