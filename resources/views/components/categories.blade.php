@foreach ($categories as $category)
    <div class="mb-2 {{ $category->isChild() ? 'ms-5' : '' }}">
        <x-category :category="$category" />
    </div>
@endforeach
