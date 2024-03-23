<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">

            <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                <img src="{{ asset('admin/images/logos/logo.png') }}" width="220" alt="" />
            </a>
            <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
                <i class="ti ti-x fs-8"></i>
            </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
            <ul id="sidebarnav">
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Home</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('dashboard') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-layout-dashboard"></i>
                        </span>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <hr>

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Brands</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('brand.list') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-list"></i>
                        </span>
                        <span class="hide-menu">List</span>
                    </a>

                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('brand.page') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-circle-plus"></i>
                        </span>
                        <span class="hide-menu">Create</span>
                    </a>
                </li>
                <hr>


                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Models</span>
                </li>

                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('model.list') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-list"></i>
                        </span>
                        <span class="hide-menu">List</span>
                    </a>

                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('model.page') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-circle-plus"></i>
                        </span>
                        <span class="hide-menu">Create</span>
                    </a>
                </li>
                <hr>


                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Products</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" aria-expanded="false">
                        <span>
                            <i class="ti ti-list"></i>
                        </span>
                        <span class="hide-menu">List</span>
                    </a>

                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" aria-expanded="false">
                        <span>
                            <i class="ti ti-circle-plus"></i>
                        </span>
                        <span class="hide-menu">Create</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('product.reviews') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-message"></i>
                        </span>
                        <span class="hide-menu">Reviews</span>
                    </a>
                </li>
                <hr>

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Admin</span>
                </li>
                {{-- <li class="sidebar-item">
          <a class="sidebar-link" href="#" aria-expanded="false">
            <span>
              <i class="ti ti-user-circle"></i>
            </span>
            <span class="hide-menu">Admin</span>
          </a>
        </li> --}}
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" aria-expanded="false">
                        <span>
                            <i class="ti ti-list"></i>
                        </span>
                        <span class="hide-menu">List</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" aria-expanded="false">
                        <span>
                            <i class="ti ti-circle-plus"></i>
                        </span>
                        <span class="hide-menu">Create</span>
                    </a>
                    <hr>
                </li>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Customer</span>
                </li>
                {{-- <li class="sidebar-item">
          <a class="sidebar-link" href="#" aria-expanded="false">
            <span>
              <i class="ti ti-users"></i>
            </span>
            <span class="hide-menu">Customer</span>
          </a>
        </li> --}}
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('customer.page') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-list"></i>
                        </span>
                        <span class="hide-menu">List</span>
                    </a>

                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" aria-expanded="false">
                        <span>
                            <i class="ti ti-receipt-2"></i>
                        </span>
                        <span class="hide-menu">Purchases</span>
                    </a>
                </li>

                <hr>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Suppliers</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('supplier.list') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-list"></i>
                        </span>
                        <span class="hide-menu">List</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('supplier.page') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-circle-plus"></i>
                        </span>
                        <span class="hide-menu">Create</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item">
          <a class="sidebar-link" href="#" aria-expanded="false">
            <span>
              <i class="ti ti-receipt-2"></i>
            </span>
            <span class="hide-menu">Purchases</span>
          </a>
        </li> --}}
                <hr>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Supplier Purchases</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('supplier_purchase.list') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-list"></i>
                        </span>
                        <span class="hide-menu">List</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="#" aria-expanded="false">
                        <span>
                            <i class="ti ti-circle-plus"></i>
                        </span>
                        <span class="hide-menu">Create</span>
                    </a>
                </li>
                <hr>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
