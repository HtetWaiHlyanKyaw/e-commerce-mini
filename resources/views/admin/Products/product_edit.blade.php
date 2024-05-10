@extends('admin.layouts.master')
@section('title', 'Product Edit Page')

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
            <h1 class="header-color">Product Edit</h1>
            <nav>
                <ol class="breadcrumb">
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
                    <a class="breadcrumb-item" href="{{ route('product.index') }}">Product List</a>
                    <li class="breadcrumb-item active"><b>Edit Product</b></li>
                </ol>
            </nav>
        </div>
        {{-- Product update Success Message --}}
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
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="text-center">Edit Product</h4>
                        </div>
                        <hr>

                        @if ($product->image == null)
                            <div class="m-3 text-center">
                                <img src="{{ asset('storage/products/noimage.jpg') }}" class="rounded img-thumbnail"
                                    alt="" width="350px">
                            </div>
                        @else
                            <div class="text-center m-3">
                                <img src="{{ asset('storage/products/' . $product->image) }}" style="border-radius: 3px"
                                    width="350" alt="Product Image">
                            </div>
                        @endif



                        <form action="{{ route('product.update', $product->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col">
                                    <label for="productName" class="form-label">Product Name</label>
                                    <div class="form-group mb-3">

                                        <input type="text" name="productName"
                                            class="form-control @error('productName') is-invalid @enderror"
                                            value="{{ old('productName', $product->name) }}">


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
                                            value="{{ old('display', $product->display) }}">


                                        @error('productName')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <label for="image" class="form-label">Product Image</label>
                            <div class="form-group mb-3">

                                <input type="file" name="image"
                                    class="form-control @error('image') is-invalid @enderror"
                                    value="{{ old('image', $product->image) }}">


                                @error('image')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            {{-- Brand Call --}}
                            <div class="row">
                                <div class="col">
                                <div class="form-group mb-3">
                                    <label for="BrandName" class="form-label">Brand</label>
                                    <select class="form-select @error('BrandName') is-invalid @enderror brandname"
                                        name="BrandName" aria-label="Default select example">
                                        <option value="">Choose Brand</option>
                                        @foreach ($brands as $brand)
                                            <option value="{{ $brand->id }}"
                                                @if ($product->brand_id == $brand->id) selected @endif>
                                                {{ $brand->name }}
                                            </option>
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
                                            class="form-control @error('resolution') is-invalid @enderror"
                                            value="{{ old('resolution', $product->resolution) }}">


                                        @error('resolution')
                                            <div class="text-danger">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                            </div>
                            </div>

                            {{-- Model Call --}}
                            <div class="row">
                            <div class="col">
                            <div class="form-group mb-3">
                                <label for="ModelName" class="form-label">Model</label>
                                <select class="form-select @error('ModelName') is-invalid @enderror modelname"
                                    name="ModelName" aria-label="Default select example">
                                    <option value="">Choose Model</option>
                                    @foreach ($models as $models)
                                        <option value="{{ $models->id }}"
                                            @if ($product->product_model_id == $models->id) selected @endif>


                                            {{ $models->name }}
                                        </option>
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
                                        value="{{ old('os', $product->os) }}">


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
                            <label for="storage_option" class="form-label">Storage Option</label>
                            <div class="form-group mb-3">

                                <input type="text" name="storage_option"
                                    class="form-control @error('storage_option') is-invalid @enderror"
                                    value="{{ old('storage_option', $product->storage_option) }}">


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
                                        value="{{ old('chipset', $product->chipset) }}">


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
                            <label for="color" class="form-label">Color</label>
                            <div class="form-group mb-3">

                                <input type="text" name="color"
                                    class="form-control @error('color') is-invalid @enderror"
                                    value="{{ old('color', $product->color) }}">


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
                                        value="{{ old('main_camera', $product->main_camera) }}">


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
                            <label for="price" class="form-label">Price</label>
                            <div class="form-group mb-3">
                                <input type="text" name="price"
                                    class="form-control @error('price') is-invalid @enderror"
                                    value="{{ old('price', $product->price) }}">


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
                                        value="{{ old('selfie_camera', $product->selfie_camera) }}">


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
                            <label for="quantity" class="form-label">Quantity</label>
                            <div class="form-group mb-3">

                                <input type="text" name="quantity"
                                    class="form-control @error('quantity') is-invalid @enderror"
                                    value="{{ old('quantity', $product->quantity) }}">


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
                                        value="{{ old('battery', $product->battery) }}">


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
                            <label for="low_stock" class="form-label">Low Stock</label>
                            <div class="form-group mb-3">

                                <input type="text" name="low_stock"
                                    class="form-control @error('low_stock') is-invalid @enderror"
                                    value="{{ old('low_stock', $product->low_stock) }}">


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
                                        value="{{ old('charging', $product->charging) }}">


                                    @error('charging')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                        </div>
                        </div>
                            <label for="description" class="form-label">Description</label>
                            <div class="form-group mb-3">

                                <textarea name="description" cols="20" rows="5"
                                    class="form-control  @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>


                                @error('description')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- update --}}
                            <div class="text-center">
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
