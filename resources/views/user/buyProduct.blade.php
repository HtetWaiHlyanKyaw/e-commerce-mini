@extends('user.master')
@section('title', 'Product Details & Payment Options')
@section('content')


{{-- {{dd($datas->toArray())}} --}}

<div class="container" style="margin-top:200px">
    <div class="row">
        {{-- Image --}}
        <div class="col-lg-4 " style="margin-bottom: 200px">
            {{-- <img class="w-100 shadow " src="{{ asset('storage/products/'. $products->first()->image)}}" alt=""> --}}
            <div class="product-img">
                <!-- Initially, show the image of the first product -->
                <img id="product_image" class="w-100 shadow" src="{{ asset('storage/products/' . $products->first()->image) }}" alt="Product Image">
            </div>
        </div>

        <select name="color" id="color" onchange="updateProductImage()">
            @foreach ($colors as $color)
                <option value="{{ $color }}">{{ $color }}</option>
            @endforeach
        </select>

        <!-- Display storage options dropdown -->
        <select name="storage_option" id="storage_option" onchange="updateProductImage()">
            @foreach ($storageOptions as $option)
                <option value="{{ $option }}">{{ $option }}</option>
            @endforeach
        </select>
        <input type="hidden" name="product_id" id="product_id">

        <!-- Product Image -->


        <!-- Product Image -->

    </div>
</div>

@endsection
@section('script')

<script>
    // Create a JavaScript object to store the image URLs and product IDs
    var productImages = {};

    // Populate the productImages object with image URLs and product IDs
    @foreach ($products as $product)
        productImages["{{ $product->color }}_{{ $product->storage_option }}"] = {
            imageUrl: "{{ asset('storage/products/' . $product->image) }}",
            productId: "{{ $product->id }}"
        };
    @endforeach

    // Function to update the product image based on selected color and storage option
    function updateProductImage() {
        // Get the selected color and storage option
        var selectedColor = document.getElementById("color").value;
        var selectedStorageOption = document.getElementById("storage_option").value;

        // Construct the key for the productImages object
        var key = selectedColor + "_" + selectedStorageOption;

        // Get the image URL and product ID corresponding to the selected color and storage option
        var imageData = productImages[key];

        // Set the image source to the retrieved URL
        document.getElementById("product_image").src = imageData.imageUrl;

        // Get the product ID and output it to the browser console
        var productId = imageData.productId;
        console.log("Product ID:", productId);
    }
</script>

@endsection
