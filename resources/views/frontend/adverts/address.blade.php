<!-- Modal Address -->
<div id="modal_change_address" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
                <h4 class="modal-title">Змінити регіон</h4>
            </div>
            <div class="modal-body contact">
                <p style="display: inline-block;"><input id="all_ukraine" type="checkbox"><label for="all_ukraine">Вся Україна</label></p>

                <p>Населений пункт</p>
                <div class="marker">
                    <input id="city" type="text" placeholder="" class="wide">
                </div>
                <input id="city_id" name="city_id" type="hidden" value="">

                <div class="row text-left">
                    <div class="col-md-offset-1 col-md-6">
                        <p>Вулиця</p>
                        <input id="street" class="" type="text" placeholder="Соборна">
                    </div>
                    <div class="col-md-3">
                        <p>№ будинку</p>
                        <input id="number" class="" type="text" placeholder="30">
                    </div>
                </div>
                <p></p>
                <a href="#" id="apply_address" class="button button-red button-big">Застосувати</a>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
    $(function() {
    //Init
        check();
    //Checkbox All Ukraine
        $('#all_ukraine').on('click', function(){check();});
    //Cleat inputs on focus
        $('#modal_change_address input').on('focus', function(){$(this).prop('placeholder','');});
    //Submit address
        $('#apply_address').on('click',function(){
            var address = $('#street').val() +', буд. '+$('#number').val()+', '+$('#city').val();
            $('#address').html(address);
            $('#modal_change_address').modal('toggle');
        });

        function check() {
            if(document.getElementById('all_ukraine').checked) {
                $("#city").prop('disabled', true);
                $("#street").prop('disabled', true);
                $("#number").prop('disabled', true);
            } else {
                $("#city").prop('disabled', false);
                $("#street").prop('disabled', false);
                $("#number").prop('disabled', false);
            }
        };


{{-- Autocomplete --}}
        var cities = [
            @foreach($cities as $city)
            {id:"{{ $city->id }}", value:"{{ $city->name }}"},
            @endforeach
        ];

        $( "#city" ).autocomplete({
          minLength: 0,
          source: cities,
          focus: function( event, ui ) {
            $( "#city" ).val( ui.item.value ).addClass('open');
            $( "#city_id" ).val( ui.item.id );
            return false;
          },
          select: function( event, ui ) {
            $( "#city" ).val( ui.item.value );
            $( "#city_id" ).val( ui.item.id );
            return false;
          }
        });
    });
    </script>

@endpush