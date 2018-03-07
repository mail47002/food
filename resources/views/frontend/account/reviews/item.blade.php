@if(Helper::isClientReviews())
    <li class="with-image bg-yellow clearfix">
        <div class="title">
            <p class="date">{{ Date::parse($entity->created_at)->format('d F Y') }}</p>
            <p class="black">Відгук про <a href="#" class="link-blue">{{ $entity->user->profile->first_name }}</a></p>
        </div>
        <div class="left">
            <div class="avatar">
            </div>
            <a href="{{ route('profile.user.show', $entity->product->user->profile->slug) }}" class="link-blue name">{{ $entity->product->user->profile->first_name }}</a>
        </div>

        <div class="right">
            <span class="stars">{{ $entity->rating }}</span>
            <div class="message">
                {{ $entity->text }}
            </div>

            <div class="collapse" id="collapse_cook_01">

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

            <div class="v-indent-20 top-10">
                <a href="#collapse_cook_01" class="link-blue pull-left" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_cook_01" opened="Приховати" closed="Показати все" /></a>
            </div>

            <div class="collapse your-message" id="collapse_your_answer_cook_01">
                <form action="#cook-01">
                    <textarea name="message" id="" placeholder="Ваша відповідь"></textarea>
                    <button class="link-red-dark" type="submit"><i class="fo fo-plane fo-2x"></i></button>
                </form>
            </div>

            <hr>
            <a href="#collapse_your_answer_cook_01" class="your-message-link pull-right"  data-toggle="collapse" aria-expanded="false" aria-controls="collapse_your_answer_cook_01" opened="Відмінити" closed="Відповісти" /></a>

        </div>
        <div class="image">
            <img src="{{ $entity->user->getAvatar() }}" alt="{{ $entity->user->profile->first_name }}">
        </div>
    </li>
@else
    <li class="with-image bg-yellow clearfix">
        <div class="title">
            <p class="date">{{ Date::parse($entity->created_at)->format('d F Y') }}</p>
            <p class="black">Відгук для <a href="#" class="link-blue">{{ $entity->product->user->profile->first_name }}</a> про <a href="#" class="link-blue">{{ $entity->product->name }}</a></p>
        </div>
        <div class="left">
            <div class="avatar">
                <div class="rounded">
                    <img src="{{ $entity->product->user->getAvatar() }}" alt="{{ $entity->product->user->profile->first_name }}">
                </div>
            </div>
            <a href="{{ route('profile.user.show', $entity->product->user->profile->slug) }}" class="link-blue name">{{ $entity->product->user->profile->first_name }}</a>
        </div>

        <div class="right">
            <span class="stars">{{ $entity->rating }}</span>
            <div class="message">
                {{ $entity->text }}
            </div>

            <div class="collapse" id="collapse_cook_01">

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

            <div class="v-indent-20 top-10">
                <a href="#collapse_cook_01" class="link-blue pull-left" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_cook_01" opened="Приховати" closed="Показати все" /></a>
            </div>

            <div class="collapse your-message" id="collapse_your_answer_cook_01">
                <form action="#cook-01">
                    <textarea name="message" id="" placeholder="Ваша відповідь"></textarea>
                    <button class="link-red-dark" type="submit"><i class="fo fo-plane fo-2x"></i></button>
                </form>
            </div>

            <hr>
            <a href="#collapse_your_answer_cook_01" class="your-message-link pull-right"  data-toggle="collapse" aria-expanded="false" aria-controls="collapse_your_answer_cook_01" opened="Відмінити" closed="Відповісти" /></a>

        </div>
        <div class="image">
            <img src="{{ $entity->product->user->directory . 'thumbs/' . $entity->product->image }}" alt="{{ $entity->product->name }}">
        </div>
    </li>
@endif