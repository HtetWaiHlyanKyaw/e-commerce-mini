@extends('admin.layouts.master')
@section('title', 'Suppliers')
@section('style')
    <style>
        .header-color {
            color: #1da9dc;
        }
    </style>
@endsection
@section('content')
    <div class="container-fluid">
        {{-- Page Title --}}
        <div class="pagetitle">
            <h1 class="header-color">Supplier Create</h1>
            <br>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item ">Home</li>
                    <li class="breadcrumb-item ">Suppliers</li>
                    <li class="breadcrumb-item "><b>Create Suppliers</b></li>
                </ol>
            </nav>
        </div>
        {{-- Brand Create Success Message --}}
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
                            <h4 class="text-center">Create New Supplier</h4>
                        </div>
                        <hr>

                        <form action="{{ route('supplier.create') }}" method="post">
                            @csrf
                            <label for="supplierName" class="form-label">Name</label>
                            <div class="form-group mb-3">

                                <input type="text" name="supplierName"
                                    class="form-control @error('supplierName') is-invalid @enderror"
                                    placeholder="Supplier Name">

                                @error('supplierName')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label for="supplierEmail" class="form-label">Email</label>
                            <div class="form-group mb-3">

                                <input type="text" name="supplierEmail"
                                    class="form-control @error('supplierEmail') is-invalid @enderror"
                                    placeholder="Supplier Email">

                                @error('supplierEmail')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label for="supplierPhone" class="form-label">Phone</label>
                            <div class="form-group mb-3">

                                <input type="text" name="supplierPhone"
                                    class="form-control @error('supplierPhone') is-invalid @enderror"
                                    placeholder="Supplier Phone">

                                @error('supplierPhone')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label for="supplierAddress" class="form-label">Address</label>
                            <div class="form-group mb-3">

                                <input type="text" name="supplierAddress"
                                    class="form-control @error('supplierAddress') is-invalid @enderror"
                                    placeholder="Supplier Address">

                                @error('supplierAddress')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- <label for="supplierWebsite" class="form-label">Website</label>
                            <div class="form-group mb-3">

                                <input type="text" name="supplierWebsite"
                                    class="form-control @error('supplierWebsite') is-invalid @enderror" placeholder="Supplier Website">

                                @error('supplierWebsite')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}
                            {{-- submit --}}
                            <div class="text-center">
                                <a href="{{ route('supplier.list') }}"><input type="button" value="cancel"
                                        class="btn btn-outline-danger btn-lg border-2 px-3 me-3"></a>
                                <input type="submit" value="create" class="btn btn-primary btn-lg px-3">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
