@extends('frontend.layouts.profile')

@section('content')




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
@endsection

@push('scripts')

{{-- Validation --}}
<script src="/frontend/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
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


@endpush