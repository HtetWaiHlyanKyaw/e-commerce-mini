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
            <h3>Total Customers - {{ $data->count() }}</h3>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item ">Home</li>
                    <li class="breadcrumb-item ">Customer</li>
                    <li class="breadcrumb-item "><b>Customer List</b></li>
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
                        $counter = 1; // Initialize counter variable
                    @endphp
                    @foreach ($data as $clist)
                        <tr>
                            {{-- <td class="col-lg-1">{{ $blist->id }}</td> --}}
                            <td class="col-lg-1" style="text-align:center;">{{ $counter++ }}</td>
                            <td class="col-lg-1" style="text-align:center;">{{ $clist->name }}</td>
                            <td class="col-lg-1" style="text-align:center;">{{ $clist->email }}</td>
                            <td class="col-lg-1" style="text-align:center;"> {{ \Carbon\Carbon::parse($clist->created_at)->format('F j, Y') }}</td>

                        </tr>

                    @endforeach
                </tbody>

            </table>
        </div>
    </div>

@endsection
