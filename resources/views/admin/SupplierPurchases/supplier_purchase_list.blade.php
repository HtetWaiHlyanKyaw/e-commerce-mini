@extends('admin.layouts.master')
@section('title', 'Suppliers list')
@section('style')
 
@endsection
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

        <h1 class="header-color">Supplier Purchase List</h1>
        <div class="pagetitle " >
            <h4> Total Supplier Purchases -{{ $supplierPurchases->count() }}</h4>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Supplier Purchases</li>
                    <li class="breadcrumb-item active">Supplier Purchase List</li>
                </ol>   
            </nav>
        </div>
        <div class="bg-lighter p-4 border rounded">
        <table style="background-color:white"  id="myTable">
            <thead style="background-color: #5DC5FF; color: white;">
                <tr>
                    <th>No</th>
                    <th>Supplier</th>
                    {{-- <th>Product</th> --}}
                    <th>Quantity</th>
                    <th>Unit Price</th>
                    <th>Total Price</th>
                    <th>Created At</th>
                    {{-- <th>Actions</th> --}}
                </tr>
            </thead>
            <tbody>
                @php
                $counter = 1; // Initialize counter variable
                @endphp
                @foreach ($supplierPurchases as $supplierPurchase)
                    <tr class="tr-shadow">
                        {{-- <td class="col-lg-1">{{ $blist->id }}</td> --}}
                        <td class="col-lg-1">{{ $counter}}</td>
                        <td class="col-lg-1">{{ $supplierPurchase->supplier->name }}</td>
                        {{-- <td class="col-lg-1">{{ $supplierPurchase->email }}</td> --}}
                        <td class="col-lg-1">{{ $supplierPurchase->quantity }}</td>
                        <td class="col-lg-1">{{ $supplierPurchase->unit_price }}</td>
                        <td class="col-lg-1">{{ $supplierPurchase->total_price }}</td>
                        <td class="col-lg-1">{{ $supplierPurchase->created_at->format('d / M /Y') }}</td>
                        {{-- <td class="col-lg-1">
                            <a href="{{route('supplier.edit', $supplierPurchase->id)}}">
                                <button class="btn btn-outline-success btn-lg border-2" title="edit supplier">
                                    {{-- <i class="bi bi-pencil-square">edit</i> --}}
                                    {{-- <i class="ti ti-edit"></i>
                                </button>
                            </a>
                            <a href="{{route('supplier.delete', $supplierPurchase->id)}}">
                                <button class="btn btn-outline-danger btn-lg border-2" title="delete supplier" onclick="return confirm('Are you sure you want to delete this supplier?');"">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </a> 
                        </td> --}}
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
</body>
</html>
