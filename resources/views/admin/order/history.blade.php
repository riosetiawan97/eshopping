@extends('layouts.admin')

@section('title')
    E-Shopping | Order
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Order Page</h1>
        <nav style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item">Order</li>
            <li class="breadcrumb-item active">Order History</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-header text-white bg-primary">
                <h4>Order History
                    <a href="{{url('order')}}" class="btn btn-warning float-end"> New History </a>
                </h4>
            </div>

            <div class="card-body">
                <!-- Table with stripped rows -->
                <table class="table table-stripped table-bordered">
                    <thead>
                        <tr>
                            <th>Order Date</th>
                            <th>Tracking Number</th>
                            <th>Total Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order as $item)
                        <tr>
                            <td>{{ date('d-m-Y', strtotime($item->created_at)) }}</td>
                            <td>{{ $item->tracking_no }}</td>
                            <td>Rp. {{ $item->total_price }}</td>
                            <td>{{ $item->status == '0' ? 'Pending' : 'Completed' }}</td>
                            <td>
                                <a href="{{url('admin/view-order/'.$item->id)}}" class="btn btn-primary float-end"><i class="fa fa-shopping-bag"></i> View</button>    
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
              <!-- End Table with stripped rows -->
            </div>
        </div>
    </section>

@endsection