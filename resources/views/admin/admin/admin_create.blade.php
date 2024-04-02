@extends('admin.layouts.master')
@section('title', 'Admin create')
@section('style')
    <style>
        .header-color {
            color: #5d9bff;
        }
    </style>
@endsection


@section('content')
    <div class="container-fluid">
        {{-- Page Title --}}
        <div class="pagetitle">
            <h1 class="header-color">Admin Create</h1>
            <br>
            <nav>
                <ol class="breadcrumb">
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
                    <a class="breadcrumb-item " href="{{ route('Admin.list') }}">Admin List</a>
                    <li class="breadcrumb-item "><b>Create New Admin</b></li>
                </ol>
            </nav>
        </div>
        {{-- Admin Create Success Message --}}
        <div>
            @if (session('alert'))
                <div id="alertMessage" class="text-center alert alert-{{ session('alert')['type'] }}">
                    {{ session('alert')['message'] }}
                </div>
            @endif

            <script>
                // JavaScript to hide the alert after a specific duration
                setTimeout(function() {
                    document.getElementById('alertMessage').style.display = 'none';
                }, 5000); // Adjust the duration (in milliseconds) as needed
            </script>
        </div>

        {{-- Admin Create Card --}}
        <div class="container-fluid">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="text-center">Create New Admin</h4>
                        </div>
                        <hr>

                        <form action="{{route('Admin.create')}}" method="post">
                            @csrf
                            <label for="AdminName" class="form-label">Name</label>
                            <div class="form-group mb-3">

                                <input type="text" name="AdminName"
                                    class="form-control @error('AdminName') is-invalid @enderror" placeholder="Admin Name" value="{{ old('AdminName') }}">

                                @error('AdminName')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <label for="AdminEmail" class="form-label">Email</label>
                            <div class="form-group mb-3">

                                <input type="text" name="AdminEmail"
                                    class="form-control @error('AdminEmail') is-invalid @enderror" placeholder="Admin Email" value="{{ old('AdminEmail') }}">

                                @error('AdminEmail')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label for="usertype" class="form-label">Position</label>
                            <div class="form-group mb-3">
                                <select class="form-select @error('usertype') is-invalid @enderror" name="usertype" id="usertype">
                                    <option value="">Choose Position</option>
                                    <option value="store_admin" {{ old('usertype') == 'store_admin' ? 'selected' : '' }}>Store Admin</option>
                                    <option value="supplier_admin" {{ old('usertype') == 'supplier_admin' ? 'selected' : '' }}>Supplier Admin</option>
                                    <option value="super_admin" {{ old('usertype') == 'super_admin' ? 'selected' : '' }}>Super Admin</option>
                                </select>
                            </div>



                            <label for="AdminPassword" class="form-label">Password</label>
                            <div class="form-group mb-3">

                                {{-- <input type="text" name="AdminPassword"
                                    class="form-control @error('AdminPassword') is-invalid @enderror" placeholder="Admin Password"> --}}

                                    {{-- <label for="password">Password:</label> --}}
                                    <input type="password" id="AdminPassword" name="AdminPassword" class="form-control @error('AdminPassword') is-invalid @enderror"
                                      placeholder="Enter your password">
                                    <input type="checkbox" id="showPassword" class="mt-2" onclick="togglePasswordVisibility()"> Show Password

                                @error('AdminPassword')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            {{-- submit --}}
                            <div class="text-center">
                                <a href="{{ route('brand.list') }}"><input type="button" value="Cancel"
                                        class="btn btn-outline-danger btn-lg border-2 px-3 me-3"></a>
                                <input type="submit" value="Create" class="btn btn-primary btn-lg px-3">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
{{-- <script>
    document.getElementById("showPassword").addEventListener("change", function() {
        var passwordInput = document.getElementById("AdminPassword");
        if (this.checked) {
            passwordInput.type = "text";
            passwordInput.setAttribute('data-typed', passwordInput.value); // Store the typed password
            passwordInput.value = passwordInput.value; // Update the input value to refresh the displayed text
        } else {
            passwordInput.type = "AdminPassword";
            passwordInput.value = passwordInput.getAttribute('data-typed'); // Restore the typed password
        }
    });
</script> --}}

<script>
    function togglePasswordVisibility() {
        var passwordField = document.getElementById("AdminPassword");
        if (passwordField.type === "password") {
            passwordField.type = "text";
        } else {
            passwordField.type = "password";
        }
    }
</script>
@endsection
