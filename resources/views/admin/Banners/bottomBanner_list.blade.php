@extends('admin.layouts.master')
@section('title', 'Bottom Banner list')
@section('style')
    <style>
        .header-color {
            color: #5d9bff;
        }

        .bg-lighter {
            background-color: #f6f7ff;
            /* Slightly darker shade */
        }

        /* Added new style for table images */
        .table-image {
            width: 100px;
            height: auto;
            border-radius: 3px;
        }
    </style>
@endsection
@section('content')

    <div class="container-fluid">
        {{-- Brand Create Success Message --}}

        <h1 class="header-color">Bottom Banner List</h1>
        <br>
        <div class="pagetitle">
            <h3>Total Bottom Banner - <span style="color: #5d9bff;">{{ $datas->count() }}</span></h3>
            <nav>
                <ol class="breadcrumb">
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
                    <li class="breadcrumb-item active"><b>Bottom Banner List</b></li>
                </ol>
            </nav>
        </div>

        <div>
            @if (session('alert'))
                <div id="alertMessage" class="text-center alert alert-{{ session('alert')['type'] }}">
                    {{ session('alert')['message'] }}
                </div>
            @endif
        </div>
        <div class="bg-white p-4 border rounded">
            <table id="myTable" class="table">
                <thead>
                    <tr>
                        <th style="text-align:center; color: #5d9bff;">No</th>
                        <th style="text-align:center; color: #5d9bff;">Image 1</th>
                        <th style="text-align:center; color: #5d9bff;">Image 2</th>
                        <th style="text-align:center; color: #5d9bff;">Image 3</th>
                        <th style="text-align:center; color: #5d9bff;">Date</th>
                        <th style="text-align:center; color: #5d9bff;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1; // Initialize counter variable
                        $totalBanner = $datas->count();
                    @endphp
                    @foreach ($datas as $BottomBanner)
                        <tr>
                            {{-- {{dd($BottomBanner)}} --}}
                            <td style="text-align:center;">{{ $totalBanner-- }}</td>
                            <td style="text-align:center;">
                                <img src="{{ asset('storage/BottomBanner/' . $BottomBanner->image_1) }}" class="table-image"
                                    alt="Product Image">
                            </td>
                            <td style="text-align:center;"><img
                                    src="{{ asset('storage/BottomBanner/' . $BottomBanner->image_2) }}" class="table-image"
                                    alt="Product Image"></td>
                            <td style="text-align:center;"><img
                                    src="{{ asset('storage/BottomBanner/' . $BottomBanner->image_3) }}" class="table-image"
                                    alt="Product Image"></td>
                            <td style="text-align:center;">
                                {{ \Carbon\Carbon::parse($BottomBanner->created_at)->format('F j, Y') }}</td>
                            <td style="text-align:center;">
                                <a href="{{ route('admin.BottomBanner.edit', $BottomBanner->id) }}"
                                    class="btn btn-outline-success" title="Edit product image"><i class="ti ti-edit"></i></a>
                                <a href="{{ route('BottomBanner.delete', $BottomBanner->id) }}" class="btn btn-outline-danger"
                                    title="Delete BottomBanner"><i class="ti ti-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
