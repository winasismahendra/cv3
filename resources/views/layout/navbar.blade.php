<header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header header-sticky">
                <div class="container-fluid">
                    <div class="menu-wrapper">
                        <!-- Logo -->
                        <div class="logo">
                            <a href="/"><img src="master/assets/img/16.png" style="width: 80px" alt=""></a>
                        </div>
                        <!-- Main-menu -->
                        <div class="main-menu d-none d-lg-block">
                            <nav>                                                
                                <ul id="navigation">  
                                    <li><a href="{{route('rumah')}}">Home</a></li>
                                    <li><a href="{{route('toko')}}">shop</a></li>
                                    <li><a href="{{route ('tentang')}} ">about</a></li>
                                    <li><a href="{{route ('gallery')}} ">Gallery</a></li>
                                    <li><a href="{{route('kontak')}}">Contact</a></li>
                                </ul>
                            </nav>
                        </div>
                        <!-- Header Right -->
                        <div class="header-right">
                            <ul>
                                <li>
                                    <div class="nav-search search-switch">
                                        <span class="flaticon-search"></span>
                                    </div>
                                </li>
                                <li> <a href="{{route('user')}}"><span class="flaticon-user"></span></a>
                                </li>
                                <li id="cart_header"><a href="{{route('cart')}}"><span id="nav-cart" class="flaticon-shopping-cart"><small class="badge badge-secondary">{{Cart::content()->count()}}</small></span></a> </li>
                            @guest

                            @else
                          <li><div class="dropdown show">
                          <a class="dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            
                            Hi, {{Auth::user()->name}}

                          </a>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 21px, 0px); top: 0px; left: 0px; will-change: transform;">
                            <a class="dropdown-item" href="#">Setting</a>
                            <a class="dropdown-item" href="{{route ('order.history')}} ">Order History</a>
                            <a class="dropdown-item" href="{{ route('logout') }}">Logout </a>
                          </div>
                        </div></li>
                        @endguest
                            </ul>
                        </div>
                    </div>
                    <!-- Mobile Menu -->
                    <div class="col-12">
                        <div class="mobile_menu d-block d-lg-none"></div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>