@extends('admin.layouts.master')
@section('title', 'Suppliers')
@section('style')
    <style>
        .header-color {
            color: #5d9bff;
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
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
                    <a class="breadcrumb-item " href="{{ route('supplier.list') }}">Suppliers List</a>
                    <li class="breadcrumb-item "><b>Create Suppliers</b></li>
                </ol>
            </nav>
        </div>
        {{-- Supplier Create Success Message --}}
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

        {{-- <div>
            @if (session('error'))
                <div class="alert alert-danger text-center" role="alert">
                    {{ session('error') }}
                </div>
            @endif
        </div> --}}

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
                                    placeholder="Supplier Name" value="{{old('supplierName') }}">

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
                                    placeholder="Supplier Email" value="{{ old('supplierEmail') }}">

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
                                    placeholder="Supplier Phone" value="{{ old('supplierPhone') }}">

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
                                    placeholder="Supplier Address" value="{{ old('supplierAddress') }}">

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
                                <a href="{{ route('supplier.list') }}"><input type="button" value="Cancel"
                                        class="btn btn-outline-danger btn-lg border-2 px-3 me-3"></a>
                                <input type="submit" value="Create" class="btn btn-primary btn-lg px-3">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
