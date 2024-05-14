@extends('admin.layouts.master')
@section('title', 'Models')
@section('style')
    <style>
        .header-color {
              color: #5d9bff;
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
            <h3>Total Admins - <span style="color: #5d9bff;">{{ $data->count() }}</span></h3>
            <nav>
                <ol class="breadcrumb">
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
                    <li class="breadcrumb-item "><b>Admin List</b></li>
                </ol>
            </nav>
        </div>
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
        <div class="bg-white p-4 border rounded">
            <table  id="myTable" class="hover">
                <thead>
                    <tr>
                        <th  style="color: #5d9bff; text-align:center;">No</th>
                        <th style="color: #5d9bff; text-align:center;">Name</th>
                        <th style="color: #5d9bff; text-align:center;">Email</th>
                        <th style="color: #5d9bff; text-align:center;">Position</th>
                        <th style="color: #5d9bff; text-align:center;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $counter = 1;
                    $totalAdmins = $data->count();// Initialize counter variable
                @endphp
                    @foreach ($data as $aList)

                        <tr class="tr-shadow">
                            {{-- <td class="col-lg-1">{{ $productModel->id }}</td> --}}
                            <td class="col-lg-1" style="text-align:center;">{{ $totalAdmins-- }}</td>
                            <td class="col-lg-1" style="text-align:center;">{{ $aList->name }}</td>
                            <td class="col-lg-1" style="text-align:center;">{{ $aList->email }}</td>
                            <td class="col-lg-1" style="text-align:center;">{{ $aList->usertype }}</td>
                            <td class="col-lg-1" style="text-align:center;">
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
                        @php
                            $counter++; // Increment counter for the next row
                        @endphp
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
@endsection
