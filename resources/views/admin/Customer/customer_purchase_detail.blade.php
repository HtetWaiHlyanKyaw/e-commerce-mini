@extends('admin.layouts.master')

@section('style')
    <style>
        .slip-wrapper {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }

        .slip {
            box-shadow: 0 0 7px 7px rgba(0, 0, 0, 0.01);
            background-color: white;
            padding: 20px;
            width: calc(50% - 20px);
        }

        .slip div {
            margin-bottom: 10px;
        }

        .header-color {
            /* Your header color styles */
            color: #5d9bff;
        }

        .pagetitle {
            /* Your pagetitle styles */
        }

        .customer-details {
            background-color: white;
            padding: 20px;
            margin-bottom: 20px;
        }

        .product-image {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }

        .vertical-line {
        border-left: 1px solid black; /* Adjust thickness and color as needed */
        height: 100%; /* Adjust height of line */
        position: absolute;
        left: 50%; /* Adjust position of line */
        transform: translateX(-50%);
    }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        <h1 class="header-color">Customer List</h1>
        <br>
        <div class="pagetitle ">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item ">Home</li>
                    <li class="breadcrumb-item ">Customer</li>
                    <li class="breadcrumb-item "><b>Customer List</b></li>
                </ol>
            </nav>
        </div>
        <hr>
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
                <h4 class="header-color">Customer information</h4>
                <div class="customer-details">
                    <h6>Name: {{ $customerPurchase->user->name }}</h6>
                    <h6>Email: {{ $customerPurchase->user->email }}</h6>
                    <h6>Phone: {{ $customerPurchase->user->phone_number }}</h6>
                    <h6>Address: {{ $customerPurchase->user->address }}</h6>
                </div>
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
