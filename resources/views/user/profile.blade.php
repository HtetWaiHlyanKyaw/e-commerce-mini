@extends('user.master')
@section('title', 'Customer Profile')
@section('style')

@endsection
@section('content')


    <br><br>
    <div class="container" style="margin-bottom:100px">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8 text-center">
                <h2>User Profile</h2>
            </div>
            <div class="col-2">
                <a href="{{route('user.history')}}"><button class="btn btn-primary"><i class="fa-solid fa-cart-shopping"></i> Purchase History</button></a>
            </div>
        </div>

        <form method="POST" action="{{ route('user.pUpdate') }}" class="row ">
            @csrf
            <div class="col-md-6">
                <label for="name" class="form-label">Name</label>
                <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $user->name) }}">
                @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email"
                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-12">
                <label for="currentPassword" class="form-label mt-4">Current Password (leave blank to leave
                    unchanged)</label>
                <input type="password" name="currentPassword"
                    class="form-control  @error('currentPassword') is-invalid @enderror" id="currentPassword">
                <input type="checkbox" id="currentPassword" onclick="togglePasswordVisibility()"> Show Password
                @error('currentPassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-12">
                <label for="newPassword" class="form-label mt-4">New Password (leave blank to leave unchanged)</label>
                <input type="password" name="newPassword" class="form-control" id="newPassword">
                <input type="checkbox" id="newPassword" onclick="PasswordVisibility1()"> Show Password
                @error('newPassword')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <div class="col-md-12">
                <label for="confirm" class="form-label mt-4">Confirm New Password</label>
                <input type="password" name="confirm" class="form-control" id="confirm">
                <input type="checkbox" id="confirm" onclick="PasswordVisibility2()"> Show Password
                @error('confirm')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="col-10 mt-5 text-center  ">
                <button type="submit" class="btn btn-primary"><i class="fa fa-file-arrow-down"></i>  Save Changes</button>

            </div>

            {{-- <div>
                <button class=" text-center" style="width:160px;height:70px;justify-content:center;text-align: center;" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="fa fa-arrow-left"></i>   Logout</button>
            </div> --}}

            <div class="col-2" style="margin-top: 52px; padding-left:70px;" >
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><button class="btn btn-primary"><i class="fa-solid fa-arrow-right-from-bracket"></i>   Logout</button></a>
            </div>

        </form>

        {{-- <a href="{{route('user.history')}}"><button class="btn btn-primary">Purchase History</button></a> --}}

    </div>

    {{-- <div class="card col-xl-5 col-md-6  mx-auto p-3" style="margin-bottom: 200px">

        <h5 class="card-title text-center">{{ $user->name }}</h5>
        <hr>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Email : </strong>{{ $user->email }}</li>
            <li class="list-group-item"><strong>Since :
                </strong>{{ \Carbon\Carbon::parse($user->created_at)->format('F j, Y') }}</li>

        </ul>
        <hr>
       <a href="{{ route('Admin.edit', ['id' => $user->id]) }}" class="text-center text-success text-decoration-none"><i
                class="ti ti-edit"> </i>Edit your information</a>
     </div> --}}

    {{-- <form action="/action_page.php">
        <fieldset>
         <legend>Pro</legend>
         <label for="fname">First name:</label>
         <input type="text" id="fname" name="fname"><br><br>
         <label for="lname">Last name:</label>
         <input type="text" id="lname" name="lname"><br><br>
         <label for="email">Email:</label>
         <input type="email" id="email" name="email"><br><br>
         <label for="birthday">Birthday:</label>
         <input type="date" id="birthday" name="birthday"><br><br>
         <input type="submit" value="Submit">
        </fieldset>
       </form> --}}

@endsection
@section('script')

    <script src="{{ asset('admin/libs/jquery/dist/jquery.min.js') }}"></script>
    <script src="{{ asset('admin/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
    <script>
        function togglePasswordVisibility() {
            var passwordField = document.getElementById("currentPassword");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }

        function PasswordVisibility1() {
            var passwordField = document.getElementById("newPassword");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }

        function PasswordVisibility2() {
            var passwordField = document.getElementById("confirm");
            if (passwordField.type === "password") {
                passwordField.type = "text";
            } else {
                passwordField.type = "password";
            }
        }
    </script>

@endsection
