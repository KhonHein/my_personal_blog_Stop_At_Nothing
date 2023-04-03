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
    {{-- <link href="img/favicon.ico" rel="icon"> --}}

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
        <div class="container-xxl position-relative p-0" >
            <nav class=" bg-secondary navbar sticky navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
                <h3 class="text-black fw-bold d-flex m-auto">Stop At Nothing </h3>
                <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarCollapse">
                    @if (Route::has('login'))
                    <div class="sm:fixed mx-3 my-1  sm:top-0 sm:right-0 p-6 text-right">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}" class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3">Log in</a>

                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-secondary text-light rounded-pill py-2 px-4 ms-3">Register</a>
                            @endif
                        @endauth
                    </div>
                    @endif
                </div>
            </nav>
            <div class="mainDiv d-flex justify-content-around row">
                <!--Main Section Start-->
                <div class="col-md-5 my-5 mx-auto">
                    <a href="https://web.facebook.com/sai.bwathmara.9/" target="_blank" >
                        <img class="khonImg Hein border rounded-5 rounded-circle" src="{{ asset('img/khon.jpg') }}" alt="">
                        <img class="khonImg Certi border rounded-5 rounded-circle" src="{{ asset('img/certi.jpg') }}" alt="" style="width:500px; height:auto;">
                    </a>
                    <div class="fontTimeNewItalic text-white fs-3 seeCerti"><button class="btn border rounded-5">see certificate</button></div>
                    <div class="fontTimeNewItalic text-white fs-3 hideCerti"><button class="btn border rounded-5">hide certificate</button></div>
                    <p class="fontTimeNewItalic fs-3 fw-bold my-2 text-black">How I studied and where I learned from </p>
                    <p class="fontTimeNewItalic fs-5 fw-bold mt-2 text-black">I learned php , laravel, and Vue.js for fullstack from <a href="https://web.facebook.com/codelab.mm/" class="text-warning fw-bold" target="_blank">Code Lab</a> which is founded by <span class="text-white fs-bold">Sayar Sithu</span>.
                        And I learned UI concept from <a href="https://www.youtube.com/@MSquareProgramming" class="text-warning fw-bold" target="_blank">M-Square Programming </a>which is founded by <span class="text-white fw-bold">Sayar Kachin-Taung-Paw_Thar-Lay</span>,
                        and I learned and got project Idea from <a href="https://www.youtube.com/@SoeThihaNaung" class="text-warning fw-bold" target="_blank">Sayar Soe Thiha Naung</a> who is training many developers at <span class="text-white fw-bold">Myanmar-Land</span> youtube Channel .
                        And sometime I refrenced from <a href="https://www.youtube.com/@brightermyanmar6441" class="text-warning fw-bold" target="_blank">Brighter Myanmar-72-coder </a> -YouTube Channel which is founded of <span class="text-white fw-bold">Sayar Waiferkolar</span>.And else I got learned from<a href="https://www.youtube.com/@myanmarprogrammingtutorial8752" class="text-warning fw-bold" target="_blank">Sayar Ye Myint Soe</a> . And I got the weather open api idea from <a href="" class="text-warning fw-bold" target="_blank">Dgtech Myanmar</a>
                        youtube Channel,I'm sorry about not knowing his name.
                        I konw about matching language basic, and OOP some concepts, and basic C++ and J2SE, from <a href="" class="text-warning fw-bold" target="_blank">Myanmar-Pyi</a> online class.
                        And I got some idea to specialize one Language and experiences from <a href="https://www.youtube.com/@saturngod" class="text-warning fw-bold" target="_blank"> Saya SayTurngod </a>.
                    </p>
                </div>
                <div class="col-md-5 my-5 mx-auto text-center text-black">
                    <h3 class="text-black fs-1 mt-2 d-inline-block">Hi</h3><span class="text-warning fs-1">!</span>
                   <h4 class="text-black fs-3 fw-bold mt-2">I'm Khon Hein</h4>
                   <p class="fontTimeNewItalic fs-4 fw-bold mt-2">For the UI, I used Html,Css,JavaScript,Bootstrap,jQuery and VueJs .</p>
                   <p class="fontTimeNewItalic fs-4 fw-bold mt-2">As a backend , I used PHP, and it's framework, the Laravel, and mySql is for database , Ajax to fetch the data from API. Now I'm studying ReactJs.</p>
                   <strong class="fontTimeNewItalic fs-5 fw-bolder text-black">I'm Server, I'm API, I'm Client.</strong>


                   <div class="my-3 mx-auto">
                    <p class="fontTimeNewItalic my-3 fs-5 fw-bold text-black">Register Sing up or Login  And visit to my personal website. </p>
                    <p class="fontTimeNewItalic my-3 fs-5 fw-bold text-black">If you have some any Idea , you can leave some comment .</p>
                    <p class="fontTimeNewItalic my-3 fs-5 fw-bold text-black">If you have some project , you can contact me to join your team .</p>
                    <p class="fontTimeNewItalic my-3 fs-5 fw-bold text-black">Thanks.</p>
                   </div>
                   <p class="fontTimeNewItalic fs-3 fw-bold my-2 text-warning">At first , if you didn't succeed, call it version 1.0;</p>
                   <button class="welcomeContact btn btn-outline-light mt-5 py-sm-3 px-sm-5 rounded-pill animated slideInRight">Contact Me </button>
                   <div class="welcomeContactDiv form-control mt-3 mx-4 bg-secondary">
                    <p class="fontTimeNewItalic my-3 fs-5 fw-bold text-black"><i class="text-warning fs-3 fa-regular fa-circle-user"></i>:-  Ko Khon Hein </p>
                    <p class="fontTimeNewItalic my-3 fs-5 fw-bold text-black"><i class="text-white fs-3 fa-regular fa-envelope"></i>:-  www.thmarazewa@gmail.com </p>
                    <p class="fontTimeNewItalic my-3 fs-5 fw-bold text-black"><i class="text-danger fs-3 fa-solid fa-map-location-dot"></i>:- Mohnyin</p>
                    <p class="fontTimeNewItalic my-3 fs-5 fw-bold text-black"><i class="text-primary fs-3 fa-solid fa-mobile-screen"></i>:- 09893102188</p>
                   </div>
                </div>
                <!--Main Section end -->
            </div>

        </div>
    </div>
        <!-- Navbar  End -->
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>
<!-- JQuery link-->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="{{ asset('js/admin/index.js') }}"></script>

</html>
<script>
    $khonImg = $(`.khonImg`);
    $khonImg.hover(()=>{
        $khonImg.removeClass('rounded-circle')
    });
    $khonImg.mouseleave(()=>{
        $khonImg.addClass('rounded-circle')
    });

    //contact me show and hide
$(`.welcomeContactDiv`).hide();
$(`.welcomeContact`).click(() => {
        $(`.welcomeContact`).hide();
        $(`.welcomeContactDiv`).show();
});
$(`.welcomeContactDiv`).click(() => {
        $(`.welcomeContactDiv`).hide();
        $(`.welcomeContact`).show();
})

    //seeCerti hideCerti
    $(`.hideCerti`).hide();
    $(`.Certi`).hide();
$(`.seeCerti`).click(() => {
        $(`.seeCerti`).hide();
        $(`.hideCerti`).show();

        $(`.Certi`).show();
        $(`.Hein`).hide();
});
$(`.hideCerti`).click(() => {
        $(`.hideCerti`).hide();
        $(`.seeCerti`).show();

        $(`.Hein`).show();
        $(`.Certi`).hide();
})

//div hover
$(`.welcomeContactDiv`).hover(() => {
        $(`.welcomeContactDiv`).addClass('mouseHoverCSS');
})
$(`.welcomeContactDiv`).mouseleave(() => {
        $(`.welcomeContactDiv`).removeClass('mouseHoverCSS');
})

</script>


