<div class="v-indent-30"></div>

<h1>{{ $user->profile->first_name }}</h1>

<p class="grey3">
    <i class="fo fo-big fo-marker red"></i> {{ $user->profile->address }}
</p>

<div class="rating grey3">
    <span class="stars medium">{{ $user->reviewsRate() }}</span>{{ $user->reviews->count() }} відгуків
</div>

<div class="description">
    <p>{{ $user->profile->about }}</p>
    <a href="#" class="link-blue">Показати текст</a>
</div>