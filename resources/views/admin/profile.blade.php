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
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
                    <li class="breadcrumb-item active"><b>Profile</b></li>
                </ol>
            </nav>
        </div>
        <div class="card col-xl-5 col-md-6  mx-auto p-3">

            <h5 class="card-title text-center">{{ $user->name }}</h5>
            <hr>
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Email : </strong>{{ $user->email }}</li>
                @php
                $role = '';
                    if($user->usertype === 'super_admin'){
                        $role = 'Super Admin';
                    }
                    else if($user->usertype === 'store_admin'){
                        $role = 'Store Admin';
                    }
                    else{
                        $role = 'Supplier Admin';
                    }

                @endphp
                <li class="list-group-item"><strong>Position : </strong>{{ $role }}</li>
                <li class="list-group-item"><strong>Since :
                    </strong>{{ \Carbon\Carbon::parse($user->created_at)->format('F j, Y') }}</li>

            </ul>
            <hr>
            {{-- <a href="{{ route('Admin.edit', ['id' => $user->id]) }}" class="text-center text-success text-decoration-none"><i
                    class="ti ti-edit"> </i>Edit your information</a> --}}

        </div>

    </div>
@endsection

@section('script')
@endsection
