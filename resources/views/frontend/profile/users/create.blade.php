@extends('frontend.layouts.default')

@section('content')
    <div class="bg-yellow fixed-bg"></div>
    <div class="container">
        <div class="information text-center">
            <div class="header">Розкажіть про себе</div>
            <div class="body">
                {{ Form::open([ 'route' => 'login.information', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                    <p class="message" id="message">Заповніть виділені поля</p>
                    <div class="form-group">
                        {{ Form::label('name', 'Ім\'я*', ['for' => 'name']) }}
                        {{ Form::text('name', null, ['id' => 'name', 'required' => 'required']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('nickname', 'Адреса вашої сторінки', ['for' => 'nickname']) }}
                        {{ Form::text('nickname', null, ['id' => 'nickname']) }}
                    </div>

                    {{ Form::label('phone', 'Телефон*', ['for' => 'phone']) }}
                    <div class="phone">
                        {{ Form::text('phone[]', null, ['id' => 'phone', 'class' => 'phone-input', 'required' => 'required']) }}
                        {!! $errors->first('phone[]', '<label class="control-label">:message</label>') !!}
                        <a href="#" id="clonePhone" class="link-red">+ Додати</a>
                    </div>

                    {{ Form::label('city', 'Населений пункт*', ['for' => 'city']) }}
                    {{ Form::text('city', null, ['id' => 'city', 'class' => 'wide marker', 'required' => 'required']) }}

                    <div class="content">
                        <div class="left">
                            {{ Form::label('street', 'Вулиця*', ['for' => 'street']) }}
                            {{ Form::text('street', null, ['id' => 'street', 'required' => 'required']) }}
                        </div>

                        <div class="right">
                            {{ Form::label('build', '№ будинку*', ['for' => 'build']) }}
                            {{ Form::text('build', null, ['id' => 'build', 'required' => 'required']) }}
                        </div>
                    </div>

                    {{ Form::label('about', 'Про себе', ['for' => 'about']) }}
                    {{ Form::textarea('about', null, ['id' => 'about', 'class' => 'wide']) }}

                    {{ Form::label('filePhoto', 'Додати фото', ['for' => 'filePhoto']) }}
                    <div class="uploader" onclick="$('#filePhoto').click()">
                        <img src=""/>
                        <div class="round"><i class="fo fo-camera"></i></div>
                        {{ Form::file('image', ['id' => 'filePhoto']) }}
                        {{-- <input type="file" name="image" id="filePhoto" /> --}}
                    </div>

                    <hr>
                    {{Form::submit('Продовжити', ['class' => 'button button-red']) }}
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection