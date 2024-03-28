@extends('admin.layouts.master')
@section('title', 'Customer Purchases')
@section('style')
    <style>
        .header-color {
            color: #1da9dc;
        }

        .bg-lighter {
            background-color: #f6f7ff;
            /* Slightly darker shade */
        }
        .table-data{
           color: black;

        }

    </style>
@endsection
@section('content')

    <div class="container-fluid">
        {{-- Brand Create Success Message --}}

        <div>
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <h1 class="header-color">Customer Purchase List</h1>
        <br>
        <div class="pagetitle ">
            <h4> Total Customer Purchases -{{ $customerPurchases->count() }}</h4>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item ">Home</li>
                    <li class="breadcrumb-item ">Customer </li>
                    <li class="breadcrumb-item "><b>Customer Purchase List</b></li>
                </ol>
            </nav>
        </div>

            <table style="background-color:white" id="myTable" class="hover compact">
                <thead style="background-color: white; color:black;">
                    <tr>
                        <th style="text-align:center">Invoice ID</th>
                        <th style="text-align:center">Customer Name</th>
                        <th style="text-align:center">Payment Method</th>
                        <th style="text-align:center">Total Price</th>
                        {{-- <th style="text-align:center">Puchase ID</th> --}}
                        <th style="text-align:center">Product ID</th>
                        <th style="text-align:center">Quantity</th>
                        <th style="text-align:center">Price</th>
                        <th style="text-align:center">Subtotal</th>
                        <th style="text-align:center">Date</th>
                    </tr>
                </thead>
                <tbody >
                    @foreach($customerPurchases as $customerPurchase)
                    @foreach($customerPurchase->details as $detail)
                        <tr>
                            <td  style="text-align:center; color: black">{{ $customerPurchase->invoice_id }}</td>
                            <td  style="text-align:center; color: black">{{ $customerPurchase->user->name }}</td>
                            <td  style="text-align:center; color: black">{{ $customerPurchase->payment_method }}</td>
                            <td  style="text-align:center; color: black">{{ $customerPurchase->total_price }}</td>
                            {{-- <td  style="text-align:center; color: black">{{ $detail->purchase_id }}</td> --}}
                            <td  style="text-align:center; color: black">{{ $detail->product->name }}</td>
                            <td  style="text-align:center; color: black">{{ $detail->quantity }}</td>
                            <td  style="text-align:center; color: black">{{ $detail->price }}</td>
                            <td  style="text-align:center; color: black">{{ $detail->subtotal }}</td>
                            <td  style="text-align:center; color: black">{{ $customerPurchase->created_at->format('d / M /Y') }}</td>
                        </tr>
                    @endforeach
                @endforeach
                </tbody>
            </table>


    </div>
@endsection
