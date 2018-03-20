@if(Helper::isProductReviews())
    <li id="review-{{ $entity->id }}" class="clearfix">
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


                @if($entity->answer)
                    <div class="collapse" id="collapse_01">
                        <div class="answer clearfix">
                            <div class="title">Ваша відповідь</div>
                            <div class="message">
                                {{ $entity->answer->text }}
                            </div>
                            <div class="right-avatar">
                                <div class="avatar">
                                    <div class="rounded">
                                        <img src="{{ $entity->answer->user->getAvatar() }}" alt="{{ $entity->answer->user->profile->first_name }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="js-answer"></div>
                @endif

                @if(!$entity->answer)
                    <div class="collapse your-message" id="collapse_your_answer_about_01">
                        {{ Form::open(['route' => 'product.review.answer.store', 'method' => 'post']) }}
                            {{ Form::hidden('product_review_id', $entity->id) }}
                            <div class="form-group">
                                <textarea name="text" placeholder="Ваша відповідь"></textarea>
                            </div>
                            <button class="link-red-dark" type="submit"><i class="fo fo-plane fo-2x"></i></button>
                        {{ Form::close() }}
                    </div>

                    <hr>
                    <a href="#collapse_your_answer_about_01" class="your-message-link pull-left"  data-toggle="collapse" aria-expanded="false" aria-controls="collapse_your_answer_about_01" opened="Відмінити" closed="Відповісти" /></a>
                @endif

                @if($entity->answer)
                    <a href="#collapse_01" class="link-blue pull-right" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_01" opened="Приховати" closed="Показати все" /></a>
                @endif

            </div>
            <div class="blk-right">
                <img src="{{  $entity->product->user->directory . 'thumbs/' . $entity->product->image }}" >
            </div>

        </div>
    </li>
@endif