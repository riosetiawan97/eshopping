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
            </a>
        </h6>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card">                
                <div class="card-header text-white bg-primary">
                    <h4>My Order</h4>
                </div>
                <div class="card-body">
                    <table class="table table-stripped table-bordered">
                        <thead>
                            <tr>
                                <th>Tracking Number</th>
                                <th>Total Price</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order as $item)
                            <tr>
                                <td>{{ $item->tracking_no }}</td>
                                <td>Rp. {{ $item->total_price }}</td>
                                <td>{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>
                                <td>
                                    <a href="{{url('view-order/'.$item->id)}}" class="btn btn-primary float-end"><i class="fa fa-shopping-bag"></i> View</button>    
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</div>

@endsection

@section('scripts')

@endsection