@extends('admin.layouts.master')
@section('title', 'Brands')
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
            <h1 class="header-color">Brand Create</h1>
            <br>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item ">Home</li>
                    <li class="breadcrumb-item ">Brand</li>
                    <li class="breadcrumb-item "><b>Create Brand</b></li>
                </ol>
            </nav>
        </div>
        {{-- Brand Create Success Message --}}
        <div>
            {{-- @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif --}}

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

        {{-- Brand Create Card --}}
        <div class="container-fluid">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="text-center">Create New Brand</h4>
                        </div>
                        <hr>

                        <form action="{{ route('brand.create') }}" method="post">
                            @csrf
                            <label for="brandName" class="form-label">Name</label>
                            <div class="form-group mb-3">

                                <input type="text" name="brandName"
                                    class="form-control @error('brandName') is-invalid @enderror" placeholder="Brand Name">


                                @error('brandName')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- submit --}}
                            <div class="text-center">
                                <a href="{{ route('brand.list') }}"><input type="button" value="Cancel"
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
