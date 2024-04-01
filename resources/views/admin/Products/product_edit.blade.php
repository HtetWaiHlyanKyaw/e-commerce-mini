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
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Product</li>
                    <li class="breadcrumb-item">Product List</li>
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
            <div class="col-lg-6 offset-lg-3">
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


                            {{-- Model Call --}}
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

                            <label for="description" class="form-label">Description</label>
                            <div class="form-group mb-3">

                                <textarea name="description" cols="20" rows="5" class="form-control  @error('description') is-invalid @enderror"
                                    >{{old('description', $product->description)}}</textarea>


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
