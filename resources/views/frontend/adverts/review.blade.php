<li class="clearfix">
    <div class="left">
        <div class="avatar">
            <div class="rounded">
                <img src="{{ $entity->user->getAvatar() }}" alt="{{ $entity->user->profile->first_name }}">
            </div>
        </div>

        <a href="{{ route('profile.user.show', $entity->user->slug) }}" class="link-blue name">
            {{ $entity->user->profile->first_name }}
        </a>
    </div>
    <div class="right bg-yellow">
        <div class="date">{{ Date::parse($entity->created_at)->format('d F Y') }}</div>
        <span class="stars">{{ $entity->rating }}</span>
        <div class="message">{{ $entity->text }}</div>
    </div>
</li>