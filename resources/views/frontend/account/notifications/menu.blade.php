<div class="filter-block">
    <ul class="categories list-inline text-center">
        <li class="{{ Helper::isActive('myaccount/notifications') }}">
            <a href="{{ route('account.notifications.index') }}" class="link-red text-upper">Повідомлення</a>
        </li>
        <li class="{{ Helper::isActive('myaccount/messages*') }}">
            <a href="{{ route('account.messages.index') }}" class="link-red text-upper">Переписка</a>
        </li>
    </ul>
    <hr class="red-border">
</div>