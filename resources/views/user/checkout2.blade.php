@extends('user.master')
@section('title', 'checkout2 Page')
@section('style')

@endsection

@section('content')
    <!-- ##### Right Side Cart Area ##### -->
    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">
        <!-- Cart content goes here -->
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
    <div class="breadcumb_area bg-img" style="background-image: url(user/img/bg-img/breadcumb.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="page-title text-center">
                        <h2>Checkout</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Breadcumb Area End ##### -->

    <!-- ##### Checkout Area Start ##### -->
    <div class="checkout_area section-padding-80">
        <div class="container">
            <div class="row">

                <div class="col-12 col-md-6">
                    <div class="checkout_details_area mt-50 clearfix">

                        <div class="cart-page-heading mb-30">
                            <h5>Billing Address</h5>
                        </div>

                        <form method="POST" action="{{ route('customer_purchase.create2') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12 mb-4">
                                    <label for="account_name">Account Name <span>*</span></label>
                                    <input type="text" class="form-control" id="account_name" name="user_id"
                                        value="{{ Auth()->user()->name }}" readonly>
                                </div>
                                <div class="col-md-12 mb-4">
                                    <label for="first_name">Full Name <span>*</span></label>
                                    <input type="text" class="form-control" id="first_name" value=""
                                        name="full_name" required>
                                </div>

                                <div class="col-12 mb-4">
                                    <label for="email_address">Email Address <span>*</span></label>
                                    <input type="email" class="form-control" id="email_address"
                                        value="{{ Auth()->user()->email }}" name="email" readonly>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="city">Town/City <span>*</span></label>
                                    <input type="text" class="form-control" id="city" value="" name="town">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="street_address">Address <span>*</span></label>
                                    <input type="text" class="form-control" id="street_address" value=""
                                        name="address">
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="phone_number">Phone No <span>*</span></label>
                                    <input type="number" class="form-control" id="phone_number" min="0"
                                        value="" name="phone_no">
                                </div>
                            </div>

                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-5 ml-lg-auto">
                    <div class="order-details-confirmation">

                        <div class="cart-page-heading">
                            <h5>Your Order</h5>
                            <p>The Details</p>
                        </div>
                        {{-- {{dd($product)}} --}}
                        <!-- Table to display product details -->
                        <table class="table">
                            <tr>
                                <th>PRODUCT NAME</th>
                                <th>SUBTOTAL</th>
                            </tr>
                            {{-- @foreach ($productsData as $index => $productData)
                                <tr>
                                    <td>
                                        {{ \App\Models\Product::find($productData['product_id'])->name }} x <b>
                                            {{ $productData['quantity'] }}</b>
                                    </td>
                                    <td>{{ $productData['total'] }} $</td>
                                </tr>
                            @endforeach --}}
                            @foreach ($productsData as $productData)
                            @php
                                $product = \App\Models\Product::find($productData['product_id']);
                            @endphp
                            @if ($product)
                                <tr>
                                    <td>
                                        {{ $product->name }} x <b>{{ $productData['quantity'] }}</b>
                                    </td>
                                    <td>{{ $productData['total'] }} $</td>
                                </tr>
                            @endif
                        @endforeach


                            <tr>
                                <th>Subtotal</th>
                                <td style="font-size: 16px;"><b>{{ $subtotal }} $</b></td>
                            </tr>
                            <tr>
                                <th>Shipping</th>
                                <td>{{ $shipping }} $</td>
                            </tr>
                            <tr>
                                <th>Total</th>
                                <td style="font-size:18px"><span>
                                        <strong>{{ $total }} $</strong>
                                    </span></td>
                            </tr>
                        </table>
                        <div id="accordion" role="tablist">
                            <div class="card">
                                <div class="card-header" role="tab" id="headingOne">
                                    <h6 class="mb-0">
                                        <label>
                                            <input type="radio" name="payment_method" value="Cash On Delivery">
                                            Cash on Delivery
                                        </label>
                                    </h6>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingTwo">
                                    <h6 class="mb-0">
                                        <label>
                                            <input type="radio" name="payment_method" value="Mobile Banking">
                                            Mobile Banking
                                        </label>
                                    </h6>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingThree">
                                    <h6 class="mb-0">
                                        <label>
                                            <input type="radio" name="payment_method" value="Mobile Wallet">
                                            Mobile Wallet
                                        </label>
                                    </h6>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header" role="tab" id="headingFour">
                                    <h6 class="mb-0">
                                        <label>
                                            <input type="radio" name="payment_method" value="Direct Bank Transfer">
                                            Direct Bank Transfer
                                        </label>
                                    </h6>
                                </div>
                            </div>
                        </div>

                        <!-- Your order summary and payment method selection -->
                        <button type="submit" class="btn essence-btn" style="width: 100%;">Place
                            Order</button>
                        <input type="hidden" name="total_quantity" value="{{ $totalQuantity }}">
                        <input type="hidden" name="user_id" value="{{ Auth()->user()->id }}">
                        <input type="hidden" name="total_price" value="{{ $total }}">
                        @foreach ($productsData as $index => $productData)
                            <input type="hidden" name="products[{{ $index }}][product_id]"
                                value="{{ $productData['product_id'] }}">
                            <input type="hidden" name="products[{{ $index }}][price]"
                                value="{{ $productData['price'] }}">
                            <input type="hidden" name="products[{{ $index }}][quantity]"
                                value="{{ $productData['quantity'] }}">
                            <input type="hidden" name="products[{{ $index }}][total]"
                                value="{{ $productData['total'] }}">
                        @endforeach
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ##### Checkout Area End ##### -->
@endsection
