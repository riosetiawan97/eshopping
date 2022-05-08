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
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header text-white bg-primary">
                            <h4>User Detail
                                <a href="{{url('user')}}" class="btn btn-warning btn-sm float-end"> Back </a>
                            </h4>
                        </div>

                        <div class="card-body">                            
                            <div class="row">
                                <div class="col-md-4 mt-3">
                                    <label for="">Role</label>
                                    <div class="form-control mb-1">{{ $user->role_as == '0' ? 'User' : 'Admin' }}</div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">First Name</label>
                                    <div class="form-control mb-1">{{ $user->name }}</div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Last Name</label>
                                    <div class="form-control mb-1">{{ $user->lname }}</div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Email</label>
                                    <div class="form-control mb-1">{{ $user->email }}</div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Phone</label>
                                    <div class="form-control mb-1">{{ $user->phone }}</div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Address 1</label>
                                    <div class="form-control mb-1">{{ $user->address1 }}</div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Address 2</label>
                                    <div class="form-control mb-1">{{ $user->address2 }}</div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">City</label>
                                    <div class="form-control mb-1">{{ $user->city }}</div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">State</label>
                                    <div class="form-control mb-1">{{ $user->state }}</div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Country</label>
                                    <div class="form-control mb-1">{{ $user->country }}</div>
                                </div>
                                <div class="col-md-4 mt-3">
                                    <label for="">Pin Code</label>
                                    <div class="form-control mb-1">{{ $user->pincode }}</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection