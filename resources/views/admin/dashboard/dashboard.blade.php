@extends('layouts.admin_layout')

@section('content')

    <div class="row mb-4 p-3 d-flex justify-content-center">
        <div class="col-lg-11 col-md-6 mb-md-0 mb-4 ">
            <div class="card">
                <div class="card-header pb-0">
                    <div class="row">
                        <div class="col-lg-6 col-7">
                            <p class="text-sm mb-0">
                                <i class="fa fa-checks text-info" aria-hidden="true"></i>
                                <a href="{{ route('products.create') }}" class="font-weight-bold btn btn-primary ms-1">New
                                    Products</a>
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
                    dashbaord
                </div>
            </div>
        </div>

    </div>


@endsection
