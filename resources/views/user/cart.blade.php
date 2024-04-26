@extends('user.master')
@section('title', 'cart')
@section('content')
    <div class="container-fluid mb-5" style="margin-top: 150px;">

        @if (count($data) == 0)
            <h5 class="text-center">There is no <span class="text-danger">Cart Data!</span></h5>
        @else
            <div class="row">
                {{-- left Cart side --}}
                <div class="col-lg-8 col-12">
                    <table>

                    </table>


                </div>







                {{-- Right Cart side --}}
                <div class="col-lg-4 col-12"></div>
            </div>
        @endif
    </div>
@endsection
