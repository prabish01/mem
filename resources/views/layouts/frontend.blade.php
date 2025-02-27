<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title', 'Manokamana Earthmovers - Leading Construction Equipment Supplier in Nepal')</title>
    <meta name="description" content="@yield('meta_description', 'Manokamana Earthmovers is Nepal\'s premier supplier of construction equipment, earthmoving machinery, and industrial parts. We offer high-quality products with excellent after-sales service.')">
    <meta name="keywords" content="@yield('meta_keywords', 'construction equipment, earthmoving machinery, industrial parts, Nepal, Manokamana Earthmovers')">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="index, follow">
    <meta property="og:title" content="@yield('og_title', 'Manokamana Earthmovers - Construction Equipment Supplier')">
    <meta property="og:description" content="@yield('og_description', 'Leading supplier of construction equipment and earthmoving machinery in Nepal')">
    <meta property="og:image" content="{{ asset('assets/img/logomem.png') }}">
    <meta property="og:url" content="{{ url()->current() }}">
    <link rel="canonical" href="{{ url()->current() }}" />

    <!-- Load Tailwind CSS first -->
    <!-- @vite('resources/css/app.css') -->

    <link href="https://fonts.googleapis.com/css2?family=Yanone+Kaffeesatz:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Place favicon.ico in the root directory -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/img/logomem.png')}}">
    <link rel="apple-touch-icon" href="apple-touch-icon.png">

    <!-- All css files are included here. -->
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/material-design/css/material-design-iconic-font.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/font-awesome/css/all.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.carousel.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/owl.theme.default.min.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/animate.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/hs-menu.min.css')}}" />

    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/custom.css')}}" />
    <link rel="stylesheet" type="text/css" href="{{asset('assets/css/responsive.css')}}" />

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- Load Tailwind CSS last -->

    <title>Manokamana Earthmovers</title>
    <script src="https://khalti.com/static/khalti-checkout.js"></script>

    <!-- parallel js styling -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets\js\parallaxjs\css\categorystyle.css') }}" />
    <style>
        /* Override Tailwind's preflight styles */
        .navbar-nav {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .navbar-nav li {
            margin: 0;
        }

        .navbar-nav a {
            color: inherit;
            text-decoration: none;
        }

        /* Preserve Bootstrap's dropdown functionality */
        .navbar-nav li:hover>ul.dropdown-menu {
            display: block;
        }

        .dropdown-submenu {
            position: relative;
        }

        .dropdown-submenu>.dropdown-menu {
            top: 0;
            left: 100%;
            margin-top: -6px;
        }

        /* rotate caret on hover */
        .dropdown-menu>li>a:hover:after {
            text-decoration: underline;
            transform: rotate(-90deg);
        }

        .card {
            box-shadow: 0 0 10px 0 rgba(100, 100, 100, 0.26);
        }

        /* Ensure Bootstrap's navbar styles take precedence */
        .navbar {
            display: flex !important;
        }

        .navbar-collapse {
            display: flex !important;
        }

        .navbar-nav {
            display: flex !important;
        }

        .nav-link {
            display: block !important;
            padding: 0.5rem 1rem !important;
        }

        .dropdown-menu {
            position: absolute !important;
            display: none;
            min-width: 10rem;
            padding: 0.5rem 0;
            margin: 0;
            background-color: #fff;
            border: 1px solid rgba(0, 0, 0, .15);
            border-radius: 0.25rem;
        }
    </style>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body>
    <div id="app">
        <!-- Body main wrapper start -->
        <div class="wrapper">
            @include('frontend.includes.header')
            @include('flashMsg.flashmessages')
            @yield('content')
            @include('frontend.includes.footer')
        </div>

        <!-- Messenger Button with SEO-friendly links -->
        <div class="messenger-container" role="region" aria-label="Contact us via messenger">
            <div class="messenger-links" id="messenger-options">
                <a href="https://wa.me/97715184300" class="messenger-link whatsapp" aria-label="Contact Manokamana Earthmovers on WhatsApp">
                    <i class="fab fa-whatsapp" aria-hidden="true"></i>
                    <span class="visually-hidden">Contact on WhatsApp</span>
                </a>
                <a href="viber://chat?number=+97798512758887" class="messenger-link viber" aria-label="Contact Manokamana Earthmovers on Viber">
                    <i class="fab fa-viber" aria-hidden="true"></i>
                    <span class="visually-hidden">Contact on Viber</span>
                </a>
            </div>
            <button type="button" class="messenger-button" name="messenger-toggle" aria-label="Open messaging options" aria-expanded="false" aria-controls="messenger-options" aria-haspopup="true">
                <i class="far fa-comment-dots" aria-hidden="true"></i>
                <span class="visually-hidden">Open messaging options</span>
            </button>
        </div>

        <!-- Back to top button with proper accessibility -->
        <button type="button" id="back-to-top" class="btn back-to-top" name="back-to-top" aria-label="Scroll back to top">
            <i class="fa fa-chevron-up" aria-hidden="true"></i>
            <span class="visually-hidden">Back to top of page</span>
        </button>

        <style>
            .messenger-container {
                position: fixed;
                bottom: 20px;
                right: 20px;
                z-index: 9999;
            }

            .messenger-button {
                width: 50px;
                height: 50px;
                border-radius: 50%;
                background: #FF6550;
                border: none;
                color: white;
                font-size: 20px;
                cursor: pointer;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
            }

            .messenger-links {
                position: absolute;
                bottom: 60px;
                right: 0;
                display: flex;
                flex-direction: column;
                gap: 10px;
                opacity: 0;
                visibility: hidden;
                transform: translateY(10px);
                transition: all 0.3s ease;
            }

            .messenger-container:hover .messenger-links {
                opacity: 1;
                visibility: visible;
                transform: translateY(0);
            }

            .messenger-link {
                width: 40px;
                height: 40px;
                border-radius: 50%;
                display: flex;
                align-items: center;
                justify-content: center;
                color: white;
                text-decoration: none;
                transition: transform 0.2s;
            }

            .messenger-link:hover {
                transform: scale(1.1);
            }

            .messenger-link.whatsapp {
                background: #25D366;
            }

            .messenger-link.viber {
                background: #665CAC;
            }

            .visually-hidden {
                position: absolute;
                width: 1px;
                height: 1px;
                padding: 0;
                margin: -1px;
                overflow: hidden;
                clip: rect(0, 0, 0, 0);
                white-space: nowrap;
                border: 0;
            }

            /* Back to top button styles */
            .back-to-top {
                position: fixed;
                bottom: 20px;
                left: 20px;
                z-index: 9999;
                width: 40px;
                height: 40px;
                border-radius: 50%;
                background: #FF6550;
                color: white;
                display: flex;
                align-items: center;
                justify-content: center;
                text-decoration: none;
                opacity: 0;
                visibility: hidden;
                transition: all 0.3s ease;
            }

            .back-to-top.active {
                opacity: 1;
                visibility: visible;
            }

            .back-to-top:hover {
                background: #e65442;
                color: white;
            }
        </style>

        <!-- Placed js at the end of the document so the pages load faster -->
        <a id="back-to-top" href="#" class="btn back-to-top" role="button"><i class="fa fa-chevron-up"></i></a>

        <!-- All your script includes -->
        <script type="text/javascript" src="{{asset('assets/js/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/popper.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/jquery.hsmenu.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/owl.carousel.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/wow.min.js')}}"></script>
        <script type="text/javascript" src="{{asset('assets/js/custom.js')}}"></script>

        <!-- parallel js -->
        <script type="text/javascript" src="{{ asset('assets/js/parallaxjs/jquery.parallaxmouse.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('assets\js\parallaxjs\js\categorystyle.js') }}"></script>
    </div>

    <!-- Add tooltips for better UX -->
    <style>
        /* Tooltip container */
        [data-tooltip] {
            position: relative;
        }

        /* Tooltip text */
        [data-tooltip]:before {
            content: attr(data-tooltip);
            position: absolute;
            right: 120%;
            top: 50%;
            transform: translateY(-50%);
            padding: 8px 12px;
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            font-size: 14px;
            border-radius: 6px;
            white-space: nowrap;
            opacity: 0;
            visibility: hidden;
            transition: opacity 0.3s, visibility 0.3s;
        }

        /* Show tooltip on hover */
        [data-tooltip]:hover:before {
            opacity: 1;
            visibility: visible;
        }

        /* Animation for messenger options */
        #messengerOptions {
            transition: all 0.3s ease-in-out;
        }

        #messengerOptions.hidden {
            opacity: 0;
            transform: translateY(20px);
        }

        #messengerOptions:not(.hidden) {
            opacity: 1;
            transform: translateY(0);
            display: flex !important;
        }

        /* Smooth transition for main button */
        #messengerToggle {
            transition: transform 0.3s ease-in-out;
        }
    </style>
</body>

</html>