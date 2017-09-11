<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<title>Food</title>

	<link href="{{ asset('frontend/vendor/font-awesome/css/font-awesome.min.css') }}'" type="text/css" rel="stylesheet">

	@stack('styles')

	<link href="{{ asset('frontend/css/style.css') }}" type="text/css" rel="stylesheet">
</head>
<body>
	<div id="wrapper">
		@include('frontend.layouts.nav')

		@yield('content')

		<footer class="footer">
			<div class="container">
				<span>© Всі права захищені</span>
				<a href="#">Умови використання та конфіденційність</a>
				<a href="#">Контакти</a>
			</div>
		</footer>
	</div>

	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
	<script src="{{ asset('frontend/js/dropdown.js') }}" async></script>
	<script src="{{ asset('frontend/js/modal.js') }}" async></script>
	<script src="{{ asset('frontend/js/jquery.matchHeight.js') }}"></script>

	@stack('scripts')

</body>
</html>