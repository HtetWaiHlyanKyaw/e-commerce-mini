@extends('user.master')
@section('title', 'Register')
@section('style')
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/images/logos/Unity Source Logo.png') }}" />
    <link rel="stylesheet" href="{{ asset('admin/css/styles.min.css') }}" />
    <style>
        /* .Login-Btn {
            color: inherit;
            text-decoration: none;
            font-size: 15px;
        } */
    </style>
@endsection
{{-- <!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registration</title>

    <!-- Laravel CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head> --}}
@section('content')


    {{-- <body> --}}
    <!--  Body Wrapper -->
    <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
        data-sidebar-position="fixed" data-header-position="fixed">
        <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
            <div class="d-flex align-items-center justify-content-center w-100">
                <div class="row justify-content-center w-100">
                    <div class="col-md-8 col-lg-6 col-xxl-3">
                        <div class="card mb-0">
                            <div class="card-body p-3">
                                <a href="#" class="text-nowrap logo-img text-center d-block py-3 w-100">
                                    <img src="{{ asset('admin/images/logos/Unity Source Logo.png') }}" width="180"
                                        alt="">
                                </a>
                                <p class="text-center">Unify Your Mobile Experience</p>
                                <form method="POST" action="{{ route('user.register') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input id="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            value="{{ old('name') }}" required autofocus>
                                        @error('name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input id="email" type="email"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            value="{{ old('email') }}" required>
                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" id="password1" name="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            value="{{ old('password') }}" required>
                                        <input type="checkbox" id="showPassword" onclick="togglePasswordVisibility()"> Show
                                        Password
                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                                        <input type="password" id="password2" name="password_confirmation"
                                            class="form-control @error('password_confirmation') is-invalid @enderror"
                                            value="{{ old('password_confirmation') }}" required>
                                        <input type="checkbox" id="password_confirmation" onclick="PasswordVisibility()">
                                        Show Password
                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button type="submit"
                                        class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Register</button>
                                </form>
                                <div class="text-center mb-3"><strong>Or</strong></div>
                                <!-- Google Sign-in Button -->
                                <a href="{{ route('google-auth') }}"
                                    class="btn btn-google w-100 py-2 fs-4 mb-4 rounded-2 bg-secondary-subtle">
                                    <i class="fab fa-google me-2"></i>Sign in with Google
                                </a>
                                <p class="text-center">Already have an account? <a href="{{ route('user.login') }}" class="Login-Btn">Sign in</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>




@endsection
@section('script')
    <script src="{{ asset('admin/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("password1");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }

        function PasswordVisibility() {
            var passwordField = document.getElementById("password2");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>
@endsection

{{-- </body>

</html> --}}
