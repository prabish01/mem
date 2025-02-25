@extends('layouts.frontend')
@section('content') 
    <div class="content-body">
  

        <section id="shopSection" class="section-padd">
            <div class="container">
                <div class="shop-grid">
                    @foreach ($allfeatured as $feature)
                        <div class="product-card">
                            <a href="{{ url('product/details', $feature->id) }}">
                                <img src="{{ asset('uploads/product/' . $feature->image) }}">
                            </a>
                            <div class="product-card-txt">
                                <div class="product-card-title">
                                    {{ $feature->product_name }}
                                </div>
                                <div class="product-card-price">
                                    <strike>MRP. {{ $feature->mrp }}</strike>
                                    RS. {{ $feature->UserRole_price() }}
                                </div>
                            </div>
                            <button href="{{ url('product/details', $feature->id) }}" title="Add to Cart"
                                class="add-to-cart-wrap">
                                <i class="fa fa-shopping-cart"></i>
                            </button>
                        </div>
                        
                        <div class="text-center mt-4">
                            {{ $allfeatured->links() }}
                        </div>
                    @endforeach
                </div>
            </div>
        </section> 
    </div>
@endsection
