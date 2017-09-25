@extends('frontend.layouts.default')

@push('styles')
    <style>
        .form-group.has-error > label {
            color: #f0534d;
        }
        .form-group.has-error > input {
            border-color: #f0534d;
        }
    </style>
@endpush

@section('content')
    <div class="container pages">
        <div class="row">
            <div class="col-md-8">
                <h1 class="title">Зворотній зв'язок</h1>
                <div class="row">
                    {{ Form::open(['route' => 'feedback.store', 'method' => 'post', 'class' => 'contact']) }}
                    @if ($errors->any())
                        <div class="col-md-12"><p class="message error">Заповніть виділені поля</p></div>
                    @endif
                        <div class="col-md-6">
                            <div class="form-group {{ $errors->first('name', 'has-error') }}">
                                {{ Form::label('name', 'Ім\'я*', ['for' => 'name']) }}
                                {{ Form::text('name', null, ['id' => 'name']) }}
                            </div>
                            <div class="form-group {{ $errors->first('phone', 'has-error') }}">
                                {{ Form::label('email', 'Email*', ['for' => 'email']) }}
                                {{ Form::email('email', null, ['id' => 'email']) }}
                            </div>
                            <div class="form-group {{ $errors->first('phone', 'has-error') }}">
                                {{ Form::label('phone', 'Телефон*', ['for' => 'phone']) }}
                                {{ Form::text('phone', null, ['id' => 'phone']) }}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('message', 'Ваше повідомлення', ['for' => 'message']) }}
                                {{ Form::textarea('message', null, ['id' => 'message', 'class' => 'wide']) }}
                            </div>
                            {{ Form::submit('Продовжити', ['class' => 'button button-red']) }}
                        </div>
                    {{ Form::close() }}
                </div>
            </div>
            <div class="col-md-4 hidden-xs">
                <ul class="menu-pages">
                    <li><a href="#">Про проект</a></li>
                    <li><a href="#">Допомога</a></li>
                    <li><a href="#">Правила </a></li>
                    <li><a href="#">Умови та конфіденційність</a></li>
                    <li><a href="#" class="active">Зворотний зв'язок</a></li>
                    <li><a href="#">Карта сайту</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{-- mask --}}
    <script src="/assets/js/jquery.maskedinput.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('input[name=phone]').mask('+38 999 999 99 99');
        });
    </script>
@endpush