@extends('admin.layouts.master')
@section('title', 'Model Edit')
@section('style')
    <style>
        .header-color {
            color: #5d9bff;
        }
    </style>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

@section('content')
    <div class="container-fluid">
        {{-- Page Title --}}
        <div class="pagetitle">
            <h1 class="header-color">Model Edit</h1>
            <br>
            <nav>
                <ol class="breadcrumb">
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
                    <a class="breadcrumb-item " href="{{ route('model.list') }}">Model List</a>
                    <li class="breadcrumb-item "><b>Model Edit</b></li>
                </ol>
            </nav>
        </div>
        {{-- Model Update Success Message --}}
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


        {{-- Brand Create Card --}}
        <div class="container-fluid">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="text-center">Edit Model</h4>
                        </div>
                        <hr>

                        <form action="{{ route('model.update', $modelData->id) }}" method="post">
                            @csrf


                            {{-- Brand Call --}}
                            <div class="form-group mb-3">
                                <label for="BrandId" class="form-label">Brand</label>
                                <select class="form-select @error('BrandId') is-invalid @enderror" name="BrandId" id="modelName">
                                    <option value="">Choose Brand</option>
                                    @foreach ($brandData as $brand)
                                        <option value="{{ $brand->id }}"
                                            @if ($modelData->brand_id == $brand->id) selected @endif>
                                            {{ $brand->name }}
                                        </option>
                                    @endforeach
                                </select>

                                @error('BrandId')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- Model Name --}}
                            <div class="form-group mb-3">
                                <label for="modelName" class="form-label">Model Name</label>
                                <input type="text" name="modelName" id="modelName"
                                    class="form-control @error('modelName') is-invalid @enderror" placeholder="Model's name"
                                    value="{{ old('modelName', $modelData->name) }}">


                                @error('modelName')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>



                            {{-- update --}}
                            <div class="text-center">
                                <a href="{{ route('brand.list') }}"><input type="button" value="Cancel"
                                        class="btn btn-outline-danger btn-lg border-2 px-3 me-3"></a>
                                <input type="submit" value="Update" class="btn btn-primary btn-lg px-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>

        $(document).ready(function() {
            $('#modelName').select2();
        });
    </script>

@endsection
