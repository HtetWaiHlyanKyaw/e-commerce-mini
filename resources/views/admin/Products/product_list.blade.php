@extends('admin.layouts.master')
@section('title', 'Products list')
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



        <h1 class="header-color">Product List</h1>
        <br>
        <div class="pagetitle">
            <h3>Total Products - <span style="color: #5d9bff;">{{ $datas->count() }}</span></h3>
            <nav>
                <ol class="breadcrumb">
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
                    <li class="breadcrumb-item active"><b>Product List</b></li>
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
            <table id="myTable">
                <thead>
                    <tr>
                        <th style="text-align:center; color: #5d9bff;">No</th>
                        <th style="text-align:center; color: #5d9bff;">Name</th>
                        <th style="text-align:center; color: #5d9bff;">Brand</th>
                        <th style="text-align:center; color: #5d9bff;">Price</th>
                        <th style="text-align:center; color: #5d9bff;">Date</th>
                        <th style="text-align:center; color: #5d9bff;">Quantity</th>
                        <th style="text-align:center; color: #5d9bff;">Action</th>

                    </tr>
                </thead>
                <tbody>

                    @php
                        $counter = 1; // Initialize counter variable
                    @endphp
                    @foreach ($datas as $plist)
                        <tr class="tr-shadow">
                            {{-- <td class="col-lg-1">{{ $blist->id }}</td> --}}
                            <td class="col-lg-1" style="text-align:center;">{{ $counter }}</td>
                            <td class="col-lg-2" style="text-align:center;">{{ $plist->name }}</td>
                            {{-- <td class="col-lg-1">
                            <img src="{{ asset('images/' . $plist->image) }}" alt="">
                        </td> --}}
                            <td class="col-lg-1" style="text-align:center;">{{ $plist->brand->name }}</td>
                            {{-- <td class="col-lg-1">{{ $plist->product_model_id }}</td>
                        <td class="col-lg-1">{{ $plist->storage_option }}</td>
                        <td class="col-lg-1">{{ $plist->color }}</td> --}}
                            <td class="col-lg-1" style="text-align:center;">{{ $plist->price }}</td>
                            <td class="col-lg-2" style="text-align:center;"> {{ \Carbon\Carbon::parse($plist->created_at)->format('F j, Y') }}</td>

                            <td class="col-lg-1" style="text-align:center; color: {{ $plist->quantity <= $plist->low_stock ? 'red' : 'inherit' }}">{{ $plist->quantity }}</td>
                            {{-- <td class="col-lg-1">{{ $plist->low_stock }}</td> --}}
                            {{-- <td class="col-lg-1">{{ $plist->description }}</td> --}}
                            <td class="col-lg-2" style="text-align:center;">

                                {{-- <a href="{{route('product.edit', $plist->id)}}"> --}}
                                <a href="{{ route('product.detail', $plist->id) }}">
                                    <button class="btn btn-outline-info border-0" title="product info">
                                        <i class="ti ti-file-description" style="font-size:19px;"></i>
                                    </button>
                                </a>

                                <a href="{{ route('product.edit', $plist->id) }}">
                                    <button class="btn btn-outline-success border-0" title="edit product">
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
                            $counter++;
                        @endphp
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
