@extends('frontend.layouts.profile')

@section('content')



<h5 class="text-upper underline-red">Змінити пароль</h5>
<hr>

<form action="/store" method="post" class="contact">
	<p class="message" id="message">Заповніть виділені поля</p>
	<label for="email">Email*</label>
	<input name="email" id="email" type="text" required="required" />

	<label for="oldPassword">Старий пароль</label>
	<input name="oldPassword" id="oldPassword" type="text" required="required" />

	<label for="password">Новий пароль</label>
	<input name="password" id="password" type="text" required="required" />

	<label for="rePassword">Повторити пароль</label>
	<input name="rePassword" id="rePassword" type="text" required="required" />


	<div class="v-indent-30"></div>
	<hr>
	<input type="submit" class="button button-red profile" value="Зберегти">
</form>

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