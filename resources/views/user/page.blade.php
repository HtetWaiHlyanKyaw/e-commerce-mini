@extends('user.master')
@section('title', 'E_commerce Home Page')
@section('content')
@section('style')
    <style>
        @media screen and (min-width: 568px) {
            .cards-wrapper {
                display: flex;
            }


            .card {
                margin: 0 .5rem;
                width: calc(100/3);
            }


            .img-wrapper {
                height: 22vw;
                margin: 0 auto;
                /* display: flex;
                align-items: center;
                justify-content: center; */
            }
        }

        @media screen and (max-width:680px) {
            .card:not(:first-child) {
                display: none;
            }
        }

        .img-wrapper img {
            max-width: 100%;
            max-height: 100%;
        }
    </style>


@endsection
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

<!-- ##### Welcome Area Start ##### -->
{{-- <section class="welcome_area bg-img background-overlay" style="background-image: url(user/img/bg-img/bg-1.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="hero-content">
                        <h6>asoss</h6>
                        <h2>New Collection</h2>
                        <a href="#" class="btn essence-btn">view collection</a>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}

<div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="user/img/bg-img/bg-1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="user/img/bg-img/bg-1.jpg" class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item">
            <img src="user/img/bg-img/bg-1.jpg" class="d-block w-100" alt="...">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<!-- ##### Welcome Area End ##### -->

<!-- ##### Top Catagory Area Start ##### -->
{{-- <div class="container">
        <div class="row justify-content-center">
            <!-- Single Catagory -->
            <div class="col-12 col-sm-4 col-md-4">
                <div class="single_catagory_area d-flex align-items-start  bg-img">
                    <div class="catagory-content">
                        <a href="#">Apple</a>
                    </div>
                </div>
            </div>
            <!-- Single Catagory -->
            <div class="col-12 col-sm-4 col-md-4">
                <div class="single_catagory_area d-flex g-img">
                    <div class="catagory-content">
                        <a href="#">Samsung</a>
                    </div>
                </div>
            </div>
            <!-- Single Catagory -->
            <div class="col-12 col-sm-4 col-md-4">
                <div class="single_catagory_area d-flex bg-img">
                    <div class="catagory-content">
                        <a href="#">Oppo</a>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}






<!-- ##### Top Catagory Area End ##### -->

<!-- ##### CTA Area Start ##### -->
{{-- <div class="cta-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cta-content bg-img background-overlay"
                        style="background-image: url(user/img/bg-img/bg-5.jpg);">
                        <div class="h-100 d-flex align-items-center justify-content-end">
                            <div class="cta--text">
                                <h6>-60%</h6>
                                <h2>Global Sale</h2>
                                <a href="#" class="btn essence-btn">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
<!-- ##### CTA Area End ##### -->

<!-- ##### New Arrivals Area Start ##### -->
<section class="new_arrivals_area section-padding-3 mb-8  clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Best Seller</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">

                    <!-- Single Product -->
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="{{ asset('user/img/product-img/product-1.jpg') }}" alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="{{ asset('user/img/product-img/product-2.jpg') }}"
                                alt="">
                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>topshop</span>
                            <a href="single-product-details.html">
                                <h6>Knot Front Mini Dress</h6>
                            </a>
                            <p class="product-price">$80.00</p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <a href="#" class="btn essence-btn">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Product -->
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="{{ asset('user/img/product-img/product-2.jpg') }}" alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="{{ asset('user/img/product-img/product-3.jpg') }}"
                                alt="">
                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>topshop</span>
                            <a href="single-product-details.html">
                                <h6>Poplin Displaced Wrap Dress</h6>
                            </a>
                            <p class="product-price">$80.00</p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <a href="#" class="btn essence-btn">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Product -->
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="{{ asset('user/img/product-img/product-3.jpg') }}" alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="{{ asset('user/img/product-img/product-4.jpg') }}"
                                alt="">

                            <!-- Product Badge -->
                            <div class="product-badge offer-badge">
                                <span>-30%</span>
                            </div>

                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>mango</span>
                            <a href="single-product-details.html">
                                <h6>PETITE Crepe Wrap Mini Dress</h6>
                            </a>
                            <p class="product-price"><span class="old-price">$75.00</span> $55.00</p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <a href="#" class="btn essence-btn">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Product -->
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="{{ asset('user/img/product-img/product-4.jpg') }}" alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="{{ asset('user/img/product-img/product-5.jpg') }}"
                                alt="">

                            <!-- Product Badge -->
                            <div class="product-badge new-badge">
                                <span>New</span>
                            </div>

                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>mango</span>
                            <a href="single-product-details.html">
                                <h6>PETITE Belted Jumper Dress</h6>
                            </a>
                            <p class="product-price">$80.00</p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <a href="#" class="btn essence-btn">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ##### New Arrivals Area End ##### -->

<!-- ##### Brands Area Start ##### -->
{{-- <div class="brands-area d-flex align-items-center justify-content-between">
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('user/img/core-img/brand1.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('user/img/core-img/brand2.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('user/img/core-img/brand3.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('user/img/core-img/brand4.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('user/img/core-img/brand5.png') }}" alt="">
        </div>
        <!-- Brand Logo -->
        <div class="single-brands-logo">
            <img src="{{ asset('user/img/core-img/brand6.png') }}" alt="">
        </div>
    </div> --}}
<!-- ##### Brands Area End ##### -->

{{-- Advertise start --}}
<div id="carouselExampleControls" class="carousel carousel-dark slide d-none d-sm-block " data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="cards-wrapper">
                <div class="card">
                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-5.jpg') }}" alt="...">

                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card">
                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-1.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card">
                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-2.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="cards-wrapper">
                <div class="card">
                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-3.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card">
                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-4.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Ssome quick example text to build on the card title and make up the bulk
                            of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card">
                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-6.jpg') }}" alt="...">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="cards-wrapper">
                <div class="card">
                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-1.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card">
                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-2.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card">
                    <div class="image-wrapper">
                    </div>
                    <img src="{{ asset('user/img/product-img/product-3.jpg') }}" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
{{-- Advertise end --}}
{{-- New Arrival start --}}

<section class="new_arrivals_area section-padding-3 mb-8  clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2>Best Seller</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">

                    <!-- Single Product -->
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="{{ asset('user/img/product-img/product-1.jpg') }}" alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="{{ asset('user/img/product-img/product-2.jpg') }}"
                                alt="">
                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>topshop</span>
                            <a href="single-product-details.html">
                                <h6>Knot Front Mini Dress</h6>
                            </a>
                            <p class="product-price">$80.00</p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <a href="#" class="btn essence-btn">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Product -->
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="{{ asset('user/img/product-img/product-2.jpg') }}" alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="{{ asset('user/img/product-img/product-3.jpg') }}"
                                alt="">
                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>topshop</span>
                            <a href="single-product-details.html">
                                <h6>Poplin Displaced Wrap Dress</h6>
                            </a>
                            <p class="product-price">$80.00</p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <a href="#" class="btn essence-btn">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Product -->
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="{{ asset('user/img/product-img/product-3.jpg') }}" alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="{{ asset('user/img/product-img/product-4.jpg') }}"
                                alt="">

                            <!-- Product Badge -->
                            <div class="product-badge offer-badge">
                                <span>-30%</span>
                            </div>

                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>mango</span>
                            <a href="single-product-details.html">
                                <h6>PETITE Crepe Wrap Mini Dress</h6>
                            </a>
                            <p class="product-price"><span class="old-price">$75.00</span> $55.00</p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <a href="#" class="btn essence-btn">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Single Product -->
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            <img src="{{ asset('user/img/product-img/product-4.jpg') }}" alt="">
                            <!-- Hover Thumb -->
                            <img class="hover-img" src="{{ asset('user/img/product-img/product-5.jpg') }}"
                                alt="">

                            <!-- Product Badge -->
                            <div class="product-badge new-badge">
                                <span>New</span>
                            </div>

                            <!-- Favourite -->
                            <div class="product-favourite">
                                <a href="#" class="favme fa fa-heart"></a>
                            </div>
                        </div>
                        <!-- Product Description -->
                        <div class="product-description">
                            <span>mango</span>
                            <a href="single-product-details.html">
                                <h6>PETITE Belted Jumper Dress</h6>
                            </a>
                            <p class="product-price">$80.00</p>

                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <a href="#" class="btn essence-btn">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- New Arrival end --}}


{{-- Advertise start --}}
<div id="carouselExampleControls" class="carousel carousel-dark slide d-none d-sm-block " data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="cards-wrapper">
                <div class="card">
                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-5.jpg') }}" alt="...">

                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card">
                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-1.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card">
                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-2.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="cards-wrapper">
                <div class="card">
                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-3.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card">
                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-4.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Ssome quick example text to build on the card title and make up the bulk
                            of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card">
                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-6.jpg') }}" alt="...">
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="cards-wrapper">
                <div class="card">
                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-1.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card">
                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-2.jpg') }}" alt="...">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
                <div class="card">
                    <div class="image-wrapper">
                    </div>
                    <img src="{{ asset('user/img/product-img/product-3.jpg') }}" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                            the card's content.</p>
                        <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
{{-- Advertise end --}}

@endsection
