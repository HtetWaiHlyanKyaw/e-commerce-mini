@extends('user.master')
@section('title', 'Regular page')
@section('content')

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
                                        <li><a href="index.html">Home</a></li>
                                        <li><a href="shop.html">Shop</a></li>
                                        <li><a href="single-product-details.html">Product Details</a></li>
                                        <li><a href="checkout.html">Checkout</a></li>
                                        <li><a href="blog.html">Blog</a></li>
                                        <li><a href="single-blog.html">Single Blog</a></li>
                                        <li><a href="regular-page.html">Regular Page</a></li>
                                        <li><a href="contact.html">Contact</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog.html">Blog</a></li>
                                <li><a href="contact.html">Contact</a></li>
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
                    <!-- Favourite Area -->
                    <div class="favourite-area">
                        <a href="#"><img src="{{ asset('userimg/core-img/heart.svg') }}" alt=""></a>
                    </div>
                    <!-- User Login Info -->
                    <div class="user-login-info">
                        <a href="#"><img src="{{ asset('user/img/core-img/user.svg') }}" alt=""></a>
                    </div>
                    <!-- Cart Area -->
                    <div class="cart-area">
                        <a href="#" id="essenceCartBtn"><img src="{{ asset('user/img/core-img/bag.svg') }}"
                                alt=""> <span>3</span></a>
                    </div>
                </div>

            </div>
        </header>
        <!-- ##### Header Area End ##### -->

        <!-- ##### Right Side Cart Area ##### -->
        <div class="cart-bg-overlay"></div>

        <div class="right-side-cart-area">

            <!-- Cart Button -->
            <div class="cart-button">
                <a href="#" id="rightSideCart"><img src="{{ asset('user/img/core-img/bag.svg') }}" alt="">
                    <span>3</span></a>
            </div>

            <div class="cart-content d-flex">

                <!-- Cart List Area -->
                <div class="cart-list">
                    <!-- Single Cart Item -->
                    <div class="single-cart-item">
                        <a href="#" class="product-image">
                            <img src="{{ asset('user/img/product-img/product-1.jpg') }}" class="cart-thumb" alt="">
                            <!-- Cart Item Desc -->
                            <div class="cart-item-desc">
                                <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                                <span class="badge">Mango</span>
                                <h6>Button Through Strap Mini Dress</h6>
                                <p class="size">Size: S</p>
                                <p class="color">Color: Red</p>
                                <p class="price">$45.00</p>
                            </div>
                        </a>
                    </div>

                    <!-- Single Cart Item -->
                    <div class="single-cart-item">
                        <a href="#" class="product-image">
                            <img src="{{ asset('user/img/product-img/product-2.jpg') }}" class="cart-thumb"
                                alt="">
                            <!-- Cart Item Desc -->
                            <div class="cart-item-desc">
                                <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                                <span class="badge">Mango</span>
                                <h6>Button Through Strap Mini Dress</h6>
                                <p class="size">Size: S</p>
                                <p class="color">Color: Red</p>
                                <p class="price">$45.00</p>
                            </div>
                        </a>
                    </div>

                    <!-- Single Cart Item -->
                    <div class="single-cart-item">
                        <a href="#" class="product-image">
                            <img src="{{ asset('user/img/product-img/product-3.jpg') }}" class="cart-thumb"
                                alt="">
                            <!-- Cart Item Desc -->
                            <div class="cart-item-desc">
                                <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                                <span class="badge">Mango</span>
                                <h6>Button Through Strap Mini Dress</h6>
                                <p class="size">Size: S</p>
                                <p class="color">Color: Red</p>
                                <p class="price">$45.00</p>
                            </div>
                        </a>
                    </div>
                </div>

                <!-- Cart Summary -->
                <div class="cart-amount-summary">

                    <h2>Summary</h2>
                    <ul class="summary-table">
                        <li><span>subtotal:</span> <span>$274.00</span></li>
                        <li><span>delivery:</span> <span>Free</span></li>
                        <li><span>discount:</span> <span>-15%</span></li>
                        <li><span>total:</span> <span>$232.00</span></li>
                    </ul>
                    <div class="checkout-btn mt-100">
                        <a href="checkout.html" class="btn essence-btn">check out</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Right Side Cart End ##### -->

        <!-- ##### Blog Wrapper Area Start ##### -->
        <div class="single-blog-wrapper">

            <!-- Single Blog Post Thumb -->
            <div class="single-blog-post-thumb">
                <img src="{{ asset('user/img/bg-img/bg-8.jpg') }}" alt="">
            </div>

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12 col-md-8">
                        <div class="regular-page-content-wrapper section-padding-80">
                            <div class="regular-page-text">
                                <h2>Vivamus sed nunc in arcu cursus mollis quis et orci. Interdum et malesuada</h2>
                                <p>Mauris viverra cursus ante laoreet eleifend. Donec vel fringilla ante. Aenean finibus
                                    velit id urna vehicula, nec maximus est sollicitudin. Praesent at tempus lectus,
                                    eleifend blandit felis. Fusce augue arcu, consequat a nisl aliquet, consectetur
                                    elementum turpis. Donec iaculis lobortis nisl, et viverra risus imperdiet eu. Etiam
                                    mollis posuere elit non sagittis. Lorem ipsum dolor sit amet, consectetur adipiscing
                                    elit. Nunc quis arcu a magna sodales venenatis. Integer non diam sit amet magna luctus
                                    mollis ac eu nisi. In accumsan tellus ut dapibus blandit.</p>

                                <blockquote>
                                    <h6><i class="fa fa-quote-left" aria-hidden="true"></i> Quisque sagittis non ex eget
                                        vestibulum. Sed nec ultrices dui. Cras et sagittis erat. Maecenas pulvinar, turpis
                                        in dictum tincidunt, dolor nibh lacinia lacus.</h6>
                                    <span>Liam Neeson</span>
                                </blockquote>

                                <p>Praesent ac magna sed massa euismod congue vitae vitae risus. Nulla lorem augue, mollis
                                    non est et, eleifend elementum ante. Nunc id pharetra magna. Praesent vel orci ornare,
                                    blandit mi sed, aliquet nisi. Class aptent taciti sociosqu ad litora torquent per
                                    conubia nostra, per inceptos himenaeos.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ##### Blog Wrapper Area End ##### -->
    @endsection
