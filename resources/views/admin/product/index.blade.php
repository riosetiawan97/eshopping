@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <h1>Product Page</h1>
        <nav style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Product</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Product Master</h4>
                <a class="btn btn-primary" href="{{url('add-product')}}">
                    <i class="bi bi-plus-circle"></i>
                    <span>Add Product</span>
                </a>
            </div>

            <div class="card-body">
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Category</th>
                            <th scope="col">Product Name</th>
                            <th scope="col">Selling Price</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($product as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->category->name }}</td>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->selling_price }}</td>
                                <td>{{ $item->qty }}</td>
                                <td>
                                    <img src="{{ asset('assets/uploads/product/'.$item->image) }}" class="cate-image" alt="Image Here">
                                </td>
                                <td>
                                    <a class="btn btn-warning btn-sm" href="{{url('edit-product/'.$item->id)}}"><i class="bi bi-pencil-square"></i> Edit</a>
                                    <a class="btn btn-danger btn-sm" href="{{url('delete-product/'.$item->id)}}"><i class="bi bi-trash"></i> Delete</a>
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