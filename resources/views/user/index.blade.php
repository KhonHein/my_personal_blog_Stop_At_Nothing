@extends('user.master')
@section('mainContent')
        @if($posts->count() == 0)
        <div class="col-lg-3 col-md-4 col-sm-5 m-auto p-1 hoverOverTheImage">
            <h4 class="my-5 text-center ">There is no post</h4>
        </div>
        @else
            @foreach($posts as $p)
            <a href="{{ route('user#postDetails',$p->id) }}" class="myElement col-sm-6 col-md-4 col-lg-3 border border-left-0  rounded-2 m-2 justify-content-center text-center rightContentChildCiv hoverOver">
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
                <audio src="{{ asset('storage/'.$p->sound) }}" controls class="my-2 myAudio" type="audio/mpeg" style="width:250px; height:30px;"></audio>
            </a>
            @endforeach
        @endif
@endsection
