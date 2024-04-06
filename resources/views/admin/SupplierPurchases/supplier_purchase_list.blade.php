@extends('admin.layouts.master')
@section('title', 'Suppliers Purchase list')
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
            <h3> Total Supplier Purchases - <span style="color: #5d9bff;">{{ $supplierPurchases->count() }}</span></h3>
            <nav>
                <ol class="breadcrumb">
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
                    <a class="breadcrumb-item " href="{{ route('supplier.list') }}">Supplier List</a>
                    <li class="breadcrumb-item "><b>Supplier Purchase List</b></li>
                </ol>
            </nav>
        </div>
        {{-- <br> --}}
        <div>
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-warning text-center" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div>

        {{-- <div class="container"> --}}
        <div class="bg-white p-4 border rounded">
            {{-- <br> --}}
            <div class="row">
                <div class="col-auto">
                    <form action="{{ route('export.supplier.purchases') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-success rounded-5 border-2 px-3 me-3"><i
                                class="ti ti-download"></i> Export</button>
                    </form>
                    <br>
                </div>

                {{-- <div class="col-auto" style="margin-left: auto;">
                        <form action="{{ route('supplier_purchase.filter') }}" method="GET">
                            <div class="row pb-6 g-6">
                                <div class="col-auto mt-0">
                                    <label for="">Start Date: </label>
                                    <input type="date" class="form-control" name="start_date" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                </div>

                                <div class="col-auto mt-0">
                                    <label for="">End Date: </label>
                                    <input type="date" class="form-control" name="end_date" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                                </div>

                                <div class="col-auto">
                                    <button type="submit" class="btn btn-primary mb-5  border-2 px-3 me-2"><i class="ti ti-adjustments-horizontal"></i> Filter</button>
                                </div>
                            </div>
                        </form>
                    </div> --}}
            </div>

            <table id="myTable" class="hover compact">
                <thead>
                    <tr>
                        <th style="text-align:center;color: #5d9bff">Invoice ID</th>
                        <th style="text-align:center;color: #5d9bff">Supplier Name</th>
                        <th style="text-align:center;color: #5d9bff">Total Quantity</th>
                        <th style="text-align:center;color: #5d9bff">Total Price</th>
                        {{-- <th style="text-align:center;color: #5d9bff">Payment Method</th> --}}
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
                            {{-- <td style="text-align:center;">{{ $supplierPurchase->payment_method }}</td> --}}
                            <td style="text-align:center;">
                                {{ \Carbon\Carbon::parse($supplierPurchase->created_at)->format('F j, Y') }}</td>
                            <td style="text-align:center;">
                                <a href="{{ route('supplier_purchase.detail', $supplierPurchase->id) }}">
                                    <button class="btn btn-outline-primary btn-md border-2 rounded"
                                        title="supplier purchase detail">
                                        Details <i class="ti ti-file-description" style="font-size:22px;"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>
    {{-- </div> --}}
@endsection

@section('script')

<script>

@endsection







