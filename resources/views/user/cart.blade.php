@extends('user.master')
@section('title', 'cart')
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

@section('cart')
    <a href="{{ route('cartList') }}" class="btn position-relative">
        @if ($cart && count($cart) > 0)
            <img src="{{ asset('user/img/core-img/bag.svg') }}" class="mb-2">
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
@endsection
@section('content')
    <div class="container-fluid p-5 mt-4">
        {{-- {{dd($data)}} --}}
        @if (count($data) == 0)
            <h5 class="text-center mb-5">There is no <span class="text-danger">Cart Data!</span></h5>
        @else
            <h4 class="mb-5 text-secondary"><i class="fa-solid fa-cart-shopping text-primary me-2"></i>Shopping Cart</h4>
            <div class="row shadow">
                {{-- left Cart side --}}
                <div class="col-lg-8 col-12 p-5 rounded">
                    <div class="row ml-3 mb-3">
                        <div class="col-md-2 col-12">
                            <h6>Product</h6>
                        </div>
                        <div class="col-md-2 col-12">
                            <h6>Name</h6>
                        </div>
                        <div class="col-md-2 col-12 ml-3">
                            <h6>Price</h6>
                        </div>
                        <div class="col-md-2 col-12 ">
                            <h6>Quantity</h6>
                        </div>
                        <div class="col-md-2 col-12">
                            <h6>Sub Total</h6>
                        </div>
                    </div>
                    <hr>
                    <table class="table table-borderless text-center mb-5">



                        <tbody>
                            @foreach ($data as $cart)
                                <tr class="row border-bottom">
                                    <td class="col-md-2 d-md-none text-center offset-10 col-2">
                                        <a href="">
                                            <i class="fa-solid fa-square-xmark text-dark fs-4" title="delete item"
                                                data-toggle="tooltip"></i>
                                        </a>
                                    </td>
                                    {{-- Image --}}

                                    <td class="col-md-2 col-12" style="height: 150px;">
                                        @if ($cart->product_image)
                                        <img src="{{ asset('storage/products/' . $cart->product_image) }}" alt="Product Image" style="border-radius: 3px; width: 100%; height: 100%; object-fit: cover;"  class="img-fluid">
                                    @else
                                        <!-- Placeholder content to keep the height consistent -->
                                        <div style="height: 100%; display: flex; align-items: center; justify-content: center; color: #ccc; background-color:#f7f7f7">
                                            No Image
                                        </div>
                                    @endif
                                        {{-- <img class="img-fluid" src="{{ asset('storage/products/' . $cart->product_image) }}"
                                            alt="product image"> --}}
                                    </td>

                                    {{-- name --}}
                                    <td class="col-md-2 col-12">
                                        {{ $cart->product_name }}
                                    </td>

                                    <td class="col-md-2 col-12">
                                        $
                                        <span id="price">
                                            {{ $cart->product_price }}
                                        </span>
                                    </td>

                                    <td class="col-md-2 col-12">
                                        <div class="input-group mx-auto">
                                            <div class="input-group-prepend">
                                                <button class="btn btn-sm btn-primary minusBtn"><i
                                                        class="fa fa-minus"></i></button>
                                            </div>
                                            <input type="number" value="{{ $cart->qty }}" style="width:50px"
                                                id="qty" class="form-control text-center mx-1" readonly>
                                            <div class="input-group-append">
                                                <button class="btn btn-sm btn-primary plusBtn"><i
                                                        class="fa fa-plus"></i></button>
                                            </div>
                                        </div>
                                    </td>

                                    {{-- total --}}
                                    <td class="col-md-2 col-12">
                                        $
                                        <span id="total">
                                            {{ $cart->product_price * $cart->qty }}
                                        </span>
                                    </td>

                                    <td class="col-md-2 col-12 d-md-block d-none deleteBtn">


                                        {{-- <i class="fa-solid fa-square-xmark text-dark fs-4 " style="cursor: pointer"
                                            title="delete item" data-toggle="tooltip"></i> --}}
                                        <i class="fa fa-times" style="cursor: pointer" title="delete item"
                                            data-toggle="tooltip"></i>
                                    </td>
                                    <input type="hidden" id="cartId" value="{{ $cart->id }}">
                                    <input type="hidden" id="productId" value="{{ $cart->product_id }}">
                                    <input type="hidden" id="maxQty" value="{{ $cart->product_quantity }}">

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


                {{-- Right Cart side --}}
                <div class="col-lg-4 col-12 p-5 bg-light">
                    <h4 class="mb-3">Cart Detail</h4>
                    <div class="mt-5">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6><i class="fa fa-dollar me-1"></i><span id="subTotal">
                                    {{ $subTotal }}</span></h6>
                        </div>
                        {{-- Shipping --}}
                        <div class="d-flex justify-content-between mb-3 border-bottom">
                            <h6>Shipping</h6>
                            <h6><i class="fa fa-dollar me-1"></i>5</h6>
                        </div>

                        {{-- Total --}}
                        <div class="d-flex justify-content-between mb-3 border-bottom">
                            <h6>Total</small></h6>
                            <h6><i class="fa fa-dollar me-1"></i>
                                <span id="finalTotal">
                                    {{ $subTotal + 5 }}
                                </span>
                            </h6>
                        </div>
                    </div>

                    {{-- Order and Clear Btn --}}
                    <div class="my-5 row">
                        <div class="col">
                        <a href="#" id="checkoutButton">
                            <button class="btn btn-sm btn-primary px-3 me-3 w-100 essence-btn">
                                Checkout
                            </button>
                        </a>
                    </div>
                    <div class="col">
                        <a href="{{ route('cart.clear') }}">
                            <button class="btn btn-sm btn-danger w-100 px-3 essence-btn2">
                                Clear Cart
                            </button>
                        </a>
                    </div>
                    </div>





                    {{-- <div class="alert alert-warning" role="alert">
                        Shipping time may be about one week. <br>
                        After ordered , we will send voucher detail to your email.
                    </div> --}}
                </div>
            </div>
        @endif
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Increment quantity when plus button is clicked
            $('.plusBtn').on('click', function() {
                let tr = $(this).parents('tr');
                let qty = parseInt(tr.find('#qty').val());
                let maxQty = parseInt(tr.find('#maxQty')
                    .val()); // Assuming you have a hidden input field containing the maximum quantity
                if (qty < maxQty) { // Check if quantity is less than maximum quantity
                    qty += 1;
                    tr.find('#qty').val(qty);
                    let price = parseInt(tr.find('#price').text());
                    let total = price * qty;
                    tr.find('#total').text(total);
                    calculate();
                }
            });


            // Decrement quantity when minus button is clicked
            $('.minusBtn').on('click', function() {
                let tr = $(this).parents('tr'); // Find the quantity input
                let qty = parseInt(tr.find('#qty').val());
                let count = 0;
                if (qty > 1) {
                    qty = qty - 1;
                    count += qty
                }
                tr.find('#qty').val(qty);
                let price = parseInt(tr.find('#price').text()); // text ne yu ya span mho lo
                let total = price * qty;
                tr.find('#total').text(total);


                if (count > 0) {
                    calculate();
                }
            });

            // delete buttom

            $('.deleteBtn').click(function() {
                let tr = $(this).parents('tr');
                let cartId = parseInt(tr.find('#cartId').val());
                let productId = tr.find('#productId').val();

                $.ajax({
                    type: 'get',
                    url: '/cart/product/delete',
                    data: {
                        'cartId': cartId
                    },
                    dataType: 'json'
                });
                tr.remove();
                calculate();
            });


            // $('#orderBtn').click(function() {
            //     let orderList = [];
            //     // let orderNumber= Math.floor(Math.random()* 1000000000);
            //     $('tr').each(function(index, row) {
            //         orderList.push({
            //             'product_id': parseInt($(row).find('#productId').val()),
            //             // 'orderNumber' :  'unity'+ orderNumber,
            //             'qty': parseInt($(row).find('#qty').val()),
            //             'total': parseInt($(row).find('#total')
            //         .text()), // text ne yuu span na mho lo
            //         });
            //     });
            //     $.ajax({
            //         type: 'post',
            //         url: '/customer/purchase',
            //         data: Object.assign({}, orderList),
            //         // Corrected syntax for sending data
            //         dataType: 'json', // Corrected datatype to 'json'
            //         success: function(response) {
            //             window.location.href = 'http://localhost:8000/';
            //         }
            //     });
            // });

            // Update the click event handler for the checkout button
            // Update the click event handler for the checkout button
            $('#checkoutButton').on('click', function(event) {
                event.preventDefault(); // Prevent the default anchor link behavior

                // Create an array to store the data of each product in the cart
                let productsData = [];

                // Iterate through each row (product) in the cart table
                $('tr').each(function(index, row) {
                    let productData = {
                        product_id: $(row).find('#productId').val(), // Get the product ID
                        quantity: $(row).find('#qty').val(), // Get the quantity
                        total: $(row).find('#total').text() // Get the total price
                    };
                    productsData.push(productData); // Add the product data to the array
                });

                // Serialize the array of product data as a JSON string
                let productsJson = JSON.stringify(productsData);

                // Redirect to the checkout2 page and pass the product data as a query parameter
                window.location.href = 'user/checkout2?products=' + encodeURIComponent(productsJson);
            });


            //subTotal Calculate
            function calculate() {
                let subTotal = 0;
                $('tr').each(function(index, row) {
                    subTotal += parseInt($(row).find('#total').text());
                });
                $('#subTotal').text(subTotal);
                $('#finalTotal').text(subTotal + 5);
            }
        });
    </script>
@endsection
