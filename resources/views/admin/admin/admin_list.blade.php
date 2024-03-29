@extends('admin.layouts.master')
@section('title', 'Models')
@section('style')
    <style>
        .header-color {
            color: #1da9dc;
        }
       .bg-lighter {
            background-color: #f6f7ff;
            /* Slightly darker shade */
        }
    </style>
@endsection

@section('content')

    <div class="container-fluid">
        {{-- Admin List Success Message --}}



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
        <div>
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        <div class="bg-lighter p-4 border rounded">
            <table  id="myTable" class="hover">
                <thead>
                    <tr>
                        <th class="float:left;" style="color: #1da9dc">No</th>
                        <th style="color: #1da9dc">Name</th>
                        <th style="color: #1da9dc">Email</th>
                        <th style="color: #1da9dc">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $counter = 1; // Initialize counter variable
                @endphp
                    @foreach ($data as $aList)
                        <tr class="tr-shadow">
                            {{-- <td class="col-lg-1">{{ $productModel->id }}</td> --}}
                            <td class="col-lg-1">{{ $counter++}}</td>
                            <td class="col-lg-1">{{ $aList->name }}</td>
                            <td class="col-lg-1">{{ $aList->email }}</td>
                            <td class="col-lg-1">
                                <a href="{{route('Admin.edit',$aList->id)}}">
                                    <button class="btn btn-outline-success border-0 me-2" title="Edit Admin">
                                        {{-- <i class="bi bi-pencil-square">edit</i> --}}
                                        <i class="ti ti-edit" style="font-size:19px;"></i>
                                    </button>
                                </a>
                                <a href="{{ route('Admin.delete', $aList->id) }}">
                                    <button class="btn btn-outline-danger border-0" title="delete Admin">
                                        <i class="ti ti-trash" style="font-size:19px;"></i>
                                    </button>
                                </a>
                            </td>
                        </tr>

                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
