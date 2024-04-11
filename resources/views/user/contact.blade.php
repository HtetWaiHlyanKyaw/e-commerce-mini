@extends('user.master')
@section('title', 'E_commerce Home Page')
@section('content')


    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="{{asset('user/img/core-img/bag.svg')}}" alt=""> <span>3</span></a>
        </div>

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list">
                <!-- Single Cart Item -->
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="{{asset('user/img/product-img/product-1.jpg')}}" class="cart-thumb" alt="">
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
                        <img src="{{asset('user/img/product-img/product-2.jpg')}}" class="cart-thumb" alt="">
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
                        <img src="{{asset('user/img/product-img/product-3.jpg')}}" class="cart-thumb" alt="">
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


    <div class="contact-area d-flex align-items-center" style="margin-bottom: 50px">
        <div class="col-1"></div>
        <!-- Start Google Maps -->
    <div class="col-6">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2559.969678045116!2d96.13854013548465!3d16.872141471202216!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c19593972dc929%3A0x3a0affceedf80ff4!2sMawrawaddy%20Condo!5e0!3m2!1sen!2smm!4v1712724137449!5m2!1sen!2smm" width="700" height="450" style="border:0;border-radius: 10px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    </div>
        {{-- <div class="google-map">
            <div id="googleMap"></div>
        </div> --}}
        {{-- <div class="col-1"></div> --}}
        <div class="contact-info col-4">
            <h2>How to Find Us</h2>
            <p>Mauris viverra cursus ante laoreet eleifend. Donec vel fringilla ante. Aenean finibus velit id urna vehicula, nec maximus est sollicitudin.</p>

            <div class="contact-address ">
               <p><span>address:</span></p>
                    <p>Room No.(7-A),(7) Floor,Mawyawaddy Condo,Pyay Road,(8) Mile,Mayangone Township,Yangon.</p>

                <p class="mt-30" style="color: black;"><span>telephone</span>+959 449 992 916</p>


                <p ><span>Email</span><a href="mailto:unitysource123@gmail.com" class="text-dark" style=" text-decoration: underline;text-color:black">unitysource123@gmail.com</a><p>
                {{-- <p><a href="mailto:contact@essence.com">contact@essence.com</a></p> --}}

            </div>
        </div>
    </div>
@endsection
