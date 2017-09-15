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
					<li><a href="#" class="active">Про проект</a></li>
					<li><a href="#">Допомога</a></li>
					<li><a href="#">Правила </a></li>
					<li><a href="#">Умови та конфіденційність</a></li>
					<li><a href="#">Зворотний зв'язок</a></li>
					<li><a href="#">Карта сайту</a></li>
				</ul>
			</div>
		</div>
	</div>
@endsection