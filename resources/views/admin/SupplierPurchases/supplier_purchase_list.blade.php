@extends('admin.layouts.master')
@section('title', 'Suppliers list')
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
        <div class="bg-white p-4 border rounded">
            <table style="background-color:white" id="myTable" class="hover compact">
                <thead style="background-color: white;">
                    <tr>
                        <th style="text-align:center;color: #5d9bff">Invoice ID</th>
                        <th style="text-align:center;color: #5d9bff">Supplier Name</th>
                        <th style="text-align:center;color: #5d9bff">Total Quantity</th>
                        <th style="text-align:center;color: #5d9bff">Total Price</th>
                        <th style="text-align:center;color: #5d9bff">Payment Method</th>
                        <th style="text-align:center;color: #5d9bff">Date</th>
                        <th style="text-align:center;color: #5d9bff">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($supplierPurchases as $supplierPurchase)
                        <tr>
                            <td style="text-align:center;">{{ $supplierPurchase->invoice_id }}</td>
                            <td style="text-align:center;">{{ $supplierPurchase->supplier->name }}</td>
                            <td style="text-align:center;">{{ $supplierPurchase->total_quantity }}</td>
                            <td style="text-align:center;">{{ $supplierPurchase->total_price }}</td>
                            <td style="text-align:center;">{{ $supplierPurchase->payment_method }}</td>
                            <td style="text-align:center;">
                                {{ \Carbon\Carbon::parse($supplierPurchase->created_at)->format('F j, Y') }}</td>
                            <td style="text-align:center;">
                                <a href="{{ route('supplier_purchase.detail', $supplierPurchase->id) }}">
                                    <button class="btn btn-outline-primary btn-md border-2 rounded"
                                        title="supplier purchase detail">
                                        Details{{-- <i class="ti ti-file-description" style="font-size:22px;"></i> --}}
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
