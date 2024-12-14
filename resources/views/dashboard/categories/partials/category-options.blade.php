@foreach ($categories as $category)
    <option value="{{ $category->id }}">
        {{ $prefix }} {{ $category->title }}
    </option>
    @if ($category->children->isNotEmpty())
        @include('dashboard.categories.partials.category-options', [
            'categories' => $category->children,
            'prefix' => $prefix . '—',
        ])
    @endif
@endforeach
