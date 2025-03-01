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
<div class="content-body">
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


    <section class="py-20 bg-gray-50">
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

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
                @foreach($products as $product)
                <div class="bg-white rounded-lg shadow-md hover:shadow-xl transition-all duration-300 flex flex-col">
                    <a href="{{ route('product.details', $product->slug) }}" class="block relative overflow-hidden group">
                        <div class="w-full h-48 bg-gray-50 flex items-center justify-center p-4">
                            <img
                                src="{{asset('uploads/product'.'/'.$product->image)}}"
                                class="h-40 w-auto object-contain"
                                alt="{{$product->product_name}}">
                            <div class="absolute top-4 right-4 bg-[#eab22c] text-white text-sm px-3 py-1 rounded-full">
                                New
                            </div>
                        </div>
                    </a>

                    <div class="p-6 flex flex-col flex-grow border-t border-gray-100">
                        <div class="flex-grow">
                            <h3 class="text-lg font-medium text-gray-900 mb-2 line-clamp-2">
                                {{$product->product_name}}
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
                            @guest
                            <p class="text-sm text-gray-500 italic mb-4">
                                <i class="fas fa-lock text-[#eab22c] mr-2"></i>
                                Login to view prices
                            </p>
                            @else
                            <div class="mb-4">
                                <span class="text-gray-400 line-through text-sm block">
                                    MRP. {{$product->mrp}}
                                </span>
                                <span class="text-2xl font-bold text-[#eab22c]">
                                    RS. {{$product->UserRole_price()}}
                                </span>
                            </div>
                            @endif

                            <a
                                href="{{ route('product.details', $product->slug) }}"
                                class="w-full inline-flex items-center justify-center px-4 py-2.5 border border-transparent text-sm font-medium rounded-md text-white bg-[#eab22c] hover:bg-[#d4a429] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#eab22c] transition-colors duration-300">
                                <i class="far fa-eye mr-2"></i>
                                View Details
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <a
                    href="{{route('allproducts')}}"
                    class="inline-flex items-center px-8 py-3 border-2 border-[#eab22c] text-[#eab22c] font-medium rounded-md hover:bg-[#eab22c] hover:text-white transition-all duration-300">
                    View All Products
                    <i class="fas fa-arrow-right ml-2"></i>
                </a>
            </div>
        </div>
    </section>

    <!-- Special Offers Section -->
    <section class="py-20 bg-gray-50">
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


    <section class="py-24 bg-gradient-to-b from-gray-50 to-white">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-[#eab22c]/10 rounded-full mb-4">
                    <span class="animate-pulse w-2 h-2 rounded-full bg-[#eab22c]"></span>
                    <span class="text-[#eab22c] text-sm font-medium">Featured Collection</span>
                </div>
                <h2 class="text-4xl font-bold text-gray-900 mb-4">
                    Premium Products
                </h2>
                <p class="text-gray-600 max-w-2xl mx-auto">
                    Discover our selection of high-quality industrial equipment and parts
                </p>
            </div>

            <!-- Featured Products Carousel -->
            <div class="relative">
                <div class="owl-carousel owl-theme" id="topCategoriesSlider">
                    @foreach($featured as $product)
                    <div class="px-3 py-4">
                        <div class="bg-white rounded-2xl overflow-hidden hover:shadow-xl hover:scale-[1.02] transition-all duration-500 group border border-gray-100">
                            <!-- Updated image container with fixed dimensions -->
                            <div class="w-full h-[250px] relative bg-gray-50 p-8">
                                <!-- Status Badge -->
                                <div class="absolute left-4 top-4 z-10">
                                    <div class="flex gap-2">
                                        @if($product->created_at->diffInDays(now()) < 30)
                                            <span class="bg-green-500 text-white text-xs font-medium px-2.5 py-1 rounded-full">New Arrival</span>
                                            @endif
                                            <span class="bg-blue-500 text-white text-xs font-medium px-2.5 py-1 rounded-full">Featured</span>
                                    </div>
                                </div>
                                <img
                                    src="{{asset('uploads/product'.'/'.$product->image)}}"
                                    class="w-full h-full object-contain"
                                    alt="{{$product->product_name}}">
                            </div>

                            <!-- Product Info -->
                            <div class="p-6">
                                <!-- Category -->
                                <div class="text-sm text-gray-500 mb-2">Industrial Equipment</div>

                                <!-- Product Name -->
                                <h3 class="text-lg font-semibold text-gray-900 mb-3 line-clamp-2 min-h-[56px] group-hover:text-[#eab22c] transition-colors">
                                    {{$product->product_name}}
                                </h3>

                                <!-- Features List -->
                                <div class="space-y-2 mb-4">
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="w-5 h-5 text-[#eab22c] mr-2" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        Premium Quality
                                    </div>
                                    <div class="flex items-center text-sm text-gray-600">
                                        <svg class="w-5 h-5 text-[#eab22c] mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                        </svg>
                                        Genuine Product
                                    </div>
                                </div>

                                <!-- Action Button -->
                                <a
                                    href="{{ route('product.details', $product->slug) }}"
                                    class="group/btn relative w-full inline-flex items-center justify-center px-4 py-3 bg-gray-900 text-white rounded-xl hover:bg-[#eab22c] transition-all duration-300">
                                    <span class="mr-2">View Details</span>
                                    <svg
                                        class="w-5 h-5 transform group-hover/btn:translate-x-1 transition-transform"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Progress Bar -->
                <div class="mt-12 max-w-md mx-auto">
                    <div class="h-1 w-full bg-gray-200 rounded-full overflow-hidden">
                        <div class="owl-progress-bar w-0 h-full bg-[#eab22c] transition-all duration-300"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-24 bg-white">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-[#eab22c]/10 rounded-full mb-4">
                    <span class="animate-pulse w-2 h-2 rounded-full bg-[#eab22c]"></span>
                    <span class="text-[#eab22c] text-sm font-medium">Why Choose Us</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    Our Core Values
                </h2>
                <div class="w-20 h-1 bg-[#eab22c] mx-auto"></div>
            </div>

            <!-- Icons Grid -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">
                @foreach($rates as $rate)
                <div class="group">
                    <div class="relative p-10 bg-gray-50/80 hover:bg-white rounded-2xl hover:shadow-[0_20px_50px_rgba(8,_112,_184,_0.07)] transition-all duration-300">
                        <!-- Large Icon Container -->
                        <div class="mb-8 relative">
                            <!-- Background Shape -->
                            <div class="absolute inset-0 bg-gradient-to-br from-[#eab22c]/10 to-[#eab22c]/5 rounded-3xl transform -rotate-6 group-hover:rotate-6 transition-transform duration-500"></div>

                            <!-- Icon Wrapper -->
                            <div class="relative flex items-center justify-center w-24 h-24 mx-auto">
                                <img
                                    src="{{asset('uploads/rated'.'/'.$rate->image)}}"
                                    class="w-20 h-20 object-contain group-hover:scale-110 transition-transform duration-500"
                                    alt="{{$rate->title}}">
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="text-center space-y-4">
                            <!-- Title -->
                            <h3 class="text-2xl font-bold text-gray-900 group-hover:text-[#eab22c] transition-colors duration-300">
                                {{$rate->title}}
                            </h3>

                            <!-- Description -->
                            <p class="text-gray-600 leading-relaxed">
                                {!! \Illuminate\Support\Str::limit($rate->description, 100) !!}
                            </p>

                            <!-- Learn More Link -->
                            <div class="pt-4">
                                <a href="#"
                                    class="inline-flex items-center justify-center w-full px-6 py-3 text-sm font-medium text-gray-700 bg-gray-100/90 rounded-xl group-hover:bg-[#eab22c] group-hover:text-white transition-all duration-300 border border-gray-200 hover:border-[#eab22c]">
                                    <span>Learn More</span>
                                    <svg
                                        class="w-5 h-5 ml-2 transform group-hover:translate-x-1 transition-transform"
                                        fill="none"
                                        stroke="currentColor"
                                        viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                                    </svg>
                                </a>
                            </div>
                        </div>

                        <!-- Decorative Elements -->
                        <div class="absolute top-0 right-0 w-24 h-24 overflow-hidden pointer-events-none">
                            <div class="absolute top-0 right-0 w-16 h-16 transform rotate-45 translate-x-6 -translate-y-6 bg-gradient-to-br from-[#eab22c]/10 to-transparent"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>


    <section class="py-24 bg-gray-50">
        <div class="container mx-auto px-4">
            <!-- Section Header -->
            <div class="text-center mb-16">
                <div class="inline-flex items-center gap-2 px-4 py-1.5 bg-[#eab22c]/10 rounded-full mb-4">
                    <span class="animate-pulse w-2 h-2 rounded-full bg-[#eab22c]"></span>
                    <span class="text-[#eab22c] text-sm font-medium">Testimonials</span>
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">
                    What Our Clients Say
                </h2>
                <div class="w-20 h-1 bg-[#eab22c] mx-auto"></div>
            </div>

            <!-- Testimonials Carousel -->
            <div class="relative max-w-7xl mx-auto">
                <div class="owl-carousel owl-theme" id="testimonialSlider">
                    @foreach($testimonals as $testimonal)
                    <div class="px-4">
                        <!-- Reduced height from 400px to 300px -->
                        <div class="bg-white p-6 hover:shadow-xl transition-all duration-300 border border-gray-100 rounded-lg group relative h-[300px] w-full flex flex-col">
                            <!-- Large Quote Mark -->
                            <div class="absolute right-6 top-6">
                                <span class="text-[100px] leading-none font-serif text-[#eab22c]/10 select-none">"</span>
                            </div>

                            <!-- Content Section -->
                            <div class="flex-grow">
                                <!-- Rating Stars -->
                                <div class="flex items-center gap-1 mb-4">
                                    @for($i = 1; $i <= 5; $i++)
                                        <svg
                                        class="w-4 h-4 {{ $i <= $testimonal->rating ? 'text-[#eab22c]' : 'text-gray-200' }}"
                                        fill="currentColor"
                                        viewBox="0 0 20 20">
                                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                                        </svg>
                                        @endfor
                                </div>

                                <!-- Testimonial Text with reduced height -->
                                <div class="h-[120px] overflow-hidden">
                                    <p class="text-gray-600 text-base leading-relaxed">
                                        @switch($testimonal->id)
                                        @case(1)
                                        "Outstanding quality and reliability in every product we've purchased. Their construction equipment has significantly improved our project efficiency."
                                        @break
                                        @case(2)
                                        "As a long-term partner, they've consistently delivered top-tier industrial equipment that meets our exact specifications. Their attention to detail is unmatched."
                                        @break
                                        @case(3)
                                        "The range of construction materials and equipment available is impressive. What sets them apart is their technical expertise and after-sales support."
                                        @break
                                        @case(4)
                                        "We've been sourcing our industrial equipment from them for over 5 years. Their products are durable, well-priced, and backed by excellent service."
                                        @break
                                        @default
                                        "Their commitment to quality and customer satisfaction is evident in every interaction. The products are built to last, and their support is excellent."
                                        @endswitch
                                    </p>
                                </div>
                            </div>

                            <!-- Author Info -->
                            <div class="flex items-center pt-4 mt-auto border-t border-gray-100">
                                <div class="mr-3">
                                    <img
                                        src="{{asset('uploads/testimonal'.'/'.$testimonal->image)}}"
                                        class="w-10 h-10 rounded-full object-cover border-2 border-[#eab22c]/20"
                                        alt="{{$testimonal->title}} - {{$testimonal->position}} at Manokamana Earthmovers">
                                </div>
                                <div>
                                    <h1 class="text-sm font-semibold text-gray-900">
                                        {{$testimonal->title}}
                                    </h1>
                                    <p class="text-xs text-gray-500">
                                        {{$testimonal->position}}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Progress Bar -->
                <div class="mt-12 max-w-md mx-auto">
                    <div class="h-1 w-full bg-gray-200 rounded-full overflow-hidden">
                        <div class="owl-progress-bar w-0 h-full bg-[#eab22c] transition-all duration-300"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="partnerSection" class="section-padd">
        <div class="container">
            <div class="owl-carousel owl-theme" id="partnerSlider">
                @php $i= 0; @endphp
                @foreach($partners as $partner)
                <div class="item {{ $i == 0 ? 'active' : '' }}">
                    <div class="partner-wrap">
                        <img class="partner-img" src="{{asset('uploads/partner'.'/'.$partner->image)}}" alt="{{$partner->name ?? 'Partner Company Logo - Manokamana Earthmovers'}}">
                    </div>
                </div>
                @php $i++; @endphp
                @endforeach
            </div>
        </div>
    </section>

    @include('frontend.includes.newsletter')

</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<!-- Owl Carousel Initialization Script -->
<script>
    $(document).ready(function() {
        const carousel = $("#topCategoriesSlider").owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            dots: false,
            autoplay: true,
            autoplayTimeout: 5000,
            autoplayHoverPause: true,
            smartSpeed: 1000,
            responsive: {
                0: {
                    items: 1
                },
                640: {
                    items: 2
                },
                1024: {
                    items: 3
                },
                1280: {
                    items: 4
                }
            },
            onInitialized: function(event) {
                // Ensure carousel height accounts for scale effect
                $('.owl-stage-outer').css('padding', '1rem 0');

                // Add accessible names to dots
                var slideCount = event.item.count;
                $('.owl-dot').each(function(index) {
                    $(this)
                        .attr('aria-label', 'Go to slide ' + (index + 1) + ' of ' + slideCount)
                        .attr('role', 'button');
                    if ($(this).hasClass('active')) {
                        $(this).attr('aria-current', 'true');
                    }
                });
            },
            onTranslated: function(event) {
                // Update active state for screen readers
                $('.owl-dot').each(function(index) {
                    if ($(this).hasClass('active')) {
                        $(this).attr('aria-current', 'true');
                    } else {
                        $(this).removeAttr('aria-current');
                    }
                });
            }
        });

        // Progress Bar Animation
        const progressBar = $('.owl-progress-bar');
        let timeOut = null;

        function startProgressBar() {
            // Reset progress bar
            progressBar.css({
                width: '0%'
            });

            // Animate progress bar
            timeOut = setTimeout(function() {
                progressBar.css({
                    width: '100%',
                    transition: 'width 5000ms linear'
                });
            }, 0);
        }

        function resetProgressBar() {
            clearTimeout(timeOut);
            progressBar.css({
                width: '0%',
                transition: 'width 0s'
            });
        }

        startProgressBar();

        carousel.on('changed.owl.carousel', function() {
            resetProgressBar();
            startProgressBar();
        });

        carousel.on('mouseover', function() {
            progressBar.css({
                'transition-duration': '0s'
            });
        });

        carousel.on('mouseleave', function() {
            startProgressBar();
        });
    });

    document.addEventListener('DOMContentLoaded', function() {
        const navbarToggler = document.querySelector('[data-toggle="navbar"]');
        const navbarCollapse = document.querySelector('#navbarCollapse');

        navbarToggler.addEventListener('click', function() {
            navbarCollapse.classList.toggle('hidden');
        });
    });
</script>

<style>
    /* Navbar responsive styles */
    @media (max-width: 768px) {
        #navbarCollapse {
            display: none;
        }

        #navbarCollapse.show {
            display: block;
            position: absolute;
            top: 100%;
            left: 0;
            right: 0;
            background-color: #b88d23;
        }

        .navbar-toggler {
            display: block;
        }
    }

    @media (min-width: 768px) {
        #navbarCollapse {
            display: flex !important;
        }

        .navbar-toggler {
            display: none;
        }
    }

    /* Navbar core styles */
    .navbar {
        position: relative;
        display: flex;
        flex-wrap: wrap;
        align-items: center;
        justify-content: space-between;
        background-color: #b88d23;
    }

    .navbar-collapse {
        display: flex;
        flex-grow: 1;
        align-items: center;
    }

    .navbar-nav {
        display: flex;
        flex-direction: column;
    }

    @media (min-width: 768px) {
        .navbar-nav {
            flex-direction: row;
        }
    }

    .nav-item {
        position: relative;
    }

    .nav-link {
        display: block;
        padding: 1rem 1.5rem;
        color: black;
        text-transform: uppercase;
        font-size: 0.875rem;
        font-weight: 500;
        transition: color 0.2s, background-color 0.2s;
        transform: skew(-15deg);
    }

    .nav-link>* {
        transform: skew(15deg);
        display: inline-block;
    }

    .nav-link:hover {
        background-color: black;
        color: white;
    }

    .nav-link::before {
        content: '';
        position: absolute;
        inset: 0;
        background-color: black;
        opacity: 0;
        transition: opacity 0.2s;
        transform: skew(15deg);
    }

    .nav-link:hover::before {
        opacity: 1;
    }

    /* Dropdown styles */
    .dropdown-menu {
        position: absolute;
        left: 0;
        margin-top: 0;
        width: 14rem;
        background-color: white;
        border: 1px solid #e5e7eb;
        border-bottom-radius: 0.375rem;
        box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        display: none;
        transform: skew(0deg);
        z-index: 50;
    }

    .group:hover .dropdown-menu {
        display: block;
    }

    .dropdown-item {
        display: block;
        padding: 0.5rem 1rem;
        font-size: 0.875rem;
        color: #374151;
        transform: skew(0deg);
        transition: color 0.2s, background-color 0.2s;
    }

    .dropdown-item:hover {
        background-color: black;
        color: white;
    }

    /* Submenu positioning */
    .dropdown-submenu>.dropdown-menu {
        left: 100%;
        top: 0;
        border-top-right-radius: 0.375rem;
    }

    /* Mobile menu icon */
    .navbar-toggler-icon {
        width: 1.5rem;
        height: 1.5rem;
        position: relative;
        background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='rgba%280, 0, 0, 0.9%29' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
    }

    /* Top bar */
    .top-bar {
        background-color: #b88d23;
        height: 0.25rem;
    }

    /* Messenger button colors */
    .messenger-button {
        background-color: #E64A3C;
        color: white;
    }

    .messenger-button:hover {
        background-color: #d4392d;
    }

    .messenger-link.whatsapp {
        color: #075E54;
    }

    .messenger-link.viber {
        color: #59267C;
    }

    .owl-dot {
        min-width: 44px;
        /* Ensure touchable area is large enough */
        min-height: 44px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        margin: 0 5px;
        padding: 10px;
        border: none;
        background: transparent;
        cursor: pointer;
    }

    .owl-dot:focus {
        outline: 2px solid #007bff;
        outline-offset: 2px;
    }

    /* Hide default focus outline in Firefox */
    .owl-dot::-moz-focus-inner {
        border: 0;
    }
</style>

<!-- GetButton.io widget -->
<script type="text/javascript">
    (function() {
        var options = {
            whatsapp: "+97715184300", // WhatsApp number
            viber: "+977 985-1275887", // Viber number
            call_to_action: "Message us", // Call to action
            button_color: "#FF6550", // Color of button
            position: "right", // Position may be 'right' or 'left'
            order: "whatsapp,viber", // Order of buttons
            pre_filled_message: "How can we help you?", // WhatsApp pre-filled message
            // Add proper href attributes for crawlability
            links: {
                whatsapp: "https://wa.me/97715184300",
                viber: "viber://chat?number=+97798512758887"
            }
        };
        var url = "https://static.getbutton.io";
        var s = document.createElement('script');
        s.type = 'text/javascript';
        s.async = true;
        s.src = url + '/widget-send-button/js/init.js';
        s.onload = function() {
            WhWidgetSendButton.init('getbutton.io', 'https', options);
        };
        var x = document.getElementsByTagName('script')[0];
        x.parentNode.insertBefore(s, x);

        // Add fallback links for crawlers and accessibility
        var fallbackContainer = document.createElement('div');
        fallbackContainer.style.display = 'none';
        fallbackContainer.setAttribute('aria-hidden', 'true');
        fallbackContainer.innerHTML = `
            <a href="https://wa.me/97715184300" rel="nofollow" aria-label="Chat with us on WhatsApp">
                Chat with us on WhatsApp
            </a>
            <a href="viber://chat?number=+97798512758887" rel="nofollow" aria-label="Chat with us on Viber">
                Chat with us on Viber
            </a>
        `;
        document.body.appendChild(fallbackContainer);
    })();
</script>
<!-- /GetButton.io widget -->

<div class="fixed bottom-5 right-5 z-50">
    <button type="button"
        class="w-14 h-14 flex items-center justify-center rounded-full bg-[#E64A3C] hover:bg-[#d4392d] text-white shadow-lg hover:shadow-xl transform hover:-translate-y-1 transition-all duration-300"
        aria-expanded="false"
        aria-controls="messenger-links-menu">
        <span class="sr-only">Open messaging options</span>
        <i class="fas fa-comment-dots text-2xl" aria-hidden="true"></i>
    </button>

    <div id="messenger-links-menu" class="absolute bottom-16 right-0 bg-white rounded-xl shadow-lg p-2 min-w-[200px] hidden" role="menu">
        <ul class="flex flex-col gap-2">
            <li>
                <a href="https://wa.me/97715184300"
                    class="flex items-center px-4 py-3 text-[#075E54] hover:bg-gray-100 rounded-lg transition-colors duration-200"
                    role="menuitem">
                    <i class="fab fa-whatsapp text-2xl mr-3"></i>
                    <span>WhatsApp</span>
                </a>
            </li>
            <li>
                <a href="viber://chat?number=+97798512758887"
                    class="flex items-center px-4 py-3 text-[#59267C] hover:bg-gray-100 rounded-lg transition-colors duration-200"
                    role="menuitem">
                    <i class="fab fa-viber text-2xl mr-3"></i>
                    <span>Viber</span>
                </a>
            </li>
        </ul>
    </div>
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