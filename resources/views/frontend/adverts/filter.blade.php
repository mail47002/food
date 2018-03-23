@if(Helper::isAdvertByDate())
    <div class="filter-block">
        <div class="filter-inputs container">
            <div class="row">
                <div class="col-md-3">
                    <input type="text" name="date" class="datepicker full-width" value="{{ request()->get('date') }}" placeholder="Дата">
                </div>
                <div class="checkboxes col-md-6">
                    <input type="checkbox" id="breakfast" name="time" value="breakfast" {{ in_array('breakfast', $filter['time']) ? 'checked' : '' }}>
                    <label for="breakfast">Сніданок (до 12:00)</label>

                    <input type="checkbox" id="dinner" name="time" value="dinner" {{ in_array('dinner', $filter['time']) ? 'checked' : '' }}>
                    <label for="dinner">Обід (12:00 - 16:00)</label>

                    <input type="checkbox" id="supper" name="time" value="supper" {{ in_array('supper', $filter['time']) ? 'checked' : '' }}>
                    <label for="supper">Вечеря (після 16:00)</label>
                </div>
                <div class="col-md-3">
                    <label for="sorting-order" class="grey3">Сортутвати по:</label>
                    <select name="sorting-order" class="sorting" id="sorting-order">
                        <option value="">найближчі</option>
                        <option value="">найближчі</option>
                        <option value="">найближчі</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="prices-input {{ Helper::isAdvertByDate() ? 'text-center' : 'p0' }} js-filter-price">
                    <label>Ціновий діапазон</label>
                    <input type="text" name="price_from" value="{{ request()->get('price_from') }}">
                    <label>&#x2014;</label>
                    <input type="text" name="price_to" value="{{ request()->get('price_to') }}">
                    <label>грн.</label>
                    <button type="button" class="button btn-filter js-btn-filter">OK</button>
                </div>
            </div>
        </div>
    </div>
@endif

@if(Helper::isAdvertInStock() || Helper::isAdvertPreOrder())
    <div class="filter-block">
        <div class="filter-inputs container">
            <div class="row">
                <div class="col-md-9">
                    <div class="prices-input {{ Helper::isAdvertByDate() ? 'text-center' : 'p0' }} js-filter-price">
                        <label>Ціновий діапазон</label>
                        <input type="text" name="price_from" value="{{ request()->get('price_from') }}">
                        <label>&#x2014;</label>
                        <input type="text" name="price_to" value="{{ request()->get('price_to') }}">
                        <label>грн.</label>
                        <button type="button" class="button btn-filter js-btn-filter">OK</button>
                    </div>
                </div>
                <div class="col-md-3">
                    <label for="sorting-order" class="grey3">Сортутвати по:</label>
                    <select name="sorting-order" class="sorting" id="sorting-order">
                        <option value="">найближчі</option>
                        <option value="">найближчі</option>
                        <option value="">найближчі</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
@endif