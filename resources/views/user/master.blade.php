<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    @yield('csrf')
    <title>@yield('title')</title>
    @yield('style')
    <!-- Favicon  -->
    <link rel="icon" href="{{ asset('user/img/Unity Source Logo.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Core Style CSS -->
    <link rel="stylesheet" href="{{ asset('user/css/core-style.css') }}">
    <link rel="stylesheet" href="{{ asset('user/style.css') }}">
    {{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" /> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    @yield('style');
    <link rel="stylesheet" href="https://cdn.datatables.net/2.0.2/css/dataTables.dataTables.min.css">
    <style>
        .dropdown-no-arrow::after {
            display: none !important;
        }

        .search-results {
            max-height: 300px;
            max-width: 500px;
            /* Adjust the height as needed */
            overflow-y: auto;
            overflow-x: hidden;
            border-radius: 0;
            /* Add vertical scrollbar when content exceeds height */

            /* Optional: Add border for clarity */
        }
    </style>
</head>

<body>
    <!-- ##### Header Area Start ##### -->
    <header class="header_area">
        <div class="classy-nav-container breakpoint-off d-flex align-items-center justify-content-between">
            <!-- Classy Menu -->
            <nav class="classy-navbar" id="essenceNav">
                <!-- Logo -->
                <a class="nav-brand" href="{{ route('user.page') }}"><img src="{{ asset('user/img/uni.png') }}"
                        alt=""></a>
                <!-- Navbar Toggler -->
                <div class="classy-navbar-toggler">
                    <span class="navbarToggler"><span></span><span></span><span></span></span>
                </div>
                <!-- Menu -->
                <div class="classy-menu">
                    <!-- close btn -->
                    <div class="classycloseIcon">
                        <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                    </div>
                    <!-- Nav Start -->
                    <div class="classynav">
                        <ul>
                            <li><a href="{{ route('user.page') }}">Home</a></li>
                            <li><a href="{{ route('user.shop') }}">Products</a></li>
                            <li><a href="{{ route('user.blog') }}">About us</a></li>
                            <li><a href="{{ route('user.contact') }}">Contact us</a></li>
                        </ul>
                    </div>
                    <!-- Nav End -->
                </div>
            </nav>

            <!-- Header Meta Data -->
            <div class="header-meta d-flex clearfix justify-content-end ">
                <!-- Search Area -->
                <div class="search-area">
                    <form >
                        <input type="search" name="search" id="headerSearch" placeholder="Search product">
                        {{-- <button type="submit"><i class="fa fa-search" aria-hidden="true"></i></button> --}}
                    </form>
                    <div id="searchResults" class="search-results"></div>
                </div>

                <!-- User Login Info -->
                @if (Auth::check() && Auth::user()->usertype === 'customer')
                    <div class="cart-area">
                        @yield('cart')
                    </div>
                    <div class="dropdown user-login-info">
                        <div class="dropdown-toggle dropdown-no-arrow" id="userDropdown" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <img src="{{ asset('user/img/core-img/user.svg') }}" alt=""
                                style="width: 20px; height:20px; margin-top:30px; margin-right:25px">
                        </div>
                        <div class="dropdown-menu dropdown-partial" aria-labelledby="userDropdown">
                            <a class="dropdown-item" style="width:160px;" href="{{ route('user.profile') }}"><i
                                    class="fa fa-user"></i> Profile</a>
                            <a class="dropdown-item" style="width:160px;" href="{{ route('logout') }}"
                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="fa fa-arrow-left"></i> Logout</a>
                            <form id="logout-form" action="{{ route('user.logout') }}" method="POST"
                                style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
            </div>

            {{-- <div class="dropdown user-login-info">
                <div class="dropdown-toggle dropdown-no-arrow" id="userDropdown" data-toggle="dropdown"
                    aria-haspopup="true" aria-expanded="false">
                    <img src="{{ asset('user/img/core-img/user.svg') }}" alt="" class=""
                        style="width: 20px; height:20px; margin-top:35px; margin-right:30px; margin-left:30px;">
                </div>
                <div class="dropdown-menu dropdown-partial" aria-labelledby="userDropdown">
                    <a class="dropdown-item" style="width:160px;" href="{{ route('user.profile') }}">Profile</a>
                    <a class="dropdown-item" style="width:160px;" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>
                    <form id="logout-form" action="{{ route('user.logout') }}" method="POST"
                        style="display: none;">
                        @csrf
                    </form>
                </div>
            </div> --}}
        @elseif (Auth::check() &&
                (Auth::user()->usertype === 'super_admin' ||
                    Auth::user()->usertype === 'supplier_admin' ||
                    Auth::user()->usertype === 'store_admin'))
            <div class="user-login-info">
                <a href="{{ route('dashboard') }}" style="vertical-align: center">Dashboard</a>
            </div>
        @else
            <div class="user-login-info">
                <a href="{{ route('user.login') }}">Sign In</a>
            </div>
            @endif
        </div>


    </header>
    <!-- ##### Header Area End ##### -->

    @yield('content')


    <!-- ##### Footer Area Start ##### -->
    <footer class="footer_area clearfix">
        <div class="container">
            <div class="row">
                <!-- Single Widget Area -->
                <div class="col-md-3 col-sm-6">
                    <div class="single_widget_area d-flex mb-10">
                        <!-- Logo -->
                        <div class="footer-logo mr-50">
                            <a href="#"><img class="logo" src="{{ asset('user/img/uni.png') }}"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
                <!-- Single Widget Area -->
                <div class="col-md-3 col-sm-6">
                    <div class="single_widget_area mb-10">
                        <ul class="footer_widget_menu">
                            <li><a href="#"><i class="fa fa-phone"></i> 09775656968</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single_widget_area mb-10">
                        <ul class="footer_widget_menu">
                            <li><a href="#"><i class="fa fa-envelope"
                                        style="display: inline;"></i>abc@gmail.com</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single_widget_area mb-10">
                        <ul class="footer_widget_menu">
                            <li><a href="#"><i class="fa fa-location-arrow"></i> Mayangone </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row align-items-end">

                <div class="single_widget_area ">
                    <div class="footer_social_area text-center">
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Facebook"><i
                                class="fa fa-facebook" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Instagram"><i
                                class="fa fa-instagram" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Twitter"><i
                                class="fa fa-twitter" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Pinterest"><i
                                class="fa fa-pinterest" aria-hidden="true"></i></a>
                        <a href="#" data-toggle="tooltip" data-placement="top" title="Youtube"><i
                                class="fa fa-youtube-play" aria-hidden="true"></i></a>
                    </div>
                </div>
                {{-- </div> --}}

            </div>

            <div class="row mt-5">
                <div class="col-md-12 text-center">
                    <p>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        All rights reserved
                        <script>
                            document.write(new Date().getFullYear());
                        </script> | Unlock the Future with Us <i class="fa fa-heart-o"
                            aria-hidden="true"></i> <br> distributed by <b>Unity Source IT Solution</b>
                        <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    </p>
                </div>
            </div>

        </div>
    </footer>

    <!-- ##### Footer Area End ##### -->

    <script src="{{ asset('user/js/jquery/jquery-2.2.4.min.js') }}"></script>

    <script src="{{ asset('user/js/popper.min.js') }}"></script>

    <script src="{{ asset('user/js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('user/js/plugins.js') }}"></script>

    <script src="{{ asset('user/js/classy-nav.min.js') }}"></script>

    <script src="{{ asset('user/js/active.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script> --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}

    <script src="//cdn.datatables.net/2.0.2/js/dataTables.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('headerSearch');
            const searchResults = document.getElementById('searchResults');

            searchInput.addEventListener('input', function() {
                const query = this.value.trim();
                if (query.length === 0) {
                    searchResults.innerHTML = ''; // Clear the search results container
                    return;
                }

                fetch(`/search?query=${query}`)
                    .then(response => response.json())
                    .then(groupedData => {
                        let html = '';
                        for (const modelId in groupedData) {
                            if (groupedData.hasOwnProperty(modelId)) {
                                const products = groupedData[modelId];
                                const firstProduct = products[
                                0]; // Get the first product from the group
                                const productDetailsUrl =
                                    `/product/details?model_id=${encodeURIComponent(modelId)}`;
                                var trimmedName = firstProduct.name.substring(0, firstProduct.name
                                    .indexOf('(')).trim();
                                html += `<div class="card" style="border-radius: 0;">
                    <div class="row card-body">

                        <div class="col-lg-4">

                            <img src="/storage/products/${firstProduct.image}" width="120" alt="Product Image" style="border-radius: 1px;">
                        </div>
                        <div class="col-lg-8 d-flex align-items-center">
                            <a href="${productDetailsUrl}">
                            ${trimmedName}
                            </a>
                        </div>
                    </a>
                    </div>
                </div>`;
                            }
                        }
                        searchResults.innerHTML = html;
                    })
                    .catch(error => console.error('Error:', error));

            });
        });
    </script>




    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                // "order": [[ 0, "asc" ]],
                "language": {
                    "lengthMenu": "<strong>_MENU_ &nbsp records per page</strong>",
                    "sInfo": "<strong>_START_ to _END_ of _TOTAL_</strong>",
                    "search": "<strong>Search</strong>",
                }
            });

        });
    </script>
</body>

</html>
@yield('script')
