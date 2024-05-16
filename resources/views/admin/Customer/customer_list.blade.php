@extends('admin.layouts.master')
@section('title', 'Customer list')
@section('style')
    <style>
        .header-color {
            color: #5d9bff;
        }
       .bg-lighter {
            background-color: #f6f7ff;
            /* Slightly darker shade */
        }
    </style>
@endsection
@section('content')

    <div class="container-fluid">
        {{-- Brand Create Success Message --}}



        <h1 class="header-color">Customer List</h1>
        <br>
        <div class="pagetitle">
            <h3>Total Customers - <span style="color: #5d9bff;">{{ $data->count() }}</span></h3>
            <nav>
                <ol class="breadcrumb">
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
                    <li class="breadcrumb-item "><b>Customer List</b></li>
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
            <table id="myTable" class="hover">
                <thead>
                    <tr>
                        <th  style="color: #5d9bff; text-align:center;">No</th>
                        <th style="color: #5d9bff; text-align:center;">Name</th>
                        <th style="color: #5d9bff; text-align:center;">Email</th>

                        <th style="color: #5d9bff; text-align:center;">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1;
                        $totalCustomer = $data->count(); // Initialize counter variable
                    @endphp
                    @foreach ($data as $clist)
                        <tr>
                            <td class="col-lg-1" style="text-align:center;">{{ $totalCustomer-- }}</td>

                            <td class="col-lg-1" style="text-align:center;">{{ $clist->name }}</td>
                            <td class="col-lg-1" style="text-align:center;">{{ $clist->email }}</td>
                            <td class="col-lg-1" style="text-align:center;"> {{ \Carbon\Carbon::parse($clist->created_at)->format('F j, Y') }}</td>

                        </tr>
                        @php
                        $counter++;
                        // Initialize counter variable
                    @endphp
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

@endsection
