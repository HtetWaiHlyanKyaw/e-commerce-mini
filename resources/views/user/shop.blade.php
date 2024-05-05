@extends('user.master')
@section('title', 'Shop')
@section('style')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('cart')
 <a href="{{route('cartList')}}" class="btn position-relative">
    @if ($cart && count($cart) > 0)
        <img src="{{ asset('user/img/core-img/bag.svg') }}" alt="">
        <span style="margin-top:32px; margin-left:10px" class="position-absolute start-80 me-5 translate-middle badge rounded-pill bg-light">
            {{ count($cart) }}
            <span class="visually-hidden">unread messages</span>
        </span>
    @else
        <img src="{{ asset('user/img/core-img/bag.svg') }}" alt="">
        <span style="margin-top:32px; margin-left:10px" class="position-absolute start-80 me-5 translate-middle badge rounded-pill bg-light">
            0
            <span class="visually-hidden">unread messages</span>
        </span>
    @endif
</a>
@endsection
@section('content')

    <!-- ##### Right Side Cart Area ##### -->

    <div class="cart-bg-overlay"></div>

    <div class="right-side-cart-area">

        <!-- Cart Button -->
        <div class="cart-button">
            <a href="#" id="rightSideCart"><img src="{{ asset('user/img/core-img/bag.svg') }}" alt="">
                <span>3</span></a>
        </div>

        <div class="cart-content d-flex">

            <!-- Cart List Area -->
            <div class="cart-list">
                <!-- Single Cart Item -->
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="{{ asset('user/img/product-img/product-1.jpg') }}" class="cart-thumb" alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                            <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">Mango</span>
                            <h6>Button Through Strap Mini Dress</h6>
                            <p class="size">Size: S</p>
                            <p class="color">Color: Red</p>
                            <p class="price">$45.00</p>
                        </div>
                    </a>
                </div>

                <!-- Single Cart Item -->
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="{{ asset('user/img/product-img/product-2.jpg') }}" class="cart-thumb" alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                            <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">Mango</span>
                            <h6>Button Through Strap Mini Dress</h6>
                            <p class="size">Size: S</p>
                            <p class="color">Color: Red</p>
                            <p class="price">$45.00</p>
                        </div>
                    </a>
                </div>

                <!-- Single Cart Item -->
                <div class="single-cart-item">
                    <a href="#" class="product-image">
                        <img src="{{ asset('user/img/product-img/product-3.jpg') }}" class="cart-thumb" alt="">
                        <!-- Cart Item Desc -->
                        <div class="cart-item-desc">
                            <span class="product-remove"><i class="fa fa-close" aria-hidden="true"></i></span>
                            <span class="badge">Mango</span>
                            <h6>Button Through Strap Mini Dress</h6>
                            <p class="size">Size: S</p>
                            <p class="color">Color: Red</p>
                            <p class="price">$45.00</p>
                        </div>
                    </a>
                </div>
            </div>

            <!-- Cart Summary -->
            <div class="cart-amount-summary">

                <h2>Summary</h2>
                <ul class="summary-table">
                    <li><span>subtotal:</span> <span>$274.00</span></li>
                    <li><span>delivery:</span> <span>Free</span></li>
                    <li><span>discount:</span> <span>-15%</span></li>
                    <li><span>total:</span> <span>$232.00</span></li>
                </ul>
                <div class="checkout-btn mt-100">
                    <a href="checkout.html" class="btn essence-btn">check out</a>
                </div>
            </div>
        </div>
    </div>
    <section class=" section-padding-80 bg-light" style="margin-top: -50px">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-2 col-lg-2">
                    <div class="shop_sidebar_area">
                        <form id="filterForm">
                            <h6 class="widget-title mb-30">Filter by</h6>
                            <div class="widget brands mb-50">
                                <!-- Widget Title 2 -->

                                <p class="widget-title2 mb-30">Brands</p>
                                <div class="widget-desc"
                                    style="max-height: 200px; overflow-y: auto; scrollbar-width: thin;">
                                    <ul style="position: relative;">
                                        <li style="position: relative;"><label for=""><input type="checkbox"
                                                    name="brands" class="form-check-input"
                                                    style="position: absolute; top: 25%; transform: translateY(-50%);"
                                                    value="">All Brands</label></li>
                                        @foreach ($brands as $brand)
                                            <li style="position: relative;"><label for=""><input type="checkbox"
                                                        name="brands" class="form-check-input"
                                                        style="position: absolute; top: 25%; transform: translateY(-50%);"
                                                        value="{{ $brand->id }}">{{ $brand->name }}</label></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>

                            <div class="widget brands mb-50">
                                <!-- Widget Title 2 -->
                                <p class="widget-title2 mb-30">COLOR</p>
                                <div class="widget-desc"
                                    style="max-height: 200px; overflow-y: auto; scrollbar-width: thin;">
                                    <ul>
                                        @foreach ($uniqueColors as $color)
                                            <li style="position: relative;">
                                                <label for="">
                                                    <input type="checkbox" name="colors" class="form-check-input"
                                                        style="position: absolute; top: 25%; transform: translateY(-50%);"
                                                        value="{{ $color }}">
                                                    {{ $color }}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>

                            </div>
                            <!--  Storage -->
                            <div class="widget brands mb-50">
                                <!-- Widget Title 2 -->
                                <p class="widget-title2 mb-30">Storge</p>
                                <div class="widget-desc"
                                    style="max-height: 200px; overflow-y: auto; scrollbar-width: thin;">
                                    <ul>
                                        @foreach ($uniqueStorage as $storage)
                                            <li style="position: relative;">
                                                <label for="">
                                                    <input type="checkbox" name="storage" class="form-check-input"
                                                        style="position: absolute; top: 25%; transform: translateY(-50%);"
                                                        value="{{ $storage }}">
                                                    {{ $storage }}
                                                </label>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            <div class="widget price mb-50">
                                <!-- Widget Title -->
                                <!-- Widget Title 2 -->
                                <p class="widget-title2 mb-30">Price</p>
                                <div class="widget-desc">
                                    <div class="slider-range">
                                        <div data-min="{{ intval($minPrice) }}" data-max="{{ intval($maxPrice) }}"
                                            data-unit="$"
                                            class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all"
                                            data-value-min="{{ intval($minPrice) }}"
                                            data-value-max="{{ intval($maxPrice) }}" data-label-result="Range:">
                                            <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all"
                                                tabindex="0"></span>
                                            <span class="ui-slider-handle ui-state-default ui-corner-all"
                                                tabindex="0"></span>
                                        </div>
                                        <div class="range-price">Range: ${{ intval($minPrice) }} -
                                            ${{ intval($maxPrice) }}</div>
                                    </div>
                                </div>
                            </div>
                            <div class="widget price mb-50">
                                <div class="widget-desc"><button style="width: 100%; color: white" class="btn btn-dark"
                                        type="submit">Filter</button></div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 col-md-10 col-lg-10">
                    <div class="shop_grid_product_area">
                        <div class="row">
                            <div class="col-12">
                                <div class="product-topbar d-flex align-items-center justify-content-between">
                                    <!-- Total Products -->
                                    <div class="total-products">
                                        {{-- <p><span>186</span> products found</p> --}}
                                    </div>
                                    <!-- Sorting -->
                                    <div class="product-sorting d-flex">
                                        <p>Sort by:</p>
                                        <form action="#" method="get">
                                            <select name="select" id="sortByselect">
                                                <option value="value">Highest Rated</option>
                                                <option value="value">Newest</option>
                                                <option value="value">Price: $$ - $</option>
                                                <option value="value">Price: $ - $$</option>
                                            </select>
                                            <input type="submit" class="d-none" value="">
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <h4 style="margin-bottom: 20px;">All Products</h4>
                            @foreach ($paginatedGroupedData as $modelId => $productGroup)
                                <div class="col-12 col-sm-6 col-lg-3">

                                    <div class="single-product-wrapper" style="border: solid 1px #dddddd">

                                        <div class="product-img">

                                            <img src="{{ asset('storage/products/' . $productGroup->first()->image) }}"
                                                alt="Product Image"
                                                style="border-radius: 3px; width: 100%; height: 200px; object-fit: cover;">
                                        </div>

                                        <div class="product-description" style="margin-bottom: 20px;">
                                            <a href="{{ route('user.productDetails', ['model_id' => $modelId]) }}">
                                                <h6 class="text-center">
                                                    {{ trim(strstr($productGroup->first()->name, '(', true)) }}</h6>
                                                <!-- Display model name -->
                                            </a>

                                            <div class="hover-content">
                                                <div class="add-to-cart-btn">
                                                    <a href="#" class="btn essence-btn">Add to Cart</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <!-- Pagination -->
                    <div>
                        {{ $paginatedGroupedData->links() }}
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

            $('#filterForm').submit(function(event) {
                event.preventDefault();

                var brands = [];
                $('input[name="brands"]:checked').each(function() {
                    brands.push($(this).val());
                });
                console.log(brands);

                var colors = [];
                $('input[name="colors"]:checked').each(function() {
                    colors.push($(this).val());
                });
                console.log(colors);

                // var storage = [];
                // $('input[name="storage"]:checked').each(function() {
                //     storage.push($(this).val());
                // });
                // console.log(storage);

                var data = {
                    brands: brands,
                    colors: colors,
                    // storage: storage,
                };
                console.log(data);
                $.ajax({
                    type: 'POST',
                    url: '/userFilter',
                    data: data,
                    success: function(response) {
                        response.forEach(function(product) {
                            console.log('Product ID:', product.id);
                            console.log('Product Name:', product.name);
                            console.log('Shit');
                            // Access other properties as needed
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error(xhr, status, error);
                    }
                });
            });
        });
    </script>
@endsection
