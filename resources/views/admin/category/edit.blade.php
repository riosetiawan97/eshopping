@extends('layouts.admin')

@section('content')
    <div class="pagetitle">
        <h1>Edit Category Page</h1>
        <nav style="--bs-breadcrumb-divider: '>';">
            <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item">Category</li>
            <li class="breadcrumb-item active">Add Category</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Add Category</h4>                
            </div>

            <div class="card-body">
                <form action="{{url('update-categories/'.$category->id)}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name">Name</label>
                            <input type="text" value="{{ $category->name }}" class="form-control" name="name" id="name">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="slug">Slug</label>
                            <input type="text" value="{{ $category->slug }}" class="form-control" name="slug" id="slug">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="description">Description</label>
                            <textarea name="description" rows="3" class="form-control" id="description">{{ $category->description }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="status">Status</label>
                            <input type="checkbox" {{ $category->status == "1" ? 'checked':'' }} name="status" id="status">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="popular">popular</label>
                            <input type="checkbox" {{ $category->popular == "1" ? 'checked':'' }} name="popular" id="popular">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_title">Meta Title</label>
                            <input type="text" value="{{ $category->meta_title }}" class="form-control" name="meta_title" id="meta_title">
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_description">Meta Description</label>                            
                            <textarea name="meta_description" rows="3" class="form-control" id="meta_description">{{ $category->meta_description }}</textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="meta_keywords">Meta Keywords</label>
                            <textarea name="meta_keywords" rows="3" class="form-control" id="meta_keywords">{{ $category->meta_keywords }}</textarea>
                        </div>
                        @if($category->image)
                            <img src="{{ asset('assets/uploads/category/'.$category->image) }}" class="cate-image" alt="Category Image">
                        @endif
                        <div class="col-md-12 mb-3">
                            <input type="file" class="form-control" name="image">
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