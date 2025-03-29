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
                                        class="absolute right-0 top-0 h-full px-4 text-black rounded-r-md hover:bg-">
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
                            <div class="dropdown-menu text-white" aria-labelledby="dropdownMenuButton">
                                @php
                                $currentuser = Auth::user();
                                @endphp

                                @if ($currentuser->role_id == 1)
                                <a class="dropdown-item" href="{{ url('dashboard') }}">
                                    @elseif ($currentuser->role_id==2)
                                    <a class="dropdown-item" href="{{ url('dealerdashboard') }}">
                                        @elseif ($currentuser->role_id==3)
                                        <a class="dropdown-item " href="{{ url('userdashboard') }}">
                                            @endif
                                            <span class="top-login-link text-white hover:text-yellow">Dashboard</span>
                                            <i class="fa fa-dashboard"></i>
                                        </a>
                                        <a class="dropdown-item text-white" href="{{ route('logout') }}"
                                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <span class="top-login-link text-white">{{ __('Logout') }}</span>
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
                    <!-- <div class="flex justify-between items-center px-4 w-full">
                        <div class="menu-trigger-container flex items-center">
                            <button class="menu-trigger" onclick="toggleMobileMenu()">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>
                       
                       
                    </div> -->
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
        <div class="md:hidden"> <!-- Mobile menu -->
            <div class="bg-white shadow-md">
                <!-- Header with 3 items -->
                <div class="flex items-center justify-between px-4 py-3 -mb-28">
                    <!-- Left: Menu Icon -->
                    <div class="flex items-center">
                        <button type="button" onclick="toggleMobileMenu()" class="p-2 hover:text-[#eab22c] transition-colors">
                            <i class="fa text-[#eab22c] fa-bars text-2xl"></i>
                        </button>
                    </div>

                    <!-- Center: Logo -->
                    <div class="flex justify-center">
                        <a href="{{ route('landing') }}">
                            <img src="{{ asset('assets/img/logomem.png') }}"
                                alt="Manokamana Earthmovers"
                                class="h-10 w-auto">
                        </a>
                    </div>

                    <!-- Right: User Icon -->
                    <div class="flex items-center space-x-4">
                        @guest
                        <a href="{{ route('login') }}" class="p-2 text-[#eab22c] hover:text-[#eab22c] transition-colors">
                            <i class="fa fa-user text-2xl"></i>
                        </a>
                        @else
                        <div class="relative">
                            <button type="button"
                                class="p-2  hover:text-[#eab22c] transition-colors"
                                onclick="this.nextElementSibling.classList.toggle('hidden')">
                                <i class="fa fa-user  text-2xl"></i>
                            </button>
                            <div class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
                                @if (Auth::user()->role_id == 1)
                                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    href="{{ url('dashboard') }}">Dashboard</a>
                                @elseif (Auth::user()->role_id == 2)
                                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    href="{{ url('dealerdashboard') }}">Dashboard</a>
                                @elseif (Auth::user()->role_id == 3)
                                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    href="{{ url('userdashboard') }}">Dashboard</a>
                                @endif
                                <a class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                    href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
                            </div>
                        </div>
                        @endguest
                    </div>
                </div>

                <!-- Search bar -->
                <!-- <div class="px-4 py-2">
                    <form action="{{ url('search/product') }}" method="post" class="relative">
                        {{ csrf_field() }}
                        <input type="text"
                            name="search_text"
                            placeholder="Search..."
                            class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#eab22c] focus:border-transparent">
                        <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2">
                            <i class="fa fa-search text-gray-400"></i>
                        </button>
                    </form>
                </div> -->
            </div>

            <!-- Bottom Navigation -->
            <div class="fixed bottom-0 left-0 right-0 bg-[#eab22c] shadow-up z-50">
                <div class="flex justify-around items-center h-16">
                    <a href="{{ route('landing') }}" class="flex flex-col items-center justify-center text-black hover:text-white transition-colors">
                        <i class="fa fa-home text-xl mb-1"></i>
                        <span class="text-xs font-semibold">Home</span>
                    </a>

                    @guest
                    <div class="flex flex-col items-center justify-center relative">
                        <a href="{{ route('login') }}" class="flex flex-col items-center justify-center text-black hover:text-white transition-colors">
                            <div class="relative">
                                <i class="fa fa-shopping-cart text-xl mb-1"></i>
                                <span class="absolute -top-2 -right-2 bg-black text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">0</span>
                            </div>
                            <span class="text-xs font-semibold">Cart</span>
                        </a>
                    </div>
                    @else
                    <div class="flex flex-col items-center justify-center relative">
                        <a href="{{ url('cart/list') }}" class="flex flex-col items-center justify-center text-black hover:text-white transition-colors">
                            <div class="relative">
                                <i class="fa fa-shopping-cart text-xl mb-1"></i>
                                <span class="absolute -top-2 -right-2 bg-black text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">
                                    {{ Cart::count() }}
                                </span>
                            </div>
                            <span class="text-xs font-semibold">Cart</span>
                        </a>
                    </div>
                    @endguest
                </div>
            </div>

            <!-- Mobile Navigation Menu -->
            <nav class="hidden fixed inset-0 bg-white z-40 pt-16 overflow-y-auto">
                <ul class="divide-y divide-gray-100">
                    <li class="px-4 py-3 hover:bg-gray-50">
                        <a href="{{ url('frontend/about/us') }}" class="block">About Us</a>
                    </li>
                    <li class="px-4 py-3 hover:bg-gray-50">
                        <a href="{{ route('services') }}" class="block">My Care</a>
                    </li>
                    <li class="px-4 py-3 hover:bg-gray-50">
                        <a href="{{ route('career') }}" class="block">Career</a>
                    </li>
                    <li class="px-4 py-3 hover:bg-gray-50">
                        <a href="{{ url('frontend/contact/us') }}" class="block">Contact Us</a>
                    </li>
                    <!-- Categories -->
                    @foreach ($cats as $cat)
                    <li class="px-4 py-3 hover:bg-gray-50">
                        <a href="#" class="flex justify-between items-center">
                            {{ $cat->category_name }}
                            @if($subcats->count() > 0)
                            <i class="fas fa-chevron-right text-xs"></i>
                            @endif
                        </a>
                    </li>
                    @endforeach
                </ul>
            </nav>
        </div>
    </div>
</header>
<!-- End Offset Wrapper -->

<!-- Drawer Navigation -->
<div id="navDrawer" class="fixed inset-0 transform -translate-x-full transition-transform duration-300 ease-in-out z-50">
    <!-- Overlay -->
    <div class="absolute inset-0 bg-black bg-opacity-50" onclick="toggleDrawer()"></div>

    <!-- Drawer Content -->
    <div class="absolute top-0 left-0 w-4/5 h-full bg-[#eab22c] transform shadow-lg overflow-y-auto">
        <!-- Drawer Header -->
        <div class="flex items-center justify-between p-4 border-b border-black/10">
            <h2 class="text-lg font-semibold text-black">Menu</h2>
            <button onclick="toggleDrawer()" class="p-2 text-black hover:text-white transition-colors">
                <i class="fa fa-times text-2xl"></i>
            </button>
        </div>

        <!-- Navigation Links -->
        <nav class="divide-y divide-black/10">
            @php
            $cats = DB::table('categories')
            ->select('id', 'category_name')
            ->get();
            @endphp

            @foreach ($cats as $cat)
            @php
            $subcats = DB::table('sub_categories')
            ->select('id', 'category_id', 'subcategory_name')
            ->orderBy('id', 'desc')
            ->where('category_id', $cat->id)
            ->get();
            @endphp

            <div class="category-item">
                <button onclick="toggleSubmenu('submenu-{{ $cat->id }}')"
                    class="w-full flex items-center justify-between p-4 text-black hover:bg-black/10">
                    <span class="font-medium">{{ $cat->category_name }}</span>
                    @if($subcats->count() > 0)
                    <i class="fas fa-chevron-right text-sm transition-transform duration-200"></i>
                    @endif
                </button>

                @if($subcats->count() > 0)
                <div id="submenu-{{ $cat->id }}" class="hidden bg-black/5">
                    @foreach($subcats as $subcat)
                    @php
                    $childcats = DB::table('child_categories')
                    ->select('id', 'childcategory_name')
                    ->orderBy('id', 'desc')
                    ->where('subcategory_id', $subcat->id)
                    ->get();
                    @endphp

                    <div class="subcategory-item">
                        <button onclick="toggleSubmenu('childmenu-{{ $subcat->id }}')"
                            class="w-full flex items-center justify-between p-3 pl-8 text-black hover:bg-black/10">
                            <span>{{ $subcat->subcategory_name }}</span>
                            @if($childcats->count() > 0)
                            <i class="fas fa-chevron-right text-sm transition-transform duration-200"></i>
                            @endif
                        </button>

                        @if($childcats->count() > 0)
                        <div id="childmenu-{{ $subcat->id }}" class="hidden bg-black/5">
                            @foreach($childcats as $childcat)
                            <a href="{{ URL::to('/product/childcategory', $childcat->id) }}"
                                class="block p-3 pl-12 text-black hover:bg-black/10">
                                {{ $childcat->childcategory_name }}
                            </a>
                            @endforeach
                        </div>
                        @endif
                    </div>
                    @endforeach
                </div>
                @endif
            </div>
            @endforeach

            <!-- Company Links -->
            <div class="category-item">
                <button onclick="toggleSubmenu('company-menu')"
                    class="w-full flex items-center justify-between p-4 text-black hover:bg-black/10">
                    <span class="font-medium">Company</span>
                    <i class="fas fa-chevron-right text-sm transition-transform duration-200"></i>
                </button>
                <div id="company-menu" class="hidden bg-black/5">
                    <a href="{{ url('frontend/about/us') }}" class="block p-3 pl-8 text-black hover:bg-black/10">About Us</a>
                    <a href="{{ route('services') }}" class="block p-3 pl-8 text-black hover:bg-black/10">My Care</a>
                    <a href="{{ route('career') }}" class="block p-3 pl-8 text-black hover:bg-black/10">Career</a>
                    <a href="{{ url('frontend/contact/us') }}" class="block p-3 pl-8 text-black hover:bg-black/10">Contact Us</a>
                </div>
            </div>
        </nav>
    </div>
</div>

<script>
    function toggleDrawer() {
        const drawer = document.getElementById('navDrawer');
        drawer.classList.toggle('-translate-x-full');
        document.body.classList.toggle('overflow-hidden');
    }

    function toggleSubmenu(id) {
        const submenu = document.getElementById(id);
        const arrow = event.currentTarget.querySelector('.fa-chevron-right');

        // Close all other submenus at the same level
        const parent = submenu.parentElement.parentElement;
        const siblings = parent.querySelectorAll(`[id^="${id.split('-')[0]}-"]`);
        siblings.forEach(menu => {
            if (menu !== submenu) {
                menu.classList.add('hidden');
                const siblingArrow = menu.parentElement.querySelector('.fa-chevron-right');
                if (siblingArrow) siblingArrow.classList.remove('rotate-90');
            }
        });

        // Toggle current submenu
        submenu.classList.toggle('hidden');
        if (arrow) arrow.classList.toggle('rotate-90');
    }

    // Close drawer when clicking overlay
    document.addEventListener('click', (e) => {
        const drawer = document.getElementById('navDrawer');
        const isDrawerOpen = !drawer.classList.contains('-translate-x-full');

        if (isDrawerOpen && !e.target.closest('.drawer-content') && !e.target.closest('button')) {
            toggleDrawer();
        }
    });

    // Update the existing toggleMobileMenu function
    function toggleMobileMenu() {
        toggleDrawer();
    }
</script>

<style>
    /* Smooth transitions for submenu arrows */
    .fa-chevron-right {
        transition: transform 0.2s ease-in-out;
    }

    .rotate-90 {
        transform: rotate(90deg);
    }

    /* Smooth transitions for submenus */
    [id^="submenu-"],
    [id^="childmenu-"],
    #company-menu {
        transition: all 0.3s ease-in-out;
    }

    /* Optional: Add smooth scrolling to the drawer content */
    #navDrawer .drawer-content {
        scrollbar-width: thin;
        scrollbar-color: #eab22c transparent;
    }

    #navDrawer .drawer-content::-webkit-scrollbar {
        width: 6px;
    }

    #navDrawer .drawer-content::-webkit-scrollbar-track {
        background: transparent;
    }

    #navDrawer .drawer-content::-webkit-scrollbar-thumb {
        background-color: #eab22c;
        border-radius: 3px;
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

<!-- Bottom Navigation -->
<div class="md:hidden fixed bottom-0 left-0 right-0 bg-[#eab22c] shadow-up z-50">
    <div class="flex justify-around items-center h-16">
        <!-- Home -->
        <a href="{{ route('landing') }}" class="flex flex-col items-center justify-center text-black hover:text-white transition-colors">
            <i class="fa fa-home text-xl mb-1"></i>
            <span class="text-xs font-semibold">Home</span>
        </a>

        <!-- Categories -->
        <button onclick="toggleDrawer()" class="flex flex-col items-center justify-center text-black hover:text-white transition-colors">
            <i class="fa fa-th-large text-xl mb-1"></i>
            <span class="text-xs font-semibold">Categories</span>
        </button>

        <!-- Search -->
        <button onclick="toggleSearch()" class="flex flex-col items-center justify-center text-black hover:text-white transition-colors">
            <i class="fa fa-search text-xl mb-1"></i>
            <span class="text-xs font-semibold">Search</span>
        </button>

        <!-- Cart -->
        @guest
        <div class="flex flex-col items-center justify-center relative">
            <a href="{{ route('login') }}" class="flex flex-col items-center justify-center text-black hover:text-white transition-colors">
                <div class="relative">
                    <i class="fa fa-shopping-cart text-xl mb-1"></i>
                    <span class="absolute -top-2 -right-2 bg-black text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">0</span>
                </div>
                <span class="text-xs font-semibold">Cart</span>
            </a>
        </div>
        @else
        <div class="flex flex-col items-center justify-center relative">
            <a href="{{ url('cart/list') }}" class="flex flex-col items-center justify-center text-black hover:text-white transition-colors">
                <div class="relative">
                    <i class="fa fa-shopping-cart text-xl mb-1"></i>
                    <span class="absolute -top-2 -right-2 bg-black text-white text-xs rounded-full h-4 w-4 flex items-center justify-center">
                        {{ Cart::count() }}
                    </span>
                </div>
                <span class="text-xs font-semibold">Cart</span>
            </a>
        </div>
        @endguest
    </div>
</div>

<!-- Search Overlay -->
<div id="searchOverlay" class="md:hidden fixed inset-x-0 bottom-16 bg-white transform translate-y-full transition-transform duration-300 ease-in-out z-40">
    <div class="p-4">
        <form action="{{ url('search/product') }}" method="post" class="relative">
            {{ csrf_field() }}
            <input type="text"
                name="search_text"
                placeholder="Search products..."
                class="w-full px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-[#eab22c] focus:border-transparent"
                autocomplete="off">
            <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-[#eab22c]">
                <i class="fa fa-search"></i>
            </button>
        </form>
    </div>
</div>

<script>
    function toggleSearch() {
        const searchOverlay = document.getElementById('searchOverlay');
        const isHidden = searchOverlay.classList.contains('translate-y-full');

        if (isHidden) {
            searchOverlay.classList.remove('translate-y-full');
            setTimeout(() => {
                searchOverlay.querySelector('input').focus();
            }, 300);
        } else {
            searchOverlay.classList.add('translate-y-full');
        }
    }

    // Close search when clicking outside
    document.addEventListener('click', (e) => {
        const searchOverlay = document.getElementById('searchOverlay');
        const searchButton = document.querySelector('button[onclick="toggleSearch()"]');

        if (!searchOverlay.contains(e.target) && !searchButton.contains(e.target)) {
            searchOverlay.classList.add('translate-y-full');
        }
    });

    // Close search when scrolling
    let lastScrollTop = 0;
    window.addEventListener('scroll', () => {
        const searchOverlay = document.getElementById('searchOverlay');
        const st = window.pageYOffset || document.documentElement.scrollTop;

        if (st > lastScrollTop) {
            searchOverlay.classList.add('translate-y-full');
        }
        lastScrollTop = st <= 0 ? 0 : st;
    }, false);
</script>

<style>
    /* Add smooth shadow for search overlay */
    #searchOverlay {
        box-shadow: 0 -2px 10px rgba(0, 0, 0, 0.1);
    }

    /* Prevent body scroll when search is open */
    body.search-open {
        overflow: hidden;
    }
</style>

<style>
    /* Add styles for active state in bottom nav */
    .bottom-nav-item.active {
        color: white;
    }

    /* Adjust bottom navigation spacing for 4 items */
    .bottom-nav {
        padding: 0 8px;
    }

    .bottom-nav>* {
        flex: 1;
        min-width: 0;
        /* Prevents flex items from overflowing */
    }

    /* Ensure text doesn't wrap and ellipsis if needed */
    .bottom-nav span {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
    }
</style>