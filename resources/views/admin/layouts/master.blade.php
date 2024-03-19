<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <link rel="shortcut icon" type="image/png" href="{{asset('admin/images/logos/favicon.png')}}" />
  <link rel="stylesheet" href="{{asset('admin/css/styles.min.css')}}" />

  @yield('style')
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    @include('admin.layouts.sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
        @include('admin.layouts.topbar')
      <!--  Header End -->
        @yield('content')
    </div>
  </div>
  <script src="{{asset('admin/libs/jquery/dist/jquery.min.js')}}"></script>
  <script src="{{asset('admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('admin/js/sidebarmenu.js')}}"></script>
  <script src="{{asset('admin/js/app.min.js')}}"></script>
  <script src="{{asset('admin/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
  <script src="{{asset('admin/libs/simplebar/dist/simplebar.js')}}"></script>
  <script src="{{asset('admin/js/dashboard.js')}}"></script>

  @yield('script')
</body>

</html>
