@extends('layouts.frontend')
@section('content')
<section class="py-8">
	<div class="container mx-auto px-4">
		<!-- Breadcrumb -->
		<div class="bg-gray-100 py-3 px-4 rounded-md mb-6">
			<div class="flex items-center text-sm">
				<a href="{{ url('/') }}" class="text-[#eab22c] hover:text-[#d4a429]">Home</a>
				<span class="mx-2 text-gray-400">/</span>
				<span class="text-gray-600">Search Results</span>
			</div>
		</div>

		<!-- Title Section -->
		<div class="flex justify-between items-center mb-8">
			<h1 class="text-2xl md:text-3xl font-bold text-gray-800 uppercase">
				SEARCH RESULTS
			</h1>
			<span class="text-[#eab22c] font-medium">
				({{ $search_results->count() }} items found)
			</span>
		</div>

		@if($search_results->count() > 0)
		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
			@foreach($search_results as $product)
			<div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 flex flex-col h-[450px]">
				<a href="{{ url('product/details', $product->slug) }}" class="block h-64 relative overflow-hidden group">
					<div class="absolute inset-0 bg-black/5 group-hover:bg-black/10 transition-colors duration-300"></div>
					<img src="{{ asset('uploads/product'.'/'.$product->image) }}"
						class="w-full h-full object-contain p-6 group-hover:scale-105 transition-transform duration-500"
						alt="{{ $product->product_name }}">
				</a>

				<div class="p-6 flex flex-col flex-grow border-t border-gray-100">
					<div class="flex-grow">
						<h3 class="text-lg font-medium text-gray-900 mb-2 line-clamp-2">
							{{ $product->product_name }}
						</h3>

						<div class="space-y-1 mb-4">
							<div class="flex items-center text-sm text-gray-500">
								<i class="fas fa-check-circle text-[#eab22c] mr-2"></i>
								<span>Premium Quality</span>
							</div>
							<div class="flex items-center text-sm text-gray-500">
								<i class="fas fa-truck text-[#eab22c] mr-2"></i>
								<span>Fast Delivery</span>
							</div>
						</div>
					</div>

					<div class="mt-auto">
						@if(Auth::guest())
						<p class="text-sm text-gray-500 italic mb-4">
							<i class="fas fa-lock text-[#eab22c] mr-2"></i>
							Login to view prices
						</p>
						@else
						@if(auth()->user()->role_id == '2')
						<div class="mb-4">
							@if ($product->mrp > $product->dealer_price)
							<span class="text-gray-400 line-through text-sm block">
								NPR {{ number_format($product->mrp) }}
							</span>
							<span class="text-2xl font-bold text-[#eab22c]">
								NPR {{ number_format($product->dealer_price) }}
							</span>
							@else
							<span class="text-2xl font-bold text-[#eab22c]">
								NPR {{ number_format($product->dealer_price) }}
							</span>
							@endif
						</div>
						@else
						<div class="mb-4">
							@if ($product->mrp > $product->retailer_price)
							<span class="text-gray-400 line-through text-sm block">
								NPR {{ number_format($product->mrp) }}
							</span>
							<span class="text-2xl font-bold text-[#eab22c]">
								NPR {{ number_format($product->retailer_price) }}
							</span>
							@else
							<span class="text-2xl font-bold text-[#eab22c]">
								NPR {{ number_format($product->retailer_price) }}
							</span>
							@endif
						</div>
						@endif
						@endif

						<a href="{{ url('product/details', $product->slug) }}"
							class="w-full inline-flex items-center justify-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-md text-white bg-[#eab22c] hover:bg-[#d4a429] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#eab22c] transition-colors duration-300">
							<i class="far fa-eye mr-2"></i>
							View Details
						</a>
					</div>
				</div>
			</div>
			@endforeach
		</div>
		@else
		<div class="text-center py-12">
			<div class="bg-blue-50 text-blue-800 px-4 py-3 rounded-lg inline-block">
				No products found matching your search criteria.
			</div>
		</div>
		@endif
	</div>
</section>

@push('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
@endpush
@endsection