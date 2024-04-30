@extends('user.master')
@section('title', 'Purchase History')
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('cart')
    <a href="#" class="btn position-relative">
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
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-6">
            <h4 class="header-color">Order Summary</h4>
            <div class="customer-details">
                <h6>Invoice ID: {{ $customerPurchase->invoice_id }}</h6>
                <h6>Payment Method: {{ $customerPurchase->payment_method }}</h6>
                <h6>Total Quantity: {{ $customerPurchase->total_quantity }}</h6>
                <h6>Total Price: {{ $customerPurchase->total_price }}</h6>
                <h6>Date: {{ \Carbon\Carbon::parse($customerPurchase->created_at)->format('F j, Y') }}</h6>
            </div>
            {{-- <h4 class="header-color">Customer information</h4>
            <div class="customer-details">
                <h6>Account: {{ $customerPurchase->user->name }}</h6>
                <h6>Full Name: {{ $customerPurchase->user->full_name }}</h6>
                <h6>Phone: {{ $customerPurchase->user->phone }}</h6>
                <h6>Town: {{ $customerPurchase->user->town }}</h6>
                <h6>Address: {{ $customerPurchase->user->address }}</h6>

            </div> --}}
        </div>
        <div class="col-md-6">
            <h4 class="header-color">Ordered Products</h4>
            <div class="slip-wrapper">
                @php $counter = 0 @endphp
                @foreach ($details as $detail)
                    <div class="slip">

                        <img src="{{ asset('storage/products/'.$detail->product->image)}}" style="width: 100%; height: 200px; object-fit: cover;" alt="Product Image" class="product-image">
                        <div><strong>{{ $detail->product->name }}</strong></div>
                        <div><strong>Quantity:</strong> {{ $detail->quantity }}</div>
                        <div><strong>Price:</strong> {{ $detail->price }}</div>
                        <div><strong>Sub Total:</strong> {{ $detail->sub_total }}</div>
                    </div>
                    @php $counter++ @endphp
                    @if ($counter % 10 == 0)
                        </div><div class="slip-wrapper">
                    @endif
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection
@section('script')

@endsection
