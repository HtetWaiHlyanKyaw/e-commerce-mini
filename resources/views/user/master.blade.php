<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>@yield('title')</title>
    @yield('style')
    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('user/img/core-img/favicon.ico') }}">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset('user/css/core-style.css') }}">
    <link rel="stylesheet" href="{{ asset('user/style.css') }}">

</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="index.html"><img src="{{ asset('user/img/core-img/logo.png') }}"
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
                            <li><a href="#">Shop</a>
                                <div class="megamenu">
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Women's Collection</li>
                                        <li><a href="shop.html">Dresses</a></li>
                                        <li><a href="shop.html">Blouses &amp; Shirts</a></li>
                                        <li><a href="shop.html">T-shirts</a></li>
                                        <li><a href="shop.html">Rompers</a></li>
                                        <li><a href="shop.html">Bras &amp; Panties</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Men's Collection</li>
                                        <li><a href="shop.html">T-Shirts</a></li>
                                        <li><a href="shop.html">Polo</a></li>
                                        <li><a href="shop.html">Shirts</a></li>
                                        <li><a href="shop.html">Jackets</a></li>
                                        <li><a href="shop.html">Trench</a></li>
                                    </ul>
                                    <ul class="single-mega cn-col-4">
                                        <li class="title">Kid's Collection</li>
                                        <li><a href="shop.html">Dresses</a></li>
                                        <li><a href="shop.html">Shirts</a></li>
                                        <li><a href="shop.html">T-shirts</a></li>
                                        <li><a href="shop.html">Jackets</a></li>
                                        <li><a href="shop.html">Trench</a></li>
                                    </ul>
                                    <div class="single-mega cn-col-4">
                                        <img src="{{ asset('user/img/bg-img/bg-6.jpg') }}" alt="">
                                    </div>
                                </div>
                            </li>
                            <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="{{route('user.page')}}">Home</a></li>
                                    <li><a href="{{route('user.shop')}}">Shop</a></li>
                                    <li><a href="{{route('user.detail')}}">Product Details</a></li>
                                    <li><a href="{{route('user.checkout')}}">Checkout</a></li>
                                    <li><a href="{{route('user.blog')}}">Blog</a></li>
                                    <li><a href="{{route('user.Sblog')}}">Single Blog</a></li>
                                    <li><a href="{{route('user.rePage')}}">Regular Page</a></li>
                                    <li><a href="{{route('user.contact')}}">Contact</a></li>
                                </ul>
                            </li>
                            <li><a href="{{route('user.blog')}}">Blog</a></li>
                            <li><a href="{{route('user.contact')}}">Contact</a></li>
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
                        <input type="search" name="search" id="headerSearch" placeholder="Type for search">
                        <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                    </form>
                </div>
                <div class="cart-area">
                    <a href="#" id="essenceCartBtn"><img src="{{ asset('user/img/core-img/bag.svg') }}"
                            alt=""> <span>3</span></a>
                </div>
                <!-- Favourite Area -->
                {{-- <div class="favourite-area">
                    <a href="#"><img src="{{ asset('user/img/core-img/heart.svg') }}" alt=""></a>
                </div> --}}
                <!-- User Login Info -->
                @if (Auth::check())
                <div class="user-login-info">
                    <a href="{{route('user.profile')}}"><img src="{{ asset('user/img/core-img/user.svg') }}" alt=""></a>
                </div>
                @else
                <div class="user-login-info">
                    <a href="{{route('user.login')}}">Sign In</a>
                </div>
                @endif
                <!-- Cart Area -->

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
                    <div class="col-12 col-md-6">
                        <div class="single_widget_area d-flex mb-30">
                            <!-- Logo -->
                            <div class="footer-logo mr-50">
                                <a href="#"><img src="{{ asset('user/img/core-img/logo2.png') }}"
                                        alt=""></a>
                            </div>
                            <!-- Footer Menu -->
                            <div class="footer_menu">
                                <ul>
                                    <li><a href="shop.html">Shop</a></li>
                                    <li><a href="blog.html">Blog</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <!-- Single Widget Area -->
                    <div class="col-12 col-md-6">
                        <div class="single_widget_area mb-30">
                            <ul class="footer_widget_menu">
                                <li><a href="#">Order Status</a></li>
                                <li><a href="#">Payment Options</a></li>
                                <li><a href="#">Shipping and Delivery</a></li>
                                <li><a href="#">Guides</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Terms of Use</a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="row align-items-end">
                    <!-- Single Widget Area -->
                    <div class="col-12 col-md-6">
                        <div class="single_widget_area">
                            <div class="footer_heading mb-30">
                                <h6>Subscribe</h6>
                            </div>
                            <div class="subscribtion_form">
                                <form action="#" method="post">
                                    <input type="email" name="mail" class="mail"
                                        placeholder="Your email here">
                                    <button type="submit" class="submit"><i class="fa fa-long-arrow-right"
                                            aria-hidden="true"></i></button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Single Widget Area -->
                    <div class="col-12 col-md-6">
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
                            Copyright &copy;
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | Made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://colorlib.com"
                                target="_blank">Colorlib</a>, distributed by <a href="https://themewagon.com/"
                                target="_blank">ThemeWagon</a>
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

    </body>

</html>
@yield('script')
