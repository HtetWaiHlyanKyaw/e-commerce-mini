@extends('user.master')
@section('title', 'checkout Page')
@section('style')
    <style>
        #phone_number::-webkit-inner-spin-button,
        #phone_number::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .subtotal,
        .total {
            font-size: 18px;
            /* Adjust the font size as needed */
            font-weight: bold;
            /* Optionally, make the text bold */
        }

        .subtotal-value,
        .total-value {
            font-size: 18px;
            /* Adjust the font size as needed */
            font-weight: bold;
            /* Optionally, make the text bold */
        }


    </style>
@endsection

@section('content')
    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">
        <!-- Cart Button -->
        <!-- <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="{{ asset('user/img/core-img/bag.svg') }}" alt="">
                <span>3</span></a>
        </div> -->

        <!-- Cart Content -->
        <!-- <div class="cart-content d-flex"> -->

            <!-- Cart List Area -->
            <!-- <div class="cart-list"> -->
                <!-- Single Cart Item -->
                <!-- <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="{{ asset('user/img/product-img/product-1.jpg') }}" class="cart-thumb" alt="">
                        <div class="cart-item-desc">
                            <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">Mango</span>
                            <h6>Button Through Strap Mini Dress</h6>
                            <p class="size">Size: S</p>
                            <p class="color">Color: Red</p>
                            <p class="price">$45.00</p>
                        </div>
                    </a>
                </div> -->
                <!-- Single Cart Item -->
                <!-- <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="{{ asset('user/img/product-img/product-2.jpg') }}" class="cart-thumb" alt="">
                        <div class="cart-item-desc">
                            <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">Mango</span>
                            <h6>Button Through Strap Mini Dress</h6>
                            <p class="size">Size: S</p>
                            <p class="color">Color: Red</p>
                            <p class="price">$45.00</p>
                        </div>
                    </a>
                </div> -->
                <!-- Single Cart Item -->
                <!-- <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="{{ asset('user/img/product-img/product-3.jpg') }}" class="cart-thumb" alt="">
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
            </div> -->
            <!-- Cart Summary -->
            <!-- <div class="cart-amount-summary">
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
            </div> -->
        <!-- </div> -->
    </div>
    <!-- ##### Right Side Cart End ##### -->

    <!-- ##### Breadcumb Area Start ##### -->
    {{-- <div class="breadcumb_area bg-img" style="background-image: url(user/img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">
                        <div class="cart-page-heading mb-30">
                            <p style="font-size: 30px;color:black;">Billing Address</p>
                        </div>
                        <form method="POST" action="{{ route('customer_purchase.create') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <label for="account_name" style="font-size: 13px;">Account Name <span>*</span></label>
                                    <input type="text" class="form-control" id="account_name" name="user_id"
                                        value="{{ Auth()->user()->name }}" readonly>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="first_name" style="font-size: 13px;">Full Name <span>*</span></label>
                                    <input type="text" class="form-control" id="first_name" value="" name="full_name" required>
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="email_address" style="font-size: 13px;">Email Address <span>*</span></label>
                                    <input type="email" class="form-control" id="email_address"
                                        value="{{ Auth()->user()->email }}" name="email" readonly>
                                </div>
                                <div class="col-12 mb-4 ">
                                    <label for="city" style="font-size: 13px;">Town/City <span>*</span></label>
                                    <input type="text" class="form-control" id="city" value="" name="town">
                                </div>
                                <div class="col-12 mb-4">
                                    <label for="street_address" style="font-size: 13px;">Address <span>*</span></label>
                                    <input type="text" class="form-control" id="street_address" value="" name="address">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number" style="font-size: 13px;">Phone No <span>*</span></label>
                                    <input type="number" class="form-control" id="phone_number" min="0"
                                        value="" name="phone_no">
                                </div>
                            </div>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">
                        <div class="cart-page-heading">
                            <p style="font-size: 30px;color:black;">Your Order</p>
                            <p style="font-size: 15px;">The Details</p>
                        </div>
                        @if ($multipleProducts)
                            <!-- Blade file for multiple products -->
                            <ul class="order-details-form mb-4">
                                @foreach ($products as $product)
                                    <li><span>Quantity</span> <span>Product</span> <span>Total</span></li>
                                    <li>
                                        <span>{{ $quantity }}</span>
                                        <input type="hidden" name="quantity" value="{{ $quantity }}">
                                        <span>{{ $product->name }}</span>
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <span>{{ $product->price }}</span>
                                        <input type="hidden" name="price" value="{{ $product->price }}">
                                    </li>
                                    <li><span class="subtotal">Subtotal</span> <span></span> <span
                                            class="subtotal-value">{{ $product->price * $quantity }}</span></li>
                                    <input type="hidden" name="subtotal_price" value="{{ $product->price * $quantity }}">
                                @endforeach
                                @php
                                    $total = $products->sum(function ($product) {
                                        return $product->price * $quantity;
                                    });
                                @endphp
                                <li><span class="total">Total</span> <span></span> <span
                                        class="total-value">{{ $total }}</span></li>
                                <input type="hidden" name="total_price" value="{{ $total }}">
                            </ul>
                        @else
                            <!-- Blade file for single product -->
                            <ul class="order-details-form mb-4">
                                <li><b style="font-size: 15px;">Quantity</b> <b style="font-size: 15px;">Product</b> <b style="font-size: 15px;">Total</b></li>
                                <li>
                                    <span style="font-size: 13px;">{{ $quantity }}</span> <!-- Display the quantity -->
                                    <input type="hidden" name="quantity" value="{{ $quantity }}">
                                    <span style="font-size: 13px;">{{ $product->name }}</span> <!-- Display the product name -->
                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                    <span style="font-size: 13px;">{{ $product->price }}</span> <!-- Display the price -->
                                    <input type="hidden" name="price" value="{{ $product->price }}">
                                </li>
                                <li><b class="subtotal">Subtotal</b> <span></span> <span
                                        class="subtotal-value">{{ $product->price * $quantity }}</span></li>
                                <input type="hidden" name="subtotal_price" value="{{ $product->price * $quantity }}">
                                <li><span class="total">Total</span> <span></span> <span
                                        class="total-value">{{ $product->price * $quantity }}</span></li>
                                <input type="hidden" name="total_price" value="{{ $product->price * $quantity }}">
                            </ul>
                        @endif
                        <div id="accordion" role="tablist">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <p class="mb-0">
                                        <label>
                                            <input type="radio" name="payment_method" value="Cash On Delivery">
                                            Cash on Delivery
                                        </label>
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <p class="mb-0">
                                        <label>
                                            <input type="radio" name="payment_method" value="Mobile Banking">
                                            Mobile Banking
                                        </label>
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingThree">
                                    <p class="mb-0">
                                        <label>
                                            <input type="radio" name="payment_method" value="Mobile Wallet">
                                            Mobile Wallet
                                        </label>
                                    </p>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingFour">
                                    <p class="mb-0">
                                        <label>
                                            <input type="radio" name="payment_method" value="Direct Bank Transfer">
                                            Direct Bank Transfer
                                        </label>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <button type="submit"  class="btn essence-btn" style="width: 100%;">Place Order</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
@endsection
