@extends('admin.master')
@section('title','profile')
@section('content')
<!--Main Section Start-->
<div class="container-xxl py-5 mb-5">
    <button class="btn btn-dark ms-4" onclick="history.back()"><i class="fa-solid fa-left-long" class="backArrow"></i></button>
    <div class="container my-5 py-5 px-lg-5 w3-container w3-center w3-animate-zoom">
        <div class="row g-5 py-5">
            <div class="col-lg-6 text-center text-lg-start">
                <img class="img-fluid" src="{{ asset('img/coverImg.png') }}" alt="">
            </div>
            <div class="col-lg-6 text-center text-lg-start">
                <input type="text" class="text-black mb-4 form-control" value="{{ $user->name }}">
                <input type="text" class="text-black pb-3 mb-4 animated zoomIn form-control" value="{{ $user->email }}">
                <input type="text" class="text-black pb-3 mb-4 animated zoomIn form-control" value="{{ $user->address }}">
                <input type="text" class="text-black pb-3 mb-4 animated zoomIn form-control" value="{{ $user->phone }}">
                <p class="text-white mb-2 pb-3 animated zoomIn">{{ $user->role }}</p>
                <p class="text-white mb-2 pb-3 animated zoomIn">{{ $user->gender }}</p>
                <a href="" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Save</a>
                <a href="" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-1 animated slideInLeft">Update Password</a>
            </div>
        </div>
    </div>
</div>

<!--Main Section end -->
@endsection

