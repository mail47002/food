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
		@yield('content')
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
	<script src="{{ asset('frontend/js/datepicker-uk.js') }}"></script>
	<script src="{{ asset('frontend/js/dropdown.js') }}"></script>
	<script src="{{ asset('frontend/js/modal.js') }}"></script>
	<script src="{{ asset('frontend/js/collapse.js') }}"></script>
	<script src="{{ asset('frontend/js/tabs.js') }}"></script>
	<script src="{{ asset('frontend/js/jquery.maskedinput.js') }}"></script>
	<script src="{{ asset('frontend/vendor/owlcarousel/owl.carousel.min.js') }}"></script>
	<script src="{{ asset('frontend/js/simplebar.js') }}"></script>
	<script src="{{ asset('frontend/js/custom.js') }}"></script>
	@stack('scripts')
	<script type="text/javascript">
	    $(document).ready(function() {
	        $('span.stars').stars();
	    });

		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': '{{ csrf_token() }}'
			}
		});

        $(document).ready(function() {
            $('input[type="tel"]').mask('+38 (999) 999 99 99');
        });
	</script>
</body>
</html>