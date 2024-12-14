@extends('dashboard.layouts.app')

@section('crumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.products.index') }}">Products</a></li>
    <li class="breadcrumb-item active" aria-current="page">All</li>
@endsection

@section('content')
    <div class="container">
        <h2>All Products</h2>


        <!-- Products Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Category</th>
                    <th scope="col">Images</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ Str::limit($product->name, 15) }}</td>
                        <td>{{ Str::limit($product->description, 15) }}</td>
                        <td>${{ $product->price }}</td>
                        <td>{{ Str::limit($product->category->title, 15) }}</td>
                        <td>
                            @foreach ($product->images as $image)
                                <img src="{{ $image->path }}" alt="Product Image" class="img-thumbnail"
                                    style="width: 50px; height: 50px;">
                            @endforeach
                        </td>
                        <td>
                            <!-- Edit button -->
                            <a href="{{ route('dashboard.products.edit', $product->slug) }}"
                                class="btn btn-primary btn-sm">Edit</a>

                            <!-- Delete button -->
                            <form action="{{ route('dashboard.products.destroy', $product->slug) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Pagination -->
        {{ $products->links() }}
    </div>
@endsection
