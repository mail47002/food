<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<title>Food</title>

	@stack('styles')
	<link href="/assets/css/style.css" type="text/css" rel="stylesheet">

</head>
<body class="body-{{Route::currentRouteName()}}">

	@yield('content')


<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
<script src="/assets/js/dropdown.js" async></script>
<script src="/assets/js/modal.js" async></script>

<script>
	$( document ).ready(function() {

	});
</script>
@stack('scripts')
</body>
</html>