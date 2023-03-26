<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/admin/home.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/css/bootstrap.min.css" integrity="sha512-SbiR/eusphKoMVVXysTKG/7VseWii+Y3FdHrt0EpKgpToZeemhqHeZeLWLhJutz/2ut2Vw1uQEj2MbRF+TVBUA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
        <div class="containerHome">
            <div class="left-pane">
              <!-- Content for left pane goes here -->
             <div class="container">
                <nav class="stickyNavbar">
                <button class=" mx-auto btn btn-danger btn-sm text-black fw-bold tex-center" onclick="history.back()"><i class="fa-solid fa-left-long"></i></button>
                <button class="btn btn-dark m-2 ">Home</button>
                </nav>
                @foreach($categories as $c)
                <button class="btn btn-dark m-2 ">{{ $c->category_name }}</button>
                @endforeach


             </div>

            </div>
            <div class="right-pane">
                <nav class="stickyNavbar right-side-navbar btn btn-light d-flex justify-content-around">
                    <div class="d-flex mx-2 p-2">
                        {{-- <button class="mx-3 btn btn-primary btn-sm text-black fw-bold tex-center" onclick="history.back()"><i class="fa-solid fa-left-long"></i></button> --}}
                        <button class="mx-3 navbar-toggler manueStick" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"><i class="fa-solid fa-bars-staggered"></i></button>
                    </div>
                <button class="btn btn-dark m-auto">Myanmar</button>
                <button class="btn btn-dark m-auto">Myanmar</button>
                <button class="btn btn-dark m-auto">Myanmar</button>
                </nav>
                <div class="show-post-div container row mr-3 my-2">
                    <div class="col-lg-3 col-md-4 col-sm-6 m-auto p-2">
                        <img src="{{ asset('img/portfolio-2.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 m-auto p-2">
                        <img src="{{ asset('img/portfolio-2.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 m-auto p-2">
                        <img src="{{ asset('img/portfolio-2.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 m-auto p-2">
                        <img src="{{ asset('img/portfolio-2.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 m-auto p-2">
                        <img src="{{ asset('img/portfolio-2.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 m-auto p-2">
                        <img src="{{ asset('img/portfolio-2.jpg') }}" alt="">
                    </div>
                    <div class="col-lg-3 col-md-4 col-sm-6 m-auto p-2">
                        <img src="{{ asset('img/portfolio-2.jpg') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
<script src="{{ asset('js/admin/home.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


