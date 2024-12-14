@extends('site.layouts.app')

@section('title')
    Wesso - Create Store
@endsection

@section('content')
    <!-- Start Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Stores</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="{{ route('stores.show', $store->slug) }}"><i class="lni lni-home"></i> Stores</a></li>
                        <li>Create</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Start Account Register Area -->
    <div class="account-login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-12">
                    <div class="register-form">
                        <form class="pt-3" action="{{ route('stores.update', $store->slug) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-fn">Name</label>
                                    <input class="form-control" type="text" value="{{ $store->name }}" name="name"
                                        id="reg-fn" required>
                                </div>
                            </div>
                            @if ($errors->get('name'))
                                <ul class="fs-6 text-danger mt-2">
                                    @foreach ((array) $errors->get('name') as $error)
                                        <li class="mb-1">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-desc">Description</label>
                                    <textarea class="form-control" id="reg-desc" rows="12" name="description" required>{{ $store->description }}</textarea>
                                </div>
                            </div>
                            @if ($errors->get('description'))
                                <ul class="fs-6 text-danger mt-2">
                                    @foreach ((array) $errors->get('description') as $error)
                                        <li class="mb-1">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-image">Image</label>
                                    <input class="form-control" name="image" type="file" id="reg-image">
                                </div>
                                <div class="image-preview" style="width: 250px">
                                    <img src="{{ asset($store->image->path ?? 'defaults/store.jpg') }}" alt="Image">
                                </div>
                            </div>
                            @if ($errors->get('image'))
                                <ul class="fs-6 text-danger mt-2">
                                    @foreach ((array) $errors->get('image') as $error)
                                        <li class="mb-1">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="reg-video">Video Link</label>
                                    <input class="form-control" value="{{ $store->video }}" name="video" type="text"
                                        id="reg-video" required>
                                </div>
                            </div>
                            @if ($errors->get('video'))
                                <ul class="fs-6 text-danger mt-2">
                                    @foreach ((array) $errors->get('video') as $error)
                                        <li class="mb-1">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            @endif
                            <div class="button">
                                <button class="btn" type="submit">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Account Register Area -->
@endsection
