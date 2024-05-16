@extends('admin.layouts.master')
@section('title', 'Dashboard')

@section('style')
    <style>
        .header-color {
            color: #5d9bff;
        }

        .circle-icon {
            width: 60px;
            height: 60px;

            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .card-text {
            font-size: 16px;
        }

        a {
            color: inherit;
            text-decoration: none;
        }
    </style>
@endsection

@section('content')

    <div class="container-fluid">
        <h1 class="header-color">Dashboard</h1><br>
        <div class="pagetitle">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active"><b>Home</b></li>
                </ol>
            </nav>
        </div>

        <h4>Personnel</h4>
        <div class="row mt-4">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('supplier.list') }}">
                                <p class="card-text mb-0" style="font-size: 16px;">Total Suppliers</p>
                            </a><br>
                            <h3 class="mb-0"><strong>{{ $suppliers->count() }}</strong></h3>
                        </div>
                        <div class="circle-icon" style="background-color: rgba(255, 99, 132, 0.2);">
                            <i class="ti ti-package" style="font-size: 30px; color: #ff5d5d"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('customer.page') }}">
                                <p class=" mb-0 card-text" style="font-size: 16px;">Total Customers</p>
                            </a><br>

                            <h3 class="mb-0"><strong>{{ $customers->count() }}</strong></h3>
                        </div>
                        <div class="circle-icon" style="background-color: #e0ebff">
                            <i class="ti ti-users" style="font-size: 30px; color: #5d9bff"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div>
                            <a href="{{ route('Admin.list') }}">
                                <p class=" mb-0 card-text">Total Admins</p>
                            </a><br>
                            <h3 class="mb-0"><strong>{{ $admins->count() }}</strong></h3>
                        </div>
                        <div class="circle-icon" style="background-color: #e0ffe0">
                            <i class="ti ti-shield" style="font-size: 30px; color:#60ff5d;"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- <h4>Store</h4><br> --}}
        {{-- <h4>
            Select Month:
            <select id="doughnutMonthSelector" class="form-control d-inline-block w-auto ml-2" style="font-size:20px;">
                @for ($i = 1; $i <= 12; $i++)
                    <option value="{{ $i }}" {{ $i == Carbon::now()->month ? 'selected' : '' }}>
                        {{ Carbon::create()->month($i)->format('F') }}
                    </option>
                @endfor
            </select>
            Select Year:
            <select id="doughnutYearSelector" class="form-control d-inline-block w-auto ml-2" style="font-size:20px;">
                @for ($i = 2020; $i <= Carbon::now()->year; $i++)
                    <option value="{{ $i }}" {{ $i == Carbon::now()->year ? 'selected' : '' }}>
                        {{ $i }}
                    </option>
                @endfor
            </select>
        </h4> --}}
        @php
            use Carbon\Carbon;
            $currentMonthName = Carbon::now()->format('F');
        @endphp
        <div class="row">
            <div class="col-lg-3 d-flex flex-column">

                    <div class="card h-100">
                        <div class="card-body">
                            <div class="row">
                                <h5 class="card-title">Product</h5>
                                <div class="col-7">
                                    <br>
                                    <a href="{{ route('brand.list') }}">
                                        <p class="card-text">Total Brands</p>
                                    </a>
                                    <hr>
                                    <a href="{{ route('model.list') }}">
                                        <p class="card-text">Total Models</p>
                                    </a>
                                    <hr>
                                    <a href="{{ route('product.index') }}">
                                        <p class="card-text">Total Products</p>
                                    </a>
                                    <hr>
                                    <a href="{{ route('product.reviews') }}">
                                        <p class="card-text">Total Reviews</p>
                                    </a>
                                    <hr>
                                    <a href="">
                                        <p class="card-text">Total Banners</p>
                                    </a>
                                </div>
                                <div class="col-5">
                                    <br>
                                    <p class="card-text text-success" style="text-align: center;">{{ $brands->count() }}</p>
                                    <hr>
                                    <p class="card-text text-success"style="text-align: center;">{{ $models->count() }}</p>
                                    <hr>
                                    <p class="card-text text-success" style="text-align :center;">{{ $products->count() }}
                                        <hr>
                                    </p>
                                    <p class="card-text text-success" style="text-align :center;">{{ $reviews->count() }}
                                    </p>
                                    <hr>
                                    <p class="card-text text-success" style="text-align :center;">{{ $banners }}
                                    </p>
                                </div>
                            </div>
                        </div>

                </div>
            </div>
            <div class="col-lg-9 d-flex flex-column">

                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">Top-selling Products</h5>
                            <div class="row">
                                <div class="col-lg-6">
                                    <canvas id="quantityDoughnutChart" width="300" height="300"></canvas>
                                </div>
                                <div class="col-lg-6">
                                    <canvas id="salesDoughnutChart" width="300" height="300"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>

        {{-- <span style="color: #5d9bff">{{ $currentMonthName }}</span> --}}
        <div class="row mb-4">
            <div class="col-md-6">
                <h4>
                    Supplier Revenues for &nbsp
                    <select id="monthSelector" class="form-control d-inline-block w-auto ml-2" style="font-size:20px;">
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ $i == Carbon::now()->month ? 'selected' : '' }}>
                                {{ Carbon::create()->month($i)->format('F') }}
                            </option>
                        @endfor
                    </select>
                    <select id="yearSelector" class="form-control d-inline-block w-auto ml-2" style="font-size:20px;">
                        @for ($i = 2023; $i <= Carbon::now()->year; $i++) <!-- Adjust the range as needed -->
                            <option value="{{ $i }}" {{ $i == Carbon::now()->year ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                </h4>
            </div>
            <div class="col-md-6">
                <h4>
                    Customer Revenues for &nbsp
                    <select id="customerMonthSelector" class="form-control d-inline-block w-auto ml-2" style="font-size:20px;">
                        @for ($i = 1; $i <= 12; $i++)
                            <option value="{{ $i }}" {{ $i == Carbon::now()->month ? 'selected' : '' }}>
                                {{ Carbon::create()->month($i)->format('F') }}
                            </option>
                        @endfor
                    </select>
                    <select id="customerYearSelector" class="form-control d-inline-block w-auto ml-2" style="font-size:20px;">
                        @for ($i = 2023; $i <= Carbon::now()->year; $i++) <!-- Adjust the range as needed -->
                            <option value="{{ $i }}" {{ $i == Carbon::now()->year ? 'selected' : '' }}>
                                {{ $i }}
                            </option>
                        @endfor
                    </select>
                </h4>
            </div>
        </div>


        <div class="row mt-4">
            <div class="col-lg-6">
                <div class="card h-80">
                    <div class="card-body">

                        <h5 class="card-title"><a href="{{ route('supplier_purchase.list') }}">Supplier Sales</a></h5>
                        <br>
                        <canvas id="purchaseChart" width="400" height="200 "></canvas>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <h4 class="card-text">Total : <span class="text-success"
                                        id="totalRevenue">{{ $supplierPurchaseRevenue }}$</span></h4>
                            </div>
                            <div class="col-4">
                                <h4 class="card-text">Purchases : <span class="text-success"
                                        id="purchaseCount">{{ $supplierPurchaseCount }}</span></h4>
                            </div>
                            <div class="col-4">
                                <!-- Leave this empty if you don't have content for it -->
                                <h4 class="card-text">Quantity : <span class="text-success"
                                        id="totalQuantitySold">{{ $supplierTotalQuantitySold }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">

                <div class="card h-80">
                    <div class="card-body">
                        <h5 class="card-title"><a href="{{ route('customer_purchase.list') }}">Customer Sales</a>
                        </h5>
                        <br>
                        <canvas id="customerPurchaseChart" width="400" height="200 "></canvas>
                        <hr>
                        <div class="row">
                            <div class="col-4">
                                <h4 class="card-text">Total : <span class="text-success"
                                        id="customerTotalRevenue">{{ $customerPurchaseRevenue }}$</span></h4>
                            </div>
                            <div class="col-4">
                                <h4 class="card-text">Purchases : <span class="text-success"
                                        id="customerPurchaseCount">{{ $customerPurchaseCount }}</span></h4>
                            </div>
                            <div class="col-4">
                                <!-- Leave this empty if you don't have content for it -->
                                <h4 class="card-text">Quantity : <span class="text-success"
                                        id="customerTotalQuantitySold">{{ $customerTotalQuantitySold }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    @if (!empty($supplierPurchaseAmounts))
    <script>
        function updateChartAndData(days, supplierPurchaseAmounts, revenue, count, quantitySold) {
            var maxAmount = Math.max(...supplierPurchaseAmounts);

            var ctx = document.getElementById('purchaseChart').getContext('2d');
            if (window.myChart) {
                window.myChart.destroy();
            }
            window.myChart = new Chart(ctx, {
                type: 'line',
                data: {
                    labels: days,
                    datasets: [{
                        label: 'Purchase Amount',
                        data: supplierPurchaseAmounts,
                        backgroundColor: 'rgba(255, 99, 132, 0.2)',
                        borderColor: 'rgba(255, 99, 132, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Days',
                                font: {
                                    weight: 'bold'
                                }
                            }
                        },
                        y: {
                            beginAtZero: true,
                            suggestedMax: maxAmount,
                            title: {
                                display: true,
                                text: 'Purchase Amount',
                                font: {
                                    weight: 'bold'
                                }
                            }
                        }
                    }
                }
            });

            document.getElementById('totalRevenue').innerText = revenue + '$';
            document.getElementById('purchaseCount').innerText = count;
            document.getElementById('totalQuantitySold').innerText = quantitySold;
        }

        document.addEventListener('DOMContentLoaded', function() {
            var initialMonth = document.getElementById('monthSelector').value;
            var initialYear = document.getElementById('yearSelector').value;

            fetch(`/supplier-purchases/${initialMonth}/${initialYear}`)
                .then(response => response.json())
                .then(data => {
                    updateChartAndData(data.days, data.supplierPurchaseAmounts, data.revenue, data.count, data.quantitySold);
                });
        });

        document.getElementById('monthSelector').addEventListener('change', function() {
            var selectedMonth = this.value;
            var selectedYear = document.getElementById('yearSelector').value;

            fetch(`/supplier-purchases/${selectedMonth}/${selectedYear}`)
                .then(response => response.json())
                .then(data => {
                    updateChartAndData(data.days, data.supplierPurchaseAmounts, data.revenue, data.count, data.quantitySold);
                });
        });

        document.getElementById('yearSelector').addEventListener('change', function() {
            var selectedYear = this.value;
            var selectedMonth = document.getElementById('monthSelector').value;

            fetch(`/supplier-purchases/${selectedMonth}/${selectedYear}`)
                .then(response => response.json())
                .then(data => {
                    updateChartAndData(data.days, data.supplierPurchaseAmounts, data.revenue, data.count, data.quantitySold);
                });
        });
    </script>
@endif
@if (!empty($customerPurchaseAmounts))
    <script>
    function updateCustomerChart(days, customerPurchaseAmounts, revenue, count, quantitySold) {
        var maxCustomerAmount = Math.max(...customerPurchaseAmounts);

        var ctxCustomer = document.getElementById('customerPurchaseChart').getContext('2d');
        if (window.myCustomerChart) {
            window.myCustomerChart.destroy();
        }
        window.myCustomerChart = new Chart(ctxCustomer, {
            type: 'line',
            data: {
                labels: days,
                datasets: [{
                    label: 'Purchase Amount',
                    data: customerPurchaseAmounts,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    x: {
                        title: {
                            display: true,
                            text: 'Days',
                            font: {
                                weight: 'bold'
                            }
                        }
                    },
                    y: {
                        beginAtZero: true,
                        suggestedMax: maxCustomerAmount,
                        title: {
                            display: true,
                            text: 'Purchase Amount',
                            font: {
                                weight: 'bold'
                            }
                        }
                    }
                }
            }
        });
        document.getElementById('customerTotalRevenue').innerText = revenue + '$';
        document.getElementById('customerPurchaseCount').innerText = count;
        document.getElementById('customerTotalQuantitySold').innerText = quantitySold;
    }

    document.addEventListener('DOMContentLoaded', function() {
        var initialMonth = document.getElementById('customerMonthSelector').value;
        var initialYear = document.getElementById('customerYearSelector').value;

        fetch(`/customer-purchases/${initialMonth}/${initialYear}`)
            .then(response => response.json())
            .then(data => {
                updateCustomerChart(data.days, data.customerPurchaseAmounts, data.revenue, data.count, data.quantitySold);
            });
    });

    document.getElementById('customerMonthSelector').addEventListener('change', function() {
        var selectedMonth = this.value;
        var selectedYear = document.getElementById('customerYearSelector').value;

        fetch(`/customer-purchases/${selectedMonth}/${selectedYear}`)
            .then(response => response.json())
            .then(data => {
                updateCustomerChart(data.days, data.customerPurchaseAmounts, data.revenue, data.count, data.quantitySold);
            });
    });

    document.getElementById('customerYearSelector').addEventListener('change', function() {
        var selectedYear = this.value;
        var selectedMonth = document.getElementById('customerMonthSelector').value;

        fetch(`/customer-purchases/${selectedMonth}/${selectedYear}`)
            .then(response => response.json())
            .then(data => {
                updateCustomerChart(data.days, data.customerPurchaseAmounts, data.revenue, data.count, data.quantitySold);
            });
    });
    </script>
@endif
    <script>
        var quantityCtx = document.getElementById('quantityDoughnutChart').getContext('2d');
        var salesCtx = document.getElementById('salesDoughnutChart').getContext('2d');
        var productData = @json($productData);

        // Extract data for quantity chart
        var quantityLabels = productData.map(function(item) {
            return item.product.name; // Assuming product_id is used as labels
        });
        var quantityData = productData.map(function(item) {
            return item.total_quantity;
        });

        // Extract data for sales chart
        var salesLabels = productData.map(function(item) {
            return item.product.name; // Assuming product_id is used as labels
        });
        var salesData = productData.map(function(item) {
            return item.total_sales;
        });

        var quantityDoughnutChart = new Chart(quantityCtx, {
            type: 'doughnut',
            data: {
                labels: quantityLabels,
                datasets: [{
                    label: 'Quantity Sold',
                    data: quantityData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(255, 99, 132, 0.5)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false, // Set to true for responsiveness
                maintainAspectRatio: false // Set to true for maintaining aspect ratio

            }
        });

        var salesDoughnutChart = new Chart(salesCtx, {
            type: 'doughnut',
            data: {
                labels: salesLabels,
                datasets: [{
                    label: 'Sales Total',
                    data: salesData,
                    backgroundColor: [
                        'rgba(255, 99, 132, 0.5)',
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 206, 86, 0.5)',
                        'rgba(75, 192, 192, 0.5)',
                        'rgba(153, 102, 255, 0.5)',
                        'rgba(255, 159, 64, 0.5)',
                        'rgba(255, 99, 132, 0.5)'
                        // Add more colors as needed
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: false, // Set to true for responsiveness
                maintainAspectRatio: false // Set to true for maintaining aspect ratio

            }
        });

    </script>
@endsection
