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

        {{-- <h1 class="header-color">Customer Purchase List</h1>
        <br>
        <div class="pagetitle ">
            <h3> Total Customer Purchases - <span style="color: #5d9bff;">{{ $customerPurchases->count() }}</span></h3>
            <nav>
                <ol class="breadcrumb">
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
                    <a class="breadcrumb-item " href="{{ route('customer.page') }}">Customer  List</a>
                    <li class="breadcrumb-item "><b>Customer Purchase List</b></li>
                </ol>
            </nav>
        </div> --}}
        <h1 class="header-color">Customer Purchase List</h1>
        <br>
        <div class="pagetitle ">
            <h3> Total Customer Purchases - <span style="color: #5d9bff;">{{ $customerPurchases->count() }}</span></h3>
            <nav>
                <ol class="breadcrumb">
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
                    <a class="breadcrumb-item " href="{{ route('customer.page') }}">Customer List</a>
                    <li class="breadcrumb-item "><b>Customer Purchase List</b></li>
                </ol>
            </nav>
        </div>
        {{-- <div class="container"> --}}

            {{-- <div class="row align-items-center"> --}}
                {{-- <div class="col">
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
                </div> --}}
                {{-- <div class="col-auto">
                    <form action="{{ route('export.customer.purchases') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-success rounded-5 border-2 px-3 me-3"><i class="ti ti-download"></i> Export</button>
                    </form>
                </div> --}}
            {{-- </div> --}}
        {{-- </div> --}}
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
            <div class="row">
                <div class="col-auto">
                    <form action="{{ route('export.customer.purchases') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-success rounded-5 border-2 px-3 me-3"><i
                                class="ti ti-download"></i> Export</button>
                    </form>
                    <br>
                </div>
            </div>
                        {{-- <div class="col-auto mt-0" style="margin-left: 45px;">
                            <label for="">Start Date: </label>
                            <input type="date" class="form-control" name="start_date"
                                max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                        </div>

                        <div class="col-auto mt-0">
                            <label for="">End Date: </label>
                            <input type="date" class="form-control" name="end_date"
                                max="{{ \Carbon\Carbon::now()->format('Y-m-d') }}">
                        </div>

                        <div class="col-auto">
                            <input type="hidden" name="refresh" value="true">
                            <button type="submit" class="btn btn-primary mb-5  border-2 px-3 me-2"><i
                                    class="ti ti-adjustments-horizontal"></i> Filter</button>
                        </div> --}}
                    {{-- </div>
                </form>
            </div> --}}
            {{-- <br> --}}
            {{-- <div class="row">
                <div class="col-auto">
                    <form action="{{ route('export.customer.purchases') }}" method="GET">
                        @csrf
                        <button type="submit" class="btn btn-success rounded-5 border-2 px-3 me-3"><i class="ti ti-download"></i> Export</button>
                    </form>
                    <br>
                </div> --}}

                {{-- <div class="col-auto" style="margin-left: auto;">
                     {{ route('customer_purchase.filter') }}
                    <form action="{{ route('customer_purchase.filter') }}" method="GET">
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
                </div> </div>
                 --}}


            <table style="background-color:white" id="myTable" class="hover compact">

                <thead style="background-color: white; color:black;">

                    <tr>
                        <th style="color: #5d9bff; text-align:center">No</th>
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
                    @php
                        $counter = 1; // Initialize counter variable
                        $totalCustomerPurchases = $customerPurchases->count();
                    @endphp
                    @foreach ($customerPurchases as $customerPurchase)
                        <tr>
                            <td style="text-align:center; color: black">{{ $totalCustomerPurchases-- }}</td>
                            <td style="text-align:center; color: black">{{ $customerPurchase->invoice_id }}</td>
                            <td style="text-align:center; color: black">{{ $customerPurchase->user->name }}</td>
                            <td style="text-align:center; color: black">{{ $customerPurchase->total_quantity }}</td>
                            <td style="text-align:center; color: black">{{ $customerPurchase->total_price }}</td>
                            {{-- <td style="text-align:center; color: black">{{ $customerPurchase->payment_method }}</td> --}}
                            <td style="text-align:center;">
                                {{ \Carbon\Carbon::parse($customerPurchase->created_at)->format('F j, Y') }}</td>
                            <td style="text-align:center; color: black">
                                <a href="{{ route('customer_purchase.detail', $customerPurchase->id) }}">
                                    <button class="btn btn-outline-primary btn-lg border-0"
                                        title="customer purchase detail">
                                        <i class="ti ti-file-description"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @php
                        $counter++; // Initialize counter variable

                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
{{-- </div> --}}
@endsection
