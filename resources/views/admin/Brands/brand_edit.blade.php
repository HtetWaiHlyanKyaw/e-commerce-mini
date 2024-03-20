@extends('admin.layouts.master')
@section('title', 'Brand Edit Page')


@section('content')
    <main id="main" class="main mx-5">
        {{-- Page Title --}}
        <div class="pagetitle">
            <h1>Category Create okkkk </h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Brand</li>
                    <li class="breadcrumb-item active">Edit Category</li>
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
                            <h4 class="text-center">Edit New Brand</h4>
                        </div>
                        <hr>

                        <form action="{{ route('brand.update', $data->id) }}" method="post">
                            @csrf

                            <div class="form-group mb-3">
                                <input type="text" name="brandName"
                                    class="form-control @error('brandName') is-invalid @enderror" value="{{old('name', $data->name)}}">


                                @error('brandName')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- submit --}}
                            <div class="text-center">
                                <input type="submit" value="save" class="btn btn-primary px-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </main>
@endsection