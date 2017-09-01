@extends('frontend.layouts.default')

@include('frontend.layouts.nav')
@section('title')Products - @stop
@section('content')

<div class="container">
	<div class="row">
		<div class="col-md-3 match-height">
			<div class="left-sidebar bg-yellow text-center">

				<div class="avatar">
					<div class="uploader profile">
						<img src="{{$profile['image']}}" alt="foto">
						<input type="file" name="avatar" id="filePhoto" />
						<div class="round"><i class="fo fo-camera"></i></div>
					</div>
				</div>
				{{-- ToDo: upload to server --}}

				<ul class="menu">
					<li><a href="#" class="link-back">Моя сторінка</a></li>
					<li><a href="#" class="active">Про мене</a></li>
					<li><a href="#">Пароль</a></li>
					<li><a href="#">Адреса сторінки</a></li>
				</ul>

			</div>
		</div>

		<div class="col-md-9 match-height">
			<h5 class="text-upper underline-red">Змінити адресу сторінки</h5>
			<hr>

			<form action="/store" method="post" class="contact">
				<p class="message" id="message">Заповніть виділені поля</p>

				<label for="url">Адреса вашої сторінки*</label>
				<div class="url">
					<span class="left">logo.com/</span>
					<input name="url" id="url" type="text" required="required" />
					<span class="right confirm alert">Дана адреса доступна</span>
					<span class="right reject alert">Дана адреса недоступна. Виберіть іншу адресу</span>
				</div>



				<div class="v-indent-30"></div>
				<hr>
				<input type="submit" class="button button-red profile" value="Зберегти">
				<input type="submit" class="button dismiss profile" value="Скасувати">
			</form>

 {{-- Вызывать: $('#modal_ok').modal('show'); --}}
			<a href="#" class="link-blue" data-toggle="modal" data-target="#modal_ok">Модальное окно</a>

		</div>
	</div>
</div>




<!-- Modal -->
<div id="modal_ok" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content text-center">
			<a href="#" type="button" class="close" data-dismiss="modal"></a>
			<div class="modal-body">
				<h1 class="text-center red"><i class="fo fo-ok fo-large"></i></h1>
				<p>Деталі вашого профілю успішно збережені</p>
			</div>
		</div>
	</div>
</div>
@stop


@section('scripts')
<script>
$( function() {
	$('.match-height').matchHeight();
});
</script>

{{-- Validation --}}
<script src="/assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
<script>
	$( function() {
		$('form').validate({
				// make sure error message isn't displayed
				errorPlacement: function () { },
				// set the errorClass as a random string to prevent label disappearing when valid
				errorClass : "bob",
				// use highlight and unhighlight
				highlight: function (element, errorClass, validClass) {
						$(element.form).find("label[for=" + element.id + "]")
						.addClass("error");
				},
				unhighlight: function (element, errorClass, validClass) {
						$(element.form).find("label[for=" + element.id + "]")
						.removeClass("error");
				},
				invalidHandler: function(form, validator) {
					$('.message').addClass("error");
				}
		});
	});
</script>

{{-- File Upload --}}
<script>
var imageLoader = document.getElementById('filePhoto');
		imageLoader.addEventListener('change', handleImage, false);
function handleImage(e) {
	var reader = new FileReader();
	reader.onload = function (event) {
		$('.uploader img').attr('src',event.target.result);
	}
	reader.readAsDataURL(e.target.files[0]);
}
</script>

@stop