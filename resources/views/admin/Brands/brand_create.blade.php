@extends('admin.layouts.master')
@section('title', 'Brand Page')


@section('content')
    <div class="container-fluid">
        {{-- Page Title --}}
         <div class="pagetitle">
            <h1>Brand Create</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Brand</li>
                    <li class="breadcrumb-item active">Create Brand</li>
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
                            <h4 class="text-center">Create New Brand</h4>
                        </div>
                        <hr>

                        <form action="{{ route('brand.create') }}" method="post">
                            @csrf

                            <div class="form-group mb-3">
                                <input type="text" name="brandName"
                                    class="form-control @error('brandName') is-invalid @enderror" placeholder="brand name">


                                @error('brandName')
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