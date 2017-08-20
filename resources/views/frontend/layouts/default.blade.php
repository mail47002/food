<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

	<title>Food</title>

	<link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">

	<link href="css/style.css" type="text/css" rel="stylesheet">

	<script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>
</head>
<body class="<?=$page?>">
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




<script src="js/dropdown.js" async></script>
<script src="js/modal.js" async></script>
<script src="vendor/owlcarousel/owl.carousel.min.js"></script>

<script>
	$.fn.stars = function() {
		return $(this).each(function() {
			$(this).html($('<span />').width(Math.max(0, (Math.min(5, parseFloat($(this).html())))) * $(this).width()/5));
		});
	}


	$( document ).ready(function() {
		$('span.stars').stars();
	});
</script>

</body>
</html>