@extends('layouts.admin_layout')

@section('content')

    <div class="row mb-4 p-3 d-flex justify-content-center">
        <div class="col-lg-11 col-md-6 mb-md-0 mb-4 ">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>New Category</h6>
                            <p class="text-sm mb-0">
                                <i class="fa fa-chedck text-info" aria-hidden="true"></i>
                            </p>
                        </div>
                        <div class="col-lg-6 col-5 my-auto text-end">
                            <div class="dropdown float-lg-end pe-4">
                                <a class="cursor-pointer" id="dropdownTable" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="fa fa-ellipsis-v text-secondary" aria-hidden="true"></i>
                                </a>
                                <ul class="dropdown-menu px-2 py-3 ms-sm-n4 ms-n5" aria-labelledby="dropdownTable">
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Action</a></li>
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Another action</a>
                                    </li>
                                    <li><a class="dropdown-item border-radius-md" href="javascript:;">Something else
                                            here</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    <form action="{{ route('categories.update', ['category' => $category->id]) }}" method="post"
                        class="row g-3 p-4" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="col-md-6">
                            <div class="input-group input-group-outline my-3 is-filled">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control border border-light" value="{{ $category->name }}"
                                    name="name" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-outline my-3 is-filled">
                                <label class="form-label">Slug</label>
                                <input type="text" class="form-control" value="{{ $category->slug }}" name="slug"
                                    onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" name="status" value="{{ $category->status }}"
                                    type="checkbox" id="status" {{ $category->status == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="status">
                                    Status
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" name="popular" value="{{ $category->popular }}"
                                    type="checkbox" id="Popular" {{ $category->popular == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="Popular">
                                    Popular
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group input-group-outline my-3 is-filled">
                                <input type="file" class="form-control  border border-primary" name="image"
                                    onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="input-group input-group-outline my-3 is-filled">
                                <label class="form-label">Meta Title</label>
                                <input type="text" class="form-control" value="{{ $category->meta_title }}"
                                    name="meta_title" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            @error('meta_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="input-group input-group-outline my-3 is-filled">
                                <label class="form-label">Meta Keyword</label>
                                <input type="text" class="form-control" value="{{ $category->meta_keywords }}"
                                    name="meta_keywords" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            @error('meta_keywords')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="input-group input-group-outline my-3 is-filled">
                                <label class="form-label">Meta Description</label>
                                <input class="form-control" value="{{ $category->meta_describe }}"
                                    name="meta_describe" onfocus="focused(this)" onfocusout="defocused(this)"
                                    style="height: 120px">
                            </div>
                            @error('meta_describe')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="input-group input-group-outline my-3 is-filled">
                                <label class="form-label">Description</label>
                                <input class="form-control" value="{{ $category->description }}" name="description"
                                    onfocus="focused(this)" onfocusout="defocused(this)" style="height: 120px">
                            </div>
                            @error('description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>


@endsection
