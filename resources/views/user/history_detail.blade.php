@extends('user.master')
@section('title', 'Purchase History')
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('cart')
    <a href="#" class="btn position-relative">
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
@section('content')
    <div class="container">
        <div class="row mb-5">
            <div class="col-3 mt-5">
                @include('user.sidebar')
            </div>
            <div class="col-9 bg-light" style="margin-top:30px; padding: 50px;">
                <h4>Order Summary</h4>
                <div class="customer-details row">
                    <div class="col"><p style="margin-bottom: 5px; "><b>Invoice</b><br>{{ $customerPurchase->invoice_id }}</p></div>
                    <div class="col"> <p style="margin-bottom: 5px; "><b>Payment Method</b><br>{{ $customerPurchase->payment_method }}</p></div>
                    <div class="col"><p style="margin-bottom: 5px; "><b>Total Quantity</b><br> {{ $customerPurchase->total_quantity }}</p></div>
                    <div class="col"> <p style="margin-bottom: 5px; "><b>Total Price</b> <br>{{ $customerPurchase->total_price }}</p></div>
                    <div class="col"><p><b>Date:</b> <br> {{ \Carbon\Carbon::parse($customerPurchase->created_at)->format('F j, Y') }}</p></div>
                </div>
                <hr>
                <h5>Ordered Products</h5>
                <div class="slip-wrapper mt-3">
                    @php $counter = 0 @endphp
                    @foreach ($details as $detail)
                        @if ($counter % 4 == 0)
                            <div class="row"> <!-- Start a new row for every 4th product -->
                        @endif
                        <div class="col-md-3">
                            <div class="slip">
                                @if($detail->product->image)
                                <img src="{{ asset('storage/products/' . $detail->product->image) }}"
                                    style="width: 100%; height: 200px; object-fit: cover;" alt="Product Image"
                                    class="product-image">
                                    @else
                                    <div style="height: 200px; display: flex; align-items: center; justify-content: center; color: #8c8c8c; background-color: #fff">
                                        No Image
                                    </div>
                                    @endif
                                <div>
                                    <p style="color: black;" class="mt-2"><strong>{{ $detail->product->name }}</strong></p>
                                </div>
                                <div style="margin-bottom: 10px; "><strong>Quantity:</strong>
                                    {{ $detail->quantity }}</div>
                                <div style="margin-bottom: 10px;"><strong >Price:</strong>
                                    {{ $detail->price }}</div>
                                <div><strong>Sub Total:</strong> {{ $detail->sub_total }}</div>
                                <br>
                            </div>
                        </div>
                        @php $counter++ @endphp
                        @if ($counter % 4 == 0 || $loop->last)
                            </div> <!-- Close the row after every 4th product or if it's the last product -->
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')

@endsection
{{-- <h4 class="header-color">Customer information</h4>
            <div class="customer-details">
                <h6>Account: {{ $customerPurchase->user->name }}</h6>
                <h6>Full Name: {{ $customerPurchase->user->full_name }}</h6>
                <h6>Phone: {{ $customerPurchase->user->phone }}</h6>
                <h6>Town: {{ $customerPurchase->user->town }}</h6>
                <h6>Address: {{ $customerPurchase->user->address }}</h6>

            </div> --}}
