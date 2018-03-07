<li class="clearfix">
    <div class="left">
        <div class="avatar">
            <div class="rounded">
                <img src="{{ $entity->user->getAvatar() }}" alt="{{ $entity->user->profile->first_name }}">
            </div>
        </div>
        <a href="{{ route('profile.user.show', $entity->user->profile->slug ) }}" class="link-blue name">
            {{ $entity->user->profile->first_name }}
        </a>
    </div>

    <div class="right bg-yellow with-image">
        <div class="blk-left">
            <div class="date">{{ Date::parse($entity->created_at)->format('d F Y') }}</div>
            <div>
                <a href="#" class="link-blue f16">
                    {{ $entity->product->name }}
                </a>
            </div>
            <span class="stars">{{ $entity->rating }}</span>
            <div class="message">
                {{ $entity->text }}
            </div>

            <div class="collapse" id="collapse_01">

                <div class="answer clearfix">
                    <div class="title">Ваша відповідь</div>
                    <div class="message">
                        В принципе вкусно,если сделать для одного раза,а так: гарнир
                    </div>
                    <div class="right-avatar">
                        <div class="avatar">
                            <div class="rounded">
                                <img src="/uploads/avatar.png" alt="foto">
                            </div>
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