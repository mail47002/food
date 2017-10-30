
<footer class="footer hidden-xm">
	<div class="container">
		<span>© Всі права захищені</span>
		<a href="#">Умови використання та конфіденційність</a>
		<a href="#">Контакти</a>
		<div class="socials">
			<a href="#" class="fo fo-facebook fo-small"></a>
			<a href="#" class="fo fo-google fo-small"></a>
			<a href="#" class="fo fo-twitter fo-small"></a>
		</div>
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
							<div class="rounded"><img src="/uploads/avatar.png" alt="foto"></div>
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

								{{ Form::open(['route' => 'login', 'method' => 'post']) }}
									{{ Form::label('email', 'Email', ['for' => 'email']) }}
									{{ Form::email('email', null, ['id' => 'email', 'placeholder' => 'Email']) }}
									{{ Form::label('password', 'Пароль', ['for' => 'password']) }}
									{{ Form::password('password', null, ['id' => 'password', 'placeholder' => 'password']) }}
									{{Form::submit('Увійти', ['class' => 'button button-red']) }}
								{{ Form::close() }}

								<p><a href="{{ route('password.forgot') }}" class="link-blue">Забули пароль?</a></p>

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