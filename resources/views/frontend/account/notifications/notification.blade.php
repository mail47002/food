@if($notification->type === 'App\Notifications\OrderCreated')
    <div class="wide-thumb profile-messages clients">
        <div class="left with-image">
            <div class="title">{!! $notification->data['title'] !!}</div>
            <div class="avatar">
                <div class="rounded"><img src="{{ asset($notification->data['image']) }}" alt="foto"></div>
            </div>
            <div class="message">
                <p><a href="#" class="link-blue">М'ясне рагу з овочами</a> </p>
                <p><i class="fo fo-time red"></i>15 грудня (обід) <span class="price">80 грн.</span></p>
            </div>

            <div class="image hidden-xs"><img src="/uploads/food2.jpg" alt=""></div>
        </div>
        <div class="right left-border">
            <p class="date">10:15 2 липня 2016</p>
            <a href="#" class="button button-orange"><i class="fo fo-ok"></i> Підтвердити</a>
        </div>
    </div>
@endif

@if($notification->type === 'App\Notifications\OrderConfirmed')

@endif