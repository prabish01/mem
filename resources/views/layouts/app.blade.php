<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- <script src="https://cdn.tailwindcss.com"></script> -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Manokamana Earthmovers</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logomem.png')}}">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">


    <!-- All css files are included here. -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/material-design/css/material-design-iconic-font.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('asets/css/owl.carousel.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/hs-menu.min.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}" />


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <title>Manokamana Earthmovers</title>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.22.0.0.0/khalti-checkout.iffe.js"></script>

</head>

<body>
    <div id="app">

        <header>
            <div id="desktopMenu">
                <div class="top-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="top-call">
                                    <i class="fa fa-phone"></i>
                                    +977-1-4444434
                                </div>
                            </div>
                            <div class="col-md-6 ">
                                <div class="top-right">
                                    @guest
                                    <a href="{{route('login')}}" class="top-user">
                                        <i class="fa fa-user"></i>
                                        Sign in
                                    </a>
                                    @else
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    @endguest
                                    @guest
                                    <a href="{{route('login')}}" class="top-cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        (0)
                                    </a>
                                    @else
                                    <a href="{{url('cart/list')}}" class="top-cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        {{ Cart::count() }}
                                    </a>
                                    @endguest
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="logo-bar">
                    <a href="{{ URL::to('/') }}">
                        <img class="top-logo" src="{{asset('assets/img/logomem.png')}}">
                    </a>
                </div>
                <div class="rock-bar">
                    <img class="rock-img" src="{{asset('assets/img/menubg.png')}}">
                </div>
                <div class="menu-bar">
                    <nav class="navbar navbar-expand-lg">
                        <div class="container">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                                <i class="fa fa-bars"></i>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                                <ul class="navbar-nav mx-auto">

                                    @php
                                    $cats = DB::table('categories')->select('id','category_name')->get();
                                    @endphp
                                    @foreach($cats as $cat)
                                    <li class="nav-item dropdown">
                                        @php
                                        $subcats = DB::table('sub_categories')->select('id','category_id','subcategory_name')->orderBy('id','desc')->where('category_id',$cat->id)->get();
                                        @endphp
                                        @php $i= 0; @endphp
                                        @if($subcats->count() > 0)
                                        <a class="nav-link" href="{{ URL::to('/product/category',$cat->id) }}">{{$cat->category_name}}</a>
                                        @else
                                        <a class="nav-link" href="{{ URL::to('/product/category',$cat->id) }}">{{$cat->category_name}}</a>
                                        @endif
                                        <div class="dropdown-menu">
                                            @foreach($subcats as $subcat)
                                            <a class="dropdown-item" href="{{ URL::to('/product/subcategory',$subcat->id) }}">{{$subcat->subcategory_name}}</a>
                                            @endforeach
                                        </div>
                                    </li>
                                    @endforeach
                                    <li class="nav-item dropdown">
                                        <a href="" class="nav-link">Company</a>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="{{ url('frontend/about/us')}}">About Us</a>
                                            <a class="dropdown-item" href="{{route('services')}}">Our Services</a>
                                            <a class="dropdown-item" href="{{url('frontend/contact/us')}}">Contact Us</a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
        </header>

        @yield('login')

        <footer style="background-image: url('{{asset('assets/img/footerbg.png')}}');">
            <div id="preFooter">
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 first">
                            <img class="footer-logo" src="{{asset('assets/img/logomem.png')}}">
                            <div class="footer-li">
                                44600, Nayabaneshwor, Kathmandu, Nepal
                            </div>
                            <div class="footer-li">
                                9800112233, 9844556677
                            </div>
                            <div class="footer-li">
                                info@website.com
                            </div>
                        </div>
                        <div class="col-md-4 second">
                            <div class="footer-title">Quick Links</div>
                            <div class="footer-li"><a href="">Blog</a></div>
                            <div class="footer-li"><a href="">FAQ</a></div>
                            <div class="footer-li"><a href="">Terms & Conditions</a></div>
                            <div class="footer-li"><a href="">Privacy Policy</a></div>
                            <div class="footer-li"><a href="">Return Policy</a></div>
                        </div>
                        <div class="col-md-4 third">
                            <div class="footer-title">Follow Us</div>
                            <div class="footer-social">
                                <a href="" target="_blank">
                                    <img src="{{asset('assets/img/facebook.png')}}">
                                </a>
                                <a href="" target="_blank">
                                    <img src="{{asset('assets/img/instagram.png')}}">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright">
                <div class="container">
                    © {{date('Y')}} Manokamana Earthmovers. All Rights Reserved.
                    Powered by <a href="https://www.facebook.com/AnkkurGoyalOfficial" target="_blank">
                        <img class="ankur-img" src="{{asset('assets/img/ankurlogo.png')}}" />
                    </a>
                </div>
            </div>
        </footer>

    </div>


    <a id="back-to-top" href="#" class="btn back-to-top" role="button"><i class="fa fa-chevron-up"></i></a>

    <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/jquery.hsmenu.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/owl.carousel.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/wow.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>

</body>

</html>