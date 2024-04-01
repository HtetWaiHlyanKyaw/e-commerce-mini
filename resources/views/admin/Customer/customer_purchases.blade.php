@extends('admin.layouts.master')
@section('title', 'Customers list')
@section('style')
    <style>
        .header-color {
            color: #5d9bff;
        }

        .bg-lighter {
            background-color: #f6f7ff;
            /* Slightly darker shade */
        }

        .table-data {
            color: black;

        }
    </style>
@endsection
@section('content')

    <div class="container-fluid">

        <h1 class="header-color">Customer Purchase List</h1>
        <br>
        <div class="pagetitle ">
            <h3> Total Customer Purchases - <span style="color: #5d9bff;">{{ $customerPurchases->count() }}</span></h3>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item ">Home</li>
                    <li class="breadcrumb-item ">Customer Purchases</li>
                    <li class="breadcrumb-item "><b>Customer Purchase List</b></li>
                </ol>
            </nav>
        </div>
        <div>
            @if (session('alert'))
                <div id="alertMessage" class="text-center alert alert-{{ session('alert')['type'] }}">
                    {{ session('alert')['message'] }}
                </div>
            @endif

            <script>
                // JavaScript to hide the alert after a specific duration
                setTimeout(function() {
                    document.getElementById('alertMessage').style.display = 'none';
                }, 5000); // Adjust the duration (in milliseconds) as needed
            </script>
        </div>
        <div class="bg-white p-4 border rounded">
            <table style="background-color:white" id="myTable" class="hover compact">
                <thead style="background-color: white; color:black;">
                    <tr>
                        <th style="color: #5d9bff; text-align:center">Invoice ID</th>
                        <th style="color: #5d9bff; text-align:center">Customer Name</th>
                        <th style="color: #5d9bff; text-align:center">Total Quantity</th>
                        <th style="color: #5d9bff; text-align:center">Total Price</th>
                        {{-- <th style="color: #5d9bff; text-align:center">Payment Method</th> --}}
                        <th style="color: #5d9bff; text-align:center">Date</th>
                        <th style="color: #5d9bff; text-align:center">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($customerPurchases as $customerPurchase)
                        <tr>
                            <td style="text-align:center; color: black">{{ $customerPurchase->invoice_id }}</td>
                            <td style="text-align:center; color: black">{{ $customerPurchase->user->name }}</td>
                            <td style="text-align:center; color: black">{{ $customerPurchase->total_quantity }}</td>
                            <td style="text-align:center; color: black">{{ $customerPurchase->total_price }}</td>
                            {{-- <td style="text-align:center; color: black">{{ $customerPurchase->payment_method }}</td> --}}
                            <td style="text-align:center; color: black">
                                {{ $customerPurchase->created_at->format('d / M /Y') }}</td>
                            <td style="text-align:center; color: black">
                                <a href="{{ route('customer_purchase.detail', $customerPurchase->id) }}">
                                    <button class="btn btn-outline-primary btn-lg border-0"
                                        title="customer purchase detail">
                                        <i class="ti ti-dots"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
