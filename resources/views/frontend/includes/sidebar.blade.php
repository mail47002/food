<div class="left-sidebar bg-yellow text-center">
    @if (request()->is('account/' . auth()->id() . '/edit'))
        <div class="avatar">
            <div class="uploader account">
                <img src="{{ asset(auth()->user()->image) }}" alt="{{ auth()->user()->name }}">
                <input id="input-avatar" type="file">
                <div class="round"><i class="fo fo-camera"></i></div>
            </div>
        </div>
    @else
        <div class="avatar">
            <div class="rounded"><img src="{{ asset(auth()->user()->image) }}" alt="{{ auth()->user()->name }}"></div>
        </div>
    @endif

    @if (request()->is('myaccount/edit*'))
        <ul class="menu">
            <li><a href="{{ route('account.user.show') }}" class="link-back">Моя сторінка</a></li>
            <li><a class="{{ is_active('myaccount/edit') }}" href="{{ route('account.user.edit') }}">Про мене</a></li>
            <li><a class="{{ is_active('myaccount/edit/password') }}" href="{{ route('account.password.edit') }}">Пароль</a></li>
            <li><a class="{{ is_active('myaccount/edit/url') }}" href="{{ route('account.slug.edit') }}">Адреса сторінки</a></li>
        </ul>
    @else
        <div class="phones fo fo-phone fo-indent fo-left red">
            <div class="inline black">
                @foreach (auth()->user()->phone as $phone)
                    <p>{{ $phone }}</p>
                @endforeach
            </div>
        </div>
        <a href="{{ route('account.user.edit') }}" class="button button-grey">Редагувати профіль</a>
        <ul class="menu">
            <li><a class="{{ is_active('myaccount') }}" href="{{ route('account.user.show') }}">Про мене</a></li>
            <li><a class="{{ is_active('myaccount/products*') }}" href="{{ route('account.products.index') }}">Каталог страв</a></li>
            <li><a class="{{ is_active('myaccount/adverts*') }}" href="{{ route('account.adverts.index') }}">Оголошення </a></li>
            <li><a href="#">Мої повідомлення <span class="badge">3</span></a></li>
            <li><a class="{{ is_active('myaccount/orders*') }}" href="{{ route('account.orders.index') }}">Мої замовлення</a></li>
            <li><a href="#">Мої відгуки</a></li>
            <li><a class="{{ is_active('myaccount/articles*') }}" href="{{ route('account.articles.index') }}">Мої статті</a></li>
        </ul>
     @endif
</div>