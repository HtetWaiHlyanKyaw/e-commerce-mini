@extends('user.master')
@section('title', 'E_commerce Home Page')

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
<div id="carouselExampleIndicators" class="carousel carousel-dark slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner" style="margin-top: -25px;">
        <div class="carousel-item active">
            <img src="{{ asset('images/googleEcoSystem.webp') }}" alt="..."  class="d-block w-100" style="height: 100vh; object-fit: cover; object-position: top;">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/s24Advertisement.jpg') }}" alt="..." class="d-block w-100 " style="height: 100vh; object-fit: cover; object-position: top;">
        </div>
        <div class="carousel-item">
            <img src="{{ asset('images/Iphone15Advertisement.webp') }}" alt="..." class="d-block w-100 " style="height: 100vh; object-fit: cover; object-position: center;">
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
<section class="new_arrivals_area section-padding-3 mb-8  clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2 style="margin-top:50px;">Best Sellers</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">

                    <!-- Single Product -->
                    @foreach($topProducts as $modelId => $topProduct)
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            {{-- <img src="{{ asset('user/img/product-img/product-1.jpg') }}" alt=""> --}}
                            <!-- Hover Thumb -->
                            {{-- <img class="hover-img" src="{{ asset('user/img/product-img/product-2.jpg') }}"
                                alt=""> --}}
                                <img src="{{ asset('storage/products/' . $topProduct->first()->image) }}" alt="Product Image">

                        </div>
                        <div class="product-description">
                            <a href="{{ route('user.productDetails', ['model_id' => $modelId]) }}">
                                <h6>{{$topProduct->first()->name}}</h6>
                            </a>
                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <a href="#" class="btn essence-btn">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Single Product -->
                    {{-- <div class="single-product-wrapper">
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
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</section>
<div id="carouselExampleControls" class="carousel carousel-dark slide d-none d-sm-block " data-bs-ride="carousel">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="cards-wrapper">
                {{-- <div class="card"> --}}
                    <div class="image-wrapper" style="width: 33.33%;">
                        <img src="{{ asset('images/GooglePixelAdvertisement.webp') }}" alt="..." style="height: 300px; width: 100%; object-fit:cover; object-position:center;">

                    </div>

                    <div class="image-wrapper" style="width: 33.33%;">
                        <img src="{{ asset('images/OppoAdvertisement.png') }}" alt="..." style="height: 300px; width: 100%;  object-fit:cover; object-position:center;">
                    </div>

                    <div class="image-wrapper" style="width: 33.33%;">
                        <img src="{{ asset('images/VivoAdvertisement.webp') }}" alt="..." style="height: 300px; width: 100%;  object-fit:cover; object-position:center;">
                    </div>

            </div>
        </div>
        {{-- <div class="carousel-item">
            <div class="cards-wrapper">

                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-3.jpg') }}" alt="...">
                    </div>

                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-4.jpg') }}" alt="...">
                    </div>

                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-6.jpg') }}" alt="...">
                    </div>
            </div>
        </div>
        <div class="carousel-item">
            <div class="cards-wrapper">

                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-1.jpg') }}" alt="...">
                    </div>

                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-2.jpg') }}" alt="...">
                    </div>

                    <div class="image-wrapper">

                    <img src="{{ asset('user/img/product-img/product-3.jpg') }}" alt="...">
                </div>
            </div>
        </div> --}}
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
                    <h2 style="margin-top:50px;">New Arrivals</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">

                    <!-- Single Product -->
                    @foreach($newestProducts as $modelId => $newProduct)
                    <div class="single-product-wrapper">
                        <!-- Product Image -->
                        <div class="product-img">
                            {{-- <img src="{{ asset('user/img/product-img/product-1.jpg') }}" alt=""> --}}
                            <!-- Hover Thumb -->
                            {{-- <img class="hover-img" src="{{ asset('user/img/product-img/product-2.jpg') }}"
                                alt=""> --}}
                                <img src="{{ asset('storage/products/' . $newProduct->first()->image) }}" alt="Product Image">

                        </div>
                        <div class="product-description">
                            <a href="{{ route('user.productDetails', ['model_id' => $modelId]) }}">
                                <h6>{{$newProduct->first()->name}}</h6>
                            </a>
                            <!-- Hover Content -->
                            <div class="hover-content">
                                <!-- Add to Cart -->
                                <div class="add-to-cart-btn">
                                    <a href="#" class="btn essence-btn">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <!-- Single Product -->
                    {{-- <div class="single-product-wrapper">
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
                    </div> --}}
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
                {{-- <div class="card"> --}}
                    <div class="image-wrapper" style="width: 33.33%;">
                        <img src="{{ asset('images/OppoAdvertisement.png') }}" alt="..." style="height: 300px; width: 100%; object-fit:cover; object-position:center;">

                    </div>

                    <div class="image-wrapper" style="width: 33.33%;">
                        <img src="{{ asset('images/GooglePixelAdvertisement.webp') }}" alt="..." style="height: 300px; width: 100%;  object-fit:cover; object-position:center;">
                    </div>

                    <div class="image-wrapper" style="width: 33.33%;">
                        <img src="{{ asset('images/VivoAdvertisement.webp') }}" alt="..." style="height: 300px; width: 100%;  object-fit:cover; object-position:center;">
                    </div>

            </div>
        </div>
        {{-- <div class="carousel-item">
            <div class="cards-wrapper">

                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-3.jpg') }}" alt="...">
                    </div>

                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-4.jpg') }}" alt="...">
                    </div>

                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-6.jpg') }}" alt="...">
                    </div>

            </div>
        </div>
        <div class="carousel-item">
            <div class="cards-wrapper">

                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-1.jpg') }}" alt="...">
                    </div>

                    <div class="image-wrapper">
                        <img src="{{ asset('user/img/product-img/product-2.jpg') }}" alt="...">
                    </div>

                    <div class="image-wrapper">

                    <img src="{{ asset('user/img/product-img/product-3.jpg') }}" alt="...">
                </div>
            </div>
        </div> --}}
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
