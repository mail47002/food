<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Project Name</title>

    <!-- begin Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

    <!-- begin Styles -->
    <link href="{{ asset('backend/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/vendor/line-awesome/css/line-awesome.min.css') }}" rel="stylesheet">
    @stack('styles')
    <link href="{{ asset('backend/css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('backend/css/custom.css') }}" rel="stylesheet">

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
    <aside class="sidebar sidebar-left">
        <div class="user-profile">
            <div class="user-avatar">
                <img src="https://www.gravatar.com/avatar/205e460b479e2e5b48aec07710c08d50?s=100">
            </div>
            <div class="user-info">
                <a href="#">John Doe</a>
            </div>
        </div>
        <nav class="sidebar-nav">
            <ul class="menu">
                <li class="{{ is_active('admin/dashboard*') }}"><a href="{{ route('admin.dashboard') }}"><i class="la la-desktop"></i> Панель управления</a></li>
                <li class="{{ is_active('admin/pages*') }}"><a href="{{ route('admin.pages.index') }}"><i class="la la-files-o"></i> Страницы</a></li>
            </ul>
        </nav>
    </aside>
    <div class="main">
        @yield('content')
    </div>

    <!-- begin Scripts -->
    <script src="{{ asset('backend/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('backend/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    @stack('scripts')
</body>
</html>