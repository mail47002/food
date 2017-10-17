<div class="left-sidebar bg-yellow text-center">
    @if (request()->is('profile/' . Auth::id() . '/edit'))
        <div class="avatar">
            <div class="uploader profile">
                <img src="{{ Auth::user()->image }}" alt="{{ Auth::user()->name }}">
                <input id="input-avatar" type="file">
                <div class="round"><i class="fo fo-camera"></i></div>
            </div>
        </div>
    @else
        <div class="avatar">
            <div class="rounded"><img src="{{ Auth::user()->image }}" alt="{{ Auth::user()->name }}"></div>
        </div>
    @endif

    @if (request()->is('profile/' . Auth::id() . '/edit*'))
        <ul class="menu">
            <li><a href="{{ route('profile.user.show', Auth::id()) }}" class="link-back">Моя сторінка</a></li>
            <li><a class="{{ is_active('profile/' . Auth::id(). '/edit') }}" href="{{ route('profile.user.edit', Auth::id()) }}">Про мене</a></li>
            <li><a class="{{ is_active('profile/' . Auth::id(). '/edit/password') }}" href="{{ route('profile.password.edit', Auth::id()) }}">Пароль</a></li>
            <li><a class="{{ is_active('profile/' . Auth::id(). '/edit/url') }}" href="{{ route('profile.slug.edit', Auth::id()) }}">Адреса сторінки</a></li>
        </ul>
    @else
        <div class="phones fo fo-phone fo-indent fo-left red">
            <div class="inline black">
                @foreach (Auth::user()->phone as $phone)
                    <p>{{ $phone }}</p>
                @endforeach
            </div>
        </div>
        <a href="{{ route('profile.user.edit', Auth::id()) }}" class="button button-grey">Редагувати профіль</a>
        <ul class="menu">
            <li><a class="{{ is_active('profile/' . Auth::id()) }}" href="{{ route('profile.user.show', Auth::id()) }}">Про мене</a></li>
            <li><a class="{{ is_active('profile/products*') }}" href="{{ route('profile.products.index') }}">Каталог страв</a></li>
            <li><a class="{{ is_active('profile/adverts*') }}" href="{{ route('profile.adverts.index') }}">Оголошення </a></li>
            <li><a href="#">Мої повідомлення <span class="badge">3</span></a></li>
            <li><a href="#">Мої замовлення</a></li>
            <li><a href="#">Мої відгуки</a></li>
            <li><a class="{{ is_active('profile/articles*') }}" href="{{ route('profile.articles.index') }}">Мої статті</a></li>
        </ul>
     @endif
</div>