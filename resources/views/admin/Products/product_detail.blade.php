@extends('admin.layouts.master')
@section('title', 'Products list')
@section('style')
<style>
    .header-color{
        color: #5d9bff;
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
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Product</li>
                    <li class="breadcrumb-item ">Product List</li>
                    <li class="breadcrumb-item active"><b>Product detail</b></li>
                </ol>
            </nav>
        </div>
        <div class="card col-xl-5 col-md-6  mx-auto p-3" >
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


            <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="ti ti-device-mobile bold me-2" style="font-size:20px;color:blue;"></i>{{$data->brand->name}}</li>
                <li class="list-group-item"><i class="ti ti-device-sd-card me-2" style="font-size:20px;color:blue;"></i>{{$data->storage_option}}</li>
                <li class="list-group-item"><i class="ti ti-palette me-2" style="font-size:20px;color:blue;"></i>{{$data->color}}</li>
                <li class="list-group-item"><i class="ti ti-file-description me-2" style="font-size:20px;color:blue;"></i>{{$data->description}}</li>
                <li class="list-group-item"><i class="ti ti-premium-rights me-2" style="font-size:20px;color:blue;"></i>{{$data->price}} $</li>
                <li class="list-group-item"><i class="ti ti-calendar me-2" style="font-size:20px;color:blue;"></i> {{ \Carbon\Carbon::parse($data->created_at)->format('F j, Y') }}</li>
            </ul>
        </div>

    </div>

@endsection

