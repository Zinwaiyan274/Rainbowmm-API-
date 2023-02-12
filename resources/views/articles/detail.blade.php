@extends('layouts.master')

@section('content')
<div class="col-xxl-12 offset-xxl-0 col-xl-10 offset-xl-2 col-lg-10 col-md-6">
        <div class="article bg-white border-radius-xl my-3 pb-1 fixed-start ">
            <main class="main-content position-relative border-radius-lg ">
                <div class="cotainer m-4">
                    <h3 class="text-center mb-3">{{ $article->title }}</h3>
                    <div class="row mb-3 ">
                        <div class="col-md-6 d-flex justify-content-start">{{ $article->author_name }}</div>
                        <div class="col-md-6 d-flex justify-content-end">{{ $article->created_at->format('F j,Y') }}</div>
                    </div>
                    <div class="text-center mb-3">
                        <img src="{{ asset("storage/heroImage/$article->hero_image") }}" alt="" width='500px' class='img-fluid img-thumbnail'>
                    </div>
                    @foreach ($article->postContents as $content)
                        <p>{{ $content->content }}</p>
                        <div class="text-center">
                            <img src="{{ asset("storage/postImage/$content->image") }}" alt="" width='300px' class='img-fluid img-thumbnail'>
                        </div>
                    @endforeach
                </div>
                <div class="ms-5">
                    <a href="{{ route('articlesPage') }}">
                        <button class="col btn btn-lg btn-outline-danger me-3">Back</button>
                    </a>
                    <a href="{{ route('articleEdit',$article->id) }}">
                        <button class="col btn btn-lg btn-success ms-3">Edit</button>
                    </a>
                </div>
                {{-- <div class="row mx-5 mt-5">
                    <div class="col-6">
                        <button class="col btn btn-lg btn-success me-3" type="submit">Submit</button>
                        <a href="{{ route('articlesPage') }}">
                            <input class="col btn btn-lg btn-outline-danger ms-3"  type="button" value="Delete"/>
                        </a>
                    </div>
                    <div class="col d-flex justify-content-end" id='addArticle'>
                        <i class="fa-solid fa-circle-plus fs-1" style="color: #3B71FE"></i>
                    </div>
            </div> --}}
            </main>
        </div>
    </div>
@endsection

