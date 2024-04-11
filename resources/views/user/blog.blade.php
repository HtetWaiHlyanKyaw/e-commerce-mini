@extends('user.master')
@section('title', 'Blog Page')
@section('content')
    <div class="container" style="margin-top:50px; margin-bottom: 50px;">
        <div class="row">
            <div class="col-lg-6">
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

            <div class="col-lg-6">
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
