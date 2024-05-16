@extends('admin.layouts.master')
@section('title', 'Products list')
@section('style')
<style>
    .header-color{
        color: #5d9bff;
    }
    .table {
    border-collapse: collapse;
    width: 100%;
}

th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd; /* Add horizontal border between rows */
}

th {
    border-right: 1px solid #ddd; /* Add vertical border between th and td */
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

        <h1 class="header-color">Products</h1>
        <div class="pagetitle">
            <nav>
                <ol class="breadcrumb">
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
                    <a class="breadcrumb-item" href="{{ route('product.index') }}">Product List</a>
                    <li class="breadcrumb-item "><b>Product detail</b></li>
                </ol>
            </nav>
        </div>
        <div class="card col-xl-8 col-md-6  mx-auto p-3" >
            @if ($data->image == null)
                <div class="m-3 text-center">
                    <img src="{{asset('storage/products/noimage.jpg')}}"  alt="" width="350px">
                </div>
            @else
            <div class="text-center m-3">
                <img src="{{ asset('storage/products/'. $data->image)}}"  width="350" alt="Product Image" style="border-radius: 3px;">
            </div>
            @endif



                <h5 class="card-title text-center">{{$data->name}}</h5>

                <table class="table">
                    <tbody>
                        <tr>
                            <th class="col-2">Description</th>
                            <td class="col-10">{{$data->description}}</td>
                        </tr>
                        <tr>
                            <th>Brand</th>
                            <td>{{$data->brand->name}}</td>
                        </tr>
                        <tr>
                            <th>Display</th>
                            <td>{{$data->storage_option}}</td>
                        </tr>
                        <tr>
                            <th>Storage</th>
                            <td>{{$data->color}}</td>
                        </tr>
                        <tr>
                            <th>Price</th>
                            <td>{{$data->price}} $</td>
                        </tr>
                        <tr>
                            <th>Display</th>
                            <td>{{$data->display}}</td>
                        </tr>
                        <tr>
                            <th>Resolution</th>
                            <td>{{$data->resolution}}</td>
                        </tr>
                        <tr>
                            <th>OS</th>
                            <td>{{$data->os}}</td>
                        </tr>
                        <tr>
                            <th>Main Camera</th>
                            <td>{{$data->main_camera}}</td>
                        </tr>
                        <tr>
                            <th>Selfie Camera</th>
                            <td>{{$data->selfie_camera}}</td>
                        </tr>
                        <tr>
                            <th>Date</th>
                            <td>{{ \Carbon\Carbon::parse($data->created_at)->format('F j, Y') }}</td>
                        </tr>
                    </tbody>
                </table>

        </div>

    </div>

@endsection

