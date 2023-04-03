@extends('user.master')
@section('mainContent')
<!--Main Section Start-->
<div class="container-xxl py-5 mb-5">
    <button class="btn btn-dark ms-4" onclick="history.back()"><i class="fa-solid fa-left-long" class="backArrow"></i></button>
    <div class="container my-5 py-5 px-lg-5 w3-container w3-center w3-animate-zoom">
        @if (Session::has('changedProfile'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Dear {{ Auth::user()->name }} !</strong>{{ Session::get('changedProfile') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if (Session::has('updateSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Dear {{ Auth::user()->name }} !</strong>{{ Session::get('updateSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        @if(Session::has('confirmFail'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Dear {{ Auth::user()->name }} !</strong>{{ Session::get('confirmFail') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

        {{-- pass validation Message --}}
        @error('newPassword')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Dear!.{{ Auth::user()->name }} </strong> {{ $message }}
            <button type="button" class="btn bg-white btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @enderror
        @error('confirmPassword')
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Dear!.{{ Auth::user()->name }} </strong> {{ $message }}
            <button type="button" class="btn bg-white btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @enderror
        @error('oldPassword')
        <div class="alert alert-warning fade show" role="alert">
            <strong>Dear!.{{ Auth::user()->name }} </strong> {{ $message }}
            <button type="button" class="btn bg-white btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @enderror


        <form class="row g-5 py-5" action="{{route('user#profileEdit')}}" method="POST" enctype="multipart/form-data" >
            @csrf
            <div class="col-lg-6 text-center text-lg-start">
                @if(Auth::user()->image != null )
                <img class="img-fluid previewImage ppImage border border-1 img-thumbnail border border-white" src="{{ asset( 'storage/'.Auth::user()->image) }}" alt="">
                @else
                    @if(Auth::user()->gender === 'male')
                        <img class="img-fluid previewImage ppImage  border border-1" src="{{ asset('img/coverImg.png') }}" alt="">
                        @elseif(Auth::user()->gender ==='female')
                        <img class="img-fluid previewImage ppImage  border border-1" src="{{ asset('img/femaleCover.png') }}" alt="">
                        @elseif(Auth::user()->gender === null)
                        <img class="img-fluid previewImage ppImage  border border-1" src="{{ asset('img/null.png') }}" alt="">
                    @endif
                @endif
                <input type="file" name="userImage" onchange="previewImage()" class="inputPreviewImage  border  rounded-5 my-2 mx-auto d-flex justify-content-center form-control bg-secondary" style="width:200px; height:auto;">
            </div>
            <div class="col-lg-6 text-center text-lg-start">


                @error('userName') <p><strong class="text-danger">{{ $message }}</strong></p> @enderror
                <input type="text" name="userName" class="text-black mb-4 form-control bg-secondary" value="{{ old('userName',Auth::user()->name) }}">

                @error('userEmail') <p><strong class="text-danger">{{ $message }}</strong></p> @enderror
                <input type="email" name="userEmail" class="text-black pb-3 mb-4 animated zoomIn form-control bg-secondary" value="{{ old('userEmail',Auth::user()->email) }}">

                @error('userAddress') <p><strong class="text-danger">{{ $message }}</strong></p> @enderror
                <input type="text" name="userAddress" class="text-black pb-3 mb-4 animated zoomIn form-control bg-secondary" value="{{ old('userAddress',Auth::user()->address) }}">

                @error('userPhone') <p><strong class="text-danger">{{ $message }}</strong></p> @enderror
                <input type="number" name="userPhone" class="text-black pb-3 mb-4 animated zoomIn form-control bg-secondary" value="{{ old('userPhone',Auth::user()->phone) }}">

                <label for="userId">User Id</label>
                <input type="text" disabled class="my-2 rounded border text-black animated zoomIn bg-secondary" name="userId" id="userId" value="{{ Auth::user()->id }}">

                <select name="userGender" id="" class="form-control bg-secondary">
                    <option class="form-control m-1" @if(Auth::user()->gender ==='male') selected @endif  value="male">Male</option>
                    <option class="form-control m-1" @if(Auth::user()->gender ==='female') selected @endif  value="female">Female</option>
                </select>
                <p class="text-white mb-1 pb-3  zoomIn">{{ Auth::user()->role }}</p>

                <button type="submit" class="btn btn-outline-warning py-sm-3 px-sm-5 rounded-pill animated slideInRight">Save</button>
                <span onclick="showPassDiv()" class="btn btn-light py-sm-3 px-sm-5 rounded-pill me-1 updatePassBtn">Update Password</span>
            </div>
        </form>

       <form action="{{ route('logout') }}" method="post">
        @csrf
        <button type="submit" class="btn btn-outline-danger d-flex justify-content-center py-sm-3 px-sm-5 rounded-pill animated slideInRight">Loggout</button>
       </form>

        <form action="{{ route('user#passwordUpdate') }}" method="POST" id="passEditDiv" class="hideDiv form-control justify-content-center rounded-5 text-center">
            @csrf
            <div class=" text-center">
                <button id="closePassword" class="btn btn-close btn-success btn-outline-danger"></button>
            </div>
            <label class="text-warning" for="newPassword">Add new Password</label>
            <input type="password" name="newPassword" id="newPassword" class="form-control bg-transparent border-light p-3 text-white" placeholder="Type new password">

            <label for="confirmPassword" class="text-warning">Confrim Password</label> @error('confirmPassword') <label for="confirmPassword" class="text-danger fw-bold">{{ $message }}</label> @enderror
            <input type="password" name="confrimPassword" id="confirmPassword" class="form-control bg-transparent border-light p-3 text-white" placeholder="Type new password">

            <label for="oldPassword" class="text-warning">Confrim Old Password</label> @error('oldPassword') <label for="oldPassword" class="text-danger fw-bold">{{ $message }}</label> @enderror
            <input type="password" name="oldPassword" id="oldPassword" class="form-control bg-transparent border-light p-3 text-white" placeholder="Type new password">

            <button id="editPass" type="submit" class=" m-auto form-control-outline-light my-2 py-sm-3 px-sm-5 rounded-pill">Edit and Save</button>
        </form>
    </div>
</div>
<!--Main Section end -->
@endsection


