@extends('user.master')
@section('title', 'Blog Page')
@section('cart')
    <a href="{{ route('cartList') }}" class="btn position-relative">
        @if ($cart && count($cart) > 0)
            <img src="{{ asset('user/img/core-img/bag.svg') }}" class="mb-2">
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
    <div class="container" style="margin-top:50px; margin-bottom: 50px;">
        <div class="row">
            <div class="col-lg-6 mt-5">
                <div class="about-col">
                    <h1>Lorem ipsum dolor sit amet consectetur adipisicing elit</h1>
                    <p class="text-justify">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta est facere voluptatum repellat,
                        eius sapiente. Quaerat eos ullam deserunt nulla ducimus fugit alias, blanditiis harum commodi rem
                        quam earum vero? Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta est facere
                        voluptatum repellat, eius sapiente. Quaerat eos ullam deserunt nulla ducimus fugit alias,
                        blanditiis harum commodi rem quam earum vero? Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Soluta est facere voluptatum repellat, eius sapiente. Quaerat eos ullam deserunt nulla
                        ducimus fugit alias, blanditiis harum commodi rem quam earum vero? Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Soluta est facere voluptatum repellat, eius sapiente. Quaerat eos
                        ullam deserunt nulla ducimus fugit alias, blanditiis harum commodi rem quam earum vero? Lorem
                        ipsum dolor sit amet consectetur adipisicing elit. Soluta est facere voluptatum repellat, eius
                        sapiente. Quaerat eos ullam deserunt nulla ducimus fugit alias, blanditiis harum commodi rem
                        quam earum vero? Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta est facere
                        voluptatum repellat, eius sapiente. Quaerat eos ullam deserunt nulla ducimus fugit alias,
                        blanditiis harum commodi rem quam earum vero? Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Soluta est facere voluptatum repellat, eius sapiente. Quaerat eos ullam deserunt nulla
                        ducimus fugit alias, blanditiis harum commodi rem quam earum vero? Lorem ipsum dolor sit amet
                        consectetur adipisicing elit. Soluta est facere voluptatum repellat, eius sapiente. Quaerat eos
                        ullam deserunt nulla ducimus fugit alias, blanditiis harum commodi rem quam earum vero?
                    </p>
                </div>
            </div>

            <div class="col-lg-6 mt-5">
                <div class="about-col">
                    <img src="{{asset('images/Store.jpg')}}" alt="">
                </div>
                <div class="about-col">
                    <img src="{{asset('images/Store2.jpg')}}" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
