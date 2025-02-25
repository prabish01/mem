@extends('layouts.frontend')
@section('content')
        <!-- Start Product Details Area -->
        <div class="content-body">
            <section id="singleProduct" class="section-padd">
                 <div class="container">
                     <div class="row">
                         <div class="col-md-6">
                             <img class="single-product-img" src="{{ asset('uploads/product/'.$product->image) }}">
                         </div>
                         <div class="col-md-6">
                             <h4 class="single-product-title">{{$product->product_name}}</h4>
                              @if(Auth::guest())
                              <div class="single-product-price">
                              </div>
                              @elseif(auth()->user()->role_id=='2')
                                <div class="single-product-price">
                                @if ($product->mrp > $product->dealer_price)
                                <div class="row">
                                <del> NPR.{{ $product->mrp }} </del>
                                <div class="text-success pl-2">NPR. {{ $product->dealer_price }}</div>
                                </div>
                                @else
                                NPR. {{ $product->dealer_price }}
                                @endif
                              </div>
                              @else
                               <div class="single-product-price">
                                @if ($product->mrp > $product->retailer_price)
                                <div class="row">
                                <del> NPR.{{ $product->mrp }} </del>
                                <div class="text-success pl-2">NPR. {{ $product->retailer_price }}</div>
                                </div>
                                @else
                                NPR. {{ $product->retailer_price }}
                                @endif
                              </div>
                              @endif
                             <div class="product-desc-div">
                                 <div class="single-product-label">
                                     Category:
                                 </div>
                                 <div class="single-product-value">
                                     @isset($product->category_id)
                                     {{$product->parentCategory->category_name}}
                                      @endisset
                                    
                                 </div>
                             </div>
                             <div class="product-desc-div">
                                 <div class="single-product-label">
                                     Sub Category:
                                 </div>
                                 <div class="single-product-value">
                                    @isset($product->subcategory_id)
                                     {{$product->parentSubCategory->subcategory_name}}
                                      @endisset
                                 </div>
                             </div>
                             <div class="product-desc-div">
                                 <div class="single-product-label">
                                     In Stock:
                                 </div>
                                 <div class="single-product-value">
                                @if ($product->in_stock > 0)
                                    <div class="text-bold text-success"> IN STOCK </div>
                                @else
                                    <div class="text-bold text-danger"> OUT OF STOCK </div>
                                @endif
                                 </div>
                             </div>
                             <div class="product-desc-div">
                                 <div class="single-product-label">
                                     Description
                                 </div>
                                 <div class="single-product-value">
                                     {!! $product->description !!}
                                 </div>
                             </div>
                              @if(Auth::guest()) 
                             @else
                              <form class="form-horizontal" method="post" action="{{url('cart/add', $product->id)}}" >
                                 {{csrf_field()}}
                                 <div class="single-p-qty">
                                     Quantity: <input type="number" value="1" min="1" max="{{$product->in_stock}}" name="qty" required>
                                 </div>
                                 <div class="single-p-btns">
                                     <button class="single-p-add">Add to Cart</button>
                                     <a href="" class="buy-now-btn">Buy Now</a>
                                 </div>
                             </form>
                             @endif
                         </div>
                     </div>
                 </div>
             </section> 

        </div>
        <!-- End Product Details Area -->
@endsection
