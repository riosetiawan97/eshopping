@extends('layouts.front')

@section('title')
    E-Shopping | My Cart
@endsection

@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div class="container">
        <h6 class="mb-0">
            <a href="{{url('/')}}">
                Home
            </a> / 
            <a href="{{url('wishlist')}}">
                Wishlist
            </a>
        </h6>
    </div>
</div>

    <div class="container my-5">
        <div class="card shadow wishlistitem">
            @if($wishlist->count()>0)
                <div class="card-body">
                    @php 
                        $total_price = 0; 
                        $total_item = 0; 
                    @endphp
                    @foreach ($wishlist as $item)
                        <div class="row product_data">
                            <div class="col-md-1 my-auto">
                                <img src="{{ asset('assets/uploads/product/'.$item->product->image) }}" height="70px" width="70px" alt="Image Here">
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>{{ $item->product->name }}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>Rp. {{ $item->product->selling_price }}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                @if($item->product->qty >= $item->prod_qty)
                                    <label for="Quantity">Quantity</label>
                                    <div class="input-group text-center mb-3" style="width:130px;">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" name="quantity" class="form-control qty-input text-center" value="1" />
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>
                                @else
                                    <h6 class="badge bg-danger">Out of Stock</h6> 
                                @endif
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-success addToCartBtn float-end"><i class="fa fa-shopping-cart"></i> Add to Cart</button>
                            </div>
                            <div class="col-md-2 my-auto">
                                <button class="btn btn-danger remove-wishlist-item float-end"><i class="fa fa-trash"></i> Remove</button>
                            </div>
                        </div> 
                    @endforeach
                </div>
            @else
                <div class="card-body text-center">
                    <h2><i class="fa fa-shopping-cart"></i> There are no products in Your Wishlists</h2>
                    <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">Continue Shopping</a>
                </div>
            @endif
        </div>
    </div>
@endsection


@section('scripts')

@endsection