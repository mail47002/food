@extends('frontend.layouts.default')

@section('content')
	<div class="container pages">
		<div class="row">
			<div class="col-md-8">
				<h1 class="title">{{ $page->title }}</h1>
				<div class="text">{!! $page->content !!}</div>
			</div>
			<div class="col-md-4 hidden-xs">
				<ul class="menu-pages">
					<li><a href="/page/pro-proekt" class="active">Про проект</a></li>
					<li><a href="/page/faqs">Допомога</a></li>
					<li><a href="/page/pravila">Правила </a></li>
					<li><a href="/page/umovi-ta-konfidentsiynist">Умови та конфіденційність</a></li>
					<li><a href="/page/feedback">Зворотний зв'язок</a></li>
					<li><a href="#">Карта сайту</a></li>
				</ul>
			</div>
		</div>

	</div>
@endsection