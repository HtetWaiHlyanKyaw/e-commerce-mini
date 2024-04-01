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
        {{-- <div class="pagetitle ">
            <h4> Total Customer Purchases -{{ $customerPurchases->count() }}</h4>
            <nav>
                <ol class="breadcrumb">
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
                    <a class="breadcrumb-item " href="{{ route('customer.page') }}">Customer  List</a>
                    <li class="breadcrumb-item "><b>Customer Purchase List</b></li>
                </ol>
            </nav>
        </div> --}}
        <div class="container">
            <div class="row align-items-center">
                <div class="col">
                    <div class="pagetitle">
                        <h4> Total Customer Purchases -{{ $customerPurchases->count() }}</h4>
                        <nav>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item">Home</li>
                                <li class="breadcrumb-item">Customer Purchases</li>
                                <li class="breadcrumb-item"><b>Customer Purchase List</b></li>
                            </ol>
                        </nav>
                    </div>
                </div>
                <div class="col-auto">
                    <form action="{{ route('export.customer.purchases') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-success rounded-5 border-2 px-3 me-3"><i class="ti ti-download"></i> Export</button>
                    </form>
                </div>
            </div>
        </div>
        <div>
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>

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
                                    <button class="btn btn-outline-primary btn-lg border-0" title="customer purchase detail">
                                        <i class="ti ti-dots"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
