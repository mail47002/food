
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
				<div class="content js-content">
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

								<p><a href="{{ url('password/reset') }}" class="link-blue">Забули пароль?</a></p>

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

@push('scripts')
	<script type="text/javascript">
		var wishlist = {
		    add: function (id) {
                $.post('{{ url('api/wishlist') }}', {
                    '_token': '{{ csrf_token() }}',
					'user_id': id
                }).done(function (response) {
                    if (response['status'] === 'success') {
                        wishlist.show();
                    }
                });
            },
            show: function () {
                $.get('{{ url('api/wishlist') }}').done(function (response) {
                    if (response['data']) {
                        var html = '',
                            user;

                        for (i in response.data) {
                            user = response['data'][i]['user'];

                            html += '<div class="caption js-wishlist-item-' + user['id'] + '">';
                            html += '<a href="javascript:void(0);" onclick="wishlist.remove(' + user['id'] + ');" class="discard link-red js-wishlist-remove"><i class="fo fo-close-rounded"></i></a>';
                            html += '<div class="avatar">';
                            html += '<div class="rounded">';
                            html += '<img src="/uploads/avatar.png" alt="foto">';
                            html += '</div>';
                            html += '</div>';
                            html += '<p><a href="#" class="link-blue name">' + user['name'] + '</a></p>';

                            for (j in user['phone']) {
                                html += '<p class="phone">' + user['phone'][j] + '</p>';
                            }

                            html += '</div>';
                        }

                        $('#modal_likes .js-content').empty().append(html);

                        $('#modal_likes').modal('show');
                    }
                });
            },
			remove: function (id) {
                $.post('{{ url('api/wishlist') }}/' + id, {
                    '_method': 'delete',
                    '_token': '{{ csrf_token() }}'
                }).done(function (response) {
                    if (response['status'] === 'success') {
                        $('.js-wishlist-item-' + id).remove();
                    }
                });
            }
		}
	</script>
@endpush