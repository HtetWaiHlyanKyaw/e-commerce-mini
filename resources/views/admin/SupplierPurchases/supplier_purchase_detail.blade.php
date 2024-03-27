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

        .supplier-details {
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
        <h1 class="header-color">Supplier List</h1>
        <br>
        <div class="pagetitle ">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item ">Home</li>
                    <li class="breadcrumb-item ">Suppliers</li>
                    <li class="breadcrumb-item "><b>Suppliers List</b></li>
                </ol>
            </nav>
        </div>
        <hr>
        <div class="row">
            <div class="col-md-6">
                <h4 class="header-color">Order information</h4>
                <div class="supplier-details">
                    <h6>Invoice ID: {{ $supplierPurchase->invoice_id }}</h6>
                    <h6>Payment Method: {{ $supplierPurchase->payment_method }}</h6>
                    <h6>Total Quantity: {{ $supplierPurchase->total_quantity }}</h6>
                    <h6>Total Price: {{ $supplierPurchase->total_price }}</h6>
                    <h6>Date of Purchase: {{ $supplierPurchase->created_at->format('d / M / Y') }}</h6>
                </div>
                <h4 class="header-color">Supplier information</h4>
                <div class="supplier-details">
                    <h6>Name: {{ $supplierPurchase->supplier->name }}</h6>
                    <h6>Email: {{ $supplierPurchase->supplier->email }}</h6>
                    <h6>Phone: {{ $supplierPurchase->supplier->phone }}</h6>
                    <h6>Address: {{ $supplierPurchase->supplier->address }}</h6>
                </div>
            </div>
            <div class="col-md-6">
                <h4 class="header-color">Product information</h4>
                <div class="slip-wrapper">
                    @php $counter = 0 @endphp
                    @foreach ($details as $detail)
                        <div class="slip">
                            <img src="{{ asset('images/'.$detail->product->image) }}"  style="width: 100%; height: 200px; object-fit: cover;" alt="Product Image" class="product-image">
                            <div><strong>{{ $detail->product->name }}</strong></div>
                            <div><strong>Quantity:</strong> {{ $detail->quantity }}</div>
                            <div><strong>Price:</strong> {{ $detail->price }}</div>
                            <div><strong>Sub Total:</strong> {{ $detail->sub_total }}</div>
                            <div><strong>Date:</strong> {{ $detail->created_at->format('d / M / Y') }}</div>
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
