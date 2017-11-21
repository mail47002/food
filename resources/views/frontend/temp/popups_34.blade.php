@extends('frontend.layouts.default')
@section('title')Adverts - @stop
@section('content')


<p class="text-center">
	<a href="#" class="button button-red" data-toggle="modal" data-target="#modal_buy">Замовити</a>
</p>



<!-- Modal -->
<div id="modal_buy" class="modal fade" role="dialog">
	<div class="modal-dialog w-710">
		<div class="modal-content text-center">
			<div class="modal-header">
				<a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
				<h4 class="modal-title">Оформити замовлення</h4>
			</div>
			<div class="modal-body">
				<div class="v-indent-20"></div>
				<div class="step"><span>1</span></div>
				<div class="f-18 top-10">Для оформлення замовлення, зв'яжіться з поваром страви</div>
				<div class="caption">
					<div class="avatar">
						<div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>
					</div>
					<p><a href="#" class="link-blue name">Марк</a></p>
				</div>
				<div class="phone red f24">+38 (096) 159-1515</div>
				<div class="phone red f24">+38 (096) 159-1515</div>

				<div id="switchable">
					<div class="grey3 top-20">або</div>
					<div class="f18">залиште свій номер телефону,<br> і повар зв’яжиться з вам найближчи</div>
					<div class="top-20">
						<input type="text" class="phone-input w-440 text-center">
						<button id="submit_phone" type="submit" class="button btn-grey-red">Відправити</button>
					</div>
				</div>

			{{-- 3.4.2 --}}
				<div id="ok_send" class="grey-block bg-yellow black w-480 hide">
					<p class="text-center red"><i class="fo fo-ok fo-2x"></i></p>
					<p class="f16">Ваш телефон відправлено</p>
				</div>



				<div class="v-indent-20"></div>
				<div class="step"><span>2</span></div>
				<div class="f-18 top-20">Для завершення замовлення обов’язково потрібно підтвердити його</div>

				<div class="top-20 inline">
					<a href="#" class="button button-white text-upper mlr-10">Підтвердити пізніше</a>
					<a href="#" class="button button-red text-upper mlr-10">Підтвердити зараз</a>
				</div>

			{{-- 3.4.3 --}}
				<div class="info-block red w-480">
					<p class="text-upper">Замовлення очікує на підтвердження!</p>
					<div><a href="#" class="link-grey3 f14">Перейти до моїх замовлень та підтвердити <i class="fo fo-arrow-right fo-small"></i></a></div>
				</div>

			</div>
		</div>
	</div>
</div>





@stop

@push('scripts')

{{-- mask --}}
<script src="{{ asset('frontend/js/jquery.maskedinput.js') }}" type="text/javascript"></script>
<script>
	jQuery(function($){
		$(".phone-input").mask("+38 (999) 999-9999");

{{-- 3.4.2 --}}
		$('#submit_phone').on('click' , function(e){
			e.preventDefault();
			$('#switchable').hide();
			$('#ok_send').show();
		});

	});
</script>

@endpush