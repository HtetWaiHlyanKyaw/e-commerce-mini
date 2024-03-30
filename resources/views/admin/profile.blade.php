@extends('admin.layouts.master')
@section('title', 'Dashboard')

@section('style')

@endsection

@section('content')
       <h2>User Profile</h2>
      <p>User ID: {{ $user->id }}</p>




@endsection

@section('script')
@endsection
