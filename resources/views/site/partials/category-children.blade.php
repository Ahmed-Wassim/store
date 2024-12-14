<ul>
    @foreach ($categories as $category)
        <li>
            <a href="{{ route('categories.show', $category->slug) }}">{{ $category->title }}</a>
            @if ($category->children->isNotEmpty())
                @include('site.partials.category-children', ['categories' => $category->children])
            @endif
        </li>
    @endforeach
</ul>
