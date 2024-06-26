@extends('user.master')
@section('title', 'Login')
@section('style')
<link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/logos/Unity Source Logo.png') }}" />
<link rel="stylesheet" href="{{ asset('admin/css/styles.min.css') }}" />
    <style>
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
    {{-- <body>
    <!--  Body Wrapper -->
    <div class="container-fluid"> --}}
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div
            class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-6 col-lg-4 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body">
                                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ asset('admin/images/logos/Unity Source Logo.png') }}" width="180"
                                        alt="">
                                </a>
                                <p class="text-center">Unify Your Mobile Experience</p>
                                <form method="POST" action="{{ route('user.login') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" type="email" class="form-control " name="email"
                                            value="{{ old('email') }}" required autofocus aria-describedby="emailHelp">
                                    </div>
                                    <div class=" mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" id="password" name="password" class="form-control"
                                            value="{{ old('password') }}" required autofocus>
                                        <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()"> Show
                                        Password
                                    </div>
                                    @if ($errors->any())
                                        <div class="text-center">

                                                @foreach ($errors->all() as $error)
                                                    <p class=" text-danger">{{ $error }}</p>
                                                @endforeach

                                        </div>
                                    @endif
                                    <button type="submit" class="btn btn-primary w-100 py-8 fs-5 mb-4 rounded-pill h-auto p-2">Sign
                                        In</button>
                                </form>
                                <!-- Divider -->
                                <div class="text-center mb-3"><strong>Or</strong></div>
                                <!-- Google Sign-in Button -->
                                {{-- <a href="{{ route('google-auth') }}"
                                    class="btn btn-google w-100 py-2 fs-4 mb-4 rounded-2 bg-secondary-subtle">
                                    <i class="fab fa-google me-2"></i>Continue with Google
                                </a> --}}
                                <!-- Google login button -->

                                <!-- Facebook login button -->
                                <button style="background-color: #3B5997; color:white;" onclick="location.href='{{ route('facebookPage') }}'"
                                    class="btn w-100 py-8 fs-6 mb-2 rounded-pill p-3">
                                    <i class="fab fa-facebook-f"></i> &nbsp;&nbsp;Continue with Facebook
                                </button>

                                <button style="background-color: black; color:white;" onclick="location.href='{{ route('google-auth') }}'" class="btn btn-light w-100 py-8 fs-6 mb-4 rounded-pill p-3 h-auto">
                                    <i class="fab fa-google"></i> &nbsp;&nbsp;&nbsp; Continue with Google
                                </button>

                                <a href="{{ route('user.RegisterPage') }}"
                                        class="Register-Btn"><p class="text-center">Don't have an account? <strong>Register</strong></p></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- </body>
    </div> --}}
@endsection
{{-- </html> --}}
@section('script')
    <script src="{{ asset('admin/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"
        integrity="sha512-25qMDyI7rT+3BLqHZZBzPv0kdpeZPmq4O+Y6biFc/XXB6PmsJ47hWsI1bzG5gVdNdCnBNHLA4eIjPkMV4/0vBw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
