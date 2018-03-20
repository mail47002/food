@if(Helper::isProductReviews())
    <li id="review-{{ $entity->id }}" class="with-image bg-yellow clearfix">
        <div class="title">
            <p class="date">{{ Date::parse($entity->created_at)->format('d F Y') }}</p>
            <p class="black">Відгук для <a href="#" class="link-blue">{{ $entity->product->user->profile->first_name }}</a> про <a href="#" class="link-blue">{{ $entity->product->name }}</a></p>
        </div>
        <div class="left">
            <div class="avatar">
                <div class="rounded">
                    <img src="{{ $entity->user->getAvatar() }}" alt="{{ $entity->user->profile->first_name }}">
                </div>
            </div>
            <a href="{{ route('profile.user.show', $entity->product->user->profile->slug) }}" class="link-blue name">
                {{ $entity->product->user->profile->first_name }}
            </a>
        </div>

        <div class="right">
            <span class="stars">{{ $entity->rating }}</span>
            <div class="message">
                {{ $entity->text }}
            </div>

            @if($entity->answer)
                <div class="collapse" id="collapse_cook_01">
                    <div class="answer clearfix js-answer">
                        <div class="title">Відповідь від {{ $entity->answer->user->profile->first_name }}</div>
                        <div class="message">{{ $entity->answer->text }}</div>
                        <div class="right-avatar">
                            <div class="avatar">
                                <div class="rounded">
                                    <img src="{{ $entity->answer->user->getAvatar() }}" alt="{{  $entity->answer->user->profile->first_name }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="v-indent-20 top-10">
                    <a href="#collapse_cook_01" class="link-blue pull-left" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_cook_01" opened="Приховати" closed="Показати все" /></a>
                </div>
            @endif

        </div>
        <div class="image">
            <img src="{{ $entity->product->user->directory . 'thumbs/' . $entity->product->image }}" alt="{{ $entity->product->name }}">
        </div>
    </li>
@endif

@if(Helper::isClientReviews())
    <li id="review-{{ $entity->id }}" class="with-image bg-yellow clearfix">
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
                <div class="answer clearfix js-answer"></div>
            </div>

            @if($entity->answer)
                <div class="collapse" id="collapse_cook_01">
                    <div class="answer clearfix js-answer">
                        <div class="title">Ваша відповідь</div>
                        <div class="message">{{ $entity->answer->text }}</div>
                        <div class="right-avatar">
                            <div class="avatar">
                                <div class="rounded">
                                    <img src="{{ auth()->user()->getAvatar() }}" alt="{{ auth()->user()->profile->first_name }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="v-indent-20 top-10">
                    <a href="#collapse_cook_01" class="link-blue pull-left" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_cook_01" opened="Приховати" closed="Показати все" /></a>
                </div>
            @else
                <div class="answer clearfix js-answer"></div>
            @endif

            @if(!$entity->answer)
                <div class="collapse your-message" id="collapse_your_answer_cook_01">
                    {{ Form::open(['route' => 'product.review.answer.store', 'method' => 'post']) }}
                        {{ Form::hidden('product_review_id', $entity->id) }}
                        <div class="form-group">
                            <textarea name="text" placeholder="Ваша відповідь"></textarea>
                        </div>
                        <button class="link-red-dark" type="submit"><i class="fo fo-plane fo-2x"></i></button>
                    {{ Form::close() }}
                </div>

                <hr>
                <a href="#collapse_your_answer_cook_01" class="your-message-link pull-right"  data-toggle="collapse" aria-expanded="false" aria-controls="collapse_your_answer_cook_01" opened="Відмінити" closed="Відповісти" /></a>
            @endif

        </div>
        <div class="image">
            <img src="{{ $entity->user->getAvatar() }}" alt="{{ $entity->user->profile->first_name }}">
        </div>
    </li>
@endif