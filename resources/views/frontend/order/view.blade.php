@extends('layouts.front')

@section('title')
    E-Shopping | My Order
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">
                Home
            </a> / 
            <a href="{{url('my-order')}}">
                My Order
            </a> / 
            <a href="{{url('view-order/'.$order->id)}}">
                {{$order->id}}
            </a>
        </h6>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">                
                <div class="card-header text-white bg-primary">
                    <h4>Order View
                        <a href="{{url('my-order')}}" class="btn btn-warning float-end"> Back </a>
                    </h4>
                </div>
                <div class="card-body">
                    
                    <div class="row">
                        <div class="col-md-6 order-detail">
                            <h4>Shipping Detail</h4>
                            <hr>
                            <label for="first_name">First Name</label>
                            <div class="border">{{ $order->fname }}</div>
                            <label for="first_name">Last Name</label>
                            <div class="border">{{ $order->lname }}</div>
                            <label for="first_name">Email</label>
                            <div class="border">{{ $order->email }}</div>
                            <label for="first_name">Contact No</label>
                            <div class="border">{{ $order->phone }}</div>
                            <label for="first_name">Shipping Address</label>
                            <div class="border">
                                {{ $order->address1 }}, <br>
                                {{ $order->address2 }}, <br>
                                {{ $order->city }}, <br>
                                {{ $order->state }},
                                {{ $order->country }}
                            </div>
                            <label for="first_name">Zip Code</label>
                            <div class="border">{{ $order->pincode }}</div>
                        </div>
                        <div class="col-md-6">
                            <h4>Order Detail</h4>
                            <hr>
                            <table class="table table-stripped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Qty</th>
                                        <th>Total Price</th>
                                        <th>Image</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($order->orderitem as $item)
                                    <tr>
                                        <td>{{ $item->product->name }}</td>
                                        <td>{{ $item->prod_qty }}</td>
                                        <td>Rp. {{ $item->prod_qty * $item->prod_price }}</td>
                                        <td>
                                            <img src="{{ asset('assets/uploads/product/'.$item->product->image) }}" height="70px" width="70px" alt="Image Here">
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <h4 class="px-2">Total Price : <span class="float-end">Rp. {{ $order->total_price }}</span></h4>
                            <h6 class="px-2">Payment Mode : {{ $order->payment_mode }}</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> 
</div>

@endsection

@section('scripts')

@endsection