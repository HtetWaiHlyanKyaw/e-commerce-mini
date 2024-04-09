@extends('user.master')
@section('title','Login')
@section('style')
<link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/logos/Unity Source Logo.png') }}" />
<link rel="stylesheet" href="{{ asset('admin/css/styles.min.css') }}" />
<!-- Laravel CSRF Token -->
<style>
    .Register-Btn{
        /* color: inherit; */
        text-decoration: none;
        font-size: 15px;

    }
</style>
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

</head> --}}
@section('content')
{{-- <body> --}}
    <!--  Body Wrapper -->
    {{-- <div class="container-fluid"> --}}
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ asset('admin/images/logos/Unity Source Logo.png') }}" width="180" alt="">
                                </a>
                                <p class="text-center">Unify Your Mobile Experience</p>
                                <form method="POST" action="{{ route('user.login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" type="email" class="form-control" name="email"
                                            value="{{ old('email') }}" required autofocus aria-describedby="emailHelp">
                                    </div>
                                    <div class=" mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" id="password" name="password" class="form-control"
                                            value="{{ old('password') }}" required autofocus>
                                        <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()"> Show Password
                                    </div>
                                    @if ($errors->any())
                                    <div>
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    @endif
                                    <button type="submit"
                                        class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                                </form>
                                <p class="text-center">Don't have an account? <a href="{{ route('user.RegisterPage') }}" class="Register-Btn">Register</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


{{-- </body> --}}
{{-- </div> --}}
@endsection
{{-- </html> --}}
@section('script')
<script src="{{ asset('admin/libs/jquery/dist/jquery.min.js') }}"></script>
<script src="{{ asset('admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("password");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
</script>
@endsection
