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
                    <li class="breadcrumb-item ">Home</li>
                    <li class="breadcrumb-item ">Admin</li>
                    <li class="breadcrumb-item "><b>Create New Admin</b></li>
                </ol>
            </nav>
        </div>
        {{-- Admin Create Success Message --}}
        <div>
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif
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
                                    class="form-control @error('AdminName') is-invalid @enderror" placeholder="Admin Name">

                                @error('AdminName')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <label for="AdminEmail" class="form-label">Email</label>
                            <div class="form-group mb-3">

                                <input type="text" name="AdminEmail"
                                    class="form-control @error('AdminEmail') is-invalid @enderror" placeholder="Admin Email">

                                @error('AdminEmail')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>


                            <label for="AdminPassword" class="form-label">Password</label>
                            <div class="form-group mb-3">

                                <input type="text" name="AdminPassword"
                                    class="form-control @error('AdminPassword') is-invalid @enderror" placeholder="Admin Password">

                                @error('AdminPassword')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- submit --}}
                            <div class="text-center">
                                <a href="{{ route('brand.list') }}"><input type="button" value="cancel"
                                        class="btn btn-outline-danger btn-lg border-2 px-3 me-3"></a>
                                <input type="submit" value="create" class="btn btn-primary btn-lg px-3">
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
