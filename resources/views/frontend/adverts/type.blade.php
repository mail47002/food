<ul class="categories list-inline text-center">
    <li class="{{ Helper::isAdvertByDate() ? 'active' : '' }}">
        <a href="{{ route('adverts.index') }}" class="link-red text-upper">Меню по датам</a>
    </li>
    <li class="{{ Helper::isAdvertInStock() ? 'active' : '' }}">
        <a href="{{ route('adverts.index', ['type' => 'in_stock']) }}" class="link-red text-upper">Готові страви</a>
    </li>
    <li class="{{ Helper::isAdvertPreOrder() ? 'active' : '' }}">
        <a href="{{ route('adverts.index', ['type' => 'pre_order']) }}" class="link-red text-upper">Страви під замовлення</a>
    </li>
</ul>