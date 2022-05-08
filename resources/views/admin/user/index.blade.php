@extends('layouts.admin')

@section('title')
    E-Shopping | User
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Registered User</h1>
        <nav style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Pages</li>
            <li class="breadcrumb-item active">User</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-header text-white bg-primary">
                <h4>List User</h4>
            </div>

            <div class="card-body">
                <!-- Table with stripped rows -->
                <table class="table table-stripped table-bordered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($user as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->name.' '.$item->lname }}</td>
                            <td>{{ $item->email }}</td>
                            <td>{{ $item->phone }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{url('view-user/'.$item->id)}}"><i class="bi bi-arrow-right-circle-fill"></i> View</a>
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