@extends('admin.layouts.master')
@section('title', 'Supplier Purchase Create')

@section('content')
    <div class="container-fluid">
        {{-- Page Title --}}
        <div class="pagetitle">
            <h1 class="header-color">Supplier Purchase Create</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Supplier Purchase</li>
                    <li class="breadcrumb-item active">Create New Supplier Purchase</li>
                </ol>
            </nav>
        </div>
        {{-- Model Create Success Message --}}
        <div>
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>


        {{-- Brand Create Card --}}
        <div class="container-fluid">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="text-center">Create New Supplier Purchase</h4>
                        </div>
                        <hr>

                        <form action="#" method="post">
                            @csrf


                             {{-- Supplier  --}}
                             <div class="form-group mb-3">
                                <label for="supplierName" class="form-label">Supplier</label>
                                <select class="form-select @error('SupplierId') is-invalid @enderror"  name="SupplierId"
                                 aria-label="Default select example">
                                    <option value="">Choose Supplier</option>
                                    @foreach ($supplierPurchases as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>

                                @error('SupplierId')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Product  --}}
                            {{-- <div class="form-group mb-3">
                                <label for="supplierName" class="form-label">Supplier</label>
                                <select class="form-select @error('SupplierId') is-invalid @enderror"  name="SupplierId"
                                 aria-label="Default select example">
                                    <option value="">Choose Supplier</option>
                                    @foreach ($supplierPurchases as $supplier)
                                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                                    @endforeach
                                </select>

                                @error('SupplierId')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}

                            <div class="form-group mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" name="quantity"    id="quantity"
                                    class="form-control @error('quantity') is-invalid @enderror" placeholder="Quantity" value="{{old('quantity')}}" min="1" required>

                                    @error('quantity')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="unit price" class="form-label">Unit Price</label>
                                <input type="text" name="unit price" id="unit price"
                                    class="form-control @error('unit price') is-invalid @enderror" placeholder="Unit Price" value="{{old('unit price')}}" required>
                                    @error('unit price')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror 
                            </div>

                            {{-- submit --}}
                            <div class="text-center">
                                <input type="reset" value="cancel" class="btn btn-secondary px-3 me-3">
                                <input type="submit" value="create" class="btn btn-primary px-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
