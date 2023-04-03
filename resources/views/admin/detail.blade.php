@extends('admin.master')
@section('title','details')
@section('content')
<!--Main Section Start-->
<div class="container-xxl py-3 mb-5">
    <button class="btn btn-dark ms-4" onclick="history.back()">
        <i class="fa-solid fa-left-long" class="backArrow"></i>
    </button>
    <div class="container my-5 py-5 px-lg-5 w3-container w3-center w3-animate-zoom">
        @if (Session::has('editSuccess'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Dear {{ Auth::user()->name }} !</strong>{{ Session::get('editSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form class="row g-5 py-5" action="{{ route('admin#postEdit') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="col-lg-6 text-center text-lg-start">
                @if($post->image !== null )
                <img class="img-fluid selectPreviewImage  img-thumbnail border border-white" src="{{ asset( 'storage/'.$post->image) }}" alt="">
                @else
                    @if(Auth::user()->gender === 'male')
                        <img class="img-fluid selectPreviewImage ppImage" src="{{ asset('img/coverImg.png') }}" alt="">
                        @elseif(Auth::user()->gender ==='female')
                        <img class="img-fluid selectPreviewImage ppImage" src="{{ asset('img/femaleCover.png') }}" alt="">
                        @elseif(Auth::user()->gender === null)
                        <img class="img-fluid selectPreviewImage ppImage" src="{{ asset('img/null.png') }}" alt="">
                    @endif
                @endif

                <label fro="imgInputFile" class="text-black fw-bold">Add Photo </label>
                <input type="file" name="postImage" title="post-image" id="imgInputFile" onchange="previewImage()" class="inputPreviewImage my-1 rounded-3 border border-light" style="width:200px; height:tuto;">
                 @error('postImage')<label fro="imgInputFile" class="text-danger fw-bold fs-6">{{ $message }}</label> @enderror
                <div class="m-auto form-control my-1">
                    <p class="text-black fw-bold">{{ $post->title }}</p>
                    <audio src="{{ asset('storage/'.$post->sound) }}" controls class="mx-3 my-2"></audio>
                </div>

                <label fro="postSound" class="text-black fw-bold">Add voice </label>
                <input type="file" name="postSound" title="post-sound" id="postSound" class="my-1 rounded-3 border border-light" style="width:200px; height:tuto;">
                @error('postSound') <label fro="postSound" class="text-danger fw-bold fs-6">{{ $message }}</label> @enderror

                <div class="my-3 mx-auto bg-secondary">
                    <!-- like -->
                    <i onclick="clickLikeButton()" id="like" class="mouseHoverCSS fs-3 fw-bold fa-regular fa-heart">
                        <i class="fa-solid fs-3 fw-bold fa-face-kiss-wink-heart text-warning kissedIcon"></i>
                    </i>
                    <p class="pLcountText" style="display:inline-block">{{ $post->like_count}}</p>
                    <input type="hidden" class="postLikeCount" value="{{ $post->like_count}}" />

                    <!-- unlike -->
                    <i id="unlike" onclick="clickUnlikeButton()" class="mouseHoverCSS fa-regular fs-3 ms-5 fa-thumbs-down"></i>
                    <p class="pULcountText" style="display:inline-block">{{ $post->ulike_count}}</p>
                    <input type="hidden" class="postULikeCount" value="{{ $post->unlike_count}}"/>

                    <!-- comment -->
                    <i onclick="showComents()" class="fa-regular fs-3 ms-5 text-white fa-comment-dots mouseHoverCSS commentIcon"></i>

                </div>
                <!-- comment  box -->
                <div class="collapse fade bg-secondary bordar border-1 mx-auto mt-2">
                    <div class="border border-secondary rounded-1 commentBox">
                        <input type="text" name="comment" class="border border-primary rounded-3 mx-auto my-1 p-2 text-black commentInput" onchange="sendComment()" placeholder="write comment">
                        <button type="reset" class="border rounded-3"><i class="fa-solid fs-4 fa-paper-plane sendCommentBtn" onclick="sendComment()" class="display:inline-block;"></i></button>

                        <input id="userCommentId" type="hidden" value="{{ Auth::user()->id }}">
                        <input id="userCommentName" type="hidden" value="{{ Auth::user()->name }}">
                        <!-- comments-->
                        @foreach($comments as $cmt)
                        <div class="form-control">
                            <strong class=" my-2 text-black fs-6"> {{ $cmt->user_name }} </strong>
                            <p class=" my-2 mx-1 text-black fs-6"> {{ $cmt->comment_message }} </p>
                            <a href="{{ route('admin#deleteComment',$cmt->id) }}" class="deleteCommentIcon">
                                <i class="fa-solid fa-trash mx-2 fs-5"></i>
                            </a>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-start overflow-x-hidden overflow-y-auto">

                <input type="hidden" id="postId" name="postId" value="{{ $post->id }}" />

                <input type="text" name="postTitle" title="post-title" value="{{ $post->title }}" class=" my-1 rounded-3 border border-light text-black fw-bold p-2">
                @error('postTitle')
                <small class="text-danger fw-bold fs-6">{{ $message }}</small>
                @enderror

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

                <span class="d-flex">
                    <p class="text-black fw-bold mx-2 my-3 viewCountText">{{ $post->view_count }}</p> <i class="fa-solid fa-eye-slash text-black fw-bold mx-2 my-3"></i>
                    <input type="hidden" id="viewCount" value="{{ $post->view_count }}">
                </span>

                @error('postDescription')
                <small class="text-danger fw-bold fs-6">{{ $message }}</small>
                @enderror
                <label for="description" class="m-2 text-black fw-bold">Describe what is in your mind  </label>
                <textarea name="postDescription" id="description" cols="30" rows="10" class="form-control m-2 p-2 text-black fw-bold">
                    {{ $post->description }}
                </textarea>

                <button type="submit" onclick="confirm('It will change your post information !')" class="btn btn-outline-warning text-white py-sm-3 px-sm-5 rounded-pill animated slideInRight">Edit And Save</button>
            </div>
        </form>
        <a href="{{ route('admin#deletePost',$post->id) }}" onclick="confirm('It will delete your post !')" class="btn btn-outline-danger text-white py-sm-3 px-sm-5 rounded-pill animated">Delete this post</a>
    </div>
</div>
<!--Main Section end -->
@endsection




