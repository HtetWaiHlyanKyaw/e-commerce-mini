@extends('admin.layouts.master')
@section('title', 'Product Edit Page')


@section('content')
    <div class="container-fluid">
        {{-- Page Title --}}
        <div class="pagetitle">
            <h1>Product Update</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Product</li>
                    <li class="breadcrumb-item active">Edit Product</li>
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
                            <h4 class="text-center">Edit Product</h4>
                        </div>
                        <hr>

                        <form action="{{ route('product.update', $data->id) }}" method="post">
                            @csrf
                            <label for="productName" class="form-label">Product Name</label>
                            <div class="form-group mb-3">
                                <input type="text" name="productName"
                                    class="form-control @error('productName') is-invalid @enderror" value="{{old('name', $data->name)}}">


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
                                    placeholder="product image">


                                @error('image')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label for="brand_id" class="form-label">Brand ID</label>
                            <div class="form-group mb-3">

                                <input type="text" name="brand_id"
                                    class="form-control @error('brand_id') is-invalid @enderror"
                                    placeholder="brand ID">


                                @error('brand_id')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label for="model_id" class="form-label">Product Model ID</label>
                            <div class="form-group mb-3">

                                <input type="text" name="model_id"
                                    class="form-control @error('model_id') is-invalid @enderror"
                                    placeholder="model ID">


                                @error('model_id')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label for="storage_option" class="form-label">Storage Option</label>
                            <div class="form-group mb-3">

                                <input type="text" name="storage_option"
                                    class="form-control @error('storage_option') is-invalid @enderror"
                                    placeholder="Storage Option">


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
                                    placeholder="color">


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
                                    placeholder="price">


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
                                    placeholder="quatity">


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
                                    placeholder="product name">


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
                                    placeholder="description">


                                @error('description')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- submit --}}
                            <div class="text-center">
                                <input type="reset" value="cancel" class="btn btn-secondary px-3 me-3">
                                <input type="submit" value="save" class="btn btn-primary px-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
