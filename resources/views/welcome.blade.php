@extends('layouts.frontend')

@section('title')
Manokamana Earthmovers - Premium Construction Equipment & Parts in Nepal
@endsection

@section('meta_description')
Discover premium construction equipment, earthmoving machinery, and industrial parts at Manokamana Earthmovers. We offer high-quality products with excellent service and nationwide delivery across Nepal.
@endsection

@section('meta_keywords')
construction equipment Nepal, earthmoving machinery, industrial parts, construction supplies, Manokamana Earthmovers, heavy equipment dealer
@endsection

@section('og_title')
Manokamana Earthmovers - Your Trusted Partner in Construction Equipment
@endsection

@section('og_description')
Leading supplier of premium construction equipment, parts, and machinery in Nepal. Explore our wide range of products with excellent after-sales support.
@endsection

@section('content')
<div class="content-body min-h-screen bg-gray-50 md:bg-white">
    <!-- Mobile Header - Only show on mobile -->
    <header class="md:hidden fixed top-0 left-0 right-0 h-16 bg-white shadow-sm z-50 flex items-center px-4">
        <div class="flex items-center justify-between w-full">
            <img src="{{ asset('path/to/logo.png') }}" alt="Logo" class="h-8">
            <div class="flex items-center gap-4">
                <button class="p-2 hover:bg-gray-100 rounded-full">
                    <i class="fas fa-search text-gray-600"></i>
                </button>
                <button class="p-2 hover:bg-gray-100 rounded-full">
                    <i class="fas fa-shopping-cart text-gray-600"></i>
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content - Add padding for mobile header and nav -->
    <main class="pb-20">
        <section id="homeSliderSection">
            <div class="container">
                <div class="row">
                    <div class="col-md-8 order-md-1">
                        <div class="owl-carousel owl-theme" id="homeSlider">
                            @php $i= 0; @endphp
                            @foreach($sliders as $slider)
                            <div class="item {{ $i == 0 ? 'active' : '' }}">
                                <img src="{{asset('uploads/slider'.'/'.$slider->image)}}" alt="Manokamana Earthmovers - Construction Equipment Slider Image {{$i + 1}}">
                            </div>
                            @php $i++; @endphp
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div id="wrapper">
            {{-- <img id="warpbg" class="parallax left top" src="{{ asset('assets/js/parallaxjs/memicons/background.jpg') }}"> --}}
            <img id="warpbg" class="parallax left top" src="" alt="Manokamana Earthmovers Construction Equipment Background">
            <a href="{{ route('getprods', 'product-1') }}"> <img id="star4" class="parallax left top"
                    src="{{ asset('assets/js/parallaxjs/memicons/123-03.png') }}" alt="Construction Equipment Product 1"></a>
            <a href="{{ route('getprods', 'product-2') }}"> <img id="star5" class="parallax left"
                    src="{{ asset('assets/js/parallaxjs/memicons/crane.png') }}" alt="Heavy Duty Crane Equipment"></a>
            <a href="{{ route('getprods', 'product-3') }}"> <img id="planet" class="parallax left top"
                    src="{{ asset('assets/js/parallaxjs/memicons/undercarriage.png') }}" alt="Undercarriage Parts and Components"></a>
            <a href="{{ route('getprods', 'product-4') }}"> <img id="robot" class="parallax top"
                    src="{{ asset('assets/js/parallaxjs/memicons/123-07.png') }}" alt="Industrial Machinery and Equipment"></a>
            <a href="{{ route('getprods', 'product-5') }}"> <img id="astronaut" class="parallax"
                    src="{{ asset('assets/js/parallaxjs/memicons/123-05.png') }}" alt="Construction Tools and Accessories"></a>
            <a href="{{ route('getprods', 'product-6') }}"> <img id="astronaut1" class="parallax"
                    src="{{ asset('assets/js/parallaxjs/memicons/123-04.png') }}" alt="Heavy Equipment Parts"></a>
            <a href="{{ route('getprods', 'product-7') }}"> <img id="astronaut2" class="parallax"
                    src="{{ asset('assets/js/parallaxjs/memicons/123-06.png') }}" alt="Construction Machinery Components"></a>
            <div class="parallax" id="star1">
                <div class="text-center">
                    <h2 class="mem-slider-abt-title" style="color:#eab22c; font-size: 60px; ">{{ $about->title }}</h2>
                    <div class="mem-slider-abt-txt mb-6" style="color:grey;">
                        {!! \Illuminate\Support\Str::limit($about->description, 160) !!}
                    </div>
                    <a href="{{ route('about') }}"
                        class="inline-flex items-center px-8 py-3 border-2 border-[#eab22c] text-[#eab22c] font-medium rounded-md hover:bg-[#eab22c] hover:text-white transition-all duration-300"
                        id="readmebutton"
                        title="Learn more about Manokamana Earthmovers">
                        <span>Learn More About Manokamana Earthmovers</span>
                    </a>
                </div>
            </div>
            <div class="parallax" id="star12">
                <div class="owl-carousel owl-theme" id="partnerSliders">
                    <div class="partner-wrap">
                        <img class="partner-img" src="{{ asset('assets/js/parallaxjs/memicons/123-09.png') }}"
                            style="width:180px!important; height:180px!important; " alt="Partner Brand Logo 1">
                    </div>
                    <div class="partner-wrap">
                        <img class="partner-img" src="{{ asset('assets/js/parallaxjs/memicons/123-10.png') }}"
                            style="width:180px!important; height:180px!important; " alt="Partner Brand Logo 2">
                    </div>
                    <div class="partner-wrap">
                        <img class="partner-img" src="{{ asset('assets/js/parallaxjs/memicons/123-11.png') }}"
                            style="width:180px!important; height:180px!important; " alt="Partner Brand Logo 3">
                    </div>
                    <div class="partner-wrap">
                        <img class="partner-img" src="{{ asset('assets/js/parallaxjs/memicons/123-12.png') }}"
                            style="width:180px!important; height:180px!important; " alt="Partner Brand Logo 4">
                    </div>
                    <div class="partner-wrap">
                        <img class="partner-img" src="{{ asset('assets/js/parallaxjs/memicons/123-13.png') }}"
                            style="width:180px!important; height:180px!important; " alt="Partner Brand Logo 5">
                    </div>
                    <div class="partner-wrap">
                        <img class="partner-img" src="{{ asset('assets/js/parallaxjs/memicons/123-14.png') }}"
                            style="width:180px!important; height:180px!important; " alt="Partner Brand Logo 6">
                    </div>
                </div>
            </div>
        </div>
        <section id="quoteBlock">
            <div class="container">
                <div class="get-quote">
                    <div class="quote-text text-gray-800 font-medium">
                        Looking for Quality Materials, Lets Become Partner with Us:
                    </div>
                    <a href="https://mem.com.np/dealersignup"
                        class="quote-btn bg-brand hover:bg-brand text-black hover:text-[#eab22c] font-medium rounded-md px-6 py-3 inline-flex items-center transition-colors duration-300"
                        title="Register as a Dealer with Manokamana Earthmovers">
                        <i class="fas fa-handshake mr-2"></i>
                        Register as Dealer
                    </a>
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Special Offers Section -->
        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-[#eab22c]/10 rounded-full mb-4">
                        <span class="animate-pulse w-2 h-2 rounded-full bg-[#eab22c]"></span>
                        <span class="text-[#eab22c] text-sm font-medium">Special Offers</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Featured Products
                    </h2>
                    <div class="w-20 h-1 bg-[#eab22c] mx-auto mb-4"></div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($specials as $product)
                    <div class="bg-white rounded-lg shadow-sm hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">
                        <div class="flex flex-col sm:flex-row h-full">
                            <!-- Product Image Container -->
                            <div class="relative w-full sm:w-48 sm:h-full flex items-center justify-center">
                                <!-- Discount Badge -->

                                <!-- Limited Time Badge -->
                                <div class="absolute right-4 top-4 bg-white shadow-sm text-xs font-medium px-2.5 py-1 rounded flex items-center gap-1.5 z-10">
                                    <i class="fas fa-clock text-[#eab22c] text-xs"></i>
                                    <span>Limited Time</span>
                                </div>
                                <!-- Product Image -->
                                <div class="w-full h-full min-h-[200px] bg-gray-50 rounded-t-lg sm:rounded-l-lg sm:rounded-tr-none p-6 flex items-center justify-center">
                                    <img
                                        src="{{asset('uploads/product'.'/'.$product->image)}}"
                                        class="max-w-[160px] max-h-[160px] object-contain"
                                        alt="{{$product->product_name}}">
                                </div>
                            </div>

                            <!-- Product Details -->
                            <div class="flex-1 p-5 flex flex-col justify-center">
                                <!-- Title -->
                                <h3 class="font-medium text-gray-900 mb-3 line-clamp-2">
                                    {{$product->product_name}}
                                </h3>

                                <!-- Features -->
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <span class="inline-flex items-center text-xs text-[#eab22c] gap-1">
                                        <i class="fas fa-award"></i>
                                        Premium Quality
                                    </span>
                                    <span class="inline-flex items-center text-xs text-green-600 gap-1">
                                        <i class="fas fa-truck"></i>
                                        Fast Delivery
                                    </span>
                                </div>

                                <!-- Price Section -->
                                @guest
                                <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                                    <i class="fas fa-lock text-[#eab22c]"></i>
                                    Login to view prices
                                </div>
                                @else
                                <div class="space-y-1 mb-4">
                                    <div class="text-gray-400 line-through text-sm">
                                        MRP. {{$product->mrp}}
                                    </div>
                                    <div class="text-xl font-bold text-[#eab22c]">
                                        RS. {{$product->UserRole_price()}}
                                    </div>
                                </div>
                                @endif

                                <!-- Action Button -->
                                <a
                                    href="{{ route('product.details', $product->slug) }}"
                                    class="block w-full text-center px-4 py-2.5 bg-[#eab22c] hover:bg-[#d4a429] text-white text-sm font-medium rounded-md transition-colors duration-300">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- View All Link -->
                <div class="text-center mt-12">
                    <a
                        href="{{route('allproducts')}}"
                        class="inline-flex items-center gap-2 px-6 py-2.5 border-2 border-[#eab22c] text-[#eab22c] font-medium rounded-md hover:bg-[#eab22c] hover:text-white transition-colors duration-300">
                        View All Products
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <!-- Special Offers Section -->
        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <!-- Section Header -->
                <div class="text-center mb-16">
                    <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-[#eab22c]/10 rounded-full mb-4">
                        <span class="animate-pulse w-2 h-2 rounded-full bg-[#eab22c]"></span>
                        <span class="text-[#eab22c] text-sm font-medium">Special Offers</span>
                    </div>
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                        Featured Products
                    </h2>
                    <div class="w-20 h-1 bg-[#eab22c] mx-auto mb-4"></div>
                </div>

                <!-- Products Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    @foreach($specials as $product)
                    <div class="bg-white rounded-lg shadow-sm hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300">
                        <div class="flex flex-col sm:flex-row h-full">
                            <!-- Product Image Container -->
                            <div class="relative w-full sm:w-48 sm:h-full flex items-center justify-center">
                                <!-- Discount Badge -->

                                <!-- Limited Time Badge -->
                                <div class="absolute right-4 top-4 bg-white shadow-sm text-xs font-medium px-2.5 py-1 rounded flex items-center gap-1.5 z-10">
                                    <i class="fas fa-clock text-[#eab22c] text-xs"></i>
                                    <span>Limited Time</span>
                                </div>
                                <!-- Product Image -->
                                <div class="w-full h-full min-h-[200px] bg-gray-50 rounded-t-lg sm:rounded-l-lg sm:rounded-tr-none p-6 flex items-center justify-center">
                                    <img
                                        src="{{asset('uploads/product'.'/'.$product->image)}}"
                                        class="max-w-[160px] max-h-[160px] object-contain"
                                        alt="{{$product->product_name}}">
                                </div>
                            </div>

                            <!-- Product Details -->
                            <div class="flex-1 p-5 flex flex-col justify-center">
                                <!-- Title -->
                                <h3 class="font-medium text-gray-900 mb-3 line-clamp-2">
                                    {{$product->product_name}}
                                </h3>

                                <!-- Features -->
                                <div class="flex flex-wrap gap-2 mb-4">
                                    <span class="inline-flex items-center text-xs text-[#eab22c] gap-1">
                                        <i class="fas fa-award"></i>
                                        Premium Quality
                                    </span>
                                    <span class="inline-flex items-center text-xs text-green-600 gap-1">
                                        <i class="fas fa-truck"></i>
                                        Fast Delivery
                                    </span>
                                </div>

                                <!-- Price Section -->
                                @guest
                                <div class="flex items-center gap-2 text-sm text-gray-500 mb-4">
                                    <i class="fas fa-lock text-[#eab22c]"></i>
                                    Login to view prices
                                </div>
                                @else
                                <div class="space-y-1 mb-4">
                                    <div class="text-gray-400 line-through text-sm">
                                        MRP. {{$product->mrp}}
                                    </div>
                                    <div class="text-xl font-bold text-[#eab22c]">
                                        RS. {{$product->UserRole_price()}}
                                    </div>
                                </div>
                                @endif

                                <!-- Action Button -->
                                <a
                                    href="{{ route('product.details', $product->slug) }}"
                                    class="block w-full text-center px-4 py-2.5 bg-[#eab22c] hover:bg-[#d4a429] text-white text-sm font-medium rounded-md transition-colors duration-300">
                                    View Details
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- View All Link -->
                <div class="text-center mt-12">
                    <a
                        href="{{route('allproducts')}}"
                        class="inline-flex items-center gap-2 px-6 py-2.5 border-2 border-[#eab22c] text-[#eab22c] font-medium rounded-md hover:bg-[#eab22c] hover:text-white transition-colors duration-300">
                        View All Products
                        <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>

                <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-4 md:gap-8">
                    @foreach($products as $product)
                    <div class="bg-white rounded-xl shadow-sm hover:shadow-md transition-all duration-300">
                        <a href="{{ route('product.details', $product->slug) }}"
                            class="block relative aspect-square overflow-hidden rounded-t-xl">
                            <img src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="w-full h-full object-contain p-4"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-2 right-2 bg-[#eab22c] text-white text-xs px-2 py-1 rounded-full">
                                New
                            </div>
                        </a>

                        <div class="p-4">
                            <h3 class="text-sm font-medium text-gray-900 line-clamp-2">
                                {{$product->product_name}}
                            </h3>

                            <!-- Price section with mobile optimization -->
                            @guest
                            <p class="text-xs text-gray-500 mt-2">
                                <i class="fas fa-lock text-[#eab22c] mr-1"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mt-2">
                                <span class="text-xs text-gray-400 line-through block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-base font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="md:py-24 py-8">
            <div class="container mx-auto px-4">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900">
                        <span class="text-gray-800">Our</span>
                        <span class="text-[#eab22c]">Products</span>
                    </h2>
                    <div class="w-24 h-1 bg-[#eab22c] mx-auto mt-4"></div>
                    <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                        Discover our wide range of high-quality construction materials and equipment
                    </p>
                </div>


                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const button = document.querySelector('[aria-controls="messenger-links-menu"]');
                        const menu = document.querySelector('#messenger-links-menu');

                        button.addEventListener('click', function() {
                            const isExpanded = this.getAttribute('aria-expanded') === 'true';
                            this.setAttribute('aria-expanded', !isExpanded);
                            menu.classList.toggle('hidden');
                        });

                        // Close menu when clicking outside
                        document.addEventListener('click', function(event) {
                            if (!event.target.closest('.fixed')) {
                                button.setAttribute('aria-expanded', 'false');
                                menu.classList.add('hidden');
                            }
                        });

                        // Handle escape key
                        document.addEventListener('keydown', function(event) {
                            if (event.key === 'Escape' && !menu.classList.contains('hidden')) {
                                button.setAttribute('aria-expanded', 'false');
                                menu.classList.add('hidden');
                                button.focus();
                            }
                        });
                    });
                </script>
                @endsection