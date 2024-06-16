<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="logo-pro">
                <a href="index.html"><img class="main-logo" src="img/logo/logo.png" alt="" /></a>
            </div>
        </div>
    </div>
</div>

<div class="header-advance-area">
    <div class="header-top-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="header-top-wraper">
                        <div class="row">
                            <div class="col-lg-1 col-md-0 col-sm-1 col-xs-12">
                                <div class="menu-switcher-pro">
                                    <button type="button" id="sidebarCollapse" class="btn bar-button-pro header-drl-controller-btn btn-info navbar-btn">
                                            <i class="icon nalika-menu-task"></i>
                                        </button>
                                </div>
                            </div>  
                            <div class="col-lg-11 col-md-5 col-sm-12 col-xs-12">
                                <div class="header-right-info">
                                    <ul class="nav navbar-nav mai-top-nav header-right-menu">
                                        <li class="nav-item">
                                            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="nav-link dropdown-toggle">
                                                    <i class="icon nalika-user"></i>
                                                    <span class="admin-name">
                                                       @if (Auth::guard('mitra')->user())
                                                            {{ Auth::guard('mitra')->user()->email }}
                                                       @else
                                                            {{ Auth::user()->nama }}
                                                       @endif 
                                                    </span>
                                                    <i class="icon nalika-down-arrow nalika-angle-dw"></i>
                                                </a>
                                            <ul role="menu" class="dropdown-header-top author-log dropdown-menu animated zoomIn"> 
                                                <li><a href="#"><span class="icon nalika-user author-log-ic"></span> My Profile</a>
                                                </li> 
                                                <li><a href="#"><span class="icon nalika-settings author-log-ic"></span> Settings</a>
                                                </li>
                                                <li><a href="{{ url('/logout') }}"><span class="icon nalika-unlocked author-log-ic"></span> Log Out</a>
                                                </li>
                                            </ul>
                                        </li> 
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu start -->
    <div class="mobile-menu-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul class="mobile-menu-nav">
                                <li><a data-toggle="collapse" data-target="#Charts" href="#">Home <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                    <ul class="collapse dropdown-header-top">
                                        <li><a href="index.html">Dashboard v.1</a></li>
                                        <li><a href="index-1.html">Dashboard v.2</a></li> 
                                    </ul>
                                </li>
                                <li><a data-toggle="collapse" data-target="#demo" href="#">Mailbox <span class="admin-project-icon nalika-icon nalika-down-arrow"></span></a>
                                    <ul id="demo" class="collapse dropdown-header-top">
                                        <li><a href="mailbox.html">Inbox</a>
                                        </li>
                                        <li><a href="mailbox-view.html">View Mail</a>
                                        </li>
                                        <li><a href="mailbox-compose.html">Compose Mail</a>
                                        </li>
                                    </ul>
                                </li> 
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Mobile Menu end -->
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
                                <div class="breadcomb-wp"> 

                                    @yield('breadcomb-ctn')
                                   
                                </div>
                            </div> 
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>