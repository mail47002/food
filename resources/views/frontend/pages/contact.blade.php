@extends('frontend.layouts.default')

@section('content')
    <div class="container pages">
        <div class="row">
            <div class="col-md-8">
                <h1 class="title">Зворотній зв'язок</h1>
                <div class="row">
                    <form action="/contact" method="post" class="contact">
                        <div class="col-md-12"><p class="message"">Заповніть виділені поля</p></div>
                        <div class="col-md-6">
                            <label for="name">Ім'я*</label>
                            <input name="name" id="name" type="text" required="required" />

                            <label for="email">Email*</label>
                            <input name="email" id="email" type="email" required="required" />

                            <label for="phone">Телефон*</label>
                            <input id="phone" name="phone[]" class="phone-input" type="text" required="required" />
                        </div>
                        <div class="col-md-6">
                            <label for="message">Ваше повідомлення</label>
                            <textarea name="message" id="message" type="text" class="wide"></textarea>
                            <input type="submit" class="button button-red" value="Продовжити">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-4 hidden-xs">
                <ul class="menu-pages">
                    <li><a href="#">Про проект</a></li>
                    <li><a href="#">Допомога</a></li>
                    <li><a href="#">Правила </a></li>
                    <li><a href="#">Умови та конфіденційність</a></li>
                    <li><a href="#" class="active">Зворотний зв'язок</a></li>
                    <li><a href="#">Карта сайту</a></li>
                </ul>
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    {{-- mask --}}
    <script src="/assets/js/jquery.maskedinput.js"></script>
    <script>
        $(function(){
            $(".phone-input").mask("+38 (999) 999-9999");
        });
    </script>

    {{-- Validation --}}
    <script src="/assets/vendor/jquery-validation/dist/jquery.validate.min.js"></script>
    <script>
        $(function() {
            $('form').validate({
                // make sure error message isn't displayed
                errorPlacement: function () { },
                // set the errorClass as a random string to prevent label disappearing when valid
                errorClass : "bob",
                // use highlight and unhighlight
                highlight: function (element, errorClass, validClass) {
                    $(element.form).find("label[for=" + element.id + "]")
                        .addClass("error");
                },
                unhighlight: function (element, errorClass, validClass) {
                    $(element.form).find("label[for=" + element.id + "]")
                        .removeClass("error");
                },
                invalidHandler: function(form, validator) {
                    $('.message').addClass("error");
                }
            });
        });
    </script>
@endpush