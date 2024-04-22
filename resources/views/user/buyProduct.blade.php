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
                    <div class="col-sm-8 d-flex align-items-center mt-3">
                        @if (Auth::check() && Auth::user()->usertype == 'customer')
                            <button id="minusBtn" class="btn btn-sm btn-success"><i class="fa-solid fa-minus"></i></button>

                            <input type="text" value="1" style="width:50px" id="qty"
                                class="form-control text-center mx-1">

                            <button id="plusBtn" class="btn btn-sm btn-success me-2"><i
                                    class="fa-solid fa-plus"></i></button>



                            {{-- Show the "Add to Cart" section for customers --}}
                            <button type="button" class="btn btn-primary me-2">Buy Now</button>
                            <button type="button" id="cartBtn" class="btn btn-primary"> <i class="fa-solid fa-cart-shopping"></i> Add to
                                Cart</button>
                                <input type="hidden" id="userId" value="{{Auth::user()->id}}">
                                <input type="hidden" name="product_id" id="product_id">

                        @elseif(!Auth::check())
                            {{-- Show a message or redirect to login for non-authenticated users --}}
                            <div class="alert alert-warning mt-3" role="alert">
                                If you want to buy this product , you need to <a href="{{ route('user.login') }}"
                                    class="alert-link">login</a> at frist.
                            </div>
                        @endif
                    </div>
                </div>

            </div>

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
            // console.log("Selected Product ID:", selectedProduct.id);
        }
    }

    function getProductByVariant(variant) {
        return productVariants.find(function(product) {
            return product.color + "_" + product.storage_option === variant;
        });
    }

    // Call updateProductDetails initially to display details of the default variant
    updateProductDetails();

    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        // Get the initial quantity value
        let qty = parseInt($('#qty').val());

        // Increment quantity when plus button is clicked
        $('#plusBtn').on('click', function() {
            qty = qty + 1;
            $('#qty').val(qty);
        });

        // Decrement quantity when minus button is clicked
        $('#minusBtn').on('click', function() {
            if (qty > 1) { // Ensure quantity doesn't go below 1
                qty = qty - 1;
                $('#qty').val(qty);
            }
        });

        //  add to cart
        $('#cartBtn').click(function() {
            let userId = $('#userId').val();
            let productId = $('#product_id').val();

            $.ajax({
                type: 'post',
                url: '/cart/add',
                data: {
                    'userId': userId,
                    'productId': productId,
                    'qty': qty
                },
                dataType: 'json', // corrected 'datatype' to 'dataType'
                success: function(response) {
                    window.location.href = 'http://localhost:8000/';
                }
            });
        });
    });
</script>

@endsection
