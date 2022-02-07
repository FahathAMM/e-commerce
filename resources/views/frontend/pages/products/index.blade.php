@extends('layouts.front_layout')
@section('title')
    e-shop
@endsection
@section('content')

    <div class="row">
        <h3 class="mt-3 mb-0 pb-0">Featured Categories</h3>
        @forelse ($CategoryProducts as $CategoryProduct)
            <div class="col-3  py-3">
                <a href="{{ route('frontend.view.product', ['id' => $CategoryProduct->id]) }}">
                    <div class="card" style="width: 20rem;">
                        <img width="200" height="320" src='{{ asset("storage/$CategoryProduct->image") }}'
                            class="card-img-top" alt="...">
                        <div class="card-body">
                            <p class="card-text">
                                {{ $CategoryProduct->name }}
                            </p>
                            <div>
                                <h6 class="float-end">${{ $CategoryProduct->selling_price }}.00</h6>
                                <h6 class="float-start"><s>${{ $CategoryProduct->original_price }}.00</s></h6>
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        @empty
            <p>not found </p>
        @endforelse
    </div>

@endsection
