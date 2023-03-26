@extends('admin.master')
@section('title','AdminDashboard')
@section('content')
<!--Main Section Start-->
<div class="container-xxl py-5 mb-5">
    <button class="btn btn-dark ms-4" onclick="history.back()"><i class="fa-solid fa-left-long" class="backArrow"></i></button>
    <div class="container my-5 py-5 px-lg-5 w3-container w3-center w3-animate-zoom">
        <div class="row g-5 py-5">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="text-black fw-bold mb-4">This MyEducation is for all myanmar students. </h1>
                <h4 class="text-black fw-bold">Don't Stop At Nothing!</h4>
                <p class="text-white pb-3 animated zoomIn">Tempor rebum no at dolore lorem clita rebum rebum ipsum rebum stet dolor sed justo kasd. Ut dolor sed magna dolor sea diam. Sit diam sit justo amet ipsum vero ipsum clita lorem</p>
                <a href="" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Free Quote</a>
                <a href="" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Contact Us</a>
            </div>
            <div class="col-lg-6 text-center text-lg-start">
                <img class="img-fluid" src="{{ asset('img/coverImg.png') }}" alt="">
            </div>
        </div>
    </div>
</div>

<!--Main Section end -->
@endsection

