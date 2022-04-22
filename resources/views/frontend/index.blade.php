@extends('layouts.front')

@section('title')
    E-Shopping
@endsection

@section('content')
    @include('layouts.incfrontend.slider')

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>All Product</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($featured_products as $item)
                        <div class="item">
                            <a href="{{url('category/'.$item->category->slug.'/'.$item->slug)}}">
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
    </div>

    <div class="py-5">
        <div class="container">
            <div class="row">
                <h2>All Categories</h2>
                <div class="owl-carousel featured-carousel owl-theme">
                    @foreach ($trending_category as $category)
                        <div class="item">
                            <a href="{{url('category/'.$item->slug)}}">
                                <div class="card">
                                    <img src="{{ asset('assets/uploads/category/'.$category->image) }}" class="card-img-top" alt="Product Image">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $category->name }}</h5>
                                        <p>
                                            {{ $category->description }}
                                        </p>
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
    </div>
@endsection


@section('scripts')
<script>
    $('.featured-carousel').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
</script>
@endsection