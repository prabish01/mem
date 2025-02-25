@extends('layouts.frontend')
@section('content')
   <section id="shopPage" class="section-padd">
	<div class="container">
		<div class="row">
		   <h4> Search Results({{$search_results->count()}})</h4>
		   <br>
			<div class="col-md-12">
				<div class="product-grid"> 
					
					<div class="row">
					 @foreach($search_results as $product)
						<div class="col-md-3">
							<div class="product-card">
								 <a href="{{url('product/details', $product->id)}}">
                                    <img class="product-card-img" src="{{ asset('uploads/product'.'/'.$product->image) }}">
                                </a>
								<div class="product-card-txt">
									<div class="product-card-title">
									{{$product->product_name}}
									</div>
									<div class="product-card-price">
										@if(Auth::guest())
										<div class="product-card-price">
										
									   </div>
									   @elseif(auth()->user()->role_id=='2')
										<div class="product-card-price">   
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
									</div>
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
				</div>
			</div>
		</div>
	</div>
</section>
@endsection
