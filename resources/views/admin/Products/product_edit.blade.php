@extends('admin.layouts.master')
@section('title', 'Product Edit Page')

@section('style')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="container-fluid">
        {{-- Page Title --}}
        <div class="pagetitle">
            <h1>Product Edit</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Product</li>
                    <li class="breadcrumb-item">Product List</li>
                    <li class="breadcrumb-item active">Edit Product</li>
                </ol>
            </nav>
        </div>
        {{-- Product update Success Message --}}
        <div>
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif
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

                        <form action="{{ route('product.update', $product->id) }}" method="post">
                            @csrf

                            <label for="productName" class="form-label">Product Name</label>
                            <div class="form-group mb-3">

                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror"
                                    value="{{old('name' , $product->name)}}">


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
                                    value="{{old('image' , $product->image)}}">


                                @error('image')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Brand Call --}}
                            <div class="form-group mb-3">
                                <label for="brand_id" class="form-label">Brand</label>
                                <select class="form-select @error('brand_id') is-invalid @enderror brandname" name="brand_id"
                                    aria-label="Default select example">
                                    <option value="">Choose Brand</option>
                                    @foreach ($brands as $brand)
                                        <option value="{{ $brand->id }}"
                                            @if ($brand->brand_id == $brand->id) selected @endif>


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
                                <label for="product_model_id" class="form-label">Model</label>
                                <select class="form-select @error('product_model_id') is-invalid @enderror modelname" name="product_model_id"
                                    aria-label="Default select example">
                                    <option value="">Choose Model</option>
                                    @foreach ($models as $models)
                                        <option value="{{ $models->id }}"
                                            @if ($brand->brand_id == $models->id) selected @endif>


                                            {{ $models->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('product_model_id')
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
                                    value="{{old('color' , $product->color)}}">


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
                                    value="{{old('price' , $product->price)}}">


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
                                    value="{{old('quantity' , $product->quantity)}}">


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

                                <input type="text" name="description"
                                    class="form-control @error('description') is-invalid @enderror"
                                    value="{{ old('description', $product->description) }}">


                                @error('description')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- update --}}
                            <div class="text-center">
                                <input type="reset" value="cancel" class="btn btn-secondary px-3 me-3">
                                <input type="submit" value="update" class="btn btn-primary px-3">
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
