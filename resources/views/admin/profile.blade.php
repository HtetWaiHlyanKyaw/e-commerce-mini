@extends('admin.layouts.master')
@section('title', 'Profile')

@section('style')
    <style>
        .header-color {
            color: #5d9bff;
        }
    </style>
@endsection

@section('content')
    <div class="container-fluid">
        {{-- Brand Create Success Message --}}

        <h1 class="header-color">Profile</h1>
        <div class="pagetitle">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div>
        <div class="card col-xl-5 col-md-6  mx-auto p-3">

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

        </div>

    </div>
@endsection

@section('script')
@endsection
