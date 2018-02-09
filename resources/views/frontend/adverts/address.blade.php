<!-- Modal Address -->
<div id="modal_change_address" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content text-center">
            <div class="modal-header">
                <a href="#" type="button" class="close link-red" data-dismiss="modal"><i class="fo fo-delete"></i></a>
                <h4 class="modal-title">Змінити регіон</h4>
            </div>
            <div class="modal-body">
                <p><input type="checkbox" id="ukraine" checked="checked"><label for="ukraine">Уся Україна</label></p>
                <p>Населений пункт</p>
                <p>
                    <select class="address full-width">
                        @foreach($cities as $city)
                            <option value="{{ $city->id }}">{{ $city->name }}</option>
                        @endforeach
                    </select>
                </p>
                <div class="row">
                    <div class="col-md-7">
                        <p>Вулиця</p>
                        <input class="" type="text" placeholder="Соборна">
                    </div>
                    <div class="col-md-5">
                        <p>№ будинку</p>
                        <input class="" type="text" placeholder="30">
                    </div>
                </div>
                <p></p>
                <a href="#" class="button button-red">Застосувати</a>
            </div>
        </div>
    </div>
</div>