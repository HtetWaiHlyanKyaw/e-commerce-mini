<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Modernize Free</title>
    <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
    <link rel="stylesheet" href="{{ asset('admin/css/styles.min.css') }}" />

    </head>

    <body>
        <!--  Body Wrapper -->
        <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
            data-sidebar-position="fixed" data-header-position="fixed">
            <div
                class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
                <div class="d-flex align-items-center justify-content-center w-100">
                    <div class="row justify-content-center w-100">
                        <div class="col-md-8 col-lg-6 col-xxl-3">
                            <div class="card mb-0">
                                <div class="card-body">
                                    <a class="text-nowrap logo-img text-center d-block py-3 w-100">
                                        <img src="{{asset('admin/images/logos/logo67.png')}}" width="180" alt="">
                                    </a>
                                    <p class="text-center">Unify Your Mobile Experience</p>
                                    <form method="POST" action="{{ route('login') }}">
                                        @csrf
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input id="email" type="email" class="form-control" name="email"
                                                value="{{ old('email') }}" required autofocus
                                                aria-describedby="emailHelp">
                                        </div>
                                        <div class="mb-4">
                                            <label for="password" class="form-label">Password</label>
                                            <input id="password" type="password" class="form-control" name="password"
                                                value="{{ old('password') }}" required autofocus>
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
                                        {{-- <div class="d-flex align-items-center justify-content-between mb-4">
                                            <div class="form-check">
                                                <input class="form-check-input primary" type="checkbox" value=""
                                                    id="flexCheckChecked" checked>
                                                <label class="form-check-label text-dark" for="flexCheckChecked">
                                                    Remeber this Device
                                                </label>
                                            </div>
                                            <a class="text-primary fw-bold" href="">Forgot Password ?</a>
                                        </div> --}}
                                        <button type="submit"
                                            class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2">Sign In</button>
                                        {{-- <div class="d-flex align-items-center justify-content-center">
                                            <p class="fs-4 mb-0 fw-bold">New to Modernize?</p>
                                            <a class="text-primary fw-bold ms-2"
                                                href="{{route('register')}}">Create an account</a>
                                        </div> --}}
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="{{asset('admin/libs/jquery/dist/jquery.min.js')}}"></script>
        <script src="{{asset('admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>

    </body>
</html>
