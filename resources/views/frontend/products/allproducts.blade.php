@if($products->count() > 0)
    <div class="col-md-12 p-5">
    <div class="product-grid">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-3">
                <div class="product-card">
                    <a href="{{url('product/details', $product->id)}}">
                        <img src="{{ asset('uploads/product'.'/'.$product->image) }}" class="product-card-img">
                    </a>

                    <div class="product-card-txt">
                        <div class="product-card-title">
                            {{$product->product_name}}
                        </div>
                      <!--  <div class="product-card-price">
                           NRS.{{$product->UserRole_Price()}}
                        </div> -->
                        @if(Auth::guest())
                         <div class="product-card-price">
                         
                        </div>
                        @elseif(auth()->user()->role_id=='2')
                        <div class="product-card-price text-success">   
                            @if ($product->mrp > $product->dealer_price) 
                            <strike class="text-dark"  > NPR.{{ $product->mrp }} </strike> NPR. {{ $product->dealer_price }}   
                            @else
                            <div class="text-dark"> NPR. {{ $product->dealer_price }}</div>
                            @endif 
                        </div>
                        @else
                         <div class="product-card-price text-success"> 
                            @if ($product->mrp > $product->retailer_price) 
                            <strike class="text-dark"  > NPR.{{ $product->mrp }} </strike> NPR. {{ $product->retailer_price }}   
                            @else
                            <div class="text-dark"> NPR. {{ $product->retailer_price }}</div>
                            @endif 
                        </div> 
                        @endif
                        <div class="product-card-btn">
                            <a href="{{url('product/details', $product->id)}}">
                            <button class="add-to-cart-btn">View More</button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
             @endforeach
        </div>
        <div class="text-center">
            {{$products->links()}}
        </div>
    </div>
    @else
        <h2 class="align-content-center"> No Product Found.</h2>
</div>
@endif
