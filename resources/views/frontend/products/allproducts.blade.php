@if($products->count() > 0)
<div class="col-md-12 py-6 px-4">
    <div class="product-grid">
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($products as $product)
            <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 hover:-translate-y-0.5 flex flex-col h-full">
                <div class="relative h-64 overflow-hidden group">
                    <a href="{{url('product/details', $product->slug)}}">
                        <img src="{{ asset('uploads/product'.'/'.$product->image) }}"
                            class="w-full h-full object-contain p-6 group-hover:scale-105 transition-transform duration-500">
                        <div class="absolute inset-0 bg-black/5 group-hover:bg-black/10 transition-colors duration-300"></div>
                    </a>
                </div>

                <div class="p-6 flex flex-col flex-grow border-t border-gray-100">
                    <div class="flex-grow">
                        <h3 class="text-lg font-medium text-gray-900 mb-2 line-clamp-2">
                            {{$product->product_name}}
                        </h3>

                        <!-- <div class="space-y-1 mb-4">
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-check-circle text-[#eab22c] mr-2"></i>
                                <span>Premium Quality</span>
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <i class="fas fa-truck text-[#eab22c] mr-2"></i>
                                <span>Fast Delivery</span>
                            </div>
                        </div> -->
                    </div>

                    <div class="mt-auto">
                        @if(Auth::guest())
                        <p class="text-sm text-gray-500 italic mb-4">
                            <i class="fas fa-lock text-[#eab22c] mr-2"></i>
                            Login to view prices
                        </p>
                        @elseif(auth()->user()->role_id=='2')
                        <div class="mb-4">
                            @if ($product->mrp > $product->dealer_price)
                            <span class="text-gray-400 line-through text-sm block">
                                NPR {{ number_format($product->mrp) }}
                            </span>
                            <span class="text-2xl font-bold text-[#eab22c]">
                                NPR {{ number_format($product->dealer_price) }}
                            </span>
                            @else
                            <span class="text-2xl font-bold text-gray-900">
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
                            <span class="text-2xl font-bold text-gray-900">
                                NPR {{ number_format($product->retailer_price) }}
                            </span>
                            @endif
                        </div>
                        @endif

                        <a href="{{url('product/details', $product->slug)}}"
                            class="w-full inline-flex items-center justify-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-md text-white bg-[#eab22c] hover:bg-[#d4a429] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#eab22c] transition-colors duration-300">
                            <i class="far fa-eye mr-2"></i>
                            View Details
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        <div class="mt-12">
            @if ($products->hasPages())
            <nav class="flex justify-center" aria-label="Pagination">
                <div class="inline-flex items-center rounded-lg shadow-sm bg-white/50 backdrop-blur-sm p-1">
                    {{-- Previous Page Link --}}
                    @if ($products->onFirstPage())
                    <span class="relative inline-flex items-center px-3 py-2 text-gray-400 cursor-not-allowed transition-all duration-200 rounded-l-md">
                        <i class="fas fa-chevron-left text-sm"></i>
                    </span>
                    @else
                    <a href="{{ $products->previousPageUrl() }}"
                        class="relative inline-flex items-center px-3 py-2 text-gray-700 transition-all duration-200 hover:text-[#eab22c] rounded-l-md hover:bg-[#eab22c]/10">
                        <i class="fas fa-chevron-left text-sm"></i>
                    </a>
                    @endif

                    {{-- Pagination Elements --}}
                    <div class="hidden sm:flex">
                        @foreach ($products->getUrlRange(1, $products->lastPage()) as $page => $url)
                        @if ($page == $products->currentPage())
                        <span class="relative inline-flex items-center px-4 py-2 mx-1 text-sm font-semibold text-white bg-[#eab22c] rounded-md shadow-sm transform scale-105 transition-all duration-200">
                            {{ $page }}
                        </span>
                        @else
                        <a href="{{ $url }}"
                            class="relative inline-flex items-center px-4 py-2 mx-1 text-sm text-gray-700 rounded-md transition-all duration-200 hover:bg-[#eab22c]/10 hover:text-[#eab22c]">
                            {{ $page }}
                        </a>
                        @endif
                        @endforeach
                    </div>

                    {{-- Mobile Pagination Info --}}
                    <span class="sm:hidden px-4 py-2 text-sm text-gray-700">
                        Page {{ $products->currentPage() }} of {{ $products->lastPage() }}
                    </span>

                    {{-- Next Page Link --}}
                    @if ($products->hasMorePages())
                    <a href="{{ $products->nextPageUrl() }}"
                        class="relative inline-flex items-center px-3 py-2 text-gray-700 transition-all duration-200 hover:text-[#eab22c] rounded-r-md hover:bg-[#eab22c]/10">
                        <i class="fas fa-chevron-right text-sm"></i>
                    </a>
                    @else
                    <span class="relative inline-flex items-center px-3 py-2 text-gray-400 cursor-not-allowed transition-all duration-200 rounded-r-md">
                        <i class="fas fa-chevron-right text-sm"></i>
                    </span>
                    @endif
                </div>
            </nav>
            @endif
        </div>
    </div>
</div>
@else
<div class="text-center py-16">
    <i class="fas fa-box-open text-gray-400 text-5xl mb-4"></i>
    <h3 class="text-gray-500 text-xl font-medium">No Products Found</h3>
</div>
@endif