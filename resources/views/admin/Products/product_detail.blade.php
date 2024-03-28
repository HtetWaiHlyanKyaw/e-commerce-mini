@extends('admin.layouts.master')
@section('title', 'Products list')

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

        <h1>Products</h1>
        <div class="pagetitle">
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Product</li>
                    <li class="breadcrumb-item ">Product List</li>
                    <li class="breadcrumb-item active">Product detail</li>
                </ol>
            </nav>
        </div>
        <div class="card col-xl-5 col-md-6  mx-auto p-3" >
            @if ($data->image == null)
                <div class="m-3 text-center">
                    <img src="{{asset('storage/products/noimage.jpg')}}" class="rounded img-thumbnail" alt="" width="350px">
                </div>
            @else
            <div class="text-center m-3">
                <img src="{{ asset('storage/products/'. $data->image)}}" class="rounded img-thumbnail" width="350" alt="Product Image">
            </div>
            @endif

            <div class="card-body">
                {{-- <h5 class="card-title text-center"><i class="ti ti-device-mobile bold me-2"></i>{{$data->ProductModel->name}}</h5> --}}
                <h5 class="card-title text-center"><i class="ti ti-device-mobile bold me-2"></i>{{$data->name}}</h5>
            </div>

            <ul class="list-group list-group-flush">
                <li class="list-group-item"><i class="ti ti-clipboard-list me-2"></i>{{$data->brand->name}}</li>
                <li class="list-group-item"><i class="ti ti-clipboard-data me-2"></i>{{$data->storage_option}}</li>
                <li class="list-group-item"><i class="ti ti-palette me-2"></i>{{$data->color}}</li>
                <li class="list-group-item">{{$data->description}}</li>
                <li class="list-group-item"><i class="ti ti-cash me-2"></i>{{$data->price}} ks</li>
                <li class="list-group-item"><i class="ti ti-calendar me-2"></i>{{$data->created_at->format('j / F / Y')}}</li>
            </ul>
        </div>

    </div>

@endsection
</body>

</html>
