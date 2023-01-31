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
                        <img src="{{ asset("heroImage/$article->hero_image") }}" alt="" class='img-fluid'>
                    </div>
                    @foreach ($article->postContents as $content)
                        <p>{{ $content->content }}</p>
                        <div class="text-center">
                            <img src="{{ asset("storage/postImage/$content->image") }}" alt="" width='200px' class='img-fluid'>
                        </div>
                    @endforeach
                </div>
                <div class="ms-5">
                    <a href="{{ route('articlesPage') }}">
                        <button class="btn btn-success">Back</button>
                    </a>
                    <a href="{{ route('articleEdit',$article->id) }}">
                        <button class="btn btn-primary">Edit</button>
                    </a>
                </div>
            </main>
        </div>
    </div>
@endsection

