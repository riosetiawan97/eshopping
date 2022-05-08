@extends('layouts.front')

@section('title',$product->name)
@section('content')
    <div class="py-3 mb-4 shadow-sm bg-warning border-top">
        <div class="container">
            <h6 class="mb-0">
                <a href="{{url('category')}}">
                    Collection
                </a> / 
                <a href="{{url('category/'.$product->category->slug)}}">
                    {{ $product->category->name }}
                </a> / 
                <a href="{{url('category/'.$product->category->slug.'/'.$product->slug)}}">
                    {{ $product->name }}
                </a>
            </h6>
        </div>
    </div>

    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 border-right">
                        <img src="{{ asset('assets/uploads/product/'.$product->image) }}" class="w-100" alt="Product Image">
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $product->name }}                            
                            @if($product->trending == '1')
                                <label style="font-size: 16px;" class="float-end badge bg-danger trending_tag">Trending</label>
                            @endif
                        </h2>

                        <hr>
                        <label class="me-3">Original Price : <s>Rp. {{ $product->original_price }}</s></label>
                        <label class="fw-bold">Selling Price : Rp. {{ $product->selling_price }}</label>
                        <p class="mt-3">
                            {!! $product->small_description !!}
                        </p>
                        <hr>
                        @if($product->qty > 0)
                            <label class="badge bg-success">In Stock</label> 
                        @else
                            <label class="badge bg-danger">Out of Stock</label> 
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <input type="hidden" value={{ $product->id }} class="prod_id">
                                <label for="Quantity">Quantity</label>
                                <div class="input-group text-center mb-3" style="width:130px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" name="quantity" class="form-control qty-input text-center" value="1" />
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                            <div class="col-md-9">
                                <br/>
                                <button type="submit" class="btn btn-success me-3 addToWishlist float-start"><i class="fa fa-heart"></i> Add to Wishlist</button>                                
                                @if($product->qty > 0)
                                    <button type="submit" class="btn btn-primary me-3 addToCartBtn float-start"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                @endif
                            </div>
                        </div>                        
                    </div>
                    <hr>
                        <h2 class="mb-0">Description</h2>
                        <p class="mt-3">
                            {!! $product->description !!}
                        </p>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')

@endsection