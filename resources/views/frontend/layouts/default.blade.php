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
<body class="body-{{Route::currentRouteName()}}">
	<div id="wrapper">

	@include('frontend.includes.nav')

	@yield('content')

	@include('frontend.includes.footer')

	</div>

	<script src="{{ asset('frontend/js/jquery-2.2.4.min.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery-ui.min.js') }}"></script>
	<script src="{{ asset('frontend/js/dropdown.js') }}" async></script>
	<script src="{{ asset('frontend/js/modal.js') }}" async></script>
	<script src="{{ asset('frontend/js/collapse.js') }}" async></script>
	<script src="{{ asset('frontend/js/tabs.js') }}" async></script>
	<script src="{{ asset('frontend/vendor/owlcarousel/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('frontend/js/simplebar.js') }}"></script>

	<script>
		$.fn.stars = function() {
			return $(this).each(function() {
				$(this).html($('<span />').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * $(this).width()/5));
			});
		};

		function handleImage(e) {
			var reader = new FileReader();
			reader.onload = function (event) {
				$(e.target).parent().find('img').attr('src',event.target.result);
			}
			reader.readAsDataURL(e.target.files[0]);
		}


		$( document ).ready(function() {
			$('span.stars').stars();
		});
	</script>

	@stack('scripts')

</body>
</html>