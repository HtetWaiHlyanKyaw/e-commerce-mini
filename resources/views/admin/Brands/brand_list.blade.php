@extends('admin.layouts.master')
@section('title', 'Brands list')

@section('content')

        {{-- <div class="container-fluid"> --}}
        {{-- Page Title --}}




    <div class="container-fluid">
{{-- Brand Create Success Message --}}

        <div>
            @if (session('success'))
                <div class="alert alert-success text-center" role="alert">
                    {{ session('success') }}
                </div>
            @endif
        </div>

        <h1>Brands</h1>
        <div class="pagetitle">
            <h1>Category List Count -{{ $data->count() }}</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">Home</li>
                    <li class="breadcrumb-item">Brand</li>
                    <li class="breadcrumb-item active">Brand List</li>
                </ol>
            </nav>
        </div>
        <table border="1" id="myTable">
            <thead>
                <tr>
                    <th class="float:left;">ID</th>
                    <th>Name</th>
                    <th>created_at</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $blist)
                    <tr class="tr-shadow">
                        <td class="col-lg-1">{{ $blist->id }}</td>
                        <td class="col-lg-1">{{ $blist->name }}</td>
                        <td class="col-lg-1">{{ $blist->created_at->format('d / M /Y') }}</td>
                        <td class="col-lg-1">
                            <a href="{{route('brand.edit', $blist->id)}}">
                                <button class="btn btn-warning me-2" title="edit brand">
                                    {{-- <i class="bi bi-pencil-square">edit</i> --}}
                                    <i class="ti ti-edit"></i>
                                </button>
                            </a>
                            <a href="">
                                <button class="btn btn-danger" title="delete brand">
                                    <i class="ti ti-trash"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>

        </table>
    </div>

    @endsection
</body>
</html>