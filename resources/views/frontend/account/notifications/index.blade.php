@extends('frontend.layouts.account')

@section('content')
    <h5 class="text-upper underline-red">Мої повідомлення</h5><hr class="zerro-top">

    <div class="filter-block">
        <ul class="categories list-inline text-center">
            <li class="active"><a data-toggle="tab" href="#notice" class="link-red text-upper">Повідомлення</a></li>
            <li><a data-toggle="tab" href="#messages" class="link-red text-upper">Переписка</a></li>
        </ul>
        <hr class="red-border">
    </div>

    <div class="v-indent-20"></div>

    <div class="tab-content">
        <div id="notice" class="tab-pane fade in active">

            @if(count($notifications) > 0)
                @each('frontend.account.notifications.item', $notifications, 'notification')
            @endif

        </div>
        <div id="messages" class="tab-pane fade">

            <a class="wide-thumb profile-letters unread" href="#">
                <object><a href="#" class="delete"><i class="fo fo-delete fo-small"></i></a></object>
                <div class="avatar-title"><div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div></div>
                <div class="col">
                    <div class="title">
                        <object><a href="#" class="link-blue">Іван</a></object>
                        <span class="date">10:15 2 липня 2016</span>
                    </div>
                    <div class="message">
                        <div class="avatar"><div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div></div>
                        <p>В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховата, но... впечатление от блюда осталось приятное! для разнообразия... приготовить можно).</p>
                    </div>
                </div>
            </a>

            <a class="wide-thumb profile-letters read" href="#">
                <object><a href="#" class="delete"><i class="fo fo-delete fo-small"></i></a></object>
                <div class="avatar-title"><div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div></div>
                <div class="col">
                    <div class="title">
                        <object><a href="#" class="link-blue">Іван</a></object>
                        <span class="date">10:15 2 липня 2016</span>
                    </div>
                    <div class="message">
                        <div class="avatar"><div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div></div>
                        <p>В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховата, но... впечатление от блюда осталось приятное! для разнообразия... приготовить можно).</p>
                    </div>
                </div>
            </a>

            <a class="wide-thumb profile-letters read" href="#">
                <object><a href="#" class="delete"><i class="fo fo-delete fo-small"></i></a></object>
                <div class="avatar-title"><div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div></div>
                <div class="col">
                    <div class="title">
                        <object><a href="#" class="link-blue">Іван</a></object>
                        <span class="date">10:15 2 липня 2016</span>
                    </div>
                    <div class="message">
                        <p>В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховата, но... впечатление от блюда осталось приятное! для разнообразия... приготовить можно).</p>
                    </div>
                </div>
            </a>

        </div>
    </div>
@endsection