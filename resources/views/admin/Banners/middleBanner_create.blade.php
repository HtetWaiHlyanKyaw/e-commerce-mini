@extends('admin.layouts.master')
@section('title', 'Middle Banner create page')
@section('style')

@endsection

@section('content')
    <div class="container-fluid">
        {{-- Page Title --}}
        <div class="pagetitle">
            <h1 class="header-color">Middle Banner Create</h1>
            <br>
            <nav>
                <ol class="breadcrumb">
                    <a class="breadcrumb-item " href="{{ route('dashboard') }}">Home</a>
                    <a class="breadcrumb-item" href="{{ route('admin.MiddleBanner.list') }}">Middle Banner List</a>
                    <li class="breadcrumb-item active"><b>Create Middle Banner</b></li>
                </ol>
            </nav>
        </div>
        {{-- Banner Create Success Message --}}
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


        {{-- Product Create Card --}}
        <div class="container-fluid">
            <div class="col-lg-6 offset-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="text-center">Create New Middle Banner</h4>
                        </div>
                        <hr>

                        <form action="{{route('admin.MiddleBanner.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <label for="image1" class="form-label">Image 1</label>
                            <div class="form-group mb-3">

                                <input type="file" name="image1"
                                    class="form-control @error('image1') is-invalid @enderror">
                                @error('image1')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label for="image2" class="form-label">Image 2</label>
                            <div class="form-group mb-3">

                                <input type="file" name="image2"
                                    class="form-control @error('image2') is-invalid @enderror">
                                @error('image2')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <label for="image3" class="form-label">Image 3</label>
                            <div class="form-group mb-3">

                                <input type="file" name="image3"
                                    class="form-control @error('image3') is-invalid @enderror">
                                @error('image3')
                                    <div class="text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="text-center">
                                <a href=""><input type="button" value="Cancel"
                                        class="btn btn-outline-danger btn-lg border-2 px-3 me-3"></a>
                                <input type="submit" value="Create" class="btn btn-lg btn-primary px-3">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
