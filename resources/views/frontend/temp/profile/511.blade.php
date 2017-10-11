@extends('frontend.layouts.profile')

@section('content')


<div class="v-indent-40"></div>
<h1>John Doe</h1>
<p class="grey3">
	<i class="fo fo-marker red"></i> Strilecka 75, Vinnica
	&nbsp;&nbsp;&nbsp;<a href="#/profile/1/edit" class="link-grey"><i class="fo fo-edit fo-small fo-indent"></i>Редагувати</a>
</p>
<div class="rating grey3"><span class="stars medium"><span style="width: 100px;"></span></span>10 відгуків</div>

<div class="description">
	<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repudiandae voluptatum vero cupiditate. Dolorem optio harum non cumque nam beatae fuga minus modi, eum repellat asperiores ipsum. Explicabo voluptates fugiat porro.</p>
	<a href="#/profile/1/edit" class="link-grey"><i class="fo fo-edit fo-small fo-indent"></i>Редагувати</a>
	<a href="#" class="link-blue block top-10">Приховати</a>
</div>

<h5 class="text-upper underline-red">Відгуки (0)</h5><hr class="zerro-top">

<div class="reviews">
	<h6 class="zerro-bottom">Відгуки про повара (0)</h6>

	<ul class="list-unstyled">
		<li class="clearfix">
			<div class="left">
				<div class="avatar">
					<div class="rounded"><img src="/uploads/avatar.jpg"></div>
				</div>
				<a href="#" class="link-blue name">John Doe</a>
			</div>

			<div class="right bg-yellow with-image">
				<div class="blk-left">
					<div class="date">2017-10-11 18:22:42</div>
					<div><a href="#" class="link-blue f16">Продукт 1</a></div>
					<span class="stars">4</span>
					<div class="message">review 1</div>

					<div class="collapse" id="collapse_to_1">
						<div class="answer clearfix">
							<div class="title">Ваша відповідь</div>
							<div class="message">text 1</div>
							<div class="right-avatar">
								<div class="avatar">
									<div class="rounded"><img src="/uploads/avatar.jpg"></div>
								</div>
							</div>
						</div>
						<div class="message" id="message_01">
							В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.
						</div>
					</div>

					<div class="collapse your-message" id="collapse_your_answer_to_1">
						<form action="#to-1">
							<textarea name="message" id="" placeholder="Ваша відповідь"></textarea>
							<button class="link-red-dark" type="submit"><i class="fo fo-plane fo-2x"></i></button>
						</form>
					</div>

					<hr>

					<a href="#collapse_your_answer_to_1" class="your-message-link pull-right" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_your_answer_to_1" opened="Відмінити" closed="Відповісти"></a>

					<a href="#collapse_to_1" class="link-blue pull-left" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_to_1" opened="Приховати" closed="Показати все"></a>

				</div>
				<div class="blk-right"><img src="/uploads/food1.jpg"></div>

			</div>
		</li>

	</ul>

	<div class="paginate">
		<ul class="pagination grey">
			<li><a href="#" rel="prev">&lt;</a></li>
			<li><a href="#">1</a></li>
			<li><a href="#">2</a></li>
			<li><a href="#" rel="next">&gt;</a></li>
		</ul>
	</div>
</div>


<div class="reviews">
	<h6 class="zerro-bottom">Відгуки від поварів (0)</h6>
	<ul class="list-unstyled">

		<li class="clearfix">
			<div class="left">
				<div class="avatar">
					<div class="rounded"><img src="/uploads/avatar.jpg"></div>
				</div>
				<a href="#" class="link-blue name">John Doe</a>
			</div>
			<div class="right bg-yellow">
				<div class="date">2017-10-11 18:22:42</div>

				<span class="stars">4</span>
				<div class="message">review 1</div>

				<div class="collapse" id="collapse_from_1">
					<div class="answer clearfix">
						<div class="title">Ваша відповідь</div>
						<div class="message">text 1</div>
						<div class="right-avatar">
							<div class="avatar">
								<div class="rounded"><img src="/uploads/avatar.jpg"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="collapse your-message" id="collapse_your_answer_1">
					<form action="#from-1">
						<textarea name="message" id="" placeholder="Ваша відповідь"></textarea>
						<button class="link-red-dark" type="submit"><i class="fo fo-plane fo-2x"></i></button>
					</form>
				</div>

				<hr>

				<a href="#collapse_your_answer_1" class="your-message-link pull-right" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_your_answer_1" opened="Відмінити" closed="Відповісти"></a>

				<a href="#collapse_from_1" class="link-blue pull-left" data-toggle="collapse" aria-expanded="false" aria-controls="collapse_from_1" opened="Приховати" closed="Показати все"></a>

			</div>
		</li>

	</ul>


</div>



@stop

