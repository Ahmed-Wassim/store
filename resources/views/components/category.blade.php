<div class="bg-white mb-2 px-4 py-2 rounded shadow d-flex justify-content-between align-items-center">
    <!-- Category title on the left -->
    <div>{{ $category->title }}</div>

    <!-- Buttons on the right -->
    <div>
        <!-- Edit Button -->
        <button class="btn btn-primary btn-sm" data-bs-toggle="modal"
            data-bs-target="#editCategoryModal{{ $category->id }}">Edit</button>

        <!-- Delete Button -->
        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
            data-bs-target="#deleteCategoryModal{{ $category->id }}">Delete</button>
    </div>
</div>


<!-- Edit Modal for Each Category -->
<div class="modal fade" id="editCategoryModal{{ $category->id }}" tabindex="-1"
    aria-labelledby="editCategoryModalLabel{{ $category->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editCategoryModalLabel{{ $category->id }}">Edit Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="{{ route('dashboard.categories.update', $category->slug) }}">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="categoryTitle" class="form-label">Category Title</label>
                        <input type="text" class="form-control" id="categoryTitle" name="title"
                            value="{{ $category->title }}" required>
                    </div>


                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Delete Modal for Each Category -->
<div class="modal fade" id="deleteCategoryModal{{ $category->id }}" tabindex="-1"
    aria-labelledby="deleteCategoryModalLabel{{ $category->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deleteCategoryModalLabel{{ $category->id }}">Confirm Delete</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to delete the category <strong>{{ $category->title }}</strong>?</p>
            </div>
            <div class="modal-footer">
                <form method="POST" action="{{ route('dashboard.categories.destroy', $category->slug) }}">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>
    </div>
</div>

<x-categories :categories="$category->children" />
