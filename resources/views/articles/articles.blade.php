@extends('layouts.master')

@section('content')
    <div class="col-xxl-12 offset-xxl-0 col-xl-10 offset-xl-2 col-lg-10 col-md-6">
        <div class="article bg-white border-radius-xl my-3 pb-1 fixed-start ">
            <main class="main-content position-relative border-radius-lg ">
                <!-- Navbar -->
                <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
                    <div class="container-fluid py-1 px-3">
                        <nav aria-label="breadcrumb" class="mt-4">
                            <h3 class="font-weight-bolder inter" style="color: #1A202C; font-size: 20px">Articles</h3>
                        </nav>
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible d-flex align-items-center text-white" role="alert">
                                <p class="my-1">{{ Session::get('success') }}</p>
                                <button type="button" class="btn-close ms-3" style="margin-top: 2px" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa-solid fa-close fs-4"></i>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('artcileSearch') }}" method="POST">
                            @csrf
                            <div class="collapse navbar-collapse" id="navbar">
                                <div class="d-flex align-items-center">
                                    <div class="input-group">
                                        <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                        <input type="text" class="form-control" placeholder="Type here..." name="searchKey">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </nav>
                <!-- End Navbar -->
                <div class="">
                    <div class="row border border-radius-xl mx-5">
                        @foreach ($articles as $article)
                        <div class="col-xl-4 col-md-4">
                            <a href="{{ route('articleDetail',$article->id) }}" class="d-inline-block text-decoration-none">
                            <div class="card w-85 my-4 ms-4 me-3 shadow-xl">
                                <img src="{{ asset("heroImage/$article->hero_image") }}" class="card-img-top"
                                  alt="Hollywood Sign on The Hill" />
                                <div class="card-body">
                                  <h5 class="card-title">{{ $article->title }}</h5>
                                  @foreach ($article->postContents as $content)
                                  <p class="card-text">
                                    {{ Str::limit($content->content, 40, '...')  }}
                                  </p>
                                  @endforeach
                                  <p class="card-text">
                                    <small class="text-muted">{{ $article->created_at->diffForHumans() }}</small>
                                  </p>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endforeach
                    </div>
                    <div class="d-flex justify-content-between my-3 ms-5">
                        {{ $articles->links() }}
                        <div class="me-5 d-flex align-items-center">
                            <h4 class="me-3">Upload New Articles</h4>
                            <a href="{{ route('uploadArticle') }}">
                                <i class="fa-solid fa-circle-plus fs-1" style="color: #3B71FE"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection

