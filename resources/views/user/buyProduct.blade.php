@extends('user.master')
@section('title', 'Product Details & Payment Options')
@section('content')


{{-- {{dd($datas->toArray())}} --}}

<div class="container" style="margin-top:200px">
    <div class="row">
        {{-- Image --}}
        <div class="col-lg-4 " style="margin-bottom: 200px">
            <img class="w-100 shadow " src="{{ asset('storage/products/'. $datas->image)}}" alt="">
        </div>

        <div class="col-lg-8">
            <h4 class="text-danger">{{$datas->brand->name}}</h4>
            <h3>{{$datas->name}}</h3>
            <h4 class="text-danger">$ {{$datas->price}}</h4>

            <p>{{($datas->color)}}</p>
            <p>{{($datas->description)}}</p>
        </div>
    </div>
</div>






















@endsection
