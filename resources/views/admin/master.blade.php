<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">
    @yield('cssLink')
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/admin/index.css') }}" rel="stylesheet">
</head>

<body>
    <div class="container-xxl bg-secondary p-0">
        <!-- Navbar Start -->
        <div class="container-xxl position-relative p-0">
            <nav class=" bg-secondary border-bottom navbar sticky navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="m-0">MY<span class="fs-5">Personal Blog</span></h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <h5 class="text-black fw-bold d-flex m-auto">Stop At Nothing </h5>
                <button class="navbar-toggler manueStick" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <i class="fa-solid fa-bars-staggered"></i>
                </button>
                <div class="collapse navbar-collapse " id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 d-flex justify-content-around" >
                        <a href="{{ route('admin#homePage') }}" title="home" class="mx-2 nav-item nav-link active"><i class="fa-solid fa-house fs-4 text-black "></i></a>
                        <a href="{{ route('admin#changeRole') }}" title="user-list" class="mx-2 nav-item nav-link"><i class="fa-solid fa-users-line fs-4 text-black "></i></a>
                        <a href="{{ route('admin#addPostPage') }}" title="add-posts" class="mx-2 nav-item nav-link"><i class="fa-solid fa-file-circle-plus fs-4 text-black "></i></a>
                    </div>
                    <butaton type="button" class="btn text-blue fs-4 ms-3" data-bs-toggle="modal" data-bs-target="#goToSearchModal"><i class="fa fa-search"></i></butaton>
                    <a href="#" class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3">Pro Version</a>
                </div>

                <a href="{{ route('admin#profilePage')}}" class="btn btn-secondary text-black fs-4 fw-bold" title="profile" id="myProfile"><i class="fa-solid fa-circle-user"></i></a>
            </nav>
            <div class="mainDiv">
            <!--Main Section Start-->
             @yield('content')
             <!--Main Section end -->
            </div>

        </div>
        <!-- Navbar  End -->

        <!-- Full Screen Search Start -->
        <form action="{{ route('admin#homePage') }}" method="GET"  class="modal fade" id="goToSearchModal" tabindex="-1">
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

         <!-- Footer Start -->
         <div class="container-fluid bg-secondary text-light footer mt-5 pt-5 fadeIn" data-wow-delay="0.1s">
            <div class="container py-4 px-lg-4">
                <div class="row g-5 justify-content-around border rounded border-top mx-5">
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Get In Touch</h5>
                        <p><i class="fa fa-map-marker-alt me-3"></i>123 Street, New York, USA</p>
                        <p><i class="fa fa-phone-alt me-3"></i>09893102188</p>
                        <p><i class="fa fa-envelope me-3"></i>www.thmarazewa@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Project Gallery</h5>
                        <div class="row g-2">
                            <div class="col-4">
                                <img class="img-fluid" src="{{ asset('img/portfolio-1.jpg') }}" alt="Image">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="{{  asset('img/portfolio-2.jpg') }}" alt="Image">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="{{  asset('img/portfolio-3.jpg') }}" alt="Image">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="{{  asset('img/portfolio-4.jpg') }}" alt="Image">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="{{  asset('img/portfolio-5.jpg') }}" alt="Image">
                            </div>
                            <div class="col-4">
                                <img class="img-fluid" src="{{  asset('img/portfolio-6.jpg') }}" alt="Image">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3">
                        <h5 class="text-white mb-4">Newsletter</h5>
                        <p>Lorem ipsum dolor sit amet elit. Phasellus nec pretium mi. Curabitur facilisis ornare velit non vulpu</p>
                        <div class="position-relative w-100 mt-3">
                            <input class="form-control border-0 rounded-pill w-100 ps-4 pe-5" type="text" placeholder="Your Email" style="height: 48px;">
                            <button type="button" class="btn shadow-none position-absolute top-0 end-0 mt-1 me-2"><i class="fa fa-paper-plane text-primary fs-4"></i></button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container px-lg-5">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Stop At Nothing</a>, All Right Reserved.
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary bg-secondary btn-lg-square back-to-top pt-2 float-end"><i class="bi bi-arrow-up "></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
<!-- Template Javascript -->
<script src="{{ asset('js/admin/index.js')}}"></script>
<!-- JQuery link-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@yield('script')
</html>

