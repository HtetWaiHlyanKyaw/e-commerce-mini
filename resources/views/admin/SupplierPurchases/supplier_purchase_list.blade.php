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
            <h4> Total Supplier Purchases -{{ $supplierPurchases->count() }}</h4>
            <nav>
                <ol class="breadcrumb">
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
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

            @if (session('error'))
            <div class="alert alert-warning text-center" role="alert">
                {{ session('error') }}
            </div>
        @endif
        </div>
        <hr>
        <div class="container">
            <div class="bg-white p-4 border rounded">
                <form action="{{ route('supplier_purchase.filter') }}" method="GET">
                    <div class="row pb-3">
                        <div class="col-md-5 pt-4">
                        </div>

                        <div class="col-md-3">
                            <label for="">Start Date: </label>
                            <input type="date" class="form-control" name="start_date"
                                max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                        </div>

                        <div class="col-md-3">
                            <label for="">End Date: </label>
                            <input type="date" class="form-control" name="end_date"
                                max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                        </div>

                        <div class="col-md-1 pt-4">
                            <button type="submit" class="btn btn-primary">Filter</button>
                        </div>
                    </div>
                </form>

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
    </div>
@endsection
@section('script')
    <!-- Additional scripts if needed -->
@endsection
@section('script')
    {{--   <script>
        $(document).ready(function() {
            $('#daterange').daterangepicker({
                opens: 'left',
                locale: {
                    format: 'YYYY-MM-DD'
                }
            }, function(start, end, label) {
                var start_date = start.format('YYYY-MM-DD');
                var end_date = end.format('YYYY-MM-DD');
                window.location.href = "{{ route('supplier_purchase.list') }}" + "?start_date=" + start_date + "&end_date=" + end_date;
            });
        }); --}}

    <script>
        // fetch();
        // //Filter
        // $(document).on("click", "#filter", function(e) {
        //     e.preventDefault();
        //     var start_date = $("#start_date").val();
        //     var end_date = $("#end_date").val();
        //     if (start_date == "" || end_date == "") {
        //         alert("Both date required");
        //     } else {
        //         $('#records').DataTable().destory();
        //         fetch(start_date, end_date);
        //     }
        // });
    </script>
