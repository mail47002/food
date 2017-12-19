@extends('frontend.layouts.default')

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
                    <li><a href="/page/pro-proekt">Про проект</a></li>
                    <li><a href="/page/faqs" class="active">Допомога</a></li>
                    <li><a href="/page/pravila">Правила </a></li>
                    <li><a href="/page/umovi-ta-konfidentsiynist">Умови та конфіденційність</a></li>
                    <li><a href="/page/feedback">Зворотний зв'язок</a></li>
                    <li><a href="#">Карта сайту</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script type="text/javascript">
        (function($) {
            $('#accordion').accordion({
                collapsible: true,
                heightStyle: 'content'
            });
        })(jQuery);
    </script>
@endpush