<div class="prices-input {{ Helper::isAdvertByDate() ? 'text-center' : 'p0' }} js-filter-price">
    <label>Ціновий діапазон</label>
    <input type="text" name="price_from" value="{{ request()->get('price_from') }}">
    <label>&#x2014;</label>
    <input type="text" name="price_to" value="{{ request()->get('price_to') }}">
    <label>грн.</label>
    <button type="submit" class="button btn-filter js-btn-filter">OK</button>
</div>