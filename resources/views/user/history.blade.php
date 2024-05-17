@extends('user.master')
@section('title', 'Purchase History')
@section('style')
    <style>
        .table-area {
            margin-bottom: 50px;
            /* Adjust the margin-bottom as needed to create some space between the table area and the footer */
        }
    </style>
@endsection
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('cart')
    <a href="{{ route('cartList') }}" class="btn position-relative">
        @if ($cart && count($cart) > 0)
            <img src="{{ asset('user/img/core-img/bag.svg') }}"  class="mb-2">
            <span style="margin-top:32px; margin-left:10px"
                class="position-absolute start-80 me-5 translate-middle badge rounded-pill bg-light">
                {{ count($cart) }}
                <span class="visually-hidden">unread messages</span>
            </span>
        @else
            <img src="{{ asset('user/img/core-img/bag.svg') }}" class="mb-2">
            <span style="margin-top:32px; margin-left:10px"
                class="position-absolute start-80 me-5 translate-middle badge rounded-pill bg-light">
                0
                <span class="visually-hidden">unread messages</span>
            </span>
        @endif
    </a>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            @if (session('alert'))
                <div id="alertMessage" class="text-center alert alert-{{ session('alert')['type'] }}">
                    {{ session('alert')['message'] }}
                </div>
            @endif
            <div class="row">
                <div class="col-3 mt-5">
                    @include('user.sidebar')
                </div>
                @if ($customerPurchases->isEmpty())
                    <p>No Products purchased</p>
                @else

                    <div class="col-9 bg-white p-5 border rounded mt-3">
                            <h2 class="text-center">Purchase History</h2>
                        <br>
                        <table style="background-color:white" id="myTable" class="hover compact stripe">

                            <thead style="background-color: rgb(26, 26, 26); color:white; height: 20px;">

                                <tr>
                                    <td style="text-align:center">No</td>
                                    <td style="text-align:center">Invoice ID</td>
                                    <td style="text-align:center">Total Quantity</td>
                                    <td style="text-align:center">Total Price</td>
                                    <td style="text-align:center">Date</td>
                                    <td style="text-align:center">Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $counter = 1;
                                    $totalCustomerPurchases = $customerPurchases->count();
                                @endphp
                                @foreach ($customerPurchases as $customerPurchase)
                                    <tr>
                                        <td style="text-align:center; color: black">{{ $totalCustomerPurchases-- }}</td>
                                        <td style="text-align:center; color: black">{{ $customerPurchase->invoice_id }}</td>
                                        <td style="text-align:center; color: black">{{ $customerPurchase->total_quantity }}
                                        </td>
                                        <td style="text-align:center; color: black">{{ $customerPurchase->total_price }}
                                        </td>
                                        {{-- <td style="text-align:center; color: black">{{ $customerPurchase->payment_method }}</td> --}}
                                        <td class="col-lg-1" style="text-align:center;">
                                            {{ \Carbon\Carbon::parse($customerPurchase->created_at)->format('F j, Y') }}
                                        </td>
                                        <td style="text-align:center; color: black">
                                            <a href="{{ route('user.history_detail', $customerPurchase->id) }}">
                                                {{-- <button class="btn btn-outline-primary btn-lg border-0"
                                                title="customer purchase detail">
                                                <i class="fa fa-file"></i>
                                            </button> --}}
                                                {{-- <button class="btn btn-dark btn-md border-2 rounded"
                                                    title="supplier purchase detail">
                                                    Details

                                                </button> --}}
                                                <p style="color: black;"><strong>Details</strong> <i class="fa fa-arrow-right"></i></p>

                                            </a>
                                        </td>
                                    </tr>
                                    @php
                                        $counter++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                @endif

            </div>
            <br><br>
        </div>
        <br><br><br>
    </div>
    @endsection
