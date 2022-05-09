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
            <a href="{{url('cart')}}">
                Cart
            </a>
        </h6>
    </div>
</div>

    <div class="container my-5">
        <div class="card shadow">
            @if($cartitem->count()>0)
                <div class="card-body">
                    @php 
                        $total_price = 0; 
                        $total_item = 0; 
                    @endphp
                    @foreach ($cartitem as $item)
                        <div class="row product_data">
                            <div class="col-md-1 my-auto">
                                <img src="{{ asset('assets/uploads/product/'.$item->product->image) }}" height="70px" width="70px" alt="Image Here">
                            </div>
                            <div class="col-md-3 my-auto">
                                <h6>{{ $item->product->name }}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <h6>Rp. {{ $item->product->selling_price }}</h6>
                            </div>
                            <div class="col-md-2 my-auto">
                                <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                                @if($item->product->qty >= $item->prod_qty)
                                    <label for="quantity">Quantity</label>
                                    <div class="input-group text-center mb-3" style="width:130px;">
                                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                                        <input type="text" name="quantity" class="form-control qty-input text-center" value="{{ $item->prod_qty }}" />
                                        <button class="input-group-text changeQuantity increment-btn">+</button>
                                    </div>
                                    {{ $item->prod_qty ." ". $item->product->qty ." ". $item->product->qty - $item->prod_qty }}
                                    @php 
                                        $total_price += $item->product->selling_price * $item->prod_qty; 
                                        $total_item = $total_item+1; 
                                    @endphp
                                @else
                                    <h6 class="badge bg-danger">Out of Stock</h6> 
                                @endif
                            </div>
                            <div class="col-md-4">
                                <button class="btn btn-danger delete-cart-item float-end"><i class="fa fa-trash"></i> Remove</button>
                            </div>
                        </div> 
                    @endforeach
                </div>
                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-3 my-auto">
                            
                        </div>
                        <div class="col-md-3 my-auto">
                            <h6 class="float-end">Total Item : {{ $total_item }}</h6>
                        </div>
                        <div class="col-md-3 my-auto">
                            <h6 class="float-end">Total Price : Rp. {{ $total_price }}</h6>
                        </div>
                        <div class="col-md-3 float-end">
                            <a href="{{url('checkout')}}" class="btn btn-outline-success float-end"><i class="fa fa-shopping-bag"></i> Proceed to CheckOut</a>
                        </div>
                    </div> 
                </div>
            @else
                <div class="card-body text-center">
                    <h2> Your <i class="fa fa-shopping-cart"></i> Cart is empty</h2>
                    <a href="{{ url('category') }}" class="btn btn-outline-primary float-end">Continue Shopping</a>
                </div>
            @endif
        </div>
    </div>
@endsection


@section('scripts')

@endsection