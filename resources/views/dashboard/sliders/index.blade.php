@extends('dashboard.layouts.app')

@section('crumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.sliders.index') }}">Sliders</a></li>
    <li class="breadcrumb-item active" aria-current="page">All</li>
@endsection

@section('content')
    <div>
        <a href="{{ route('dashboard.sliders.create') }}" class="btn btn-primary">Create Slider</a>
    </div>
    <br><br>
    <div class="container">



        <h2>All Banners</h2>


        <!-- Products Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Image</th>
                    <th scope="col">Heading</th>
                    <th scope="col">Title</th>
                    <th scope="col">Description</th>
                    <th scope="col">Type</th>
                    <th scope="col">Link</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($sliders as $slider)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><img src="{{ $slider->image->path ?? '' }}" alt="Product Image" class="img-thumbnail"
                                style="width: 50px; height: 40px;"></td>
                        <td>{{ Str::limit($slider->heading, 15) }}</td>
                        <td>{{ Str::limit($slider->title, 15) }}</td>
                        <td>{{ Str::limit($slider->description, 15) }}</td>
                        <td>{{ $slider->type }}</td>
                        <td>
                            {{ Str::limit($slider->link, 15) }}
                        </td>
                        <td>
                            <!-- Edit button -->
                            <a href="{{ route('dashboard.sliders.edit', $slider->id) }}"
                                class="btn btn-primary btn-sm">Edit</a>

                            <!-- Delete button -->
                            <form action="{{ route('dashboard.sliders.destroy', $slider->id) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this product?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td>There is Any Banners</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
