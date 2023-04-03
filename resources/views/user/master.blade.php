<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!--  website icon -->
    {{-- <link rel="shortcut icon" href="favicon.ico" type="image/x-icon"> --}}


    <!-- bootstrap css-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- my custom css-->
    <link rel="stylesheet" href="{{ asset('css/user/user-master.css') }}">
    <title>Personal</title>
</head>
<body class="bg-secondary">
<div class="container-fluid">
    <nav class=" border-bottom navbar  navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
        <span href="" class="navbar-brand p-0">
            <i class="fa-solid fa-bars fw-bold text-black catMenuItem mx-2"></i>
            <i class="fa-solid fa-xmark fw-bold text-black hideBtn mx-2"></i>
            <h1 class="m-0">SAN</h1>
            <!-- <img src="img/logo.png" alt="Logo"> -->
        </span>
        <h5 class="text-black fw-bold d-flex m-auto">Stop At Nothing </h5>
        <button class="navbar-toggler btn btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <i class="fa-solid fs-sm fa-bars-staggered"></i>
        </button>
        <div class="collapse navbar-collapse " id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0 d-flex justify-content-around" >
                <small><img src="" class="weatherImg hideDiv mx-2 text-small" alt=""></small>
                <p class="cityName hideDiv fs-4 text-black fw-bold mt-1 mx-2"></p>
                <p class="degreeF hideDiv fs-4 text-black fw-bold mt-1 mx-2"></p>
                <p class="descriptionWeahter hideDiv fs-4 text-black fw-bold mt-1 mx-2"></p>
                <input type="text" class="form-control wealthInput hideDiv my-2" placeholder="Enter City Name" name="city" id="" style="width:200px; height:45px;">
                <a href="{{ route('users#homePage') }}" title="home" class="mx-2 nav-item nav-link active"><i id="homeIcon" class="fa-solid fa-house fs-4 text-black "></i></a>
            </div>
            <butaton type="button" class="btn text-blue fs-4 ms-3" data-bs-toggle="modal" data-bs-target="#goToSearchModal"><i id="searchIcon" class="fa fa-search "></i></butaton>
            <butaton  type="button" class="btn text-blue fs-4 ms-3"><i id="weathierIocn" class="fa-solid  fa-cloud-sun-rain fs-4"></i></butaton>
            <a href="#" class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3">Pro Version</a>
        </div>
        <a href="{{ route('user#profilePage') }}" class="btn btn-secondary text-black fs-4 fw-bold" title="profile" id="myProfile"><i id="profileIcon" class="fa-solid fa-circle-user"></i></a>
    </nav>
   <div class="main-containerCSS bg-secondary">
        <div class="splitCSS left-pane">
            <div class="leftContainer">
                @foreach($categories as $c)
                <a href="{{ route('selectByCategory',$c->category_name) }}" onclick="showByCategory()" class="selectByCategory shadow-sm btn btn-secondary border rounded-4 my-2 d-block" >{{ $c->category_name }}</a>
                @endforeach
            </div>
        </div>

        <!-- Right container-->
        <div class="splitCSS right-pane">
            <div class=" rightContainer row d-flex justify-content-around">
                @yield('mainContent')
            </div>
        </div>

     </div>

   <!-- Full Screen Search Start -->
   <form action="{{ route('users#homePage') }}" method="GET"  class="modal fade" id="goToSearchModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content" style="background: rgba(29, 29, 39, 0.7);">
            <div class="modal-header border-0">
                <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body d-flex align-items-center justify-content-center">
                <div class="input-group" style="max-width: 600px;">
                    <input name="key" type="text" class="form-control text-white fs-4 bg-transparent border-light p-3" placeholder="Type search keyword">
                    <button type="submit" class="btn btn-primary px-4"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>
    </div>
   </form>
   <!-- Full Screen Search End -->
</div>


</body>
<!-- bootsrap js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- jQuery js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

<!-- my custom js -->
<script src="{{ asset('js/user/user-master.js') }}"></script>
</html>
@yield('script')
