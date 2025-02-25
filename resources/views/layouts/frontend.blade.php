<!doctype html>
<html class="no-js" lang="en">

<head>
    <script src="https://cdn.tailwindcss.com"></script>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Manokamana Earthmovers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

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

    <title>Manokamana Earthmovers</title>
    <script src="https://khalti.com/static/khalti-checkout.js"></script>


    <!-- parallel js styling -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets\js\parallaxjs\css\categorystyle.css') }}" />
    <style>
        /*.dropdown-menu {*/
        /*    max-height: 580px;*/
        /*    overflow-y: auto;*/
        /*}*/

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
    </style>
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
        <!-- Body main wrapper end -->

        <!-- Placed js at the end of the document so the pages load faster -->
        <a id="back-to-top" href="#" class="btn back-to-top" role="button"><i class="fa fa-chevron-up"></i></a>

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
                };
                var proto = document.location.protocol,
                    host = "getbutton.io",
                    url = proto + "//static." + host;
                var s = document.createElement('script');
                s.type = 'text/javascript';
                s.async = true;
                s.src = url + '/widget-send-button/js/init.js';
                s.onload = function() {
                    WhWidgetSendButton.init(host, proto, options);
                };
                var x = document.getElementsByTagName('script')[0];
                x.parentNode.insertBefore(s, x);
            })();
        </script>
        <!-- /GetButton.io widget -->
</body>

</html>