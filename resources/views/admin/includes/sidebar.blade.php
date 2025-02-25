<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            {{-- <div class="pull-left image">
                <img src="/img/default_user.png" class="img-circle" alt="User Image"/>
            </div> --}}
            <div class="pull-left info">
                <p></p>

                <a href=""><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{url('/')}}">
                    <i class="fa fa-dashboard"></i> <span>View Website</span>
                </a>
            </li>

            <li class="header">User Management </li>
            <li>
                <a href="{{url('endusers/view')}}">
                    <i class="fa fa-users"></i> <span> End Users</span>
                </a>
            </li>
            <li>
                <a href="{{url('dealers/view')}}">
                    <i class="fa fa-user"></i> <span> Dealers</span>
                </a>
            </li>
            <li>
                <a href="{{url('dealers/all-request')}}">
                    <i class="fa fa-user-secret"></i> <span> Dealer's Request </span>
                </a>
            </li>
            <li class="header">Product Management </li>
            <li>
                <a href="{{url('category/view')}}">
                    <i class="fa fa-users"></i> <span> Categories </span>
                </a>
            </li>
            <li>
                <a href="{{url('subcategory/view')}}">
                    <i class="fa fa-users"></i> <span> Sub Categories </span>
                </a>
            </li>
             <li>
                <a href="{{url('childcategory/view')}}">
                    <i class="fa fa-users"></i> <span> Child Categories </span>
                </a>
            </li>
            <li>
                <a href="{{url('admin-product/view')}}">
                    <i class="fa fa-users"></i> <span> Products </span>
                </a>
            </li>
            <li class="header">Services </li>
            <li>
                <a href="{{url('service/view')}}">
                    <i class="fa fa-sliders"></i> <span> Services </span>
                </a>
            </li>
            <li class="header">Sliders & Partners </li>
            <li>
                <a href="{{url('slider/view')}}">
                    <i class="fa fa-sliders"></i> <span> Sliders </span>
                </a>
            </li>
            <li>
                <a href="{{url('rate/view')}}">
                    <i class="fa fa-sliders"></i> <span> Rated Data </span>
                </a>
            </li>
            <li>
                <a href="{{url('testimonal/view')}}">
                    <i class="fa fa-users"></i> <span> Testimonals </span>
                </a>
            </li>
            <li>
                <a href="{{url('partner/view')}}">
                    <i class="fa fa-users"></i> <span> Partners </span>
                </a>
            </li>
            <li class="header">About & Blogs </li>
            <li>
                <a href="{{url('about/view')}}">
                    <i class="fa fa-home"></i> <span> About </span>
                </a>
            </li>
            <li>
                <a href="{{url('blog/view')}}">
                    <i class="fa fa-bold"></i> <span> Blogs </span>
                </a>
            </li>
            <li class="header"> Order Management</li>
            <li>
                <a href="{{url('orders/all')}}">
                    <i class="fa fa-shopping-cart"></i><span>All Orders</span>
                </a>
            </li>
            <li>
                <a href="{{url('orders/pending')}}">
                    <i class="fa fa-cart-plus"></i><span>Pending Orders</span>
                </a>
            </li>
            <li>
                <a href="{{url('orders/delivered')}}">
                    <i class="fa fa-truck"></i><span>Delivered Orders</span>
                </a>
            </li>
            <li class="header">Form management</li>
            <li>
                <a href="{{url('job/view')}}">
                    <i class="fa fa-truck"></i><span>Job Vacancy</span>
                </a>
            </li>
            <li>
                <a href="{{url('career/view')}}">
                    <i class="fa fa-truck"></i><span>Vacancy Post</span>
                </a>
            </li>
            <li>
                <a href="{{url('form/contact')}}">
                    <i class="fa fa-truck"></i><span>Contact Us Message</span>
                </a>
            </li>
            <li>
                <a href="{{url('complain/view')}}">
                    <i class="fa fa-truck"></i><span>Complaint Details</span>
                </a>
            </li>
            <li class="header">Quick Links</li>
            <li>
                <a href="{{url('info/view')}}">
                    <i class="fa fa-phone"></i><span>Contact Info</span>
                </a>
            </li>
            <li>
                <a href="{{url('faq/view')}}">
                    <i class="fa fa-truck"></i><span>Faqs</span>
                </a>
            </li>
            <li>
                <a href="{{url('page/view')}}">
                    <i class="fa fa-book-open"></i><span>Pages</span>
                </a>
            </li>
             <li class="header">Catalogues</li>
            <li>
                <a href="{{url('catalogue/view')}}">
                    <i class="fa fa-book"></i><span>All Catalogues</span>
                </a>
            </li>
               <li class="header">Products Detail</li>
            <li>
                <a href="{{ url('prods/view') }}">
                    <i class="fa fa-book"></i><span>All Products</span>
                </a>
            </li>
            <li>
                <a href="{{ url('prodslink/view') }}">
                    <i class="fa fa-book"></i><span>Link To Products</span>
                </a>
            </li>
        </ul>
    </section>
</aside>
