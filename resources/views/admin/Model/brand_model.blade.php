@extends('admin.layouts.master')
@section('title', 'Brand Page')


@section('content')
    <div class="container-fluid">
        {{-- Page Title --}}
        <div class="pagetitle">
            <h1>Model Create</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Model</li>
                    <li class="breadcrumb-item active">Create Model</li>
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
                             <div class="form-group mb-3">
                                <label for="modelName" class="form-label">Brand</label>
                                <select class="form-select @error('BrandId') is-invalid @enderror"  name="BrandId"
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
                                <label for="modelName" class="form-label">Model Name</label>
                                <input type="text" name="modelName" id="modelName"
                                    class="form-control @error('modelName') is-invalid @enderror" placeholder="Model's name">


                                    @error('modelName')
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
