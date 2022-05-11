@extends('layouts.front')

@section('title')
    E-Shopping | Checkout
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">
                Home
            </a> / 
            <a href="{{url('checkout')}}">
                Checkout
            </a>
        </h6>
    </div>
</div>

    <div class="container mt-3">
        <form action="{{ url('place-order') }}" method="POST">
            {{ csrf_field() }}
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h6>Basic Details</h6>
                            <hr>
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="first_name">First Name</label>
                                    <input type="text" class="form-control first_name" placeholder="Enter First Name" value="{{ Auth::user()->name }}" name="first_name" id="first_name">
                                    <span id="fname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" class="form-control last_name" placeholder="Enter Last Name" value="{{ Auth::user()->lname }}" name="last_name" id="last_name">
                                    <span id="lname_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control email" placeholder="Enter Email" value="{{ Auth::user()->email }}" name="email" id="email">
                                    <span id="email_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="phone_number">Phone Number</label>
                                    <input type="text" class="form-control phone_number" placeholder="Enter Phone Number" value="{{ Auth::user()->phone }}" name="phone_number" id="phone_number">
                                    <span id="phone_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="address_1">Address 1</label>
                                    <input type="text" class="form-control address_1" placeholder="Enter Address 1" value="{{ Auth::user()->address1 }}" name="address_1" id="address_1">
                                    <span id="address1_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="address_2">Address 2</label>
                                    <input type="text" class="form-control address_2" placeholder="Enter Address 2" value="{{ Auth::user()->address2 }}" name="address_2" id="address_2">
                                    <span id="address2_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="city">City</label>
                                    <input type="text" class="form-control city" placeholder="Enter City" value="{{ Auth::user()->city }}" name="city" id="city">
                                    <span id="city_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="state">State</label>
                                    <input type="text" class="form-control state" placeholder="Enter State" value="{{ Auth::user()->state }}" name="state" id="state">
                                    <span id="state_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="country">Country</label>
                                    <input type="text" class="form-control country" placeholder="Enter Country" value="{{ Auth::user()->country }}" name="country" id="country">
                                    <span id="country_error" class="text-danger"></span>
                                </div>
                                <div class="col-md-6 mt-3">
                                    <label for="pin_code">Pin Code</label>
                                    <input type="text" class="form-control pin_code" placeholder="Enter Pin Code" value="{{ Auth::user()->pincode }}" name="pin_code" id="pin_code">
                                    <span id="pincode_error" class="text-danger"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h6>Order Details</h6>
                            <hr>
                            @if($cartitem->count()>0)
                                <table class="table table-stripped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Qty</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($cartitem as $item)
                                        <tr>
                                            <td>{{ $item->product->name }}</td>
                                            <td>{{ $item->prod_qty }}</td>
                                            <td>Rp. {{ $item->prod_qty * $item->product->selling_price }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <hr>
                                <button type="submit" class="btn btn-success w-100 float-end"><i class="fa fa-truck"></i> Place Order | COD</button>
                                <button type="button" class="btn btn-primary w-100 float-end mt-3 razorpay_btn"><i class="fa fa-money"></i> Pay with Razorpay</button>
                            @else
                                <div class="text-center">
                                    <h4> No Product In Carts</h4>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
@endsection

@section('scripts')

@endsection