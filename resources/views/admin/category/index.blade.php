@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <h1>Category Page</h1>
        <nav style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Category Master</h4>
                <a class="btn btn-primary" href="{{url('add-categories')}}">
                    <i class="bi bi-plus-circle"></i>
                    <span>Add Category</span>
                </a>
            </div>

            <div class="card-body">
                <!-- Table with stripped rows -->
                <table class="table datatable">
                    <thead>
                        <tr>
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Image</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($category as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <img src="{{ asset('assets/uploads/category/'.$item->image) }}" class="cate-image" alt="Image Here">
                                </td>
                                <td>
                                    <a class="btn btn-warning" href="{{url('edit-categories/'.$item->id)}}"><i class="bi bi-pencil-square"></i> Edit</a>
                                    <a class="btn btn-danger" href="{{url('delete-categories/'.$item->id)}}"><i class="bi bi-trash"></i> Delete</a>
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