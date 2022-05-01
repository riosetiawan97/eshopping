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
            <a href="{{url('order')}}">
                My Order
            </a>
        </h6>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <table class="table table-stripped table-bordered">
                <thead>
                    <tr>
                        <th>Tracking Number</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($order as $item)
                    <tr>
                        <td>{{ $item->tracking_no }}</td>
                        <td>Rp. {{ $item->total_price }}</td>
                        <td>
                            <a href="{{ url('#') }}" class="btn btn-primary float-end"><i class="fa fa-shopping-bag"></i> View</button>    
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div> 
</div>

@endsection

@section('scripts')

@endsection