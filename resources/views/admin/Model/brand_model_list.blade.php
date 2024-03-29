@extends('admin.layouts.master')
@section('title', 'Models')
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
    {{-- <div class="container-fluid">
<table id="myTable">
    <thead>
        <tr>
            <th>Name</th>
            <th>Brand</th>
            <!-- Other columns -->
        </tr>
    </thead>
    <tbody>
        @foreach ($productModels as $productModel)
        <tr>
            <td>{{ $productModel->name }}</td> <!-- Assuming 'name' is the column for product model name -->
            <td>{{ $productModel->brand->name }}</td> <!-- Accessing the related brand name -->
            <!-- Other columns -->
        </tr>
        @endforeach
    </tbody>
</table>
</div> --}}
    <div class="container-fluid">
        {{-- Brand Create Success Message --}}



        <h1 class="header-color">Product Models</h1>
        <br>
        <div class="pagetitle">
            <h3>Category List Count -{{ $productModels->count() }}</h3>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "> Home</li>
                    <li class="breadcrumb-item ">Product Models</li>
                    <li class="breadcrumb-item "><b>Product Models List</b></li>
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
                        <th class="float:left;" style="color: #1da9dc">No</th>
                        <th style="color: #1da9dc">Name</th>
                        <th style="color: #1da9dc">Brand</th>
                        <th style="color: #1da9dc">Date</th>
                        <th style="color: #1da9dc">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1; // Initialize counter variable
                    @endphp
                    @foreach ($productModels as $productModel)
                        <tr class="tr-shadow">
                            {{-- <td class="col-lg-1">{{ $productModel->id }}</td> --}}
                            <td class="col-lg-1">{{ $counter }}</td>
                            <td class="col-lg-1">{{ $productModel->name }}</td>
                            <td class="col-lg-1">{{ $productModel->brand->name }}</td>
                            <td class="col-lg-1">{{ $productModel->created_at->format('d / M /Y') }}</td>
                            <td class="col-lg-1">
                                <a href="{{ route('model.edit', $productModel->id) }}">
                                    <button class="btn btn-outline-success border-0 me-2" title="edit brand">
                                        {{-- <i class="bi bi-pencil-square">edit</i> --}}
                                        <i class="ti ti-edit" style="font-size:19px;"></i>
                                    </button>
                                </a>
                                <a href="{{ route('model.delete', $productModel->id) }}">
                                    <button class="btn btn-outline-danger border-0" title="delete brand">
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
