@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <h1>Add Product Page</h1>
        <nav style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Product</li>
            <li class="breadcrumb-item active">Add Product</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Product</h4>                
            </div>

            <div class="card-body">
                <form action="{{url('insert-product')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="cate_id">Category</label>
                            <select class="form-select" name="cate_id" aria-label="Default select example" id="cate_id">
                                <option value="">Select a Category</option>
                                @foreach ($category as $item)                                    
                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="slug">Slug</label>
                            <input type="text" class="form-control" name="slug" id="slug">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="small_description">Small Description</label>
                            <textarea name="small_description" rows="3" class="form-control" id="small_description"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" rows="3" class="form-control" id="description"></textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="original_price">Original Price</label>
                            <input type="number" class="form-control" name="original_price" id="original_price">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="selling_price">Selling Price</label>
                            <input type="number" class="form-control" name="selling_price" id="selling_price">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="qty">Quantity</label>
                            <input type="number" class="form-control" name="qty" id="qty">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="tax">Tax</label>                            
                            <input type="number" class="form-control" name="tax" id="tax">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label>
                            <input type="checkbox" name="status" id="status">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="trending">popular</label>
                            <input type="checkbox" name="trending" id="trending">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" class="form-control" name="meta_title" id="meta_title">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_description">Meta Description</label>                            
                            <textarea name="meta_description" rows="3" class="form-control" id="meta_description"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_keywords">Meta Keywords</label>
                            <textarea name="meta_keywords" rows="3" class="form-control" id="meta_keywords"></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="image">Image</label>
                            <input type="file" class="form-control" name="image" id="image">
                        </div>
                        <div class="col-md-12">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection