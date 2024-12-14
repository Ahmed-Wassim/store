@extends('dashboard.layouts.app')

@section('crumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.categories.index') }}">Categories</a></li>
    <li class="breadcrumb-item active" aria-current="page">All</li>
@endsection

@section('content')
    <div class="container px-3 px-sm-4 px-lg-5" style="max-width: 80rem;">

        <!-- Create Category Button -->
        <button class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#createCategoryModal">Create
            Category</button>

        <x-categories :categories="$categories" />
    </div>

    {{-- hello world --}}
    <!-- Create Category Modal -->
    <div class="modal fade" id="createCategoryModal" tabindex="-1" aria-labelledby="createCategoryModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createCategoryModalLabel">Create New Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('dashboard.categories.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="categoryTitle" class="form-label">Category Title</label>
                            <input type="text" class="form-control" id="categoryTitle" name="title" required>
                        </div>

                        <div class="mb-3">
                            <label for="parentCategory" class="form-label">Parent Category</label>
                            <select class="form-select" id="parentCategory" name="parent_id">
                                <option value="">Select Parent Category (Optional)</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">
                                        {{ $category->title }}
                                    </option>
                                    @if ($category->children->isNotEmpty())
                                        @include('dashboard.categories.partials.category-options', [
                                            'categories' => $category->children,
                                            'prefix' => '—',
                                        ])
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Create</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
