@extends('user.master')
@section('title', 'Regular page')
@section('content')


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
                        <img src="{{ asset('user/img/product-img/product-2.jpg') }}" class="cart-thumb" alt="">
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
                        <img src="{{ asset('user/img/product-img/product-3.jpg') }}" class="cart-thumb" alt="">
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
