@extends('admin.layouts.master')
@section('title', 'Brands list')
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



        <h1 class="header-color">Brand List</h1>
        <br>
        <div class="pagetitle">
            <h3>Total Brands - <span style="color: #5d9bff;">{{ $data->count() }}</span></h3>
            <nav>
                <ol class="breadcrumb">
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
                    <li class="breadcrumb-item "><b>Brand List</b></li>
                </ol>
            </nav>
        </div>

        <div>
            {{-- @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif --}}

            @if (session('alert'))
                <div id="alertMessage" class=" alert alert-{{ session('alert')['type'] }}">
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
                        <th style="color: #5d9bff; text-align:center;">No</th>
                        <th style="color: #5d9bff; text-align:center;">Name</th>
                        <th style="color: #5d9bff; text-align:center;">Date</th>
                        <th style="color: #5d9bff; text-align:center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1; // Initialize counter variable
                        $totalBrands = $data->count();
                    @endphp
                    @foreach ($data as $bList)
                        <tr>
                            {{-- <td class="col-lg-1">{{ $blist->id }}</td> --}}
                            <td class="col-lg-1" style="text-align:center;">{{ $totalBrands-- }}</td>
                            <td class="col-lg-1" style="text-align:center;">{{ $bList->name }}</td>
                            <td class="col-lg-1" style="text-align:center;">
                                {{ \Carbon\Carbon::parse($bList->created_at)->format('F j, Y') }}</td>
                            <td class="col-lg-1" style="text-align:center;">
                                <a href="{{ route('brand.edit', $bList->id) }}">
                                    <button class="btn btn-outline-success border-0 me-2" title="edit brand">
                                        {{-- <i class="bi bi-pencil-square">edit</i> --}}
                                        <i class="ti ti-edit" style="font-size:19px;"></i>
                                    </button>
                                </a>
                                <a href="{{ route('brand.delete', $bList->id) }}">
                                    <button class="btn btn-outline-danger border-0" title="delete brand">
                                        <i class="ti ti-trash" style="font-size:19px;"></i>
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
