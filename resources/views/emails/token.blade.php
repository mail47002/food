<!DOCTYPE html>
<html lang="uk">
	<head>
		<meta charset="utf-8">
	</head>
	<body>
		<h2>Перевірка email</h2>

		<div>
			<p>
			Доброго дня. Ви пройшли первинну реєстрацію на сайті <a href="{{ url('/') }}">{{ url('/') }}</a>
			</p>

			<p>
				Для підтвердження реєстрації перейдіть за <a href="{{ route('user.verify', $user->token) }}">посиланням</a>
			</p>
		</div>
	</body>
</html>