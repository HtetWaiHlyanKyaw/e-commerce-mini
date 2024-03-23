@extends('admin.layouts.master')
@section('title', 'Reiviews list')
@section('style')
    <style>
        .header-color {
            color: #1da9dc;
        }
    </style>
@endsection
@section('content')

    <div class="container-fluid">
        {{-- Brand Create Success Message --}}

        <div>
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <h1 class="header-color">Reviews</h1>
        <br>
        <div class="pagetitle">
            <h3>Reviews List Count -{{ $userdata->count() }}</h3>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item ">Home</li>
                    <li class="breadcrumb-item ">Product</li>
                    <li class="breadcrumb-item "><b>Reiviews List</b></li>
                </ol>
            </nav>
        </div>
        <table border="1" id="myTable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    {{-- <th>Product Name</th> --}}
                    <th>Rating</th>
                    <th>Comments</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
                @php
                    $counter = 1; // Initialize counter variable
                @endphp
                @foreach ($userdata as $clist)
                    <tr class="tr-shadow">
                        {{-- <td class="col-lg-1">{{ $blist->id }}</td> --}}
                        <td class="col-lg-1">{{ $counter }}</td>
                        <td class="col-lg-1">{{ $clist->User->name }}</td>
                        {{-- <td class="col-lg-1">{{ $clist->pro }}</td> --}}
                        <td class="col-lg-1">{{ $clist->rating }}</td>
                        <td class="col-lg-1">{{ $clist->comments }}</td>
                        <td class="col-lg-1">{{ $clist->created_at->format('d / M /Y') }}</td>
                    </tr>
                    @php
                        $counter++; // Increment counter for the next row
                    @endphp
                @endforeach
            </tbody>

        </table>
    </div>

@endsection
