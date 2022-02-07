@extends('layouts.front_layout')
@section('title')
    E-Shop
@endsection
@section('content')

    <nav aria-label="breadcrumb" class="bg-light p-2 mb-2">
        <ol class="breadcrumb">
            <li class="breadcrumb-item">Collection</li>
            <li class="breadcrumb-item">{{ $product->category->name }}</li>
            <li class="breadcrumb-item active" aria-current="page">{{ $product->name }}</li>
        </ol>
    </nav>

    <div class="card shadow-lg p-3 mb-5 bg-body rounded text-left">
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <img class="card-img-top" style="width: 300px" height="300"
                        src="{{ asset("storage/$product->image") }}" alt="">
                </div>
                <div class="col-8">
                    <div class="d-flex  justify-content-between">
                        <h4 class="card-title">{{ $product->name }}</h4>
                        @if ($product->trending == 1)
                            <a class="btn btn-danger text-right">Trending</a>
                        @endif
                    </div>
                    <hr>
                    <div>
                        <label class="d-inline p-2" for="">Original Price: Rs <s>{{ $product->original_price }}</s>
                        </label>
                        <b class="d-inline p-2" for="">Selling Price Rs: <s>{{ $product->selling_price }}</s> </b>
                    </div>
                    <div>
                        <label class="p-2" for=""> {{ $product->small_description }} </label>
                    </div>
                    <hr>
                    <div>
                        @if ($product->qty > 0)
                            <span class="badge bg-success">In Stock</span>
                        @else
                            <span class="badge bg-success">Out of Stock</span>
                        @endif
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-2">
                            <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
                            <label class="ms-4">Quantity</label>
                            <div class="input-group text-center mb-3">
                                <button class="input-group-text btn-decr">-</button>
                                <input type="text" class="form-control qty-txt" value="1" name="qty">
                                <button class="input-group-text btn-incr">+</button>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <br>
                            <button type="button" class="btn btn-success me-3 float-start">Add to Wishlist <i
                                    class="fa fa-heart"></i></button>
                            <button type="button" class="btn btn-primary add-cart me-3 float-start">Add to Cart <i
                                    class="fa fa-shopping-cart"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    @push('scripts')
        <script>
            $('.add-cart').click(function(e) {
                var productId = $('#product_id').val();
                var productQty = $('.qty-txt').val();

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: "POST",
                    url: "/add-cart",
                    data: {
                        'product_id': productId,
                        'product_qty': productQty,
                    },
                    success: function(response) {
                        swal.fire(response.status)
                    }
                });
            });

            $('document').ready(function() {
                $('.btn-decr').click(function() {
                     var qtyTxt = $('.qty-txt').val();
                    var value = parseInt(qtyTxt, 10);
                    value = isNaN(value) ? 0 : value
                    if (value > 0) {
                        value--
                        $('.qty-txt').val(value);
                    }
                });

                $('.btn-incr').click(function() {
                    var qtyTxt = $('.qty-txt').val();
                    var value = parseInt(qtyTxt, 10);
                    value = isNaN(value) ? 0 : value
                    value++
                    $('.qty-txt').val(value);
                });
            });
        </script>
    @endpush


@endsection
