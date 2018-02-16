<!-- Modal Address -->
<div id="modal_change_address" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
                <h4 class="modal-title">Змінити регіон</h4>
            </div>
            <div class="modal-body contact">
                <p style="display: inline-block;"><input id="ukraine" type="checkbox"><label for="ukraine">Вся Україна</label></p>

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
                <a href="#" class="button button-red button-big">Застосувати</a>
            </div>
        </div>
    </div>
</div>

@push('scripts')
{{-- Autocomplete --}}
    <script>
    $(function() {
        var cities = [
            @foreach($cities as $city)
            {id:"{{ $city->id }}", value:"{{ $city->name }}"},
            @endforeach
        ];

        $( "#city" ).autocomplete({
          minLength: 0,
          source: cities,
          focus: function( event, ui ) {
            $( "#city" ).val( ui.item.value );
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