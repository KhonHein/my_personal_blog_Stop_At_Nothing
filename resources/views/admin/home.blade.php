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
            <div class="left-pane border border-dark">
              <!-- Content for left pane goes here -->
             <div class="container">
                <nav class="stickyNavbar">
                <button class=" mx-auto btn btn-danger btn-sm text-black fw-bold tex-center" onclick="history.back()"><i class="fa-solid fa-left-long"></i></button>
                <button class="btn btn-dark m-2 " onclick="history.back()">Back</button>
                </nav>

                @foreach($categories as $c)
                <a href="{{ route('admin#electByCategory',$c->category_name) }}" onclick="showByCategory()" class="selectByCategory shadow-sm btn btn-secondary border rounded-4 my-2 d-block" >{{ $c->category_name }}</a>
                @endforeach

             </div>

            </div>
            <div class="right-pane">

                    <nav class="stickyNavbar right-side-navbar d-flex justify-content-around bg-secondary border border-dark navbar sticky navbar-expand-lg navbar-light px-4 px-lg-5 py-3 py-lg-0">
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

                    <!-- content session-->
                <div class="show-post-div container row mx-auto my-2">
                    @if($posts->count() == 0)
                        <div class="col-lg-3 col-md-4 col-sm-5 m-auto p-1 hoverOverTheImage">
                            <h4 class="my-5 text-center ">There is no post</h4>
                        </div>
                    @else
                    @foreach($posts as $p)
                    <a href="{{ route('admin#postDetails',$p->id) }}" class="myElement col-sm-6 col-md-4 col-lg-3 border border-left-0  rounded-2 m-2 justify-content-center text-center rightContentChildCiv hoverOver">
                        @if($p->image != null)
                        <img class="listImg rounded mt-1" src="{{  asset('storage/'.$p->image) }}" alt="" srcset="">
                        @else
                            @if(Auth::user()->gender === 'female')
                            <img class="listImg rounded mt-1" src="{{  asset('img/femalePostDefault.jpg') }}" alt="" srcset="">
                            @elseif(Auth::user()->gender === 'male')
                            <img class="listImg rounded mt-1" src="{{  asset('img/malePostDefault.png') }}" alt="" srcset="">
                            @else
                            <img class="listImg rounded mt-1" src="{{  asset('img/null.png') }}" alt="" srcset="">
                            @endif
                        @endif
                        <p class="text-black fw-bold">{{ $p->title }}</p>
                        <audio src="{{ asset('storage/'.$p->sound) }}" controls class="my-2 myAudio" type="audio/mpeg" style="width:200px; height:30px;"></audio>
                    </a>
                    @endforeach
                    {{-- @foreach($posts as $p)
                        <div class="col-lg-3 col-md-4 col-sm-5 m-auto p-1 hoverOverTheImage">
                            <a href="{{ route('admin#postDetails',$p->id) }}" class="card mb-3 form-control border border-2 rounded-4">
                                @if($p->image != null)
                                <img class="card-img-top" src="{{ asset('storage/'.$p->image) }}" alt="">
                                @else
                                <img class="card-img-top" src="{{ asset('img/null.png') }}" alt="">
                                @endif

                                <div class="card-body">
                                <h5 class="card-title">{{ $p->title }}</h5>
                                <p class="card-text">
                                    {{ implode(' ', array_slice(str_word_count($p->description, 1), 0, 3)) }}
                                        @if (str_word_count($p->description) > 3)
                                                <p class="read-more-link">Read more</p>
                                        @endif
                                </p>
                                <audio src="{{ asset('storage/'.$p->sound) }}" controls style="width:200px;"></audio>
                                </div>
                            </a>
                        </div>
                    @endforeach --}}
                    @endif
                </div>

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

            </div>
        </div>
</body>
</html>
<script src="{{ asset('js/admin/home.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.2.3/js/bootstrap.min.js" integrity="sha512-1/RvZTcCDEUjY/CypiMz+iqqtaoQfAITmNSJY17Myp4Ms5mdxPS5UV7iOfdZoxcGhzFbOm6sntTKJppjvuhg4g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


