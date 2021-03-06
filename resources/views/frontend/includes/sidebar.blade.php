<div class="left-sidebar bg-yellow text-center">
    @if(auth()->check() && request()->is('myaccount*'))
        @if(request()->is('myaccount/edit'))
            <div class="avatar">
                <div class="uploader profile">
                    <img src="{{ auth()->user()->getAvatar() }}" alt="{{ auth()->user()->profile->first_name }}">
                    <input id="input-avatar" type="file">
                    <div class="round"><i class="fo fo-camera"></i></div>
                </div>
            </div>
        @else
            <div class="avatar">
                <div class="rounded">
                    <img src="{{ auth()->user()->getAvatar() }}" alt="{{ auth()->user()->profile->first_name }}">
                </div>
            </div>
        @endif
    @else
        <div class="avatar">
            <div class="rounded"><img src="{{ $user->getAvatar() }}" alt="{{ $user->profile->first_name }}"></div>
        </div>

        <div class="phones fo fo-phone fo-indent fo-left red">
            <div class="inline black">
                @foreach($user->profile->phone as $phone)
                    <p>{{ $phone }}</p>
                @endforeach
            </div>
        </div>

        <a href="#" class="link link-grey3"><i class="fo fo-like fo-small"></i> до улюблених</a>
        <div class="v-indent-20"></div>

        @if($hasOrder)
            <a href="{{ route('profile.reviews.create', $user->profile->slug) }}" class="button button-grey left-icon">
                <i class="fo fo-message"></i> Залишити відгук
            </a>
        @else
            <a href="#" class="button button-grey left-icon" data-toggle="modal" data-target="#modal_warning">
                <i class="fo fo-message"></i> Залишити відгук
            </a>
        @endif

        <div class="v-indent-20"></div>
        <a href="{{ route('account.messages.show', $user->profile->slug) }}" class="button button-grey left-icon">
            <i class="fo fo-edit fo-small"></i> Зв'язатися
        </a>
    @endif

    @if(auth()->check() && request()->is('myaccount*'))
        @if(request()->is('myaccount/edit*'))
            <ul class="menu">
                <li>
                    <a href="{{ route('account.user.show') }}" class="link-back">Моя сторінка</a>
                </li>
                <li>
                    <a class="{{ Helper::isActive('myaccount/edit') }}" href="{{ route('account.user.edit') }}">Про мене</a>
                </li>
                <li>
                    <a class="{{ Helper::isActive('myaccount/edit/password') }}" href="{{ route('account.password.edit') }}">Пароль</a>
                </li>
                <li>
                    <a class="{{ Helper::isActive('myaccount/edit/url') }}" href="{{ route('account.slug.edit') }}">Адреса сторінки</a>
                </li>
            </ul>
        @else
            <div class="phones fo fo-phone fo-indent fo-left red">
                <div class="inline black">
                    @foreach(auth()->user()->profile->phone as $phone)
                        <p>{{ $phone }}</p>
                    @endforeach
                </div>
            </div>
            <a href="{{ route('account.user.edit') }}" class="button button-grey">Редагувати профіль</a>
            <ul class="menu">
                <li>
                    <a class="{{ Helper::isActive('myaccount') }}" href="{{ route('account.user.show') }}">Про мене</a>
                </li>
                <li>
                    <a class="{{ Helper::isActive('myaccount/products*') }}" href="{{ route('account.products.index') }}">Каталог страв</a>
                </li>
                <li>
                    <a class="{{ Helper::isActive('myaccount/adverts*') }}" href="{{ route('account.adverts.index') }}">Оголошення </a>
                </li>
                <li>
                    <a class="{{ Helper::isActive(['myaccount/notifications*', 'myaccount/messages*']) }}" href="{{ route('account.notifications.index') }}">
                        Мої повідомлення

                        @if(($unreadNotifications = auth()->user()->unreadNotifications->count()) > 0)
                            <span class="badge">{{ $unreadNotifications }}</span>
                        @endif
                    </a>
                </li>
                <li>
                    <a class="{{ Helper::isActive('myaccount/orders*') }}" href="{{ route('account.orders.index') }}">Мої замовлення</a>
                </li>
                <li>
                    <a class="{{ Helper::isActive('myaccount/reviews*') }}" href="{{ route('account.reviews.index') }}">Мої відгуки</a>
                </li>
                <li>
                    <a class="{{ Helper::isActive('myaccount/advices*') }}" href="{{ route('account.advices.index') }}">Мої статті</a>
                </li>
            </ul>
        @endif
    @else
        <ul class="menu">
            <li>
                <a class="{{ Helper::isActive($user->profile->slug) }}" href="{{ route('profile.user.show', $user->profile->slug) }}">Відгуки</a>
            </li>
            <li>
                <a class="{{ Helper::isActive($user->profile->slug . '/products') }}" href="{{ route('profile.products.index', $user->profile->slug) }}">Каталог страв</a>
            </li>
            <li>
                <a class="{{ Helper::isActive($user->profile->slug . '/adverts') }}" href="{{ route('profile.adverts.index', $user->profile->slug) }}">Оголошення </a>
            </li>
            <li><a href="/temp/user.articles">Статті</a></li>
        </ul>
    @endif
</div>