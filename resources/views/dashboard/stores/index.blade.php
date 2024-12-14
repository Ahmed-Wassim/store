@extends('dashboard.layouts.app')

@section('crumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.stores.index') }}">Stores</a></li>
    <li class="breadcrumb-item active" aria-current="page">All</li>
@endsection

@push('styles')
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
@endpush

@section('content')
    <div>
        {{-- <a href="{{ route('dashboard.stores.create') }}" class="btn btn-primary">Create Store</a> --}}
    </div>
    <br><br>
    <div class="container">

        <h2>All Stores</h2>

        <!-- Products Table -->
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">User</th>
                    <th scope="col">Active</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($stores as $store)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ Str::limit($store->name, 15) }}</td>
                        <td>{{ Str::limit($store->description, 15) }}</td>
                        <td>{{ Str::limit($store->user->name, 15) }}</td>
                        <td><input type="checkbox" {{ $store->status == 'active' ? 'checked' : '' }} data-toggle="toggle"
                                class="toggle-status" data-onstyle="outline-primary" data-offstyle="outline-secondary"
                                data-size="sm" data-id="{{ $store->id }}">
                        </td>
                        <td>
                            <!-- Edit button -->
                            <a href="{{ route('dashboard.stores.edit', $store->slug) }}"
                                class="btn btn-primary btn-sm">Edit</a>

                            <!-- Delete button -->
                            <form action="{{ route('dashboard.stores.destroy', $store->slug) }}" method="POST"
                                style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm"
                                    onclick="return confirm('Are you sure you want to delete this store?')">Delete</button>
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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
    <script>
        $(document).on('change', '.toggle-status', function() {
            let storeId = $(this).data('id');
            let status = $(this).prop('checked') ? 'active' : 'inactive';


            $.ajax({
                url: '{{ route('dashboard.stores.updateStatus') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    id: storeId,
                    status: status
                },
                success: function(response) {
                    alert('Store status updated successfully');
                },
                error: function(xhr) {
                    alert('Something went wrong!');
                }
            });
        });
    </script>
@endpush
