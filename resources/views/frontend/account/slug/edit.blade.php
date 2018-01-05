@extends('frontend.layouts.account')

@section('content')
    <h5 class="text-upper underline-red">Змінити адресу сторінки</h5>
    <hr>
    {{ Form::open([ 'route' => ['account.slug.update', Auth::id()], 'method' => 'put', 'class' => 'contact']) }}
        <p class="message" id="message">Заповніть виділені поля</p>
        {{ Form::label('slug', 'Адреса вашої сторінки*') }}
        <div class="url">
            <span class="left">logo.com/</span>
            {{ Form::text('slug', Auth::user()->slug) }}
        </div>

        <div class="v-indent-30"></div>
        <hr>
        {{ Form::submit('Зберегти', ['class' => 'button button-red profile text-upper']) }}
        <a href="{{ route('account.user.show', Auth::id()) }}" class="button dismiss profile">Скасувати</a>
    {{ Form::close() }}

    {{-- Вызывать: $('#modal_ok').modal('show'); --}}
    <a href="#" class="link-blue" data-toggle="modal" data-target="#modal_ok">Модальное окно</a>
@endsection

@push('scripts')
    <script type="text/javascript">
        $(document).on('submit', 'form', function() {
            var form = $(this);
        });
    </script>
@endpush