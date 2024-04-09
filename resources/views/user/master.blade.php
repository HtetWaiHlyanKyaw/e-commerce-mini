<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield('title')</title>
    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('user/img/Unity Source Logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset('user/css/core-style.css') }}">
    <link rel="stylesheet" href="{{ asset('user/style.css') }}">
    @yield('style');
</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="{{ route('user.page') }}"><img src="{{ asset('user/img/uni.png') }}"
                        alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="{{ route('user.page') }}">Home</a></li>
                            <li><a href="#">Products</a>
                                <ul class="dropdown">
                                    <li><a href="{{ route('user.page') }}">Home</a></li>
                                    <li><a href="{{ route('user.shop') }}">Shop</a></li>
                                    <li><a href="{{ route('user.detail') }}">Product Details</a></li>
                                    <li><a href="{{ route('user.checkout') }}">Checkout</a></li>
                                    <li><a href="{{ route('user.blog') }}">Blog</a></li>
                                    <li><a href="{{ route('user.Sblog') }}">Single Blog</a></li>
                                    <li><a href="{{ route('user.rePage') }}">Regular Page</a></li>
                                    <li><a href="{{ route('user.contact') }}">Contact</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('user.blog') }}">About us</a></li>
                            <li><a href="{{ route('user.contact') }}">Contact us</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end">
                <!-- Search Area -->
                <div class="search-area">
                    <form action="#" method="post">
                        <input type="search" name="search" id="headerSearch" placeholder="Search product">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                {{-- <!-- Favourite Area -->
                <div class="favourite-area">
                    <a href="#"><img src="{{ asset('user/img/core-img/heart.svg') }}" alt=""></a>
                </div> --}}
                <!-- User Login Info -->
                <div class="user-login-info">
                    <a href="#"><img src="{{ asset('user/img/core-img/user.svg') }}" alt=""></a>
                </div>
                <!-- Cart Area -->
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="{{ asset('user/img/core-img/bag.svg') }}"
                            alt=""><span></span></a>
                </div>
            </div>

        </div>
    </header>
    <!-- ##### Header Area End ##### -->



    @yield('content')





    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row">
                <!-- Single Widget Area -->
                <div class="col-md-4 col-sm-6">
                    <div class="single_widget_area d-flex mb-10">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="#"><img class="logo" src="{{ asset('user/img/uni.png') }}"
                                    alt=""></a>
                        </div>
                        <!-- Footer Menu -->
                        {{-- <div class="footer_menu">
                            <ul>
                                <li><a href="{{ route('user.page') }}">Home</a></li>
                                <li><a href="{{ route('user.shop') }}">Shop</a></li>
                                <li><a href="{{ route('user.blog') }}">About us</a></li>
                                <li><a href="{{ route('user.contact') }}">Contact us</a></li>
                            </ul>
                        </div> --}}
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-md-4 col-sm-6">
                    <div class="single_widget_area mb-30">
                        <ul class="footer_widget_menu">
                            <li><a href="#">Order Status</a></li>
                            <li><a href="#">Payment Options</a></li>
                            <li><a href="#">Guides</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms of Service</a></li>
                            <li><a href="#">FAQs</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="single_widget_area mb-30">
                        <ul class="footer_widget_menu">
                            <li><a href="#"><i class="fa fa-phone"></i> 09775656968</a></li>
                            <li></li>
                            <li><a href="#"><i class="fa fa-envelope"></i> aungsung@gmail.com</a></li>
                            <li></li>
                            <li><a href="#"><i class="fa fa-location-arrow"></i> Bahan </a></li>
                        </ul>
                    </div>
                </div>


            </div>

            <div class="row align-items-end">
                <!-- Single Widget Area -->
                <div class="col-md-6 col-sm-6">
                    <div class="single_widget_area">
                        <div class="footer_heading mb-30">
                            <h6>Subscribe</h6>
                        </div>
                        <div class="subscribtion_form">
                            <form action="#" method="post">
                                <input type="email" name="mail" class="mail" placeholder="Your mail......">
                                <button type="submit" class="submit"><i class="fa fa-long-arrow-right"
                                        aria-hidden="true"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-md-6 col-sm-6">
                    <div class="single_widget_area">
                        <div class="footer_social_area">
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i
                                    class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i
                                    class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i
                                    class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i
                                    class="fa fa-pinterest" aria-hidden="true"></i></a>
                            <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i
                                    class="fa fa-youtube-play" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        All rights reserved
                        <script>
                            document.write(new Date().getFullYear());
                        </script> | Unlock the Future with Us <i class="fa fa-heart-o"
                            aria-hidden="true"></i> <br> distributed by <b>Unity Source IT Solution</b>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>

        </div>
    </footer>

    <!-- ##### Footer Area End ##### -->

    <!-- jQuery (Necessary for All JavaScript Plugins) -->
    <script src="{{ asset('user/js/jquery/jquery-2.2.4.min.js') }}"></script>
    <!-- Popper js -->
    <script src="{{ asset('user/js/popper.min.js') }}"></script>
    <!-- Bootstrap js -->
    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>
    <!-- Plugins js -->
    <script src="{{ asset('user/js/plugins.js') }}"></script>
    <!-- Classy Nav js -->
    <script src="{{ asset('user/js/classy-nav.min.js') }}"></script>
    <!-- Active js -->
    <script src="{{ asset('user/js/active.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

</body>

</html>
