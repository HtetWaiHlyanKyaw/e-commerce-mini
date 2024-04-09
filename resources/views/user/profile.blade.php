@extends('user.master')
@section('style')
@endsection
@section('content')
    {{-- Brand Create Success Message --}}
    <br><br><br>
    <h1 class="header-color">Profile</h1>
    <div class="card col-xl-5 col-md-6  mx-auto p-3">

        <h5 class="card-title text-center">{{ $user->name }}</h5>
        <hr>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><strong>Email : </strong>{{ $user->email }}</li>
            <li class="list-group-item"><strong>Since :
                </strong>{{ \Carbon\Carbon::parse($user->created_at)->format('F j, Y') }}</li>

        </ul>
        <hr>
        {{-- <a href="{{ route('Admin.edit', ['id' => $user->id]) }}" class="text-center text-success text-decoration-none"><i
                class="ti ti-edit"> </i>Edit your information</a> --}}

    </div>
    <form id="logout-form" action="{{ route('user.logout') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary">Logout</button>
    </form>

    <br><br><br>
@endsection
@section('script')
@endsection
