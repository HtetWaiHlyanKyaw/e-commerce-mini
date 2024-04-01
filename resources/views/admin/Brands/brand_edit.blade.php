@extends('admin.layouts.master')
@section('title', 'Brand Edit Page')
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
            <h1 class="header-color">Brand Update</h1>
            <br>
            <nav>
                <ol class="breadcrumb">
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
                    <a class="breadcrumb-item " href="{{ route('brand.list') }}">Brand</a>
                     <li class="breadcrumb-item "><b>Edit Brand</b></li>
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
                            <h4 class="text-center">Edit Brand</h4>
                        </div>
                        <hr>

                        <form action="{{ route('brand.update', $data->id) }}" method="post">
                            @csrf
                            <label for="brandName" class="form-label">Brand Name</label>
                            <div class="form-group mb-3">
                                <input type="text" name="brandName"
                                    class="form-control @error('brandName') is-invalid @enderror"
                                    value="{{ old('name', $data->name) }}">


                                @error('brandName')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- submit --}}
                            <div class="text-center">
                                <a href="{{ route('brand.list') }}"><input type="button" value="cancel"
                                        class="btn btn-outline-danger btn-lg border-2 px-3 me-3"></a>
                                <input type="submit" value="update" class="btn btn-primary btn-lg px-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
