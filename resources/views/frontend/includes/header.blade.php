<!-- Start Header Style -->
<header>
    <div id="desktopMenu">
        <div class="top-header">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 my-auto">
                        <a href="{{ route('landing') }}" class="navbar-brand">
                            <img class="site-logo" src="{{ asset('assets/img/logomem.png') }}">
                        </a>
                    </div>
                    <div class="col-md-5 my-auto">
                        <div class="text-center">
                            <form id="topSearch" action="{{ url('search/product') }}" method="post">
                                {{ csrf_field() }}
                                <input type="text" name="search_text" placeholder="Search Product">
                                <button type="submit">
                                    <i class="fa fa-search"></i>
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
                                <div>
                                    Sales Support
                                </div>
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
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"
                                style="background-color: white">
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
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                style="display: none;">
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
        <div class="menu-bar" id="desktopMenuBar">
            <nav class="navbar navbar-expand-lg">
                <div class="container">
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <i class="fa fa-bars"></i>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                        <ul class="navbar-nav mx-auto">

                            @php
                            $cats = DB::table('categories')
                            ->select('id', 'category_name')
                            ->get();
                            @endphp
                            @foreach ($cats as $cat)
                            <li class="nav-item dropdown">
                                @php
                                $subcats = DB::table('sub_categories')
                                ->select('id', 'category_id', 'subcategory_name')
                                ->orderBy('id', 'desc')
                                ->where('category_id', $cat->id)
                                ->get();
                                @endphp
                                @php $i= 0; @endphp
                                @if ($subcats->count() > 0)
                                <a class="nav-link" href="#">{{ $cat->category_name }}</a>
                                @else
                                <a class="nav-link" href="#">{{ $cat->category_name }}</a>
                                @endif
                                <ul class="dropdown-menu">
                                    @foreach ($subcats as $subcat)

                                    @php
                                    $childcats = DB::table('child_categories')
                                    ->select('id', 'childcategory_name')
                                    ->orderBy('id', 'desc')
                                    ->where('subcategory_id', $subcat->id)
                                    ->get();
                                    @endphp
                                    @if ($childcats->count() > 0)
                                    <li class="dropdown-submenu"><a class="dropdown-item"
                                            href="{{ URL::to('/product/subcategory', $subcat->id) }}">{{ $subcat->subcategory_name }}</a>

                                        <ul class="dropdown-menu">
                                            @foreach ($childcats as $childcat)
                                            <li class="dropdown">
                                                <a class="dropdown-item"
                                                    href="{{ URL::to('/product/childcategory', $childcat->id) }}">{{ $childcat->childcategory_name }}</a>
                                            </li>

                                            @endforeach
                                        </ul>
                                        @else
                                    <li class="dropdown-submenu"><a class="dropdown-item"
                                            href="{{ URL::to('/product/subcategory', $subcat->id) }}">{{ $subcat->subcategory_name }}</a>

                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </li>
                            </li>
                            @endforeach
                            <li class="nav-item dropdown">
                                <a href="" class="nav-link">Company</a>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="{{ url('frontend/about/us') }}">About Us</a>
                                    <a class="dropdown-item" href="{{ route('services') }}">My Care</a>
                                    <a class="dropdown-item" href="{{ route('career') }}">Career</a>
                                    <a class="dropdown-item" href="{{ url('frontend/contact/us') }}">Contact Us</a>
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
                <a href="{{ route('landing') }}"><img src="{{ asset('assets/img/logomem.png') }}" alt="MEM logo"> </a>
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