@extends('frontend.layouts.default')
@section('title')Products - @stop
@section('content')

<div class="container">
	<div class="row flex-md">
		<div class="col-md-3">
			<div class="left-sidebar bg-yellow text-center">

				<div class="avatar">
					<div class="uploader profile">
						<img src="/{{$profile['image']}}" alt="foto">
						<input type="file" name="avatar" id="filePhoto" />
						<div class="round"><i class="fo fo-camera"></i></div>
					</div>
				</div>
				{{-- ToDo: upload to server --}}

				<ul class="menu">
					<li><a href="{{ route('profile.index') }}" class="link-back">Моя сторінка</a></li>
					<li><a href="{{ route('profile.edit') }}">Про мене</a></li>
					<li><a href="{{ route('profile.password') }}">Пароль</a></li>
					<li><a href="{{ route('profile.nickname') }}" class="active">Адреса сторінки</a></li>
				</ul>

			</div>
		</div>

		<div class="col-md-9">
			<h5 class="text-upper underline-red">Змінити адресу сторінки</h5>
			<hr>
			{{ Form::open([ 'route' => 'profile.updateNickname', 'method' => 'POST', 'class' => 'contact']) }}
				<p class="message" id="message">Заповніть виділені поля</p>
				{{ Form::label('nickname', 'Адреса вашої сторінки*', ['for' => 'nickname']) }}
				<div class="url">
					<span class="left">logo.com/</span>
					{{ Form::text('nickname', $profile->nickname, ['id' => 'nickname', 'required' => 'required']) }}
					{!! $errors->first('nickname', '<span class="right reject alert">Дана адреса недоступна. Виберіть іншу адресу</span>') !!}
					{{-- <span class="right confirm alert">Дана адреса доступна</span> --}}

				</div>



				<div class="v-indent-30"></div>
				<hr>
				{{Form::submit('Зберегти', ['class' => 'button button-red profile text-upper']) }}
				{{Form::submit('Скасувати', ['class' => 'button dismiss profile']) }}
				{{ Form::close() }}

 {{-- Вызывать: $('#modal_ok').modal('show'); --}}
			<a href="#" class="link-blue" data-toggle="modal" data-target="#modal_ok">Модальное окно</a>

		</div>
	</div>
</div>




<!-- Modal -->
<div id="modal_ok" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content text-center">
			<a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
			<div class="modal-body">
				<h1 class="text-center red"><i class="fo fo-ok fo-large"></i></h1>
				<p>Деталі вашого профілю успішно збережені</p>
			</div>
		</div>
	</div>
</div>
@stop


@section('scripts')

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