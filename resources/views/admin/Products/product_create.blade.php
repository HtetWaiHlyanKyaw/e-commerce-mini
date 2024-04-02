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
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="text-center">Create New Product</h4>
                        </div>
                        <hr>

                        <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <label for="productName" class="form-label">Name</label>
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

                            <label for="image" class="form-label">Image</label>
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
                            <div class="form-group mb-3">
                                <label for="BrandName" class="form-label">Brand</label>
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
                            {{-- Product_model_id  --}}
                            <div class="form-group mb-3">
                                <label for="ModelName" class="form-label">Model</label>
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

                            <label for="storage_option" class="form-label">Storage Option</label>
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
                            <label for="color" class="form-label">Color</label>
                            <div class="form-group mb-3">

                                <input type="text" name="color"
                                    class="form-control @error('color') is-invalid @enderror" placeholder="Color">


                                @error('color')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label for="price" class="form-label">Price</label>
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
                            <label for="quantity" class="form-label">Quantity</label>
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
                            <label for="low_stock" class="form-label">Low Stock</label>
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
                            <label for="description" class="form-label">Description</label>
                            <div class="form-group mb-3">
                                <textarea name="description" cols="20" rows="5"
                                    class="form-control  @error('description') is-invalid @enderror" placeholder="Description"
                                    value="{{ old('description') }}"></textarea>


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
