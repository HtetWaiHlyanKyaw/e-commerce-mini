@extends('user.master')
@section('title', 'cart')
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
                                    <td class="col-md-2 col-12">
                                        <img class="img-fluid" src="{{ asset('storage/products/' . $cart->product_image) }}"
                                            alt="product image">
                                    </td>

                                    {{-- name --}}
                                    <td class="col-md-2 col-12">
                                        <i class="fa fa-mobile"></i> {{ $cart->product_name }}
                                    </td>

                                    <td class="col-md-2 col-12">
                                        <i class="fa fa-dollar"></i>
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
                                        <i class="fa fa-dollar"></i>
                                        <span id="total">
                                            {{ $cart->product_price * $cart->qty }}
                                        </span>

                                    </td>

                                    <td class="col-md-2 col-12 d-md-block d-none">
                                        <a href="">
                                            <i class="fa-solid fa-square-xmark text-dark fs-4" title="delete item"
                                                data-toggle="tooltip"></i>
                                        </a>
                                    </td>
                                </tr>

                                {{-- price --}}
                            @endforeach
                        </tbody>
                    </table>
                </div>


                {{-- Right Cart side --}}
                <div class="col-lg-4 col-12 p-5 bg-light">
                    <h4 class="mb-3">Card Detail</h4>
                    {{-- billing card --}}
                    <div>
                        <a href="">
                            <img src="{{ asset('images/visa.png') }}" alt="card-image" style="width:70px">
                        </a>

                        <a href="">
                            <img src="{{ asset('images/master.png') }}" alt="card-image" style="width:70px">>
                        </a>

                        <a href="">
                            <img src="{{ asset('images/discover.png') }}" alt="card-image" style="width:70px">>
                        </a>

                        <a href="">
                            <img src="{{ asset('images/american express.png') }}" alt="card-image" style="width:70px">>
                        </a>
                    </div>

                    <div class="mt-5">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6><i class="fa fa-dollar me-1"></i><span id="subTotal">
                                    {{ $subTotal }}</span></h6>
                        </div>

                        {{-- Shipping --}}
                        <div class="d-flex justify-content-between mb-3 border-bottom">
                            <h6>Shipping</h6>
                            <h6><i class="fa fa-dollar me-1"></i>1000</h6>
                        </div>

                        {{-- Total --}}
                        <div class="d-flex justify-content-between mb-3 border-bottom">
                            <h6>Total <small>(tax incl.)</small></h6>
                            <h6><i class="fa fa-dollar me-1"></i>
                                <span id="finalTotal">
                                    {{ $subTotal + 1000 }}
                                </span>
                            </h6>
                        </div>
                    </div>

                    {{-- Order and Clear Btn --}}
                    <div class="my-5">
                        <button class="btn btn-sm btn btn-primary px-3 me-3">
                            Order
                        </button>

                        <button class="btn btn-sm btn-danger px-3">
                            Clear Cart
                        </button>
                    </div>

                    <div class="alert alert-warning" role="alert">
                        Shipping time may be about one week. <br>
                        After ordered , we will send voucher detail to your email.
                    </div>

                </div>
            </div>
        @endif
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function() {
            // Increment quantity when plus button is clicked
            $('.plusBtn').on('click', function() {
                let tr = $(this).parents('tr'); // Find the quantity input
                let qty = parseInt(tr.find('#qty').val()); //val ne yu lo ya
                qty = qty + 1;
                tr.find('#qty').val(qty);
                let price = parseInt(tr.find('#price').text()); // text ne yu ya span mho lo
                let total = price * qty;
                tr.find('#total').text(total);


                let subTotal = parseInt($('#subTotal').text());
                $('#subTotal').text(subTotal + price);

                $('#finalTotal').text(subTotal + price+ 1000);

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
                let subTotal = parseInt($('#subTotal').text());

                if (count > 0) {
                    $('#subTotal').text(subTotal - price);
                    $('#finalTotal').text((subTotal - price)+ 1000);
                }
            });
        });
    </script>
@endsection
