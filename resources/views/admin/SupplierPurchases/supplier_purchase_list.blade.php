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
            {{-- @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif --}}
            @if (session('alert'))
            <div id="alertMessage" class="text-center alert alert-{{ session('alert')['type'] }}">
                {{ session('alert')['message'] }}
            </div>
        @endif
            {{-- @if (session('error'))
                <div class="alert alert-warning text-center" role="alert">
                    {{ session('error') }}
                </div>
            @endif --}}
        </div>
        {{-- <div class="bg-white p-4 border rounded"> --}}

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
            {{-- <form action="{{ route('supplier_purchase.filter') }}" method="GET">
                        <div class="row pb-3">
                            <div class="col-md-6">
                                <label for="start_date" class="form-label">Start Date:</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                            </div>
                            <div class="col-md-6">
                                <label for="end_date" class="form-label">End Date:</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                            </div>
                        </div>
                        <div class="row pb-3 justify-content-end">
                            <div class="col-auto">
                                <button type="submit" class="btn btn-primary mt-2"><i class="ti ti-adjustments-horizontal"></i> Filter</button>
                            </div>
                            <div class="col-auto">
                                <button class="btn btn-outline-secondary mt-2" ><i class="ti ti-reload"></i> Refresh</button>
                                <input type="hidden" name="refresh" value="true">
                            </div>
                        </div>
                    </form> --}}

            {{-- <form action="{{ route('supplier_purchase.filter') }}" method="GET">
                <div class="row pb-3 align-items-end">

                    <div class="col-md-1">
                        <form action="{{ route('export.customer.purchases') }}" method="GET">
                            @csrf
                            <button type="submit" class="btn btn-success"><i
                                    class="ti ti-download"></i> Export</button>
                        </form>
                    </div> --}}


                    {{-- </div> --}}
                    {{-- <div class="col-md-4 mb-3">
                        <label for="start_date" class="form-label">Start Date:</label>
                        <input type="date" class="form-control" id="start_date" name="start_date"
                            max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="end_date" class="form-label">End Date:</label>
                        <input type="date" class="form-control" id="end_date" name="end_date"
                            max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                    </div>
                    <div class="col-auto mb-3">
                        <button type="submit" class="btn btn-primary btn-block mt-2"><i
                                class="ti ti-adjustments-horizontal" ></i> Filter</button>
                    </div>
                    <div class="col-auto mb-3">
                        <button class="btn btn-outline-secondary btn-block mt-2"><i
                                class="ti ti-reload" id="refreshBtn"></i>Refresh</button>
                        <input type="hidden" name="refresh" value="true">
                    </div>
                </div> --}}
            {{-- </form> --}}
            {{-- <form action="{{ route('supplier_purchase.filter') }}" method="GET">
                <div class="row pb-3">
                    <div class="col-md-6">
                        <label for="start_date" class="form-label">Start Date:</label>
                        <input type="date" class="form-control" id="start_date" name="start_date"
                            max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                    </div>
                    <div class="col-md-6">
                        <label for="end_date" class="form-label">End Date:</label>
                        <input type="date" class="form-control" id="end_date" name="end_date"
                            max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                    </div>
                </div>
                <div class="row pb-3">
                    <div class="col-auto">
                        <button type="submit" class="btn btn-primary mt-2"><i class="ti ti-adjustments-horizontal"></i>
                            Filter</button>
                    </div>
                    <div class="col-auto">
                        <button class="btn btn-outline-secondary mt-2"><i class="ti ti-reload"></i> Refresh</button>
                        <input type="hidden" name="refresh" value="true">
                    </div>
                </div>
            </form> --}}
            <table id="myTable" class="hover compact">
                <thead>
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
    <!-- Additional scripts if needed -->

    <script>
        < script >

            $(document).ready(function() {
                // Initialize DataTable
                var table = $('#myTable').DataTable({
                    // Your DataTable configurations here
                    // Example:
                    "paging": true,
                    "lengthChange": false,
                    "searching": true,
                    "ordering": true,
                    "info": true,
                    "autoWidth": false
                });

                // Handle filtering event
                $('#filterForm').on('submit', function(e) {
                    e.preventDefault();
                    var formData = $(this).serialize();

                    // Send AJAX request to filter data
                    $.ajax({
                        url: '{{ route('supplier_purchase.filter') }}', // Replace with your filter route
                        type: 'POST',
                        data: formData,
                        dataType: 'json',
                        success: function(response) {
                            // Clear existing rows
                            table.clear().draw();

                            // Add filtered rows
                            $.each(response.data, function(index, row) {
                                table.row.add([
                                    row.invoice_id,
                                    row.supplier_name,
                                    row.total_quantity,
                                    row.total_price,
                                    row.payment_method,
                                    row.date,
                                    row.action
                                ]).draw(false);
                            });
                        },
                        error: function(xhr, status, error) {
                            console.error(xhr.responseText);
                        }
                    });
                });

                // Handle refresh button click
                $('#refreshBtn').on('click', function() {
                    // Clear filters and reload DataTable
                    $('#filterForm')[0].reset();
                    table.ajax.reload();
                });
            });
@endsection
