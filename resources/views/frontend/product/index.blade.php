@extends('layouts.front')

@section('title')
    E-Shopping | Product {{ $category->name }}
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">Collection / <a href="{{url('category/'.$category->slug)}}">{{ $category->name }}</a></h6>
    </div>
</div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>Product {{ $category->name }}</h2>
                @foreach ($product as $item)
                    <div class="col-md-3 mb-3">
                        <a href="{{url('category/'.$category->slug.'/'.$item->slug)}}">
                            <div class="card">
                                <img src="{{ asset('assets/uploads/product/'.$item->image) }}" class="card-img-top" alt="Product Image">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $item->name }}</h5>
                                    <span class="float-start">{{ $item->selling_price }}</span>
                                    <span class="float-end"><s>{{ $item->original_price }}</s></span>
                                    <br>
                                    <a href="#" class="btn btn-primary">Go somewhere</a>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection

@section('scripts')

@endsection