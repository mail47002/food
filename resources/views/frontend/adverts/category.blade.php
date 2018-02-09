<ul class="buttons list-inline text-center js-filter-category">
    @foreach ($categories as $category)
        <li>
            <a href="#"
               class="button {{ in_array($category->id, $filter['cid']) ? 'active' : '' }}"
               data-id="{{ $category->id }}">{{ $category->name }}</a>
        </li>
    @endforeach
</ul>