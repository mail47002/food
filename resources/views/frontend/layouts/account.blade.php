<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>Food</title>
    <link href="{{ asset('frontend/css/style.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('frontend/css/custom.css') }}" type="text/css" rel="stylesheet">
    @stack('styles')
</head>
<body>
    <div id="wrapper">
        @include('frontend.includes.nav')
        <div class="container">
            <div class="row flex-md">
                <div class="col-md-3">
                    @include('frontend.includes.sidebar')
                </div>
                <div class="col-md-9">
                    @yield('content')
                </div>
            </div>
        </div>
        @include('frontend.includes.footer')
    </div>
    <div class="body-overlay">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="2" stroke-miterlimit="10"/>
            </svg>
        </div>
    </div>

    <script src="{{ asset('frontend/js/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('frontend/js/dropdown.js') }}" async></script>
    <script src="{{ asset('frontend/js/modal.js') }}" async></script>
    <script src="{{ asset('frontend/js/collapse.js') }}" async></script>
    <script src="{{ asset('frontend/js/tabs.js') }}" async></script>
    <script src="{{ asset('frontend/vendor/owlcarousel/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('frontend/js/simplebar.js') }}"></script>
    @stack('scripts')
    <script type="text/javascript">
        $.fn.stars = function() {
            return $(this).each(function() {
                $(this).html($('<span />').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * $(this).width()/5));
            });
        };

        $( document ).ready(function() {
            $('span.stars').stars();
        });
    </script>
</body>
</html>