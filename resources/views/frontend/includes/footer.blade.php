
<footer class="footer">
	<div class="container">
		<span>© Всі права захищені</span>
		<a href="#">Умови використання та конфіденційність</a>
		<a href="#">Контакти</a>
	</div>
</footer>


{{-- Улюблені --}}
<!-- Modal -->
<div id="modal_likes" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content text-center">
			<div class="modal-header">
				<a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
				<h4 class="modal-title">Улюблені</h4>
			</div>
			<div class="modal-body">
				<div class="content">

@for($i=0;$i<5;$i++)
					<div class="caption">
						<a href="#" class="discard link-red"><i class="fo fo-close-rounded"></i></a>
						<div class="avatar">
							<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>
						</div>
						<p><a href="#" class="link-blue name">Марк</a></p>
						<p class="phone">+38 096 159 15 15</p>
					</div>
@endfor

				</div>
			</div>
		</div>
	</div>
</div>


{{-- Login popup --}}
<!-- Modal -->
<div id="modal_login" class="modal fade login-popup" role="dialog">
	<div class="modal-dialog">

		<div class="modal-content text-center">
			<div class="modal-header">
				<a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
				<h2 class="login-popup-title">ласкаво просимо</h2>
				<p>Щоб користуватися усіма функціями та мати змогу зв’язатися з іншими користувачами увійдіть на сайт або зареєструйтеся!</p>
			</div>
			<div class="modal-body">

				<div class="signin-page sign-form">
					<div class="sign-content text-center">
						<div class="sign-body">

							<div class="left text-left separator">

								{{ Form::open(['route' => 'login', 'method' => 'POST']) }}
									{{ Form::label('email', 'Email', ['for' => 'email']) }}
									{{ Form::email('email', null, ['id' => 'email', 'placeholder' => 'Email']) }}
									{!! $errors->first('email', 'erorr email') !!}
									{{ Form::label('password', 'Пароль', ['for' => 'password']) }}
									{{ Form::password('password', null, ['id' => 'password', 'placeholder' => 'password']) }}
									{!! $errors->first('password', 'erorr password') !!}
									{{Form::submit('Увійти', ['class' => 'button button-red']) }}
								{{ Form::close() }}

								<p><a href="#" class="link-blue">Забули пароль</a></p>

							</div>

							<div class="right text-right">
								<a href="#" class="button login google">Продовжити з Google</a>
								<a href="#" class="button login facebook">Продовжити з Facebook</a>
								<a href="#" class="button login twitter">Продовжити з Twitter</a>

								<p class="signup">Вас ще немає на сайті?  <a href="{{ route('register') }}" class="link-red">Зареєструватися</a></p>
							</div>

						</div>

					</div>
				</div>

			</div>
		</div>
	</div>
</div>