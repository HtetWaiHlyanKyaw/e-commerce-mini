@extends('user.master')
@section('title', 'Product Details & Purchase Options')
@section('content')
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-lg-5" style="margin-bottom: 200px">
                <div class="product-img">
                    <img id="product_image" class="w-100 shadow" src="" style="height:500px;object-fit: cover;"
                        alt="Product Image">
                </div>
            </div>

            <div class="col-lg-7" style="margin-bottom: 200px">
                <h3 id="product_name"></h3>

                <div id="product_description_container" style="overflow-y: auto; max-height: 300px;">
                    <p id="product_description" style="text-align: justify;"></p>
                </div>


                <div class="form-group row">
                    {{-- <label for="product_price" class="col-sm-2 col-form-label">Price:</label> --}}
                    <div class="col-sm-8">
                        <h1 id="product_price" class="text-danger"></h1>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="product_variant" class="col-sm-3 col-form-label">Color and Storage:</label>
                    <div class="col-sm-4">
                        <select name="product_variant" id="product_variant" class="form-control"
                            onchange="updateProductDetails()">
                            @foreach ($productVariants as $variant)
                                <option value="{{ $variant['color'] }}_{{ $variant['storage_option'] }}">
                                    {{ $variant['color'] }} - {{ $variant['storage_option'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-sm-8 d-flex align-items-center">
                        <input type="number" id="quantity" name="quantity" class="form-control mr-2" min="1"
                            value="1" style="width: 100px; height: 40px;" autocomplete="off">
                        <button type="button" class="btn btn-primary mr-2">Buy Now</button>
                        <button type="button" class="btn btn-primary">Add to Cart</button>
                    </div>
                </div>
            </div>
            <input type="hidden" name="product_id" id="product_id">
        </div>
    </div>
@endsection

@section('script')
    <script>

        var productVariants = @json($productVariants);

        function updateProductDetails() {
            var selectedVariant = document.getElementById("product_variant").value;
            var selectedProduct = getProductByVariant(selectedVariant);

            if (selectedProduct) {
                document.getElementById("product_image").src = selectedProduct.image;
                document.getElementById("product_name").innerText = selectedProduct.name;
                document.getElementById("product_description").innerText = selectedProduct.description;
                document.getElementById("product_price").innerText = "$ " + selectedProduct.price;
                document.getElementById("product_id").value = selectedProduct.id;

                console.log("Selected Product ID:", selectedProduct.id);
            }
        }

        function getProductByVariant(variant) {
            return productVariants.find(function(product) {
                return product.color + "_" + product.storage_option === variant;
            });
        }

        // Call updateProductDetails initially to display details of the default variant
        updateProductDetails();
    </script>
@endsection
