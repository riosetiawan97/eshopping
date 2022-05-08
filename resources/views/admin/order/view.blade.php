@extends('layouts.admin')

@section('title')
    E-Shopping | Detail Order {{$order->id}}
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Order Page</h1>
        <nav style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Order</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">                
            <div class="card-header text-white bg-primary">
                <h4>Order View
                    <a href="{{url('order')}}" class="btn btn-warning float-end"> Back </a>
                </h4>
            </div>
            <div class="card-body">
                
                <div class="row mt-3">
                    <div class="col-md-6 order-detail">
                        <h4>Shipping Detail</h4>
                        <hr>
                        <label for="first_name">First Name</label>
                        <div class="form-control mb-1">{{ $order->fname }}</div>
                        <label for="first_name">Last Name</label>
                        <div class="form-control mb-1">{{ $order->lname }}</div>
                        <label for="first_name">Email</label>
                        <div class="form-control mb-1">{{ $order->email }}</div>
                        <label for="first_name">Contact No</label>
                        <div class="form-control mb-1">{{ $order->phone }}</div>
                        <label for="first_name">Shipping Address</label>
                        <div class="form-control mb-1">
                            {{ $order->address1 }}, <br>
                            {{ $order->address2 }}, <br>
                            {{ $order->city }}, <br>
                            {{ $order->state }},
                            {{ $order->country }}
                        </div>
                        <label for="first_name">Zip Code</label>
                        <div class="form-control mb-1">{{ $order->pincode }}</div>
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
                        <hr>
                        
                        <div class="mt-5 px-2">
                            <form action="{{url('update-order/'.$order->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <label for="order_status">Order Status</label>
                                <select class="form-select mb-1" name="order_status">
                                    <option {{ $order->status == '0' ? 'selected':'' }} value="0">Pending</option>
                                    <option {{ $order->status == '1' ? 'selected':'' }} value="1">Completed</option>
                                </select>
                                <button type="submit" class="btn btn-primary float-end mt-3"> Update </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection