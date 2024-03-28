@extends('admin.layouts.master')
@section('title', 'Products list')
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



        <h1>Products</h1>
        <div class="pagetitle">
            <h3>Category List Count - {{ $datas->count() }}</h3>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Product</li>
                    <li class="breadcrumb-item active">Product List</li>
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
            <table  id="myTable"  class="hover">
                <thead>
                    <tr>
                        <th class="float:left;" style="color: #1da9dc">No</th>
                        <th style="color: #1da9dc">Name</th>
                        <th style="color: #1da9dc">Image</th>
                        <th style="color: #1da9dc">Brand</th>
                        <th style="color: #1da9dc">Model</th>
                        <th style="color: #1da9dc">Storage Option</th>
                        <th style="color: #1da9dc">Color</th>
                        <th style="color: #1da9dc">Price</th>
                        <th style="color: #1da9dc">Quantity</th>
                        <th style="color: #1da9dc">Low Stock</th>
                        <th style="color: #1da9dc">Description</th>
                        <th style="color: #1da9dc">Action</th>

                    </tr>
                </thead>
                <tbody>

                    @php
                        $counter = 1; // Initialize counter variable
                    @endphp
                    @foreach ($datas as $plist)
                        <tr class="tr-shadow">
                            {{-- <td class="col-lg-1">{{ $blist->id }}</td> --}}
                            <td class="col-lg-1">{{ $counter }}</td>
                            <td class="col-lg-1">{{ $plist->name }}</td>
                            <td class="col-lg-1">
                                <img src="{{ asset('images/' . $plist->image) }}" alt="">
                            </td>
                            <td class="col-lg-1">{{ $plist->brand_id }}</td>
                            <td class="col-lg-1">{{ $plist->product_model_id }}</td>
                            <td class="col-lg-1">{{ $plist->storage_option }}</td>
                            <td class="col-lg-1">{{ $plist->color }}</td>
                            <td class="col-lg-1">{{ $plist->price }}</td>
                            <td class="col-lg-1">{{ $plist->quantity }}</td>
                            <td class="col-lg-1">{{ $plist->low_stock }}</td>
                            <td class="col-lg-1">{{ $plist->description }}</td>
                            <td class="col-lg-1">
                                <a href="{{ route('product.edit', $plist->id) }}">
                                    <button class="btn btn-outline-success border-0 me-2" title="edit product">
                                        {{-- <i class="bi bi-pencil-square">edit</i> --}}
                                        <i class="ti ti-edit" style="font-size:19px;"></i>
                                    </button>
                                </a>
                                <a href="{{ route('product.delete', $plist->id) }}">
                                    <button class="btn btn-outline-danger border-0" title="delete product">
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
