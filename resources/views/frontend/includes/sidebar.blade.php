<div class="left-sidebar bg-yellow text-center">
    @if (request()->is('profile/' . Auth::id() . '/edit'))
        <div class="avatar">
            <div class="uploader profile">
                <img src="{{ asset(Auth::user()->image) }}" alt="{{ Auth::user()->name }}">
                <input id="input-avatar" type="file">
                <div class="round"><i class="fo fo-camera"></i></div>
            </div>
        </div>
    @else
        <div class="avatar">
            <div class="rounded"><img src="{{ asset(Auth::user()->image) }}" alt="{{ Auth::user()->name }}"></div>
        </div>
    @endif

    @if (request()->is('profile/' . Auth::id() . '/edit') || request()->is('profile/' . Auth::id() . '/password'))
        <ul class="menu">
            <li><a href="{{ route('profile.users.show', Auth::id()) }}" class="link-back">Моя сторінка</a></li>
            <li><a class="{{ is_active('profile/' . Auth::id(). '/edit') }}" href="{{ route('profile.users.edit', Auth::id()) }}">Про мене</a></li>
            <li><a class="{{ is_active('profile/' . Auth::id(). '/password') }}" href="{{ route('profile.password.edit', Auth::id()) }}">Пароль</a></li>
            <li><a href="#">Адреса сторінки</a></li>
        </ul>
    @else
        <div class="phones fo fo-phone fo-indent fo-left red">
            <div class="inline black">
                @foreach (Auth::user()->phone as $phone)
                    <p>{{ $phone }}</p>
                @endforeach
            </div>
        </div>
        <a href="{{ route('profile.users.edit', Auth::id()) }}" class="button button-grey">Редагувати профіль</a>
        <ul class="menu">
            <li><a class="{{ is_active('profile/' . Auth::id()) }}" href="{{ route('profile.users.show', Auth::id()) }}">Про мене</a></li>
            <li><a class="{{ is_active('profile/' . Auth::id() . '/products*') }}" href="{{ route('profile.products.index', Auth::id()) }}">Каталог страв</a></li>
            <li><a class="{{ is_active('profile/' . Auth::id() . '/adverts*') }}" href="{{ route('profile.adverts.index', Auth::id()) }}">Оголошення </a></li>
            <li><a href="#">Мої повідомлення <span class="badge">3</span></a></li>
            <li><a href="#">Мої замовлення</a></li>
            <li><a href="#">Мої відгуки</a></li>
            <li><a class="{{ is_active('profile/' . Auth::id() . '/articles*') }}" href="{{ route('profile.articles.index', Auth::id()) }}">Мої статті</a></li>
        </ul>
     @endif
</div>