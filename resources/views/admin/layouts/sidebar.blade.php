<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">

            <a href="{{ route('dashboard') }}" class="text-nowrap logo-img">
                <img src="{{ asset('admin/images/logos/Unity Source Logo.png') }}" width="220" alt="" />
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
                @if (auth()->user()->hasPermissionTo('read brand'))
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
                @endif
                @if (auth()->user()->hasPermissionTo('create brand'))
                <li class="sidebar-item">

                        <a class="sidebar-link" href="{{ route('brand.page') }}" aria-expanded="false">
                            <span>
                                <i class="ti ti-circle-plus"></i>
                            </span>
                            <span class="hide-menu">Create</span>
                        </a>

                </li>
                <hr>
                @endif
                @if (auth()->user()->hasPermissionTo('read model'))
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
                @endif
                @if (auth()->user()->hasPermissionTo('create model'))
                <li class="sidebar-item">

                    <a class="sidebar-link" href="{{ route('model.page') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-circle-plus"></i>
                        </span>
                        <span class="hide-menu">Create</span>

                    </a>
                </li>

                <hr>
                @endif
                @if (auth()->user()->hasPermissionTo('read product'))
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Products</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('product.index') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-list"></i>
                        </span>
                        <span class="hide-menu">List</span>
                    </a>

                </li>
                @endif
                @if (auth()->user()->hasPermissionTo('create product'))
                <li class="sidebar-item">

                    <a class="sidebar-link" href="{{ route('product.create') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-circle-plus"></i>
                        </span>
                        <span class="hide-menu">Create</span>
                    </a>

                </li>
                @endif
                @if (auth()->user()->hasPermissionTo('view reviews'))
                <li class="sidebar-item">

                    <a class="sidebar-link" href="{{ route('product.reviews') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-message"></i>
                        </span>
                        <span class="hide-menu">Reviews</span>
                    </a>

                </li>
                <hr>
                @endif
                @if (auth()->user()->hasPermissionTo('read supplier'))
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
                @endif
                @if (auth()->user()->hasPermissionTo('create supplier'))
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
                @endif
                @if (auth()->user()->hasPermissionTo('read supplier_purchase'))
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
                @endif
                @if (auth()->user()->hasPermissionTo('create supplier_purchase'))
                <li class="sidebar-item">

                    <a class="sidebar-link" href="{{ route('supplier_purchase.page') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-circle-plus"></i>
                        </span>
                        <span class="hide-menu">Create</span>
                    </a>
                </li>
                <hr>
                @endif
                @if (auth()->user()->hasPermissionTo('crud admin'))
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Admins</span>
                </li>

                <li class="sidebar-item">

                    <a class="sidebar-link" href="{{ route('Admin.list') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-list"></i>
                        </span>
                        <span class="hide-menu">List</span>
                    </a>

                </li>
                <li class="sidebar-item">

                    <a class="sidebar-link" href="{{ route('Admin.page') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-circle-plus"></i>
                        </span>
                        <span class="hide-menu">Create</span>
                    </a>

                </li>

                    <hr>
                    @endif
                    @if (auth()->user()->hasPermissionTo('view customer list'))
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Customers</span>
                </li>
                <li class="sidebar-item">

                    <a class="sidebar-link" href="{{ route('customer.page') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-list"></i>
                        </span>
                        <span class="hide-menu">List</span>
                    </a>

                </li>
                @endif
                @if (auth()->user()->hasPermissionTo('view purchases'))
                <li class="sidebar-item">

                    <a class="sidebar-link" href="{{ route('customer_purchase.list') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-receipt-2"></i>
                        </span>
                        <span class="hide-menu">Purchases</span>
                    </a>

                </li>

                    <hr>
                    @endif
                {{-- @if (auth()->user()->hasPermissionTo('read supplier_purchase')) --}}
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Top Banner</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.TopBanner.list') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-list"></i>
                        </span>
                        <span class="hide-menu">List</span>
                    </a>

                </li>
                {{-- @endif --}}
                {{-- @if (auth()->user()->hasPermissionTo('create supplier')) --}}
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.TopBanner.create') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-circle-plus"></i>
                        </span>
                        <span class="hide-menu">Create</span>
                    </a>
                </li>
                <hr>

                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Middle Banner</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.MiddleBanner.list') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-list"></i>
                        </span>
                        <span class="hide-menu">List</span>
                    </a>

                </li>
                {{-- @endif --}}
                {{-- @if (auth()->user()->hasPermissionTo('create supplier')) --}}
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.MiddleBanner.create') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-circle-plus"></i>
                        </span>
                        <span class="hide-menu">Create</span>
                    </a>
                </li>
                <hr>
                <li class="nav-small-cap">
                    <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
                    <span class="hide-menu">Bottom Banner</span>
                </li>
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.BottomBanner.list') }}" aria-expanded="false">
                        <span>
                            <i class="ti ti-list"></i>
                        </span>
                        <span class="hide-menu">List</span>
                    </a>

                </li>
                {{-- @endif --}}
                {{-- @if (auth()->user()->hasPermissionTo('create supplier')) --}}
                <li class="sidebar-item">
                    <a class="sidebar-link" href="{{ route('admin.BottomBanner.create') }}" aria-expanded="false">
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
