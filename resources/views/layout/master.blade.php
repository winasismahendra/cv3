<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Alumunindo Jaya Steel</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="master/assets/img/15.ico">

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.2.0/css/font-awesome.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />


    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('master/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('master/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('master/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('master/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('master/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="{{asset('master/assets/css/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{asset('master/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('master/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('master/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('master/assets/css/style.css')}}">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css" />
</head>

<body>
    <!--? Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <img src="master/assets/img/16.png" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Preloader Start -->
    @include('layout.navbar')
    @yield('isi')
    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding">
            <div class="container">
               
                <!-- Footer bottom -->
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-8 col-md-7">
                        <div class="footer-copy-right">
                            <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
  Copyright &copy;<script>document.write(new Date().getFullYear());</script> Sembagi Arutala</a>
  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>                  
                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-4 col-md-5">
                        <div class="footer-copy-right f-right">
                            <!-- social -->
                            <div class="footer-social">
                                <a href="#"><i class="fab fa-twitter"></i></a>
                                <a href="https://www.facebook.com/sai4ull"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-behance"></i></a>
                                <a href="#"><i class="fas fa-globe"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End-->
    </footer>
    <!--? Search model Begin -->
    <div class="search-model-box">
        <div class="h-100 d-flex align-items-center justify-content-center">
            <div class="search-close-btn">+</div>
            <form class="search-model-form">
                <input type="text" id="search-input" placeholder="Searching key.....">
            </form>
        </div>
    </div>
    <!-- Search model end -->

    <!-- JS here -->

    <script src="{{asset('master/./assets/js/vendor/modernizr-3.5.0.min.js')}}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{asset('master/./assets/js/vendor/jquery-1.12.4.min.js')}}"></script>
    <script src="{{asset('master/./assets/js/popper.min.js')}}"></script>
    <script src="{{asset('master/./assets/js/bootstrap.min.js')}}"></script>
    <!-- Jquery Mobile Menu -->
    <script src="{{asset('master/./assets/js/jquery.slicknav.min.js')}}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{asset('master/./assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{asset('master/./assets/js/slick.min.js')}}"></script>

    <!-- One Page, Animated-HeadLin -->
    <script src="{{asset('master/./assets/js/wow.min.js')}}"></script>
    <script src="{{asset('master/./assets/js/animated.headline.js')}}"></script>
    <script src="{{asset('master/./assets/js/jquery.magnific-popup.js')}}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{asset('master/./assets/js/jquery.scrollUp.min.js')}}"></script>
    <script src="{{asset('master/./assets/js/jquery.sticky.js')}}"></script>
    
    <!-- contact js -->
    <script src="{{asset('master/./assets/js/contact.js')}}"></script>
    <script src="{{asset('master/./assets/js/jquery.form.js')}}"></script>
    <script src="{{asset('master/./assets/js/jquery.validate.min.js')}}"></script>
    <script src="{{asset('master/./assets/js/mail-script.js')}}"></script>
    <script src="{{asset('master/./assets/js/jquery.ajaxchimp.min.js')}}"></script>
    
    <!-- Jquery Plugins, main Jquery -->	
    <script src="{{asset('master/./assets/js/plugins.js')}}"></script>
    <script src="{{asset('master/./assets/js/main.js')}}"></script>

    @include('layout.javascripts')
</body>
</html>