@extends('admin.layouts.master')
@section('title', 'Middle Banner Edit Page')

@section('style')
    <style>
        .header-color {
            color: #5d9bff;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="container-fluid">
        {{-- Page Title --}}
        <div class="pagetitle">
            <h1 class="header-color">Middle Banner Edit</h1>
            <nav>
                <ol class="breadcrumb">
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
                    <a class="breadcrumb-item" href="{{ route('admin.MiddleBanner.list') }}">Middle Banner List</a>
                    <li class="breadcrumb-item active"><b>Edit Middle Banner</b></li>
                </ol>
            </nav>
        </div>
        {{-- Banner update Success Message --}}
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

        {{-- Product update Form --}}
        <div class="container-fluid">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="text-center">Edit middle Banner</h4>
                        </div>
                        <hr>
                        {{-- {{dd($topBanner)}} --}}
                        <form action="{{ route('admin.MiddleBanner.update', $middleBanner->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            {{-- {{dd($topBanner)}} --}}
                            @if ($middleBanner->image_1 == null)
                                <div class="m-3 text-center">
                                    <img src="{{ asset('storage/products/noimage.jpg') }}" class="rounded img-thumbnail"
                                        alt="" width="300px">
                                </div>
                            @else
                                <div class="text-center m-3">
                                    <img src="{{ asset('storage/middleBanner/' . $middleBanner->image_1) }}"
                                        style="border-radius: 3px" width="350" alt="Product Image1" height="auto">
                                </div>
                            @endif

                            <label for="image1" class="form-label">Product Image 1</label>
                            <div class="form-group mb-3">

                                <input type="file" name="image1"
                                    class="form-control @error('image1') is-invalid @enderror"
                                    value="{{ old('image1', $middleBanner->image_1) }}">
                                @error('image1')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <hr style="margin-top: 28px">

                            @if ($middleBanner->image_2 == null)
                                <div class="m-3 text-center">
                                    <img src="{{ asset('storage/products/noimage.jpg') }}" class="rounded img-thumbnail"
                                        alt="" width="300px">
                                </div>
                            @else
                                <div class="text-center m-3">
                                    <img src="{{ asset('storage/middleBanner/' . $middleBanner->image_2) }}"
                                        style="border-radius: 3px" width="300" alt="Product Image2">
                                </div>
                            @endif
                            <label for="image2" class="form-label">Product Image 2</label>
                            <div class="form-group mb-3">

                                <input type="file" name="image2"
                                    class="form-control @error('image2') is-invalid @enderror"
                                    value="{{ old('image2', $middleBanner->image_2) }}">
                                @error('image1')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <hr style="margin-top: 28px">

                            @if ($middleBanner->image_3 == null)
                                <div class="m-3 text-center">
                                    <img src="{{ asset('storage/products/noimage.jpg') }}" class="rounded img-thumbnail"
                                        alt="" width="300px">
                                </div>
                            @else
                                <div class="text-center m-3">
                                    <img src="{{ asset('storage/middleBanner/' . $middleBanner->image_3) }}"
                                        style="border-radius: 3px" width="300" alt="Product Image3">
                                </div>
                            @endif
                            <label for="image3" class="form-label">Product Image 2</label>
                            <div class="form-group mb-3">

                                <input type="file" name="image3"
                                    class="form-control @error('image3') is-invalid @enderror"
                                    value="{{ old('image3', $middleBanner->image_3) }}">
                                @error('image3')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- update --}}
                            <div class="text-center mt-4">
                                <a href="{{ route('product.index') }}"><input type="button" value="Cancel"
                                        class="btn btn-outline-danger btn-lg border-2 px-3 me-3"></a>
                                <input type="submit" value="Update" class="btn btn-lg btn-primary px-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
