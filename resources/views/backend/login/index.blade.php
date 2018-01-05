<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrator</title>

    <!-- begin Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <!-- begin Styles -->
    <link href="{{ asset('backend/vendor/bootstrap/css/bootstrap.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('backend/vendor/line-awesome/css/line-awesome.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('backend/css/main.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('backend/css/custom.css') }}" type="text/css" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <div class="main main-login">
        <div class="container-fluid">
            <div class="panel panel-login">
                <div class="panel-body">
                    <h2 class="heading-title">Вход</h2>
                    {!! Form::open(['route' => 'admin.login', 'method' => 'post']) !!}
                        <div class="form-group {{ $errors->first('email', 'has-error') }}">
                            {!! Form::label('email', 'E-mail:') !!}
                            {!! Form::text('email', null, ['class' => 'form-control input-lg']) !!}
                        </div>
                        <div class="form-group {{ $errors->first('password', 'has-error') }}">
                            {!! Form::label('password', 'Пароль:') !!}
                            {!! Form::password('password', ['class' => 'form-control input-lg']) !!}
                        </div>
                        <div class="form-group">
                            <div class="checkbox checkbox-info">
                                {!! Form::checkbox('remember', 1, false, ['id' => 'remember']) !!}
                                {!! Form::label('remember', 'Запомнить меня') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-info btn-block btn-lg text-uppercase">Вход</button>
                        </div>
                        <div class="form-group">
                            <a href="#"><small>Забыли пароль?</small></a>
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>

    <!-- begin Scripts -->
    <script src="{{ asset('backend/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
</body>
</html>
