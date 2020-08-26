<header>
    <div class="container1400">
        <div class="d-flex justify-content-between align-items-center h_100">
            <div>
                <a href="/" class="logo">
                    <img src="{{asset('images/user-image/logo.png')}}" alt="LOGO">
                </a>
            </div>
            <div>
                <ul class="h-right transition">
                    
                    @if(Auth::guard('user')->check())
                    <li class="dropdown">
                        <div class="profilr_dp dropdown-toggle" data-toggle="dropdown">
                            <i class="far fa-user-circle"></i>
                            <span>{{Auth::guard('user')->user()->first_name}} {{Auth::guard('user')->user()->last_name}}</span>
                            <i class="fas fa-chevron-down"></i>
                        </div>
                        <div class="dropdown-menu dropdown-menu-right">
                             <a class="dropdown-item" href="/user/dashboard">Dashboard</a>
                            <a class="dropdown-item" href="/user/profile">Settings</a>
                            <a class="dropdown-item" href="/user/logout">Logout</a>
                        </div>
                    </li>
                    @else
                    <li>
                        <a href="/" class="h-txt transition">
                            HOME
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="h-btn transition" data-toggle="modal" data-target="#loginPopup">
                            SIGNIN
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" class="h-btn transition" data-toggle="modal" data-target="#signupPopup">
                            SIGNUP
                        </a>
                    </li>
                    @endif
                </ul>
            </div>
           
            <div class="tg_icon" onclick="myFunction(this)">
                <div class="bar1"></div>
                <div class="bar2"></div>
                <div class="bar3"></div>
            </div>
           
        </div>
    </div>
</header>