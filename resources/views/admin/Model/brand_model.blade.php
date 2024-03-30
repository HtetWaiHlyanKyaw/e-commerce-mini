@extends('admin.layouts.master')
@section('title', 'Model Create')

@section('style')
    <style>
        .header-color {
            color: #5d9bff;
        }

    </style>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.1.0/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="container-fluid">
        {{-- Page Title --}}
        <div class="pagetitle">
            <h1 class="header-color">Model Create</h1>
            <br>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item ">Home</li>
                    <li class="breadcrumb-item ">Model</li>
                    <li class="breadcrumb-item "><b>Create Model</b></li>
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
                            <h4 class="text-center">Create New Model</h4>
                        </div>
                        <hr>

                        <form action="{{ route('model.create') }}" method="post">
                            @csrf


                            {{-- Model  --}}
                            {{-- <div class="form-group mb-3">
                                <label for="modelName" class="form-label">Brand</label>
                                <select class="form-select @error('BrandId') is-invalid @enderror" name="BrandId"
                                    aria-label="Default select example">
                                    <option value="">Choose Brand</option>
                                    @foreach ($data as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>

                                @error('BrandId')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div> --}}

                            <div class="form-group mb-3">
                                <label for="BrandId" class="form-label">Brand</label>
                                <select class="form-select @error('BrandId') is-invalid @enderror BrandId" name="BrandId"
                                    aria-label="Default select example">
                                    <option value="">Choose Brand</option>
                                    @foreach ($data as $brand)
                                        <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('BrandId')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="modelName" class="form-label">Name</label>
                                <input type="text" name="modelName" id="modelName"
                                    class="form-control @error('modelName') is-invalid @enderror" placeholder="Model's Name"
                                    value="{{ old('modelName') }}">


                                @error('modelName')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            {{-- submit --}}
                            <div class="text-center">
                                <a href="{{ route('brand.list') }}"><input type="button" value="cancel"
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


