@extends('user.master')
@section('title', 'Product Details & Purchase Options')
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
    </style>

@endsection
@section('content')
    <div class="container" style="margin-top: 50px">
        <div class="row">
            <div class="col-lg-5">
                <div class="product-img">
                    <img id="product_image" class="w-100 shadow" src="" style="height:500px;object-fit: cover;"
                        alt="Product Image">
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

                <div class="form-group row">
                    <div class="col-sm-8 d-flex align-items-center">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <button id="minusBtn" class="btn btn-sm btn-primary"><i class="fa fa-minus"></i></button>
                            </div>
                            <input type="text" value="1" style="width:50px" id="qty"
                                class="form-control text-center mx-1">
                            <div class="input-group-append">
                                <button id="plusBtn" class="btn btn-sm btn-primary me-2"><i
                                        class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary mr-2">Buy Now</button>
                        <button type="button" class="btn btn-primary">Add to Cart</button>
                    </div>
                </div>
            </div>


            {{-- <div class="bg-light " id="reviews" style="margin-top: 50px;">
                <h5>Reviews</h5>
                <br>
                @foreach ($reviews as $review)
                <h6>{{$review->user->name}}</h6>
                <p>{{$review->comments}}</p>
                <br>
                @endforeach
            </div> --}}
            @if ($totalComments === 0)
                <h5 style="margin-top: 50px;">No Reviews</h5><br>
            @elseif($totalComments === 1)
                <h5 style="margin-top: 50px;">{{ $totalComments }} Review</h5><br>
            @else
                <h5 style="margin-top: 50px;">{{ $totalComments }} Reviews</h5><br>
            @endif

            <div class="bg-light" id="comments" style=" margin-bottom: 50px;">
                {{-- <br> --}}
                {{-- @foreach ($reviews as $review)
                    <h6>{{$review->user->name}}</h6>
                    <div class="comment">{{ $review->comments }}</div>
                    <div class="comment">{{ \Carbon\Carbon::parse($review->created_at)->format('F j, Y') }}</div>
                    <br>
                @endforeach --}}
            </div>
            {{-- <div class="form-group row">
                <div class="col-sm-8 d-flex align-items-center">
                <input type="text" class="form-control" placeholder="Give feedback">
                <button class="btn btn-primary" id="give-feedback"><i class="fa fa-send"></i></button>
                </div>
                <button id="show-more-comments" class="btn btn-outline-primary">Show more comments</button>
            </div> --}}
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
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('script')
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
