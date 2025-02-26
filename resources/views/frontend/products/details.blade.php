@extends('layouts.frontend')
@section('content')
<div class="min-h-screen bg-gray-50">
    <!-- Breadcrumb -->
    <div class="bg-white border-b">
        <div class="max-w-6xl mx-auto px-4 py-3">
            <nav class="flex" aria-label="Breadcrumb">
                <ol class="inline-flex items-center space-x-1 text-sm">
                    <li>
                        <a href="/" class="text-gray-600 hover:text-gray-900">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                            </svg>
                        </a>
                    </li>
                    @isset($product->category_id)
                    <li class="flex items-center">
                        <svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" />
                        </svg>
                        <a href="#" class="text-gray-600 hover:text-gray-900">{{$product->parentCategory->category_name}}</a>
                    </li>
                    @endisset
                </ol>
            </nav>
        </div>
    </div>

    <main class="max-w-6xl mx-auto px-4 py-8">
        <div class="bg-white rounded-lg shadow-sm overflow-hidden">
            <div class="md:flex">
                <!-- Left Column - Product Image -->
                <div class="md:w-[450px] p-6 bg-gray-50 flex items-center justify-center">
                    <div class="relative w-full h-[350px]">
                        <img src="{{ asset('uploads/product/'.$product->image) }}"
                            alt="{{$product->product_name}}"
                            class="w-full h-full object-contain">
                        @if ($product->in_stock <= 0)
                            <div class="absolute top-0 right-0 m-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                Out of Stock
                            </span>
                    </div>
                    @endif
                </div>
            </div>

            <!-- Right Column - Product Details -->
            <div class="flex-1 p-6 md:border-l">
                <div class="space-y-6">
                    <!-- Header Section -->
                    <div class="border-b pb-6">
                        <h1 class="text-2xl font-bold text-gray-900 mb-2">{{$product->product_name}}</h1>
                        <div class="flex items-center space-x-4">
                            @if ($product->in_stock > 0)
                            <span class="inline-flex items-center text-sm text-green-600">
                                <span class="w-2 h-2 rounded-full bg-green-500 mr-2"></span>
                                In Stock
                            </span>
                            <span class="text-sm text-gray-500">({{$product->in_stock}} units available)</span>
                            @endif
                        </div>
                    </div>

                    <!-- Price Section -->
                    <div class="space-y-4">
                        @if(Auth::guest())
                        <a href="{{ route('login') }}"
                            class="inline-flex items-center px-4 py-2 border border-indigo-600 text-indigo-600 rounded-md hover:bg-indigo-50 transition-colors">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                            </svg>
                            Sign in to view price
                        </a>
                        @else
                        @php
                        $price = auth()->user()->role_id == '2' ? $product->dealer_price : $product->retailer_price;
                        @endphp
                        <div>
                            <div class="flex items-baseline space-x-3">
                                <span class="text-3xl font-bold text-gray-900">NPR {{ number_format($price) }}</span>
                                @if ($product->mrp > $price)
                                <span class="text-lg text-gray-500 line-through">NPR {{ number_format($product->mrp) }}</span>
                                <span class="bg-green-100 text-green-800 text-sm px-2 py-0.5 rounded-full">
                                    Save {{ round((($product->mrp - $price) / $product->mrp) * 100) }}%
                                </span>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>

                    <!-- Product Details -->
                    <div class="grid grid-cols-2 gap-4 py-6 text-sm">
                        <div>
                            <span class="text-gray-500">Category</span>
                            <p class="mt-1 font-medium text-gray-900">{{$product->parentCategory->category_name}}</p>
                        </div>
                        @isset($product->subcategory_id)
                        <div>
                            <span class="text-gray-500">Sub Category</span>
                            <p class="mt-1 font-medium text-gray-900">{{$product->parentSubCategory->subcategory_name}}</p>
                        </div>
                        @endisset
                    </div>

                    <!-- Description -->
                    <div class="py-6 border-t">
                        <h3 class="text-sm font-medium text-gray-900 uppercase tracking-wide mb-4">Product Description</h3>
                        <div class="prose prose-sm text-gray-600">
                            {!! $product->description !!}
                        </div>
                    </div>

                    <!-- Add to Cart Form -->
                    @if(!Auth::guest() && $product->in_stock > 0)
                    <form method="post" action="{{url('cart/add', $product->id)}}" class="pt-6 border-t">
                        {{csrf_field()}}
                        <div class="flex items-end space-x-4 mb-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Quantity</label>
                                <input type="number"
                                    name="qty"
                                    class="w-20 rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 sm:text-sm"
                                    value="1"
                                    min="1"
                                    max="{{$product->in_stock}}"
                                    required>
                            </div>
                            <span class="text-sm text-gray-500">
                                Maximum: {{$product->in_stock}} units
                            </span>
                        </div>

                        <div class="flex space-x-4">
                            <button type="submit"
                                class="flex-1 bg-indigo-600 text-white px-6 py-3 rounded-lg text-sm font-semibold hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                                Add to Cart
                            </button>
                            <button type="button"
                                class="flex-1 bg-gray-900 text-white px-6 py-3 rounded-lg text-sm font-semibold hover:bg-gray-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 transition-colors">
                                Buy Now
                            </button>
                        </div>
                    </form>
                    @endif
                </div>
            </div>
        </div>
</div>
</main>
</div>
@endsection