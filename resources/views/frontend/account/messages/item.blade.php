<a class="wide-thumb profile-letters unread" href="{{ route('account.messages.show', $thread->id) }}">
    <object><a href="#" class="delete"><i class="fo fo-delete fo-small"></i></a></object>
    <div class="avatar-title"><div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div></div>
    <div class="col">
        <div class="title">
            <object><a href="#" class="link-blue">Іван</a></object>
            <span class="date">10:15 2 липня 2016</span>
        </div>
        <div class="message">
            <div class="avatar"><div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div></div>
            <p>{{ $thread->messages->last()->body }}</p>
        </div>
    </div>
</a>