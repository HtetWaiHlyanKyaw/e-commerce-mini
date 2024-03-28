@extends('admin.layouts.master')
@section('title', 'Customer list')
<style>
        .header-color {
            color: #1da9dc;
        }
        .bg-lighter {
            background-color: #f6f7ff;
            /* Slightly darker shade */
        }
</style>
@section('content')

    <div class="container-fluid">
        {{-- Brand Create Success Message --}}



        <h1 class="header-color">Customer</h1>
        <br>
        <div class="pagetitle">
            <h3>Customer List Count -{{ $data->count() }}</h3>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Customer</li>
                    <li class="breadcrumb-item "><b>Customer List</b></li>
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
                        <th style="color: #1da9dc">No</th>
                        <th style="color: #1da9dc">Name</th>
                        <th style="color: #1da9dc">Email</th>
                        <th style="color: #1da9dc">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $counter = 1; // Initialize counter variable
                    @endphp
                    @foreach ($data as $clist)
                        <tr class="tr-shadow">
                            {{-- <td class="col-lg-1">{{ $blist->id }}</td> --}}
                            <td class="col-lg-1">{{ $counter }}</td>
                            <td class="col-lg-1">{{ $clist->name }}</td>
                            <td class="col-lg-1">{{ $clist->email }}</td>
                            <td class="col-lg-1">{{ $clist->created_at->format('d / M /Y') }}</td>
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
