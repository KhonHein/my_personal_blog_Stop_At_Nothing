@extends('admin.master')
@section('title','AdminDashboard')
@section('content')
<!--Main Section Start-->
<div class="container-xxl py-5 mb-5">
    <button class="btn btn-dark ms-4" onclick="history.back()"><i class="fa-solid fa-left-long" class="backArrow"></i></button>
    <div class="container my-5 py-5 px-lg-5 w3-container w3-center w3-animate-zoom">
        <div class="row g-5 py-5">
            <div class="col-lg-6 text-center text-lg-start">
                <h4 class="text-black fw-bold my-3">Stop At Nothing!</h4>
                <h5 class="text-black fw-bold mb-4">This is my developing junor full-stack state project based on PHP , Laravel,JavaScript,Bootstrap,jQuery,mySql,HTML,CSS. </h5>
                <p class="fontTimeNewItalic fs-5 fw-bold mt-2 text-black">I learned php , laravel, and Vue.js for fullstack from <a href="https://web.facebook.com/codelab.mm/" class="text-warning fw-bold" target="_blank">Code Lab</a> which is founded by <span class="text-white fs-bold">Sayar Sithu</span>.
                    And I learned UI concept from <a href="https://www.youtube.com/@MSquareProgramming" class="text-warning fw-bold" target="_blank">M-Square Programming </a>which is founded by <span class="text-white fw-bold">Sayar Kachin-Taung-Paw_Thar-Lay</span>,
                    and I learned and got project Idea from <a href="https://www.youtube.com/@SoeThihaNaung" class="text-warning fw-bold" target="_blank">Sayar Soe Thiha Naung</a> who is training many developers at <span class="text-white fw-bold">Myanmar-Land</span> youtube Channel .
                    And sometime I refrenced from <a href="https://www.youtube.com/@brightermyanmar6441" class="text-warning fw-bold" target="_blank">Brighter Myanmar-72-coder </a> -YouTube Channel which is founded of <span class="text-white fw-bold">Sayar Waiferkolar</span>.And else I got learned from<a href="https://www.youtube.com/@myanmarprogrammingtutorial8752" class="text-warning fw-bold" target="_blank">Sayar Ye Myint Soe</a> . And I got the weather open api idea from <a href="" class="text-warning fw-bold" target="_blank">Dgtech Myanmar</a>
                    youtube Channel,I'm sorry about not knowing his name.
                    I konw about matching language basic, and OOP some concepts, and basic C++ and J2SE, from <a href="" class="text-warning fw-bold" target="_blank">Myanmar-Pyi</a> online class.
                    And I got some idea to specialize one Language and experiences from <a href="https://www.youtube.com/@saturngod" class="text-warning fw-bold" target="_blank"> Saya SayTurngod </a>.
                </p>
                <a href="" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-3 animated slideInLeft">Free Quote</a>
                <button class="contactMeBtn btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Contact Me </button>
            </div>
            <div class="col-lg-6 text-center text-lg-start">
                <img class="img-fluid coverImg" src="{{ asset('img/coverImg.png') }}" alt="">
                <div class="contactMeDiv my-5 form-control mx-auto bg-secondary">
                    <p class="fontTimeNewItalic my-3 fs-5 fw-bold text-black"><i class="text-warning fs-3 fa-regular fa-circle-user"></i>:-  Ko Khon Hein </p>
                    <p class="fontTimeNewItalic my-3 fs-5 fw-bold text-black"><i class="text-white fs-3 fa-regular fa-envelope"></i>:-  www.thmarazewa@gmail.com </p>
                    <p class="fontTimeNewItalic my-3 fs-5 fw-bold text-black"><i class="text-danger fs-3 fa-solid fa-map-location-dot"></i>:- Mohnyin</p>
                    <p class="fontTimeNewItalic my-3 fs-5 fw-bold text-black"><i class="text-primary fs-3 fa-solid fa-mobile-screen"></i>:- 09893102188</p>
                   </div>
            </div>
        </div>
    </div>
</div>

<!--Main Section end -->
@endsection

