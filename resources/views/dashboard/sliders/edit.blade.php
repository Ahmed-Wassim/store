@extends('dashboard.layouts.app')

@section('crumbs')
    <li class="breadcrumb-item"><a href="{{ route('dashboard.sliders.index') }}">Sliders</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
@endsection

@section('content')
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Edit Slider</h4>
                <form class="form-sample" method="POST" action="{{ route('dashboard.sliders.update', $slider->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <p class="card-description"> Editslider to the website </p>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Image</label>
                                <div class="col-sm-9">
                                    <input type="file" name="image" class="form-control" />
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Current Images</label>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <img src="{{ $slider->image->path ?? '' }}" width="100" height="100" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Type</label>
                                <div class="col-sm-9">
                                    <select name="type" class="form-control">
                                        <option>Choose Type</option>
                                        <option value="slider" {{ $slider->type == 'slider' ? 'selected' : '' }}>Slider</option>
                                        <option value="vertical" {{ $slider->type == 'vertical' ? 'selected' : '' }}>Vertical</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Heading</label>
                                <div class="col-sm-9">
                                    <input name="heading" value="{{ $slider->heading }}" type="text"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Title</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ $slider->title }}" name="title"
                                        class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Description</label>
                                <div class="col-sm-9">
                                    <textarea rows="6" name="description" class="form-control">{{ $slider->description }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <label class="col-sm-3 col-form-label">Link</label>
                                <div class="col-sm-9">
                                    <input type="text" value="{{ $slider->link }}" name="link" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary mr-2">Submit</button>
                    <button class="btn btn-light">Cancel</button>
                </form>
            </div>
        </div>
    </div>
@endsection
