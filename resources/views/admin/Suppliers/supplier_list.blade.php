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
    </style>
@endsection
@section('content')

    <div class="container-fluid">
        {{-- Brand Create Success Message --}}


        <h1 class="header-color">Supplier List</h1>
        <br>
        <div class="pagetitle ">
            <h4> Total Suppliers -{{ $suppliers->count() }}</h4>
            <nav>
                <ol class="breadcrumb">
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
                    <li class="breadcrumb-item " ><b>Supplier List</b></li>
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
            <table  id="myTable" class="hover">
                <thead>
                    <tr>
                        <th style="color: #5d9bff;text-align:center;">No</th>
                        <th style="color: #5d9bff; text-align:center;">Name</th>
                        <th style="color: #5d9bff; text-align:center;">Email</th>
                        <th style="color: #5d9bff; text-align:center;">Phone</th>
                        <th style="color: #5d9bff; text-align:center;">Address</th>
                        <th style="color: #5d9bff; text-align:center;">created_at</th>
                        <th style="color: #5d9bff; text-align:center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1; // Initialize counter variable
                    @endphp
                    @foreach ($suppliers as $supplier)
                        <tr class="tr-shadow">
                            {{-- <td class="col-lg-1">{{ $blist->id }}</td> --}}
                            <td class="col-lg-1" style="text-align:center;">{{ $counter }}</td>
                            <td class="col-lg-1" style="text-align:center;">{{ $supplier->name }}</td>
                            <td class="col-lg-1" style="text-align:center;">{{ $supplier->email }}</td>
                            <td class="col-lg-1" style="text-align:center;">{{ $supplier->phone_number }}</td>
                            <td class="col-lg-1" style="text-align:center;">{{ $supplier->address }}</td>
                            <td class="col-lg-1" style="text-align:center;"> {{ \Carbon\Carbon::parse($supplier->created_at)->format('F j, Y') }}</td>
                            <td class="col-lg-1" style="text-align:center;">
                                <a href="{{ route('supplier.edit', $supplier->id) }}">
                                    <button class="btn btn-outline-success border-0 me-2" title="edit supplier">
                                        {{-- <i class="bi bi-pencil-square">edit</i> --}}
                                        <i class="ti ti-edit" style="font-size:19px;"></i>
                                    </button>
                                </a>
                                <a href="{{ route('supplier.delete', $supplier->id) }}">
                                    <button class="btn btn-outline-danger border-0" title="delete supplier"
                                        onclick="return confirm('Are you sure you want to delete this supplier?');"">
                                        <i class="ti ti-trash" style="font-size:19px;"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>
                        @php
                            $counter++; // Increment counter for the next row
                        @endphp
                    @endforeach
                </tbody>
            </table>
        {{-- </div> --}}
    </div>


@endsection

