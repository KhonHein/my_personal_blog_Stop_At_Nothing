@extends('admin.master')
@section('title','profile')
@section('cssLink')
<link href="{{ asset('css/admin/add-post.css') }}" rel="stylesheet">
@endsection
@section('content')
<!--Main Section Start-->
<div class="container-xxl addPostContainer py-5 mb-5 row">
    <i class="fa-solid fa-left-long" onclick="history.back()" class="backArrow"></i>
    <div class="category-side col-md-6 col-sm-12 col-lg-6">
        @if (Session::has('addSuccess'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Dear {{ Auth::user()->name }} !</strong>{{ Session::get('addSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <form action="{{ route('admin#addCategory') }}" method="POST">
            @csrf
            <label for="categoryName" class="m-2 text-black fw-bold">Doy you have new categories ? </label>
            <input type="text" name="categoryName" id="categoryName" class="form-control mx-2 my-3 p-2 " required  placeholder="Add New Category Name">
            <button type="submit" class="btn btn-light text-black rounded-3 m-auto d-flex justify-content-center my-2">Add</button>
        </form>

        @if(Session::has('postdSuccess'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Dear {{ Auth::user()->name }} !</strong>{{ Session::get('postdSuccess') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
    </div>
    <div class="psot-side col-md-6 col-sm-12 col-lg-6">
        <form action="{{ route('admin#addPost') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="postName" class="m-2 text-black fw-bold">Post Title</label>
        @error('postTitle')
        <small class="text-danger fw-bold fs-6">{{ $message }}</small>
        @enderror
        <input type="text" name="postTitle" id="postName" class="form-control mx-2 my-3 p-2" placeholder="Enter post title">
            <div class="form-control mx-auto my-2 bg-secondary">
                <img class="img-fluid img-thumbnail border border-white selectPreviewImage" src="{{ asset('img/femalePostDefault.jpg') }}" alt="">

                <div class="form-control mx-auto my-2 bg-secondary">
                    <label fro="imgInputFile" class="text-black fw-bold">Add Photo </label>
                    <input type="file" name="postImage" title="post-image" id="imgInputFile" onchange="previewImage()" class="inputPreviewImage my-1 rounded-3 border border-light" style="width:200px; height:tuto;">
                    @error('postImage')<label fro="imgInputFile" class="text-danger fw-bold fs-6">{{ $message }}</label> @enderror


                    <input type="file" name="postSound" title="post-sound" id="postSound" class="my-1 rounded-3 border border-light" style="width:200px; height:tuto;">
                    <label fro="postSound" class="text-black fw-bold">Add voice </label>
                    @error('postSound') <label fro="postSound" class="text-danger fw-bold fs-6">{{ $message }}</label> @enderror

                </div>
            </div>
            @error('postDescription') <label fro="description" class="text-danger fw-bold fs-6">{{ $message }}</label> @enderror
        <label for="description" class="m-2 text-black fw-bold">Describe what is in your mind  </label>
        <textarea name="postDescription" id="description" cols="30" rows="10" class="form-control m-2 p-2 text-black fw-bold"></textarea>

        <div class="form-control bg-secondary">
            @error('postCategory')<label for="selectCategory" class="text-danger fw-bold fs-6">{{ $message }}</label> @enderror
            <label for="selectCategory" class="m-2 text-black fw-bold">Select category</label>
            <select name="postCategory" id="selectCategory" class="rounded-3">
                @foreach($categories as $c)
                <option value="{{ $c->category_name }}" class="form-control" >{{ $c->category_name }}</option>
                @endforeach
            </select>

            <label for="status" class="m-2 text-black fw-bold">Visillabe</label>
            <select name="postStatus" id="status" class="rounded-3">
                <option value="free" class="form-control">free</option>
                <option value="pro" class="form-control">pro</option>
            </select>
        </div>

        <button type="submit" class="form-control btn btn-light text-black rounded-3 m-auto d-flex justify-content-center my-2">Post</button>
        </form>
    </div>
</div>
<!--Main Section end -->
@endsection


