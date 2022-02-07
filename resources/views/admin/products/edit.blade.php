@extends('layouts.admin_layout')

@section('content')

    <div class="row mb-4 p-3 d-flex justify-content-center">
        <div class="col-lg-11 col-md-6 mb-md-0 mb-4 ">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <h6>New Product</h6>
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
                    <form action="{{ route('products.update',['product'=>$product->id]) }}" method="post" class="row g-3 p-4"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="col-md-12">
                            <div class="input-group input-group-outline my-3">
                                <select type="text" class="form-control" value="{{ old('category_id') }}"
                                    name="category_id" onfocus="focused(this)" onfocusout="defocused(this)">
                                    <option value="{{ $product->category->id }}">{{ $product->category->name }}
                                    </option>
                                    @forelse ($categories as $category)
                                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @empty
                                    @endforelse
                                </select>
                            </div>
                            @error('category_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Name</label>
                                <input type="text" class="form-control" value="{{ $product->name }}" name="name"
                                    onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Slug</label>
                                <input type="text" class="form-control" value="{{ $product->slug }}" name="slug"
                                    onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            @error('slug')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Original Price</label>
                                <input type="number" class="form-control" value="{{ $product->original_price }}"
                                    name="original_price" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            @error('original_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Selling Price</label>
                                <input type="number" class="form-control" value="{{ $product->selling_price }}"
                                    name="selling_price" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            @error('selling_price')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Qty</label>
                                <input type="number" class="form-control" value="{{ $product->qty }}" name="qty"
                                    onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            @error('qty')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Text</label>
                                <input type="number" class="form-control" value="{{ $product->tex }}" name="tex"
                                    onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            @error('tex')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Small Decription</label>
                                <input type="text" class="form-control" value="{{ $product->small_description }}"
                                    name="small_description" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            @error('small_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" name="status" value="{{ $category->status }}"
                                    {{ $category->status == 1 ? 'checked' : '' }} type="checkbox" id="status">
                                <label class="form-check-label" for="status">
                                    Status
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" name="trending" value="{{ $category->status }}"
                                    {{ $category->status == 1 ? 'checked' : '' }} type="checkbox" id="trending">
                                <label class="form-check-label" for="trending">
                                    Trending
                                </label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="input-group input-group-outline my-3">
                                <input type="file" class="form-control" name="image" onfocus="focused(this)"
                                    onfocusout="defocused(this)">
                            </div>
                            @error('image')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Meta Title</label>
                                <input type="text" class="form-control" value="{{ $product->meta_title }}"
                                    name="meta_title" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            @error('meta_title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Meta Keyword</label>
                                <input type="text" class="form-control" value="{{ $product->meta_keyword }}"
                                    name="meta_keyword" onfocus="focused(this)" onfocusout="defocused(this)">
                            </div>
                            @error('meta_keyword')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Meta Description</label>
                                <input class="form-control" value="{{ $product->meta_description }}"
                                    name="meta_description" onfocus="focused(this)" onfocusout="defocused(this)"
                                    style="height: 120px">
                            </div>
                            @error('meta_description')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-md-12">
                            <div class="input-group input-group-outline my-3">
                                <label class="form-label">Description</label>
                                <input class="form-control" value="{{ $product->description }}" name="description"
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
