<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                {{-- <img src="/img/default_user.png" class="img-circle" alt="User Image"/> --}}
            </div>
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
            <li class="header">User</li>
            <li>
                <a href="{{url('userdashboard')}}">
                    <i class="fa fa-shopping-cart"></i><span>My Profile</span>
                </a>
            </li> 
            <li>
                <a href="{{url('changePasswordForm')}}">
                    <i class="fa fa-shopping-cart"></i><span>Change my Password</span>
                </a>
            </li> 
            <li class="header">Orders</li>
            <li>
                <a href="{{url('myorderslist')}}">
                    <i class="fa fa-shopping-cart"></i><span>My Orders</span>
                </a>
            </li> 
            <li class="header">My Care</li>
            <li>
                <a href="{{url('/my/care')}}">
                    <i class="fa fa-truck"></i><span>Create New Complain</span>
                </a>
            </li> 
           
        </ul>
    </section>
</aside>
