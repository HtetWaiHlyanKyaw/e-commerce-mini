@extends('user.master')
@section('title', 'E_commerce Home Page')
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('cart')
    <a href="{{ route('cartList') }}" class="btn position-relative">
        @if ($cart && count($cart) > 0)
            <img src="{{ asset('user/img/core-img/bag.svg') }}" alt="">
            <span style="margin-top:32px; margin-left:10px"
                class="position-absolute start-80 me-5 translate-middle badge rounded-pill bg-light">
                {{ count($cart) }}
                <span class="visually-hidden">unread messages</span>
            </span>
        @else
            <img src="{{ asset('user/img/core-img/bag.svg') }}" alt="">
            <span style="margin-top:32px; margin-left:10px"
                class="position-absolute start-80 me-5 translate-middle badge rounded-pill bg-light">
                0
                <span class="visually-hidden">unread messages</span>
            </span>
        @endif
    </a>
@endsection
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
            @foreach ($topBanner as $banner)
                <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                    @if ($banner->image_1)
                        <img src="{{ asset('storage/topBanner/' . $banner->image_1) }}" alt="..." class="d-block w-100"
                            style="height: 90vh; object-fit: cover; object-position: top;">
                    @endif
                </div>

                <div class="carousel-item">
                    @if ($banner->image_2)
                        <img src="{{ asset('storage/topBanner/' . $banner->image_2) }}" alt="..." class="d-block w-100"
                            style="height: 90vh; object-fit: cover; object-position: top;">
                    @endif
                </div>

                <div class="carousel-item">
                    @if ($banner->image_3)
                        <img src="{{ asset('storage/topBanner/' . $banner->image_3) }}" alt="..." class="d-block w-100"
                            style="height: 90vh; object-fit: cover; object-position: center;">
                    @endif
                </div>
            @endforeach
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
                        @foreach ($topProducts as $modelId => $topProduct)
                            <div class="single-product-wrapper">
                                <!-- Product Image -->
                                <div class="product-img">
                                    {{-- <img src="{{ asset('user/img/product-img/product-1.jpg') }}" alt=""> --}}
                                    <!-- Hover Thumb -->
                                    {{-- <img class="hover-img" src="{{ asset('user/img/product-img/product-2.jpg') }}"
                                alt=""> --}}
                                    <img src="{{ asset('storage/products/' . $topProduct->first()->image) }}"
                                        alt="Product Image">

                                </div>
                                <div class="product-description">
                                    <a href="{{ route('user.productDetails', ['model_id' => $modelId]) }}">
                                        <h6>{{ $topProduct->first()->name }}</h6>
                                    </a>
                                    <!-- Hover Content -->
                                    <div class="hover-content">
                                        <!-- Add to Cart -->
                                        <div class="add-to-cart-btn">
                                            @if (Auth::check() && Auth::user()->usertype == 'customer')
                                                <button class="btn essence-btn add-to-cart"
                                                    data-product-id="{{ $topProduct->first()->id }}">Add to
                                                    Cart</button>
                                            @elseif (!Auth::check())
                                                <a href="{{ route('user.login') }}" class="btn essence-btn">Add to Cart</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div id="carouselExampleControls" class="carousel carousel-dark slide d-none d-sm-block" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($middleBanner as $key => $banner)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="cards-wrapper">
                        <div class="image-wrapper" style="width: 33.33%;">
                            <img src="{{ asset('storage/middleBanner/' . $banner->image_1) }}" alt="..."
                                style="height: 300px; width: 100%; object-fit:cover; object-position:center;">
                        </div>
                        <div class="image-wrapper" style="width: 33.33%;">
                            <img src="{{ asset('storage/middleBanner/' . $banner->image_2) }}" alt="..."
                                style="height: 300px; width: 100%;  object-fit:cover; object-position:center;">
                        </div>
                        <div class="image-wrapper" style="width: 33.33%;">
                            <img src="{{ asset('storage/middleBanner/' . $banner->image_3) }}" alt="..."
                                style="height: 300px; width: 100%;  object-fit:cover; object-position:center;">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
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
                        @foreach ($newestProducts as $modelId => $newProduct)
                            <div class="single-product-wrapper">
                                <!-- Product Image -->
                                <div class="product-img">
                                    <img src="{{ asset('storage/products/' . $newProduct->first()->image) }}"
                                        alt="Product Image">

                                </div>
                                <div class="product-description">
                                    <a href="{{ route('user.productDetails', ['model_id' => $modelId]) }}">
                                        <h6>{{ $newProduct->first()->name }}</h6>
                                    </a>
                                    <!-- Hover Content -->
                                    <div class="hover-content">
                                        <!-- Add to Cart -->
                                        <div class="add-to-cart-btn">
                                            @if (Auth::check() && Auth::user()->usertype == 'customer')
                                                <button class="btn essence-btn add-to-cart"
                                                    data-product-id="{{ $newProduct->first()->id }}">Add to Cart</button>
                                            @elseif (!Auth::check())
                                                <a href="{{ route('user.login') }}" class="btn essence-btn">Add to
                                                    Cart</a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        @if (Auth::check())
                            <input type="hidden" id="userId" value="{{ Auth::user()->id }}">
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- New Arrival end --}}
    {{-- Advertise start --}}
    <div id="carouselExampleControls" class="carousel carousel-dark slide d-none d-sm-block" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($BottomBanner as $key => $banner)
                <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                    <div class="cards-wrapper">
                        <div class="image-wrapper" style="width: 33.33%;">
                            <img src="{{ asset('storage/BottomBanner/' . $banner->image_1) }}" alt="..."
                                style="height: 300px; width: 100%; object-fit:cover; object-position:center;">
                        </div>
                        <div class="image-wrapper" style="width: 33.33%;">
                            <img src="{{ asset('storage/BottomBanner/' . $banner->image_2) }}" alt="..."
                                style="height: 300px; width: 100%;  object-fit:cover; object-position:center;">
                        </div>
                        <div class="image-wrapper" style="width: 33.33%;">
                            <img src="{{ asset('storage/BottomBanner/' . $banner->image_3) }}" alt="..."
                                style="height: 300px; width: 100%;  object-fit:cover; object-position:center;">
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- Advertise end --}}

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('.add-to-cart').click(function() {
                let userId = $('#userId').val();
                var productId = $(this).data('product-id');
                console.log(productId);
                console.log(userId);
                $.ajax({
                    type: 'post',
                    url: '/cart/add',
                    data: {
                        'userId': userId,
                        'productId': productId,
                        'qty': 1 // You can set the quantity here, or prompt the user for quantity
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Redirect to localhost:8000
                        window.location.href = 'http://localhost:8000';
                    },
                    error: function(xhr, textStatus, errorThrown) {
                        // Handle error responses
                        console.error(xhr.responseText);
                    }
                });
            });
        });
    </script>
@endsection
