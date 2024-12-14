@extends('dashboard.layouts.app')

@section('crumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.products.index') }}">Products</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Product</h4>
                <form class="form-sample" method="POST" action="{{ route('dashboard.products.update', $product->slug) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <p class="card-description"> Edit an existing product to the website </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Name</label>
                                <div class="col-sm-9">
                                    <input name="name" value="{{ $product->name }}" type="text"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Price</label>
                                <div class="col-sm-9">
                                    <input type="number" value="{{ $product->price }}" name="price"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Category</label>
                                <div class="col-sm-9">
                                    <select name="category_id" class="form-control">
                                        <option>Select Category</option>
                                        @foreach ($categories as $category)
                                            <option @selected($product->category_id == $category->id) value="{{ $category->id }}">
                                                {{ $category->title }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea rows="6" name="description" class="form-control">{{ $product->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Images</label>
                                <div class="col-sm-9">
                                    <input type="file" name="images[]" class="form-control" multiple />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">Current Images</label>
                                    <div class="col-sm-9">
                                        <div class="row">
                                            @foreach ($product->images as $image)
                                                <div class="col-md-4">
                                                    <img src="{{ $image->path }}" width="100" height="100" />
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary mr-2">Save</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
