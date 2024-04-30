@extends('user.master')
@section('title', 'Purchase History')
@section('csrf')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
@section('cart')
    <a href="#" class="btn position-relative">
        @if ($cart && count($cart) > 0)
            <img src="{{ asset('user/img/core-img/bag.svg') }}" alt="">
            <span style="margin-top:32px; margin-left:10px"
                class="position-absolute start-80 me-5 translate-middle badge rounded-pill bg-light">
                {{ count($cart) }}
                <span class="visually-hidden">unread messages</span>
            </span>
        @else
            <img src="{{ asset('user/img/core-img/bag.svg') }}" alt="">
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
@if ($customerPurchases->isEmpty())
        <p>No Products purchased</p>
@else

        {{-- <div class="col-lg-8"> --}}
<table style="background-color:white" id="myTable" class="hover compact">

    <thead style="background-color: white; color:black;">

        <tr>
            <th style="color: #5d9bff; text-align:center">Invoice ID</th>
            <th style="color: #5d9bff; text-align:center">Total Quantity</th>
            <th style="color: #5d9bff; text-align:center">Total Price</th>
            <th style="color: #5d9bff; text-align:center">Date</th>
            <th style="color: #5d9bff; text-align:center">Action</th>
        </tr>
    </thead>
    <tbody>

        @foreach ($customerPurchases as $customerPurchase)
            <tr>
                <td style="text-align:center; color: black">{{ $customerPurchase->invoice_id }}</td>
                <td style="text-align:center; color: black">{{ $customerPurchase->total_quantity }}</td>
                <td style="text-align:center; color: black">{{ $customerPurchase->total_price }}</td>
                {{-- <td style="text-align:center; color: black">{{ $customerPurchase->payment_method }}</td> --}}
                <td style="text-align:center; color: black">
                    {{ $customerPurchase->created_at->format('d / M /Y') }}</td>
                <td style="text-align:center; color: black">
                    <a href="{{route('user.history_detail', $customerPurchase->id)}}">
                        <button class="btn btn-outline-primary btn-lg border-0"
                            title="customer purchase detail">
                            <i class="fa fa-file"></i>
                        </button>
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endif
{{-- </div> --}}
</div>
</div>
@endsection

