@extends('admin.layouts.master')
@section('title', 'Suppliers list')
@section('style')
    <style>
        .header-color {
            color: #1da9dc;
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

        <h1 class="header-color">Supplier Purchase List</h1>
        <br>
        <div class="pagetitle ">
            <h4> Total Supplier Purchases -{{ $supplierPurchases->count() }}</h4>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item ">Home</li>
                    <li class="breadcrumb-item ">Supplier Purchases</li>
                    <li class="breadcrumb-item "><b>Supplier Purchase List</b></li>
                </ol>
            </nav>
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
                    <th style="text-align:center">Invoice ID</th>
                    <th style="text-align:center">Supplier Name</th>
                    <th style="text-align:center">Total Quantity</th>
                    <th style="text-align:center">Total Price</th>
                    <th style="text-align:center">Payment Method</th>
                    <th style="text-align:center">Date</th>
                    <th style="text-align:center">Action</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($supplierPurchases as $supplierPurchase)
                        <tr>
                            <td style="text-align:center; color: black">{{ $supplierPurchase->invoice_id }}</td>
                            <td style="text-align:center; color: black">{{ $supplierPurchase->supplier->name }}</td>
                            <td style="text-align:center; color: black">{{ $supplierPurchase->total_quantity }}</td>
                            <td style="text-align:center; color: black">{{ $supplierPurchase->total_price }}</td>
                            <td style="text-align:center; color: black">{{ $supplierPurchase->payment_method }}</td>
                            <td style="text-align:center; color: black">
                                {{ $supplierPurchase->created_at->format('d / M /Y') }}</td>
                            <td style="text-align:center; color: black">
                                <a href="{{ route('supplier_purchase.detail', $supplierPurchase->id) }}">
                                    <button class="btn btn-outline-primary btn-lg border-0" title="supplier purchase detail">
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
