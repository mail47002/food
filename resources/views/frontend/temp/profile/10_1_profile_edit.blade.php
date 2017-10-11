@extends('frontend.layouts.profile')

@section('content')




<h5 class="text-upper underline-red">Редагувати профіль</h5>
<hr>

<form action="/store" method="post" class="contact">
	<p class="message" id="message">Заповніть виділені поля</p>
	<label for="name">Ім'я*</label>
	<input name="name" id="name" type="text" required="required" />

	<label for="phone">Телефон*</label>
	<div class="phone">
		<div><input id="phone" name="phone[]" class="phone-input" type="text" required="required" /><span class="remove"></span></div>

		<a href="#" id="clonePhone" class="link-red">+ Додати</a>
	</div>

	<div class="v-indent-30"></div>
	<hr>

	<label for="city">Населений пункт*</label>
	<div class="marker"><input name="city" id="city" type="text" required="required" /></div>

	<div class="content">
		<div class="left">
			<label for="street">Вулиця</label>
			<input name="street" id="street" type="text" required="required" />
		</div>
		<div class="right">
			<label for="house">№ будинку*</label>
			<input name="house" id="house" type="text" required="required" />
		</div>
	</div>

	<div class="v-indent-30"></div>
	<hr>

	<label for="about">Про себе</label>
	<textarea name="about" id="about" type="text" class="profile"></textarea>

	<hr>
	<input type="submit" class="button button-red profile" value="Продовжити">
</form>



@endsection

@push('scripts')


{{-- mask --}}
<script src="/frontend/js/jquery.maskedinput.js"></script>
<script>
	jQuery(function($){
		$(".phone-input").mask("+38 (999) 999-9999");
	});
</script>

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


{{-- Clone Phone Input --}}
<script>
	jQuery(function($){
		var inputPhone = '<div><input name="phone[]" class="phone-input" type="text"><span class="remove"></span></div>';
		$("#clonePhone").on("click", function(e){
			e.preventDefault();
			$(inputPhone).insertBefore(this);
			$(".phone-input").mask("+38 (999) 999-9999");
		});
		$('body').on('click', '.phone .remove', function(){
			$(this).parent().remove();
		});
	});
</script>
@endpush