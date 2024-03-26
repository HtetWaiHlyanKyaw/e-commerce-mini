@extends('admin.layouts.master')
@section('title', 'Products list')

@section('content')

    <div class="container-fluid">
{{-- Brand Create Success Message --}}

        <div>
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <h1>Products</h1>
        <div class="pagetitle">
            <h3>Category List Count - {{ $datas->count()}}</h3>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Product</li>
                    <li class="breadcrumb-item active">Product List</li>
                </ol>
            </nav>
        </div>
        <table border="1" id="myTable">
            <thead>
                <tr style="color: #1da9dc">
                    <th class="float:left;">No</th>
                    <th>Name</th>
                    <th>Image</th>
                    <th>Brand</th>
                    <th>Model</th>
                    <th>Storage Option</th>
                    <th>Color</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Low Stock</th>
                    <th>Description</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @php
                $counter = 1; // Initialize counter variable
                @endphp
                @foreach ($datas as $plist)

                    <tr class="tr-shadow">
                        {{-- <td class="col-lg-1">{{ $blist->id }}</td> --}}
                        <td class="col-lg-1">{{ $counter}}</td>
                        <td class="col-lg-1">{{ $plist->name }}</td>
                        <td class="col-lg-1">
                            <th><img src="{{asset('images')}}/{{$plist->photo}}" alt="" style="width:100px;height:auto;"></th>
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
                            <a href="{{route('product.edit', $plist->id)}}">
                                <button class="btn btn-success me-2" title="edit product">
                                    {{-- <i class="bi bi-pencil-square">edit</i> --}}
                                    <i class="ti ti-edit"></i>
                                </button>
                            </a>
                            <a href="{{route('product.delete', $plist->id)}}">
                                <button class="btn btn-danger" title="delete product">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    @php
                    $counter++;
                @endphp
                @endforeach
            </tbody>

        </table>
    </div>

    @endsection

