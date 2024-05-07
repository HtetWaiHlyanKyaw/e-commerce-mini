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
<div class="container">
    <div class="row">
        <div class="col-md-8 p-5"  style="margin-top:50px;">
            <h4 class="header-color" style="color:#25518f;">Order Summary</h4>
            <div class="customer-details">
                <p style="margin-bottom: 5px; "><b>Invoice ID:</b> {{ $customerPurchase->invoice_id }}</p>
                <p style="margin-bottom: 5px; "><b>Payment Method:</b> {{ $customerPurchase->payment_method }}</p>
                <p style="margin-bottom: 5px; "><b>Total Quantity:</b> {{ $customerPurchase->total_quantity }}</p>
                <p style="margin-bottom: 5px; "><b>Total Price: </b>{{ $customerPurchase->total_price }}</p>
                <p><b>Date:</b> {{ \Carbon\Carbon::parse($customerPurchase->created_at)->format('F j, Y') }}</p>
            </div>
        </div>
        <div class="col-md-4">
            <h4 class="header-color">Ordered Products</h4>
            <div class="slip-wrapper">
                @php $counter = 0 @endphp
                @foreach ($details as $detail)
                    <div class="slip ">

                        <img src="{{ asset('storage/products/'.$detail->product->image)}}" style="width: 95%; height: 300px; object-fit: cover;" alt="Product Image" class="product-image">
                        <div><p style="color: black;">{{ $detail->product->name }}</p></div>
                        <div style="margin-bottom: 10px; "><strong style="color:#25518f;">Quantity:</strong> {{ $detail->quantity }}</div>
                        <div style="margin-bottom: 10px;"><strong style="color:#25518f;">Price:</strong> {{ $detail->price }}</div>
                        <div><strong style="color:#25518f;">Sub Total:</strong> {{ $detail->sub_total }}</div>
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
{{-- <h4 class="header-color">Customer information</h4>
            <div class="customer-details">
                <h6>Account: {{ $customerPurchase->user->name }}</h6>
                <h6>Full Name: {{ $customerPurchase->user->full_name }}</h6>
                <h6>Phone: {{ $customerPurchase->user->phone }}</h6>
                <h6>Town: {{ $customerPurchase->user->town }}</h6>
                <h6>Address: {{ $customerPurchase->user->address }}</h6>

            </div> --}}
