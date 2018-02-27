@extends('frontend.layouts.default')

@section('breadcrumbs')with-bredcrumbs @endsection

@section('content')

    <div class="breadcrumbs">
        <div class="container">
            <ul class="list-inline">
                <li>
                    <a href="{{ route('account.messages.index') }}" class="link-blue back text-upper">
                        <i class="fo fo-arrow-left fo-small"></i>  Повернутися
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="bg-yellow write-message">
        <div class="container">
            <div class="row flex-md">
                <div class="col-md-3">
                    <div class="left-sidebar text-center">
                        <div class="avatar">
                            <div class="rounded">
                                <img src="{{ $user->getAvatar() }}" alt="{{ $user->profile->first_name }}">
                            </div>
                        </div>
                        <a href="{{ route('profile.user.show', $user->profile->slug) }}" class="link-blue name f16 block">{{ $user->profile->first_name }}</a>
                    </div>
                </div>

                <div class="col-md-9 bg-white">
                    @if(count($thread->messages) > 0)
                        <ul class="list-unstyled messages" id="messagesHeight">
                            @foreach($thread->messages as $message)
                                <li class="clearfix">
                                    <div class="left">
                                        <div class="avatar">
                                            <div class="rounded">
                                                <img src="{{ $message->sender->directory . $message->sender->profile->image }}" alt="{{ $message->sender->profile->first_name }}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="right">
                                        <a href="#" class="link-blue name">{{ $message->sender->profile->first_name }}</a>
                                        <span class="date">{{ Date::parse($message->created_at)->format('H:m') }}</span>
                                        <div class="message">
                                            {{ $message->body }}
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
                    @endif


                        {{--<li class="clearfix">--}}
                            {{--<div class="left">--}}
                                {{--<div class="avatar">--}}
                                    {{--<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="right">--}}
                                {{--<a href="#" class="link-blue name">Марк</a><span class="date">10:20</span>--}}
                                {{--<div class="message grey3">--}}
                                    {{--В принципе вкусно,если сделать для одного раза,а так--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</li>--}}

                        {{--<div class="date-line"><span>10 липня</span></div>--}}

                        {{--<li class="clearfix">--}}
                            {{--<div class="left">--}}
                                {{--<div class="avatar">--}}
                                    {{--<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="right">--}}
                                {{--<a href="#" class="link-blue name">Оксана</a><span class="date">10:20</span>--}}
                                {{--<div class="message">--}}
                                    {{--В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</li>--}}

                        {{--<div class="date-line"><span>20 липня</span></div>--}}

                        {{--<li class="clearfix">--}}
                            {{--<div class="left">--}}
                                {{--<div class="avatar">--}}
                                    {{--<div class="rounded"><img src="/uploads/avatar.jpg" alt="foto"></div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                            {{--<div class="right">--}}
                                {{--<a href="#" class="link-blue name">Оксана</a><span class="date">10:20</span>--}}
                                {{--<div class="message">--}}
                                    {{--В принципе вкусно,если сделать для одного раза,а так: гарнир (рис с изюмом, инжиром, морковь и луком) всетаки сладкий,много не съешь,а индейка суховат.--}}
                                    {{--<div class="images">--}}
                                        {{--<img src="/uploads/food1.jpg" alt="">--}}
                                        {{--<img src="/uploads/article1.jpg" alt="">--}}
                                        {{--<img src="/uploads/article2.jpg" alt="">--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--</li>--}}
                </div>
            </div>
        </div>
    </div>

    <div class="fixed-bottom bg-yellow">
        <div class="container">
            <div class="row flex-md">
                <div class="col-md-3"></div>

                <div class="col-md-9 input-message-area">
                    <div class="your-message">
                        {{ Form::open(['route' => 'account.messages.store', 'method' => 'post', 'files' => true]) }}
                            <input type="file" name="file">
                            <i class="fo fo-clip fo-big"></i>
                            {{ Form::textarea('message', null, ['placeholder' => 'Ваша відповідь']) }}
                            <button class="link-red-dark" type="submit"><i class="fo fo-plane fo-2x"></i></button>
                            {{ Form::hidden('user_to', $user->profile->slug) }}
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $( function() {
                    {{-- Растянуть высоту на весь экрaн --}}
            var win = $(window); // window
            var height = $('#messagesHeight').outerHeight(true);
            if (win.height() >= (height + 200)) {
                $('#messagesHeight').css('height', (win.height() - 200) );
            }
            $(window).on('resize', function(){
                var win = $(this); //this = window
                var height = $('#messagesHeight').outerHeight(true);
                if (win.height() >= (height + 200)) {
                    $('#messagesHeight').css('height', (win.height() - 200) );
                }
            });
        });
    </script>
@endpush