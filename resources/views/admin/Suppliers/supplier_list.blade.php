@extends('admin.layouts.master')
@section('title', 'Suppliers list')
@section('style')
    <style>
        .header-color {
            color: #1da9dc;
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
                    <li class="breadcrumb-item ">Home</li>
                    <li class="breadcrumb-item ">Suppliers</li>
                    <li class="breadcrumb-item "><b>Suppliers List</b></li>
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

        <div class="bg-lighter p-4 border rounded">
            <table  id="myTable" class="hover">
                <thead>
                    <tr>
                        <th style="color: #1da9dc">No</th>
                        <th style="color: #1da9dc">Name</th>
                        <th style="color: #1da9dc">Email</th>
                        <th style="color: #1da9dc">Phone</th>
                        <th style="color: #1da9dc">Address</th>
                        <th style="color: #1da9dc">created_at</th>
                        <th style="color: #1da9dc">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1; // Initialize counter variable
                    @endphp
                    @foreach ($suppliers as $supplier)
                        <tr class="tr-shadow">
                            {{-- <td class="col-lg-1">{{ $blist->id }}</td> --}}
                            <td class="col-lg-1">{{ $counter }}</td>
                            <td class="col-lg-1">{{ $supplier->name }}</td>
                            <td class="col-lg-1">{{ $supplier->email }}</td>
                            <td class="col-lg-1">{{ $supplier->phone_number }}</td>
                            <td class="col-lg-1">{{ $supplier->address }}</td>
                            <td class="col-lg-1">{{ $supplier->created_at->format('d / M /Y') }}</td>
                            <td class="col-lg-1">
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
        </div>
    </div>
@endsection
