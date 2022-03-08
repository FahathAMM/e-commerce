@extends('layouts.front_layout')
@section('title')
    E-Shop
@endsection
@section('content')
    <nav aria-label="breadcrumb" class="bg-light p-2 mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Collection</li>
            <li class="breadcrumb-item">Carts</li>
            <li class="breadcrumb-item active" aria-current="page">{{ $user->name }} </li>
        </ol>
    </nav>

    <div class="card shadow-lg p-3 my-5 bg-body rounded text-left ">
        <div class="card-body ">
            @php $total = 0; @endphp
            @forelse ($cart as $product)
                <div class="row product-data">
                    <div class="col-3 mt-2">
                        <img class="card-img-top" style="width: 60px" height="60"
                            src="{{ asset("storage/$product->image") }}" alt="">
                    </div>
                    <div class="col-3 mt-2">
                        <label for="">{{ $product->name }}</label>
                        <input type="hidden" class="pro-id" value="{{ $product->id }}">
                    </div>
                    <div class="col-1 mt-2">
                        <label for="">{{ $product->selling_price * $product->pivot->product_qty }}</label>
                    </div>
                    <div class="col-2 mt-1">
                        @if ($product->qty > $product->pivot->product_qty)
                            <div class="input-group text-center mb-3 ">
                                <button class="input-group-text change-qty btn-decr ">-</button>
                                <input type="text" class="form-control qty-txt" value="{{ $product->pivot->product_qty }}"
                                    name="qty">
                                <button class="input-group-text change-qty btn-incr">+</button>
                            </div>
                            @php $total += $product->selling_price *  $product->pivot->product_qty; @endphp
                        @else
                            <span class="badge bg-danger">Out of Stock</span>
                        @endif
                    </div>
                    <div class="col-3 mt-1 text-center">
                        <button class="btn btn-danger  del-product">remove</button>
                    </div>
                    <hr class="m-2">
                </div>
            @empty
            @endforelse
            <div class="card-footer d-flex justify-content-between">
                <h6>Total Price : <b>{{ $total }}</b> </h6>
                <a href="{{ url('checkout') }}" class="btn btn-success">Proceed to Checkout</a>
            </div>
        </div>
    </div>
@endsection
