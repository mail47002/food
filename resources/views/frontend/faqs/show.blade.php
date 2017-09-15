@extends('frontend.layouts.default')

@push('styles')
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@endpush

@section('content')
    <div class="container pages">
        <div class="row">
            <div class="col-md-8">
                <h1 class="title">Допомога</h1>

                @if (count($faqs) > 0)
                    <div class="text">
                        <div id="accordion">
                            @foreach ($faqs as $item)
                                <h3>{{ $item->title }}</h3>
                                <div>{!! $item->content !!}</div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
            <div class="col-md-4 hidden-xs">
                <ul class="menu-pages">
                    <li><a href="#">Про проект</a></li>
                    <li><a href="#" class="active">Допомога</a></li>
                    <li><a href="#">Правила </a></li>
                    <li><a href="#">Умови та конфіденційність</a></li>
                    <li><a href="#">Зворотний зв'язок</a></li>
                    <li><a href="#">Карта сайту</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script type="text/javascript">
        (function($) {
            $('#accordion').accordion({
                collapsible: true,
                heightStyle: 'content'
            });
        })(jQuery);
    </script>
@endpush