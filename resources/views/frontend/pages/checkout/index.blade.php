@extends('layouts.front_layout')
@section('title')
    Checkout
@endsection
@section('content')
    <div class="card bg-body rounded text-left mt-3">
        <div class="card-body">
            {{-- @dd($user) --}}
            <form action="{{ url('place-order') }}" method="POST">
                @csrf
                <input type="hidden" id="total" name="total">
                <div class="row">
                    <div class="col-md-7  p-2 col-12">
                        <h6>Basic Details</h6>
                        <hr>
                        <div class="container py-2 border">
                            <div class="row g-2">
                                <div class="col-6">
                                    <div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">
                                                <i class="text-danger">*</i> First Name</label>
                                            <input type="text" class="form-control" value="{{ $user->first_name }}"
                                                name="first_name" id="first_name" placeholder="First Name">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            <i class="text-danger">*</i> Last Name</label>
                                        <input type="text" class="form-control" value="{{ $user->last_name }}"
                                            name="last_name" id="last_name" placeholder="Last Name ">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            <i class="text-danger">*</i> Email</label>
                                        <input type="text" class="form-control" value="{{ $user->email }}" name="email"
                                            id="email" placeholder="Email" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            <i class="text-danger">*</i> Mobile Number</label>
                                        <input type="text" class="form-control" value="{{ $user->mobile }}"
                                            name="mobile" id="mobile" placeholder="Mobile Number ">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">
                                                <i class="text-danger">*</i> Address 1</label>
                                            <input type="text" class="form-control" value="{{ $user->address_one }}"
                                                name="address_one" id="address_one" placeholder=" Address 1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">Address 2</label>
                                        <input type="text" class="form-control" value="{{ $user->address_two }}"
                                            name="address_two" id="address_two" placeholder=" Address 2">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            <i class="text-danger">*</i> City</label>
                                        <input type="text" class="form-control" value="{{ $user->city }}" name="city"
                                            id="city" placeholder="City ">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            <i class="text-danger">*</i> District</label>
                                        <input type="text" class="form-control" value="{{ $user->district }}"
                                            name="district" id="district" placeholder="district ">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div>
                                        <div class="mb-3">
                                            <label for="exampleFormControlInput1" class="form-label">
                                                <i class="text-danger">*</i> Country</label>
                                            <input type="text" class="form-control" value="{{ $user->country }}"
                                                name="country" id="country" placeholder="Country ">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="exampleFormControlInput1" class="form-label">
                                            <i class="text-danger">*</i> Pin Code</label>
                                        <input type="text" class="form-control" value="{{ $user->pin_code }}"
                                            name="pin_code" id="pin_code" placeholder="Pin Code ">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 p-2 col-md-5">
                        <h6>Order Details</h6>
                        <hr>
                        <table class="table p-2 border table-striped">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $total = 0; @endphp
                                @forelse ($cartItems as $item)
                                    @if ($item->qty > $item->pivot->product_qty)
                                        <tr>
                                            <td style="text-transform: uppercase">{{ $item->name }}</td>
                                            <td>{{ $item->selling_price }}</td>
                                            <td>{{ $item->pivot->product_qty }}</td>
                                            <td>{{ $item->pivot->product_qty * $item->selling_price }}</td>
                                            @php
                                                $total += $item->pivot->product_qty * $item->selling_price;
                                            @endphp
                                        </tr>
                                    @endif
                                @empty
                                @endforelse
                                <tr>
                                    <td><strong>Total</strong></td>
                                    <td></td>
                                    <td><input type="hidden" value="{{ $total }}" id="tot"></td>
                                    <td><strong>{{ $total }}</strong></td>
                                </tr>
                            </tbody>
                        </table>
                        <hr>
                        <div class="text-end">
                            @if ($cartItems->toArray() == [])
                                <button disabled type="submit" class="btn btn-success ">Place Order</button>
                            @else
                                <button type="submit" class="btn btn-success ">Place Order sdsd</button>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @push('scripts')
        <script>
            $(document).ready(function() {
                var tot = $('#tot').val();
                $('#total').val(tot)
            });
        </script>
    @endpush
@endsection
