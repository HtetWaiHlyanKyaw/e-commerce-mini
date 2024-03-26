@extends('admin.layouts.master')
@section('title', 'Models')
@section('style')
    <style>
        .header-color {
            color: #1da9dc;
        }
    </style>
@endsection

@section('content')

    <div class="container-fluid">
        {{-- Admin List Success Message --}}

        <div>
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <h1 class="header-color">Admin List</h1>
        <br>
        <div class="pagetitle">
            <h3>Admin List Count -{{ $data->count() }}</h3>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item "> Home</li>
                    <li class="breadcrumb-item ">Admin</li>
                    <li class="breadcrumb-item "><b>Admin List</b></li>
                </ol>
            </nav>
        </div>
        <table border="1" id="myTable">
            <thead>
                <tr>
                    <th class="float:left;">No</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @php
                $counter = 1; // Initialize counter variable
            @endphp
                @foreach ($data as $Alist)
                    <tr class="tr-shadow">
                        {{-- <td class="col-lg-1">{{ $productModel->id }}</td> --}}
                        <td class="col-lg-1">{{ $counter++}}</td>
                        <td class="col-lg-1">{{ $Alist->name }}</td>
                        <td class="col-lg-1">{{ $Alist->email }}</td>
                        <td class="col-lg-1">
                            <a href="{{route('Admin.edit',$Alist->id)}}">
                                <button class="btn btn-warning me-2" title="Edit Admin">
                                    {{-- <i class="bi bi-pencil-square">edit</i> --}}
                                    <i class="ti ti-edit"></i>
                                </button>
                            </a>
                            <a href="{{ route('Admin.delete', $Alist->id) }}">
                                <button class="btn btn-danger" title="delete Admin">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </a>
                        </td>
                    </tr>

                @endforeach
            </tbody>

        </table>
    </div>
@endsection
