@extends('admin.layouts.master')
@section('title', 'Products')

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
            <h1 class="header-color">Product Create</h1>
            <br>
            <nav>
                <ol class="breadcrumb">
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
                    <a class="breadcrumb-item" href="{{ route('product.index') }}">Product List</a>
                    <li class="breadcrumb-item active"><b>Create Product</b></li>
                </ol>
            </nav>
        </div>
        {{-- Product Create Success Message --}}
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


        {{-- Product Create Card --}}
        <div class="container-fluid">
            {{-- <div class="col-lg-6"></div> --}}
            {{-- offset-lg-3 --}}
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="text-center">Create New Product</h4>
                        </div>
                        <hr>

                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="row">
                            <div class="col">
                            <label for="productName" class="form-label">Name <strong style="color: red">*</strong></label>
                            <div class="form-group mb-3">

                                <input type="text" name="productName"
                                    class="form-control @error('productName') is-invalid @enderror"
                                    placeholder="Product Name" value="{{ old('productName') }}">


                                @error('productName')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <label for="display" class="form-label">Display</label>
                            <div class="form-group mb-3">

                                <input type="text" name="display"
                                    class="form-control @error('display') is-invalid @enderror"
                                    placeholder="Display" value="{{ old('display') }}">


                                @error('display')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        </div>
                            <label for="image" class="form-label">Image <strong style="color: red">*</strong></label>
                            <div class="form-group mb-3">

                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror">



                                @error('image')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Brand  --}}
                            <div class="row">
                                <div class="col">
                            <div class="form-group mb-3">
                                <label for="BrandName" class="form-label">Brand <strong style="color: red">*</strong></label>
                                <select class="form-select @error('BrandName') is-invalid @enderror brandname"
                                    name="BrandName" aria-label="Default select example">
                                    <option value="">Choose Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            @if (old('BrandName') == $brand->id) selected @endif>{{ $brand->name }}</option>
                                    @endforeach
                                </select>
                                @error('BrandName')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <label for="resolution" class="form-label">Resolution</label>
                            <div class="form-group mb-3">

                                <input type="text" name="resolution"
                                    class="form-control @error('display') is-invalid @enderror"
                                    placeholder="Resolution" value="{{ old('resolution') }}">


                                @error('resolution')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        </div>
                            {{-- Product_model_id  --}}
                            <div class="row">
                                <div class="col">
                            <div class="form-group mb-3">
                                <label for="ModelName" class="form-label">Model <strong style="color: red">*</strong></label>
                                <select class="form-select @error('ModelName') is-invalid @enderror modelname"
                                    name="ModelName" aria-label="Default select example">
                                    <option value="">Choose Model</option>
                                    @foreach ($models as $model)
                                        <option value="{{ $model->id }}"
                                            @if (old('ModelName') == $model->id) selected @endif>{{ $model->name }}</option>
                                    @endforeach

                                </select>
                                @error('ModelName')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <label for="os" class="form-label">OS</label>
                            <div class="form-group mb-3">

                                <input type="text" name="os"
                                    class="form-control @error('os') is-invalid @enderror"
                                    placeholder="OS" value="{{ old('os') }}">


                                @error('os')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <label for="storage_option" class="form-label">Storage Option <strong style="color: red">*</strong></label>
                            <div class="form-group mb-3">

                                <input type="text" name="storage_option"
                                    class="form-control @error('storage_option') is-invalid @enderror"
                                    placeholder="Storage Option" value="{{ old('storage_option') }}">


                                @error('storage_option')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                            <div class="col">
                                <label for="chipset" class="form-label">Chipset</label>
                                <div class="form-group mb-3">

                                    <input type="text" name="chipset"
                                        class="form-control @error('chipset') is-invalid @enderror"
                                        placeholder="Chipset" value="{{ old('chipset') }}">


                                    @error('chipset')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <label for="color" class="form-label">Color <strong style="color: red">*</strong></label>
                            <div class="form-group mb-3">

                                <input type="text" name="color"
                                    class="form-control @error('color') is-invalid @enderror" placeholder="Color">


                                @error('color')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                            <div class="col">
                                <label for="main_camera" class="form-label">Main Camera</label>
                                <div class="form-group mb-3">

                                    <input type="text" name="main_camera"
                                        class="form-control @error('main_camera') is-invalid @enderror"
                                        placeholder="Main Camera" value="{{ old('main_camera') }}">


                                    @error('main_camera')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col">
                            <label for="price" class="form-label">Price <strong style="color: red">*</strong></label>
                            <div class="form-group mb-3">

                                <input type="number" name="price"
                                    class="form-control @error('price') is-invalid @enderror" placeholder="Price"
                                    min="1" value="{{ old('price') }}">


                                @error('price')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                            <div class="col">
                                <label for="selfie_camera" class="form-label">Selfie Camera</label>
                                <div class="form-group mb-3">

                                    <input type="text" name="selfie_camera"
                                        class="form-control @error('selfie_camera') is-invalid @enderror"
                                        placeholder="Selfie Camera" value="{{ old('selfie_camera') }}">


                                    @error('selfie_camera')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col">
                            <label for="quantity" class="form-label">Quantity <strong style="color: red">*</strong></label>
                            <div class="form-group mb-3">

                                <input type="number" name="quantity"
                                    class="form-control @error('quantity') is-invalid @enderror" placeholder="Quatity"
                                    min="1" value="{{ old('quantity') }}">


                                @error('quantity')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <label for="battery" class="form-label">Battery</label>
                                <div class="form-group mb-3">

                                    <input type="text" name="battery"
                                        class="form-control @error('battery') is-invalid @enderror"
                                        placeholder="Battery" value="{{ old('battery') }}">


                                    @error('battery')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col">
                            <label for="low_stock" class="form-label">Low Stock <strong style="color: red">*</strong></label>
                            <div class="form-group mb-3">
                                <input type="number" name="low_stock"
                                    class="form-control @error('low_stock') is-invalid @enderror" placeholder="Low stock"
                                    value="{{ old('low_stock') }}">


                                @error('low_stock')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col">
                            <label for="charging" class="form-label">Charging</label>
                                <div class="form-group mb-3">

                                    <input type="text" name="charging"
                                        class="form-control @error('charging') is-invalid @enderror"
                                        placeholder="Charging" value="{{ old('charging') }}">


                                    @error('charging')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                        </div>
                        </div>
                            <label for="description" class="form-label">Description <strong style="color: red">*</strong></label>
                            <div class="form-group mb-3">
                                <textarea name="description" cols="20" rows="5" class="form-control @error('description') is-invalid @enderror" placeholder="Description">{{ old('description') }}</textarea>

                                @error('description')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            {{-- submit --}}
                            {{-- <div class="text-center">
                                <input type="reset" value="cancel" class="btn btn-secondary px-3 me-3">
                                <input type="submit" value="create" class="btn btn-primary px-3">
                            </div> --}}
                            <div class="text-center">
                                <a href="{{ route('product.index') }}"><input type="button" value="Cancel"
                                    class="btn btn-outline-danger btn-lg border-2 px-3 me-3"></a>
                                <input type="submit" value="Create" class="btn btn-lg btn-primary px-3">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        // In your Javascript (external .js resource or <script> tag)
        $(document).ready(function() {
            $('.brandname').select2();
        });

        $(document).ready(function() {
            $('.modelname').select2();
        });
    </script>

@endsection
