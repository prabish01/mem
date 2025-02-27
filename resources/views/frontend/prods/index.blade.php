<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Manokamana Earthmovers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;300;400;500;600;700&display=swap"
        rel="stylesheet">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/img/logomem.png') }}">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- All css files are included here. -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css"
        href="{{ asset('assets/material-design/css/material-design-iconic-font.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/font-awesome/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.carousel.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/owl.theme.default.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/animate.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/hs-menu.min.css') }}" />

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/responsive.css') }}" />

    <title>Manokamana Earthmovers</title>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.22.0.0.0/khalti-checkout.iffe.js"></script>

</head>

<body>
    <div id="app">

        <!-- Body main wrapper start -->
        <div class="wrapper"><!-- Start Header Style -->
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
                                                @php
                                                $infoPhone = DB::table('infos')
                                                ->select('phone')
                                                ->first();
                                                @endphp
                                                <a href="tel:{{ $infoPhone->phone }}">{{ $infoPhone->phone }}</a>
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
                                            $loginUrl = 'dashboard';

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
                                            <a class="nav-link"
                                                href="{{ URL::to('/product/category', $cat->id) }}">{{ $cat->category_name }}</a>
                                            @else
                                            <a class="nav-link"
                                                href="{{ URL::to('/product/category', $cat->id) }}">{{ $cat->category_name }}</a>
                                            @endif
                                            <div class="dropdown-menu">
                                                @foreach ($subcats as $subcat)
                                                <a class="dropdown-item"
                                                    href="{{ URL::to('/product/subcategory', $subcat->id) }}">{{ $subcat->subcategory_name }}</a>
                                                @endforeach
                                            </div>
                                        </li>
                                        @endforeach
                                        <li class="nav-item dropdown">
                                            <a href="" class="nav-link">Company</a>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ url('frontend/about/us') }}">About Us</a>
                                                <a class="dropdown-item" href="{{ route('services') }}">My Care</a>
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

                </div>
            </header>

            @include('flashMsg.flashmessages')

            <style>
                .mySlides {
                    display: none;
                    width: 100%;
                    height: 500px;
                }

                .i-am-centered {
                    margin: auto;
                    max-width: 90%;
                }

                body {
                    background-color: whitesmoke;
                }

                #container1 {
                    min-height: 800px;
                    margin-top: 50px;
                }
            </style>
            <div class="container" id="container1">
                <div class="i-am-centered">
                    <div class="row ">
                        <div class="col-sm-10">

                            <div class="w3-content w3-display-container" style="background-color:white; padding: 5px;  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.5);
                                                                            transition: 0.3s;
                                                                            min-width: 40%;
                                                                            border-radius: 5px;">
                                <picture>
                                    <source type="image/webp" srcset="{{ asset('uploads/prods/' . pathinfo($prods->prods_image, PATHINFO_FILENAME) . '.webp') }}"
                                        sizes="(max-width: 768px) 100vw, 800px">
                                    <img class="mySlides" src="{{ asset('uploads/prods/' . $prods->prods_image) }}"
                                        loading="lazy"
                                        alt="{{ $prods->prods_title }}"
                                        style="width: 100%; height: auto; max-height: 500px; object-fit: contain;">
                                </picture>
                            </div>
                        </div>
                        <div class="col-sm-2">
                            @if ($prods->childlink->count() > 0)
                            <div class="jMyCarousel">
                                <ul>
                                    @foreach ($prods->childlink as $childlink)
                                    <li>
                                        <picture>
                                            <source type="image/webp" srcset="{{ asset('uploads/prodslink/' . pathinfo($childlink->filename, PATHINFO_FILENAME) . '.webp') }}">
                                            <img src="{{ asset('uploads/prodslink/' . $childlink->filename) }}"
                                                width="150" height="150"
                                                loading="lazy"
                                                alt="Product image {{ $loop->iteration }}"
                                                style="object-fit: cover;">
                                        </picture>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            @endif
                        </div>

                    </div>
                    <div class="">
                        <h1 class="text-2xl font-bold text-gray-900 mb-4">{{ $prods->prods_title }}</h1>
                        <br>
                        <h2 class="text-xl font-semibold text-gray-900 mb-3">Description</h2>
                        <div class="prose max-w-none">
                            <p class="text-gray-700">{{ $prods->prods_description }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @include('frontend.includes.footer')

        </div>
        <!-- Body main wrapper end -->

        <!-- Placed js at the end of the document so the pages load faster -->
        <a id="back-to-top" href="#" class="btn back-to-top" role="button"><i class="fa fa-chevron-up"></i></a>

        <script type="text/javascript" src="{{ asset('assets/js/mycarousel/js/jquery-1.2.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/mycarousel/js/jMyCarousel.min.js') }}"></script>

        <script type="text/javascript" src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/jquery.hsmenu.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/owl.carousel.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/wow.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets/js/custom.js') }}"></script>



        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/js/mycarousel/css/example3.css') }}" />
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">


        <script>
            $(function() {
                $(".jMyCarousel").jMyCarousel({
                    visible: '100%',
                    auto: false,
                    vertical: true,
                    speed: 500
                });

                var slideIndex = 1;
                showDivs(slideIndex);

            });
            var slideIndex = 1;

            function plusDivs(n) {
                showDivs(slideIndex += n);
            }

            function showDivs(n) {
                var i;
                var x = document.getElementsByClassName("mySlides");
                if (n > x.length) {
                    slideIndex = 1
                }
                if (n < 1) {
                    slideIndex = x.length
                }
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                x[slideIndex - 1].style.display = "block";
            }
        </script>
</body>

</html>