<!-- Start Header Style -->
<header>
    <div id="desktopMenu">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 my-auto">
                        <a href="{{ route('landing') }}" class="navbar-brand">
                            <img class="site-logo max-h-16 w-auto" src="{{ asset('assets/img/logomem.png') }}" alt="Manokamana Earthmovers - Leading Construction Equipment Supplier in Nepal">
                        </a>
                    </div>
                    <div class="col-md-5 my-auto">
                        <div class="text-center">
                            <form id="topSearch" action="{{ url('search/product') }}" method="post" role="search" aria-label="Desktop product search" class="flex items-center">
                                {{ csrf_field() }}
                                <div class="relative w-full">
                                    <input type="text" name="search_text" placeholder="Search Product" aria-label="Search for products"
                                        class="w-full px-4 py-2 border border-gray-300 rounded-l-md focus:outline-none focus:border-[#eab22c]">
                                    <button type="submit" aria-label="Submit search"
                                        class="absolute right-0 top-0 h-full px-4 bg-[#eab22c] text-white rounded-r-md hover:bg-[#d9a01b]">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                        <span class="sr-only">Search</span>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-2 my-auto">
                        <div class="top-call">
                            <div class="call-left">
                                <i class="fa fa-phone-alt"></i>
                            </div>
                            <div class="call-right">
                                <div>Sales Support</div>
                                <div class="top-number">
                                    <a href="tel:97715184300">+977-1-5184300</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 my-auto">
                        <div class="top-right">
                            @guest
                            <a href="{{ route('login') }}" class="top-user">
                                <span class="top-login-link">Login/ Signup</span><i class="fa fa-user"></i>
                            </a>
                            @else
                            <button class="btn call-left" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-user" style="size: 30px;"></i>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                @php
                                $currentuser = Auth::user();
                                @endphp

                                @if ($currentuser->role_id == 1)
                                <a class="dropdown-item" href="{{ url('dashboard') }}">
                                    @elseif ($currentuser->role_id==2)
                                    <a class="dropdown-item" href="{{ url('dealerdashboard') }}">
                                        @elseif ($currentuser->role_id==3)
                                        <a class="dropdown-item" href="{{ url('userdashboard') }}">
                                            @endif
                                            <span class="top-login-link">Dashboard</span>
                                            <i class="fa fa-dashboard"></i>
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <span class="top-login-link">{{ __('Logout') }}</span>
                                        </a>
                            </div>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                            @endguest
                            @guest
                            <a href="{{ route('login') }}" class="top-cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="cart-count">0</span>
                            </a>
                            @else
                            <a href="{{ url('cart/list') }}" class="top-cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span class="cart-count">{{ Cart::count() }}</span>
                            </a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bg-[#eab22c] shadow-md" id="desktopMenuBar">
            <nav class="relative">
                <div class="container mx-auto px-4">
                    <button class="lg:hidden flex items-center px-3 py-2 text-black" type="button" data-toggle="navbar" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fa fa-bars text-xl"></i>
                    </button>
                    <div class="hidden lg:flex lg:items-center" id="navbarCollapse">
                        <ul class="flex flex-col lg:flex-row lg:mx-auto lg:space-x-1">
                            @php
                            $cats = DB::table('categories')
                            ->select('id', 'category_name')
                            ->get();
                            @endphp
                            @foreach ($cats as $cat)
                            <li class="group relative">
                                @php
                                $subcats = DB::table('sub_categories')
                                ->select('id', 'category_id', 'subcategory_name')
                                ->orderBy('id', 'desc')
                                ->where('category_id', $cat->id)
                                ->get();
                                @endphp
                                @php $i= 0; @endphp
                                @if ($subcats->count() > 0)
                                <a class="block py-4 px-6 text-black uppercase text-sm font-medium relative hover:bg-black hover:text-white transition-all duration-200 transform skew-x-12" href="#">
                                    <span class="inline-block transform -skew-x-12">{{ $cat->category_name }}</span>
                                </a>
                                @else
                                <a class="block py-4 px-6 text-black uppercase text-sm font-medium relative hover:bg-black hover:text-white transition-all duration-200 transform skew-x-12" href="#">
                                    <span class="inline-block transform -skew-x-12">{{ $cat->category_name }}</span>
                                </a>
                                @endif
                                <ul class="hidden group-hover:block absolute left-0 mt-0 w-56 bg-black border border-gray-800 rounded-b-md shadow-lg z-50">
                                    @foreach ($subcats as $subcat)
                                    @php
                                    $childcats = DB::table('child_categories')
                                    ->select('id', 'childcategory_name')
                                    ->orderBy('id', 'desc')
                                    ->where('subcategory_id', $subcat->id)
                                    ->get();
                                    @endphp
                                    @if ($childcats->count() > 0)
                                    <li class="group/sub relative">
                                        <a class="block px-4 py-2 text-sm text-white hover:bg-gray-700 flex justify-between items-center" href="{{ URL::to('/product/subcategory', $subcat->id) }}">
                                            {{ $subcat->subcategory_name }}
                                            <i class="fas fa-chevron-right text-xs ml-2"></i>
                                        </a>
                                        <ul class="hidden group-hover/sub:block absolute left-full top-0 w-56 bg-black border border-gray-800 rounded-r-md shadow-lg">
                                            @foreach ($childcats as $childcat)
                                            <li>
                                                <a class="block px-4 py-2 text-sm text-white hover:bg-gray-700" href="{{ URL::to('/product/childcategory', $childcat->id) }}">
                                                    {{ $childcat->childcategory_name }}
                                                </a>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </li>
                                    @else
                                    <li>
                                        <a class="block px-4 py-2 text-sm text-white hover:bg-gray-700" href="{{ URL::to('/product/subcategory', $subcat->id) }}">
                                            {{ $subcat->subcategory_name }}
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                            </li>
                            @endforeach
                            <li class="group relative">
                                <a href="" class="block py-4 px-6 text-black uppercase text-sm font-medium relative hover:bg-black hover:text-white transition-all duration-200 transform skew-x-12">
                                    <span class="inline-block transform -skew-x-12">Company</span>
                                </a>
                                <div class="hidden group-hover:block absolute right-0 mt-0 w-56 bg-black border border-gray-800 rounded-b-md shadow-lg">
                                    <a class="block px-4 py-2 text-sm text-white hover:bg-gray-700" href="{{ url('frontend/about/us') }}">About Us</a>
                                    <a class="block px-4 py-2 text-sm text-white hover:bg-gray-700" href="{{ route('services') }}">My Care</a>
                                    <a class="block px-4 py-2 text-sm text-white hover:bg-gray-700" href="{{ route('career') }}">Career</a>
                                    <a class="block px-4 py-2 text-sm text-white hover:bg-gray-700" href="{{ url('frontend/contact/us') }}">Contact Us</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div id="mobileMenu">
        <div class="hs-menubar">
            <div class="brand-logo flex justify-center">
                <a href="{{ route('landing') }}"><img src="{{ asset('assets/img/logomem.png') }}" alt="Manokamana Earthmovers - Construction Equipment Supplier"> </a>
            </div>

            <div class="menu-trigger" onclick="toggleMobileMenu()">
                <i class="fa fa-bars"></i>
            </div>

            <form id="mobSearch" action="{{ url('search/product') }}" method="post">
                <div class="mob-search-bar">
                    {{ csrf_field() }}
                    <input type="text" name="search_text" placeholder="Search...">
                    <button type="submit" class="mob-search-btn">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </form>
        </div>

        <!-- Add new bottom navigation -->
        <div class="mobile-bottom-nav">
            <a href="{{ route('landing') }}" class="mobile-bottom-nav__item">
                <div class="mobile-bottom-nav__item-content">
                    <i class="fa fa-home"></i>
                    <span>Home</span>
                </div>
            </a>

            @guest
            <a href="{{ route('login') }}" class="mobile-bottom-nav__item">
                <div class="mobile-bottom-nav__item-content">
                    <i class="fa fa-user"></i>
                    <span>Login</span>
                </div>
            </a>
            @else
            <div class="mobile-bottom-nav__item">
                <button class="mobile-bottom-nav__item-content w-full" type="button" id="dropdownMenuButtons" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <i class="fa fa-user"></i>
                    <span>Account</span>
                </button>
            </div>
            @endguest

            @guest
            <a href="{{ route('login') }}" class="mobile-bottom-nav__item">
                <div class="mobile-bottom-nav__item-content">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="cart-badge">0</span>
                </div>
            </a>
            @else
            <a href="{{ url('cart/list') }}" class="mobile-bottom-nav__item">
                <div class="mobile-bottom-nav__item-content">
                    <i class="fa fa-shopping-cart"></i>
                    <span class="cart-badge">{{ Cart::count() }}</span>
                </div>
            </a>
            @endguest
        </div>

        <nav class="hs-navigation">
            <ul class="nav-links">
                <li><a href="{{ url('frontend/about/us') }}">About Us</a></li>
                <li><a href="{{ route('services') }}">My Care</a></li>
                <li><a href="{{ route('career') }}">Career</a></li>
                <li><a href="{{ url('frontend/contact/us') }}">Contact Us</a></li>

                @foreach ($cats as $cat)
                <li class="has-child">
                    @php
                    $subcats = DB::table('sub_categories')
                    ->select('id', 'category_id', 'subcategory_name')
                    ->orderBy('id', 'desc')
                    ->where('category_id', $cat->id)
                    ->get();
                    @endphp
                    @php $i= 0; @endphp
                    @if ($subcats->count() > 0)
                    <a class="block py-4 px-6 text-black uppercase text-sm font-medium relative hover:bg-black hover:text-white transition-all duration-200 transform skew-x-12" href="#">
                        <span class="inline-block transform -skew-x-12">{{ $cat->category_name }}</span>
                    </a>
                    @else
                    <a class="block py-4 px-6 text-black uppercase text-sm font-medium relative hover:bg-black hover:text-white transition-all duration-200 transform skew-x-12" href="#">
                        <span class="inline-block transform -skew-x-12">{{ $cat->category_name }}</span>
                    </a>
                    @endif
                    <ul class="hidden group-hover:block absolute left-0 mt-0 w-56 bg-black border border-gray-800 rounded-b-md shadow-lg z-50">
                        @foreach ($subcats as $subcat)
                        @php
                        $childcats = DB::table('child_categories')
                        ->select('id', 'childcategory_name')
                        ->orderBy('id', 'desc')
                        ->where('subcategory_id', $subcat->id)
                        ->get();
                        @endphp
                        @if ($childcats->count() > 0)
                        <li class="group/sub relative">
                            <a class="block px-4 py-2 text-sm text-white hover:bg-gray-700 flex justify-between items-center" href="{{ URL::to('/product/subcategory', $subcat->id) }}">
                                {{ $subcat->subcategory_name }}
                                <i class="fas fa-chevron-right text-xs ml-2"></i>
                            </a>
                            <ul class="hidden group-hover/sub:block absolute left-full top-0 w-56 bg-black border border-gray-800 rounded-r-md shadow-lg">
                                @foreach ($childcats as $childcat)
                                <li>
                                    <a class="block px-4 py-2 text-sm text-white hover:bg-gray-700" href="{{ URL::to('/product/childcategory', $childcat->id) }}">
                                        {{ $childcat->childcategory_name }}
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @else
                        <li>
                            <a class="block px-4 py-2 text-sm text-white hover:bg-gray-700" href="{{ URL::to('/product/subcategory', $subcat->id) }}">
                                {{ $subcat->subcategory_name }}
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>
<!-- End Offset Wrapper -->

@media (max-width: 768px) {
body {
padding-top: 120px; /* Adjust based on your header + search bar height */
padding-bottom: 60px;
}
}

<script>
    function toggleMobileMenu() {
        document.querySelector('.hs-navigation').classList.toggle('active');
    }
</script>

<style>
    .hs-navigation {
        display: none;
        position: fixed;
        top: 60px;
        left: 0;
        right: 0;
        background: white;
        z-index: 49;
        height: calc(100vh - 60px);
        overflow-y: auto;
    }

    .hs-navigation.active {
        display: block;
    }

    .nav-links {
        padding: 1rem;
    }

    .nav-links li {
        padding: 0.5rem 0;
        border-bottom: 1px solid #eee;
    }

    .nav-links li:last-child {
        border-bottom: none;
    }

    /* Updated Bottom Navigation Styles */
    .mobile-bottom-nav {
        position: fixed;
        bottom: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        will-change: transform;
        transform: translateZ(0);
        display: flex;
        height: 65px;
        background-color: #eab22c;
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
        padding: 0 10px;
    }

    .mobile-bottom-nav__item {
        flex: 1;
        text-align: center;
        font-size: 11px;
        display: flex;
        justify-content: center;
        align-items: center;
        position: relative;
        color: #000000;
        transition: all 0.3s ease;
    }

    .mobile-bottom-nav__item:hover,
    .mobile-bottom-nav__item.active {
        color: #ffffff;
    }

    .mobile-bottom-nav__item-content {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        width: 100%;
        height: 100%;
        padding: 8px 0;
    }

    .mobile-bottom-nav__item-content i {
        font-size: 20px;
        margin-bottom: 3px;
        transition: all 0.3s ease;
    }

    .mobile-bottom-nav__item-content span {
        font-size: 11px;
        font-weight: 600;
        letter-spacing: 0.3px;
    }

    /* Updated cart badge style */
    .cart-badge {
        position: absolute;
        top: 6px;
        right: 50%;
        transform: translateX(8px);
        background: #000000;
        color: #ffffff;
        border-radius: 12px;
        padding: 2px 6px;
        font-size: 10px;
        font-weight: 600;
        min-width: 18px;
        height: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    /* Active state for bottom nav items */
    .mobile-bottom-nav__item.active .mobile-bottom-nav__item-content {
        color: #ffffff;
    }

    .mobile-bottom-nav__item.active .mobile-bottom-nav__item-content i {
        transform: translateY(-2px);
    }

    /* Ripple effect for clicks */
    .mobile-bottom-nav__item {
        position: relative;
        overflow: hidden;
    }

    .mobile-bottom-nav__item::after {
        content: '';
        position: absolute;
        width: 100%;
        height: 100%;
        background: rgba(234, 178, 44, 0.1);
        opacity: 0;
        border-radius: 50%;
        transform: scale(1);
        transition: all 0.3s ease;
    }

    .mobile-bottom-nav__item:active::after {
        transform: scale(0);
        opacity: 1;
        transition: 0s;
    }

    @media (min-width: 769px) {
        .mobile-bottom-nav {
            display: none;
        }
    }
</style>

<script>
    // Add active state to current navigation item
    document.addEventListener('DOMContentLoaded', function() {
        const currentPath = window.location.pathname;
        const navItems = document.querySelectorAll('.mobile-bottom-nav__item');

        navItems.forEach(item => {
            const link = item.getAttribute('href');
            if (link && currentPath.includes(link)) {
                item.classList.add('active');
            }
        });
    });
</script>