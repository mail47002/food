@if($lastMessage = $thread->messages->last())
    @php($sender = $thread->messages->last()->sender)
    <a class="wide-thumb profile-letters unread" href="{{ route('account.messages.show', $sender->profile->slug) }}">
        <object><a href="#" class="delete"><i class="fo fo-delete fo-small"></i></a></object>
        <div class="avatar-title">
            <div class="rounded">
                <img src="{{ $sender->directory . $sender->profile->image }}" alt="{{ $sender->profile->first_name }}">
            </div>
        </div>
        <div class="col">
            <div class="title">
                <object>
                    <a href="{{ route('profile.user.show', $sender->profile->slug) }}" class="link-blue">{{ $sender->profile->first_name }}</a>
                </object>
                <span class="date">{{ Date::parse($lastMessage->created_at)->format('H:i d F Y') }}</span>
            </div>
            <div class="message">
                <p>{{ $lastMessage->body }}</p>
            </div>
        </div>
    </a>
@endif