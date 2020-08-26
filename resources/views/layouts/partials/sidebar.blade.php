<nav class="pcoded-navbar menupos-fixed menu-light brand-blue ">
   <div class="navbar-wrapper ">
      <div class="navbar-brand header-logo">
         <a href="index.html" class="b-brand">
            <!-- <div class="b-bg">
               <i class="fas fa-bolt"></i>
               </div>
               <span class="b-title">Flash Able</span> -->
            <img src="{{asset('images/logo.png')}}" alt="" class="logo images" width="90px;">
            <img src="{{asset('images/logo.png')}}" alt="" class="logo-thumb images" width="90px;">
         </a>
         <a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
      </div>
      <div class="navbar-content scroll-div   " >
         <ul class="nav pcoded-inner-navbar ">
            <li class="nav-item pcoded-menu-caption">
               <label>Johan ventures</label>
            </li>
            <li data-username="dashboard default ecommerce sales Helpdesk ticket CRM analytics project" class="nav-item">
               <a href="/admin/home" class="nav-link"><span class="pcoded-micon"><i class="feather icon-home"></i></span>Dashboard</a>
            </li>
            
            @if(Auth::guard('admin')->user()->user_type==1)

            <li data-username="dashboard default ecommerce sales Helpdesk ticket CRM analytics project" class="nav-item pcoded-hasmenu">
               <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Users</span></a>
               <ul class="pcoded-submenu">
                  <li class=""><a href="/admin/users" class="">User List</a></li>
                  <li class=""><a href="/admin/add-user" class="">Add New</a></li>
               </ul>
            </li>
            <li data-username="vertical horizontal box layout RTL fixed static collapse menu color icon dark background image" class="nav-item pcoded-hasmenu">
               <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="feather icon-user"></i></span><span class="pcoded-mtext">Lab Executive</span></a>
               <ul class="pcoded-submenu">
                   <li class=""><a href="/admin/labexecutives" class="">Executive List</a></li>
                  <li class=""><a href="/admin/add-labexecutive" class="">Add New</a></li>
               </ul>
            </li>
            <li data-username="vertical horizontal box layout RTL fixed static collapse menu color icon dark background image" class="nav-item pcoded-hasmenu">
               <a href="#!" class="nav-link"><span class="pcoded-micon"><i class="fas fa-medkit"></i></span><span class="pcoded-mtext">Kit Management</span></a>
               <ul class="pcoded-submenu">
                   <li class=""><a href="/admin/kit" class="">Kits</a></li>
                  <li class=""><a href="/admin/add-kit" class="">Add New</a></li>
               </ul>
            </li>
            <li data-username="vertical horizontal box layout RTL fixed static collapse menu color icon dark background image" class="nav-item pcoded-hasmenu">
                  <a href="/admin/taxonomy" class="nav-link"><span class="pcoded-micon"><i class="fas fa-list"></i></span><span class="pcoded-mtext">Taxonomy</span></a>
            </li>
             <li data-username="vertical horizontal box layout RTL fixed static collapse menu color icon dark background image" class="nav-item pcoded-hasmenu">
                  <a href="/admin/contact-us" class="nav-link"><span class="pcoded-micon"><i class="fas fa-list"></i></span><span class="pcoded-mtext">Contact Us</span></a>
            </li>
            @endif
            <li data-username="vertical horizontal box layout RTL fixed static collapse menu color icon dark background image" class="nav-item pcoded-hasmenu">
                  <a href="/labexecutive/sample" class="nav-link"><span class="pcoded-micon"><i class="fas fa-vials"></i></span><span class="pcoded-mtext">Sample</span></a>
            </li>
         </ul>
       
      </div>
   </div>
</nav>