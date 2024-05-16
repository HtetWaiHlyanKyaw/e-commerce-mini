@extends('user.master')
@section('title', 'Product Details & Purchase Options')
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('cart')
    <a href="{{ route('cartList') }}" class="btn position-relative">
        @if ($cart && count($cart) > 0)
            <img src="{{ asset('user/img/core-img/bag.svg') }}" alt="">
            <span style="margin-top:32px; margin-left:10px"
                class="position-absolute start-80 me-5 translate-middle badge rounded-pill bg-light">
                {{ count($cart) }}
                <span class="visually-hidden">unread messages</span>
            </span>
        @else
            <img src="{{ asset('user/img/core-img/bag.svg') }}" alt="">
            <span style="margin-top:32px; margin-left:10px"
                class="position-absolute start-80 me-5 translate-middle badge rounded-pill bg-light">
                0
                <span class="visually-hidden">unread messages</span>
            </span>
        @endif
    </a>
@endsection
@section('style')
    <style>
        .rating {
            display: inline-block;
            direction: rtl;
            /* Right-to-left direction */
            unicode-bidi: bidi-override;
            /* Override the default direction */
        }

        .rating input {
            display: none;
            /* Hide the radio buttons */
        }

        .rating label {
            font-size: 24px;
            /* Adjust the size of the stars */
            color: #aaa;
            /* Default color of the stars */
            cursor: pointer;
            /* Change cursor to pointer on hover */
        }

        .rating input:checked~label {
            color: #ffcc00;
            /* Change color of selected stars */
        }

        .rating label:hover,
        .rating label:hover~label {
            color: #ffcc00;
            /* Change color of hovered stars and those before it */
        }

        #qty::-webkit-inner-spin-button,
        #qty::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }
    </style>

@endsection
@section('content')
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-lg-5">
                <div class="product-img" style="border-radius: 3px; width: 100%; height: 500px; object-fit: cover; background-color: #f8f8f8;">
                    <img id="product_image" class="w-100 shadow" src="" alt="Product Image" style="border-radius: 3px; width: 100%; height: 100%; object-fit: cover;">
                </div>
            </div>

            <div class="col-lg-7">
                <h3 id="product_name"></h3>
                <div class="row align-items-center">
                    <div class="col-auto average-stars">
                        @for ($i = 0; $i < $averageRating; $i++)
                            <label style="color: #ffcc00; font-size: 24px;">&#9733;</label>
                        @endfor
                    </div>
                    <div class="col">
                        <h6>
                            @if ($totalRating === 0 || $totalRating === null)
                                No Ratings
                            @elseif ($totalRating === 1)
                                {{ $totalRating }} Rating
                            @else
                                {{ $totalRating }} Ratings
                            @endif
                        </h6>
                    </div>
                </div>

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


                <div class="container">
                    <div class="form-group row">
                        <div class="col-sm-12 col-md-8 d-flex align-items-center">
                            @if (Auth::check() && Auth::user()->usertype == 'customer')
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <button id="minusBtn" class="btn btn-sm btn-primary"><i
                                                class="fa fa-minus"></i></button>
                                    </div>
                                    <input type="number" value="1" style="width:50px" id="qty"
                                        class="form-control text-center mx-1" min="1" max="1" readonly>
                                    <div class="input-group-append">
                                        <button id="plusBtn" class="btn btn-sm btn-primary"><i
                                                class="fa fa-plus"></i></button>
                                    </div>
                                </div>
                                {{-- <form action="{{ route('user.checkout') }}" method="POST">
                                    @csrf --}}
                                <input type="hidden" name="product_id" id="product_id_2">
                                <input type="hidden" name="qtyHidden" id="qtyHidden" value="1">
                                <button id="buyNowButton" class="btn btn-primary ml-md-2 mt-2 mt-md-0">Buy Now</button>
                                {{-- </form> --}}
                                <button type="button" id="cartBtn" class="btn btn-primary ml-md-2 mt-2 mt-md-0"><i
                                        class="fa-solid fa-cart-shopping"></i> Add to Cart</button>
                                <input type="hidden" id="userId" value="{{ Auth::user()->id }}">
                            @elseif (!Auth::check())
                                <a href="{{ route('user.login') }}"><button type="button" id="cartBtn"
                                        class="btn btn-primary ml-md-2 mt-2 mt-md-0"><i
                                            class="fa-solid fa-cart-shopping"></i> Add to Cart</button></a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 mt-5">
                <div class="card-header" style="background-color: rgb(105, 105, 105); color: white">
                    Product Specifications
                </div>
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th class="col-2">Display</th>
                            <td class="col-10">
                                <p id="display_text"></p>
                            </td>
                        </tr>
                        <tr>
                            <th>Resolution</th>
                            <td>
                                <p id="resolution_text"></p>
                            </td>
                        </tr>
                        <tr>
                            <th>Chipset</th>
                            <td>
                                <p id="chipset_text"></p>
                            </td>
                        </tr>
                        <tr>
                            <th>OS</th>
                            <td>
                                <p id="OS_text"></p>
                            </td>
                        </tr>
                        <tr>
                            <th>Main Camera</th>
                            <td>
                                <p id="main_camera_text"></p>
                            </td>
                        </tr>
                        <tr>
                            <th>Selfie Camera</th>
                            <td>
                                <p id="selfie_camera_text"></p>
                            </td>
                        </tr>
                        <tr>
                            <th>Battery</th>
                            <td>
                                <p id="battery_text"></p>
                            </td>
                        </tr>
                        <tr>
                            <th>Charging</th>
                            <td>
                                <p id="charging_text"></p>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            @if ($totalComments === 0)
                <h5 style="margin-top: 50px;">No Reviews</h5><br>
            @elseif($totalComments === 1)
                <h5 style="margin-top: 50px;">{{ $totalComments }} Review</h5><br>
            @else
                <h5 style="margin-top: 50px;">{{ $totalComments }} Reviews</h5><br>
            @endif
            <div class="bg-light" id="comments" style=" margin-bottom: 50px;">
            </div>
            @if (Auth::check() && Auth::user()->usertype === 'customer' && $hasBoughtProductModel === true)
                <div class="form-group row align-items-center">
                    <div class="col-md-9">
                        <form id="comment-form" action="{{ route('user.comment.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="product_id" id="product_id">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="rating input-group-text">
                                        <input type="radio" id="rating-5" name="rating" value="5">
                                        <label for="rating-5">&#9733;</label>
                                        <input type="radio" id="rating-4" name="rating" value="4">
                                        <label for="rating-4">&#9733;</label>
                                        <input type="radio" id="rating-3" name="rating" value="3">
                                        <label for="rating-3">&#9733;</label>
                                        <input type="radio" id="rating-2" name="rating" value="2">
                                        <label for="rating-2">&#9733;</label>
                                        <input type="radio" id="rating-1" name="rating" value="1">
                                        <label for="rating-1">&#9733;</label>
                                    </div>
                                </div>
                                <input type="text" class="form-control" name="comments" id="comments"
                                    placeholder="Give feedback" required>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary btn-block" id="give-feedback"><i
                                            class="fa fa-send"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-md-3">
                        <button id="show-more-comments" class="btn btn-outline-primary btn-block"
                            style="height: 60px;">Show more reviews</button>
                    </div>
                </div>
            @else
                <input type="hidden" name="product_id" id="product_id">
                <div class="form-group row">
                    <div class="col-md-12">
                        <button id="show-more-comments" class="btn btn-outline-primary btn-block">Show more
                            reviews</button>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
    <script>
        document.getElementById("buyNowButton").addEventListener("click", function() {
            var productId = document.getElementById("product_id_2").value;
            var qtyHidden = document.getElementById("qtyHidden").value;
            var url = "{{ route('user.checkout') }}?product_id=" + productId + "&qtyHidden=" + qtyHidden;
            window.location.href = url;
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            var limit = 2; // Initialize the limit

            // Function to fetch comments and append them
            function fetchAndAppendComments() {
                var productId = $('#product_id').val(); // Get the product_id from the hidden field
                $.ajax({
                    url: '/comments/' + productId + '/' + limit,
                    type: 'GET',
                    success: function(data) {
                        appendComments(data);
                        limit += 2; // Increase the limit by 2 for the next request
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching comments:', status, error);
                        // Optionally, provide feedback to the user about the error
                    }
                });
            }

            // Append comments function
            function appendComments(comments) {
                var commentsContainer = $('#comments');
                commentsContainer.empty(); // Clear existing comments

                $.each(comments, function(index, comment) {
                    commentsContainer.append('<br><h6>' + comment.user.name + '</h6>');
                    commentsContainer.append('<div class="rating">' + getStarRating(comment.rating) +
                        '</div>');
                    commentsContainer.append('<div class="comment">' + comment.comments + '</div>');
                    commentsContainer.append('<div class="comment-date" style="color: grey;">' + comment
                        .formatted_created_at + '</div><br>');
                });
            }

            // Get star rating function
            function getStarRating(rating) {
                var stars = '';
                for (var i = 0; i < rating; i++) {
                    stars += '<span class="star" style="color: #ffd700;">&#9733;</span>';
                }
                return stars;
            }

            // Initially fetch and append comments when the page is loaded
            fetchAndAppendComments();

            // Event listener for 'Show more comments' button
            $('#show-more-comments').on('click', function() {
                fetchAndAppendComments();
            });
        });
    </script>
    <script>
        var productVariants = @json($productVariants);

        function updateProductDetails() {
            var selectedVariant = document.getElementById("product_variant").value;
            var selectedProduct = getProductByVariant(selectedVariant);

            if (selectedProduct) {
                document.getElementById("product_image").src = selectedProduct.image;
                document.getElementById("product_name").innerText = selectedProduct.name;
                document.getElementById("product_description").innerText = selectedProduct.description;
                document.getElementById("display_text").innerText = selectedProduct.display;
                document.getElementById("resolution_text").innerText = selectedProduct.resolution;

                document.getElementById("OS_text").innerText = selectedProduct.os;
                document.getElementById("chipset_text").innerText = selectedProduct.chipset;
                document.getElementById("main_camera_text").innerText = selectedProduct.main_camera;
                document.getElementById("selfie_camera_text").innerText = selectedProduct.selfie_camera;
                document.getElementById("battery_text").innerText = selectedProduct.battery;
                document.getElementById("charging_text").innerText = selectedProduct.charging;
                document.getElementById("product_price").innerText = "$ " + selectedProduct.price;
                document.getElementById("product_id").value = selectedProduct.id;
                document.getElementById("product_id_2").value = selectedProduct.id;

                document.getElementById("qty").max = selectedProduct.quantity;
                console.log("Quantity ", selectedProduct.quantity);
                console.log("Selected Product ID:", selectedProduct.id);
                console.log("Selected Product ID 2:", selectedProduct.id);
                console.log("Selected Product Name:", selectedProduct.name);
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
            const maxQty = parseInt($('#qty').attr('max'));
            const minQty = parseInt($('#qty').attr('min'));

            // Increment quantity when plus button is clicked
            $('#plusBtn').on('click', function() {
                if (qty < maxQty) { // Check if quantity is less than the maximum
                    qty = qty + 1;
                    $('#qty').val(qty);

            // Decrement quantity when minus button is clicked
            $('#minusBtn').on('click', function() {
                if (qty > minQty) { // Check if quantity is greater than the minimum
                    qty = qty - 1;
                    $('#qty').val(qty);
                    $('#qtyHidden').val(qty);

                }
            });

      // Add to cart
        $('#cartBtn').click(function() {
            let userId = $('#userId').val();
            let productId = $('#product_id').val();

            $.ajax({
                type: 'post',
                url: '/cart/add',
                data: {
                    'userId': userId,
                    'productId': productId,
                    'qty': 1 // Explicitly set qty to 1
                },
                dataType: 'json',
                success: function(response) {
                    // Reset the input fields to 1
                    $('#qty').val(1);
                    $('#qtyHidden').val(1);

                    // Optionally, you can display a success message here

                    // Redirecting to the user.shop named route
                    window.location.href = '{{ route('user.shop') }}';
                },
                error: function(xhr, status, error) {
                    // Optionally, handle the error here
                    console.error('Error adding to cart:', status, error);
                }
            });
        });
    });
    </script>
@endsection
