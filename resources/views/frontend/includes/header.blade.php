<!-- Start Header Style -->
<header>
    <div id="desktopMenu">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 my-auto">
                        <a href="{{ route('landing') }}" class="navbar-brand">
                            <img class="site-logo" src="{{ asset('assets/img/logomem.png') }}" alt="Manokamana Earthmovers - Leading Construction Equipment Supplier in Nepal">
                        </a>
                    </div>
                    <div class="col-md-5 my-auto">
                        <div class="text-center">
                            <form id="topSearch" action="{{ url('search/product') }}" method="post" role="search" aria-label="Desktop product search">
                                {{ csrf_field() }}
                                <input type="text" name="search_text" placeholder="Search Product" aria-label="Search for products">
                                <button type="submit" aria-label="Submit search">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                    <span class="sr-only">Search</span>
                                </button>
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
            <div class="brand-logo">
                <a href="{{ route('landing') }}"><img src="{{ asset('assets/img/logomem.png') }}" alt="Manokamana Earthmovers - Construction Equipment Supplier"> </a>
            </div>

            <div class="menu-trigger"> <i class="fa fa-bars"></i></div>
            @guest
            <a href="{{ route('login') }}" class="mobile-cart">
                <i class="fa fa-shopping-cart"></i>
                <span class="cart-num">(0)</span>
            </a>
            @else
            <a href="{{ url('cart/list') }}" class="mobile-cart">
                <i class="fa fa-shopping-cart"></i>
                <span class="cart-count">({{ Cart::count() }})</span>
            </a>
            @endguest



            @guest
            <a href="{{ route('login') }}" class="more-trigger">
                <i class="fa fa-user"></i>
            </a>
            @else
            <button class="more-trigger" type="button" id="dropdownMenuButtons" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-user"></i>
            </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtons">
                @php
                $currentuser = Auth::user();
                @endphp

                @if ($currentuser->role_id == 1)
                <a class="dropdown-item" href="{{ url('dashboard') }}" style="color:black;">
                    @elseif ($currentuser->role_id==2)
                    <a class="dropdown-item" href="{{ url('dealerdashboard') }}" style="color:black;">
                        @elseif ($currentuser->role_id==3)
                        <a class="dropdown-item" href="{{ url('userdashboard') }}" style="color:black;">
                            @endif
                            <span class="top-login-link">Dashboard</span>
                            <i class="fa fa-dashboard"></i>
                        </a>
                        <a class="dropdown-item" href="{{ route('logout') }}" style="color:black;"
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <span class="top-login-link">{{ __('Logout') }}</span>
                        </a>
            </div>
            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                style="display: none;">
                @csrf
            </form>
            @endguest

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
        <nav class="hs-navigation">
            <ul class="nav-links">

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
                    <span class="its-parent">{{ $cat->category_name }}</span>
                    @else
                    <span class="its-parent">{{ $cat->category_name }}</span>
                    @endif
                    <ul class="its-children">
                        @foreach ($subcats as $subcat)

                        @php
                        $childcats = DB::table('child_categories')
                        ->select('id', 'childcategory_name')
                        ->orderBy('id', 'desc')
                        ->where('subcategory_id', $subcat->id)
                        ->get();
                        @endphp
                        @if ($childcats->count() > 0)
                        <a href="{{ URL::to('/product/subcategory', $subcat->id) }}"
                            class="its-parent">{{ $subcat->subcategory_name }}</a>

                        <ul class="its-children">
                            @foreach ($childcats as $childcat)
                            <li>
                                <a
                                    href="{{ URL::to('/product/childcategory', $childcat->id) }}">{{ $childcat->childcategory_name }}</a>
                            </li>

                            @endforeach
                        </ul>
                        @else
                        <li><a
                                href="{{ URL::to('/product/subcategory', $subcat->id) }}">{{ $subcat->subcategory_name }}</a>

                            @endif
                        </li>
                        @endforeach
                    </ul>
                </li>
                </li>
                @endforeach
            </ul>
        </nav>
    </div>
</header>
<!-- End Offset Wrapper -->