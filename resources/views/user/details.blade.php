

@extends('user.master')
@section('mainContent')
<!--Main Section Start-->
    <div class="bg-secondary row d-flex justify-content-center">
            <div class="col-lg-6 text-center text-lg-start ">
                <button class="btn btn-dark m-1" onclick="history.back()">
                    <i class="fa-solid fa-left-long" class="backArrow"></i>
                </button>
                @if($post->image !== null )
                <img class="img-fluid hoverOver  img-thumbnail border border-white" src="{{ asset( 'storage/'.$post->image) }}" alt="">
                @else
                    @if(Auth::user()->gender === 'male')
                        <img class="img-fluid hoverOver" src="{{ asset('img/coverImg.png') }}" alt="">
                        @elseif(Auth::user()->gender ==='female')
                        <img class="img-fluid hoverOver" src="{{ asset('img/femaleCover.png') }}" alt="">
                        @elseif(Auth::user()->gender === null)
                        <img class="img-fluid hoverOver" src="{{ asset('img/null.png') }}" alt="">
                    @endif
                @endif

                <p class="text-black fw-bold">{{ $post->title }}</p>
                <audio src="{{ asset('storage/'.$post->sound) }}" controls class="mx-3 my-2"></audio>

                <div class="form-control bg-secondary">
                    @error('postCategory')<label for="selectCategory" class="text-danger fw-bold fs-6">{{ $message }}</label> @enderror
                    <label for="selectCategory" class="m-2 text-black fw-bold">Select category</label>
                    <select name="postCategory" id="selectCategory" class="rounded-3">
                        @foreach($categories as $c)
                        <option value="{{ $c->category_name }}"
                            @if($post->category == $c->category_name) selected
                            @endif class="form-control" >
                            {{ $c->category_name }}
                        </option>
                        @endforeach
                    </select>

                    <label for="status" class="m-2 text-black fw-bold">Visillabe</label>
                    <select name="postStatus" id="status" class="rounded-3">
                        <option value="free" class="form-control">free</option>
                        <option value="pro" class="form-control">pro</option>
                    </select>
                </div>
            </div>
            <div class="my-3 mx-auto d-flex justify-content-center">
                <!-- like -->
                <i id="likeIcon" onclick="clickLikeButton()" class="hoverOver fs-2 fw-bold fa-regular fa-heart"></i>
                <small class="kissedIcon mt-2 mr-2 hideDiv"><i class="fa-solid fa-face-kiss-wink-heart"></i></small>
                <p class="pLcountText mx-1" style="display:inline-block">{{ $post->like_count}}</p>
                <input type="hidden" name="" class="postLikeCount" value="{{ $post->like_count }}">

                <!-- unlike -->
                <i id="unlike" onclick="clickUnlikeButton()" class="hoverOver fa-regular fs-2 ms-5 fa-thumbs-down"></i>
                <small class="angryIocon hideDiv mt-2 mr-2 "><i class="text-danger fa-regular fa-face-angry"></i></small>
                <p class="pULcountText text-black" style="display:inline-block">{{ $post->ulike_count}}</p>
                <input type="hidden" name="" class="postULikeCount" value="{{ $post->ulike_count }}">

                <!-- comment -->
                <i id="comIcon" onclick="clickCommentIcon()" class="hoverOver fa-regular fs-2 ms-5 fa-comment-dots"></i>

                <!-- viwe vount-->
                <input type="hidden" id="viewCount" value="{{ $post->view_count }}">
                <span class="viewCountText d-flex text-black ms-3">{{ $post->view_count }}</span>
                <i class="fa-solid fa-eye-slash text-black fw-bold mt-1"></i>
            </div>  <!-- comment  box -->

            <form class="commentBox hideDiv m-auto">
                <div class="d">
                    <input type="text" id="commentInput" onchange="sendcomment()" class="form-control d-inline-block bg-secondary justify-content-center" style="width:400px;">
                    <i id="sendIcon " onclick="sendcomment()" class="fa-regular text-primary fa-paper-plane fs-4"></i>

                    <input type="hidden" class="postId" value="{{ $post->id }}">
                    <input id="userCommentId" type="hidden" value="{{ Auth::user()->id }}">
                    <input id="userCommentName" type="hidden" value="{{ Auth::user()->name }}">

                    <!-- comments-->
                    @foreach($comments as $cmt)
                    <div class="form-control bg-secondary my-1">
                        <strong class=" my-2 text-black fs-6"> {{ $cmt->user_name }} </strong>
                        <p class=" my-2 mx-1 text-black fs-6"> {{ $cmt->comment_message }} </p>
                        <a href="{{ route('user#deleteCommetn',$cmt->id) }}" class="deleteCommentIcon">
                            <i class="fa-solid fa-trash mx-2 fs-5"></i>
                        </a>
                    </div>
                    @endforeach
                </div>
            </form>

        <div class="">
            <h5 class="text-black text-center">{{ $post->title }}</h5>
            <p class="text-black ">{{ $post->description }}</p>
        </div>
    </div>

<!--Main Section end -->
@endsection

@section('script')
<script>
    $(document).ready(function(){
            $postId =$(`#postId`).val();
            $viewCount = Number($('#viewCount').val());

            $viewCount = $viewCount + 1;
            $('.viewCountText').html($viewCount);
            $data={
                'countNumber' : $viewCount,
                'postId' : $postId
            };

            $.ajax({
                type: 'get',
                url : 'http://127.0.0.1:8000/user/Ajax/view_count',
                data: $data,
                dataType:'json',
                success:'response'
            })
    });
</script>
@endsection




