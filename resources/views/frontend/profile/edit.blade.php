@extends('frontend.layouts.default')
@section('title')Products - @stop
@section('content')

<div class="container">
	<div class="row flex-md">
		<div class="col-md-3">
			<div class="left-sidebar bg-yellow text-center">

				<div class="avatar">
					<div class="uploader profile">
						{{ Form::open([ 'route' => 'profile.updatePhoto', 'method' => 'POST', 'enctype' => 'multipart/form-data', 'id' => 'send_image']) }}
							<img src="/{{$profile['image']}}" alt="">
							{{ Form::file('image', ['id' => 'filePhoto']) }}
							<div class="round"><i class="fo fo-camera"></i></div>
						{{ Form::close() }}
					</div>
				</div>
				{{-- ToDo: upload to server --}}

				<ul class="menu">
					<li><a href="{{ route('profile.index') }}" class="link-back">Моя сторінка</a></li>
					<li><a href="{{ route('profile.edit') }}" class="active">Про мене</a></li>
					<li><a href="{{ route('profile.password') }}">Пароль</a></li>
					<li><a href="{{ route('profile.nickname') }}">Адреса сторінки</a></li>
				</ul>

			</div>
		</div>

		<div class="col-md-9">
			<h5 class="text-upper underline-red">Редагувати профіль</h5>
			<hr>
			{{ Form::open([ 'route' => 'profile.update', 'method' => 'POST', 'class' => 'contact']) }}
				<p class="message" id="message">Заповніть виділені поля</p>
				{{ Form::label('name', 'Ім\'я*', ['for' => 'name']) }}
				{{ Form::text('name', $profile['name'], ['id' => 'name', 'required' => 'required']) }}

				<div class="v-indent-30"></div>
				<hr>

				{{ Form::label('phone', 'Телефон*', ['for' => 'phone']) }}
				<div class="phone">
					@foreach(json_decode($profile['phone']) as $phone)
					<div>
						{{ Form::text('phone[]', $phone, ['id' => 'phone', 'required' => 'required', 'class' => 'phone-input']) }}
						<span class="remove"></span>
					</div>
					@endforeach
					<a href="#" id="clonePhone" class="link-red">+ Додати</a>
				</div>
				<div class="v-indent-30"></div>
				<hr>
				{{ Form::label('city', 'Населений пункт*', ['for' => 'city']) }}
				<div class="marker">
					{{ Form::text('city', $adresses['city'], ['id' => 'city', 'required' => 'required']) }}
				</div>
				<div class="content">
					<div class="left">
						{{ Form::label('street', 'Вулиця*', ['for' => 'street']) }}
						{{ Form::text('street', $adresses['street'], ['id' => 'street', 'required' => 'required']) }}
					</div>
					<div class="right">
						{{ Form::label('build', '№ будинку*', ['for' => 'build']) }}
						{{ Form::text('build', $adresses['build'], ['id' => 'build', 'required' => 'required']) }}
					</div>
				</div>
				<div class="v-indent-30"></div>
				<hr>
				{{ Form::label('about', 'Про мене', ['for' => 'about']) }}
				{{ Form::textarea('about', $profile['about'], ['id' => 'about', 'class' => 'profile']) }}
				<hr>
				{{Form::submit('Зберегти', ['class' => 'button button-red profile text-upper']) }}
			{{ Form::close() }}

		</div>
	</div>
</div>
@stop


@section('scripts')

{{-- mask --}}
<script src="/assets/js/jquery.maskedinput.js"></script>
<script>
	jQuery(function($){
		$(".phone-input").mask("+38 999 999 99 99");
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

{{-- Clone Phone Input --}}
<script>
	jQuery(function($){
		var inputPhone = '<div><input name="phone[]" class="phone-input" type="text"><span class="remove"></span></div>';
		$("#clonePhone").on("click", function(e){
			e.preventDefault();
			$(inputPhone).insertBefore(this);
			$(".phone-input").mask("+38 (999) 999-9999");
			$('.match-height').matchHeight();
		});
		$('body').on('click', '.phone .remove', function(){
			$(this).parent().remove();
		});
	});
</script>
{{-- update Photo user --}}
<script type="text/javascript">

$(document).ready(function(){

	$('input[type="file"]').change(function(e){
		e.preventDefault();
		var my = new FormData($('#send_image')[0]);
		console.log(my);
		$.ajax({
			headers: {
				'X-CSRF-TOKEN': $('input[name="_token"]').val()
			},
			url: '{{route('profile.updatePhoto')}}',
			method: 'POST',
			processData: false,
			contentType: false,
			data: new FormData($('#send_image')[0])
		})
		.done(function(file){
			console.log(file);
		})
	});

});

</script>
@stop