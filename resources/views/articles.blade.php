@extends('layouts.master')

@section('content')
    <div class="col-12">
        <div class="article bg-white border-radius-xl my-3 pb-1 fixed-start ">
            <main class="main-content position-relative border-radius-lg ">
                <!-- Navbar -->
                <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
                    <div class="container-fluid py-1 px-3">
                        <nav aria-label="breadcrumb" class="mt-4">
                            <h3 class="font-weight-bolder inter" style="color: #1A202C; font-size: 20px">Articles</h3>
                        </nav>
                        <div class="collapse navbar-collapse" id="navbar">
                            <div class="d-flex align-items-center" style="margin-left: 1200px">
                                <div class="input-group">
                                    <span class="input-group-text text-body"><i class="fas fa-search" aria-hidden="true"></i></span>
                                    <input type="text" class="form-control" placeholder="Type here...">
                                </div>
                            </div>

                        </div>
                    </div>
                </nav>
                <!-- End Navbar -->
                <div class="">
                    <div class="row border border-radius-xl mx-5" style="width: 94.5%">
                        <div class="col-4">
                            <div class="card w-75 m-5 shadow-xl">
                                <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top"
                                  alt="Hollywood Sign on The Hill" />
                                <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">
                                    This is a wider card with supporting text below as a natural lead-in to
                                    additional content. This content is a little bit longer.
                                  </p>
                                  <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                  </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card w-75 m-5 shadow-xl">
                                <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top"
                                  alt="Hollywood Sign on The Hill" />
                                <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">
                                    This is a wider card with supporting text below as a natural lead-in to
                                    additional content. This content is a little bit longer.
                                  </p>
                                  <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                  </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card w-75 m-5 shadow-xl">
                                <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top"
                                  alt="Hollywood Sign on The Hill" />
                                <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">
                                    This is a wider card with supporting text below as a natural lead-in to
                                    additional content. This content is a little bit longer.
                                  </p>
                                  <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                  </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card w-75 m-5 shadow-xl">
                                <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top"
                                  alt="Hollywood Sign on The Hill" />
                                <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">
                                    This is a wider card with supporting text below as a natural lead-in to
                                    additional content. This content is a little bit longer.
                                  </p>
                                  <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                  </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card w-75 m-5 shadow-xl">
                                <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top"
                                  alt="Hollywood Sign on The Hill" />
                                <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">
                                    This is a wider card with supporting text below as a natural lead-in to
                                    additional content. This content is a little bit longer.
                                  </p>
                                  <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                  </p>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card w-75 m-5 shadow-xl">
                                <img src="https://mdbcdn.b-cdn.net/img/new/standard/city/041.webp" class="card-img-top"
                                  alt="Hollywood Sign on The Hill" />
                                <div class="card-body">
                                  <h5 class="card-title">Card title</h5>
                                  <p class="card-text">
                                    This is a wider card with supporting text below as a natural lead-in to
                                    additional content. This content is a little bit longer.
                                  </p>
                                  <p class="card-text">
                                    <small class="text-muted">Last updated 3 mins ago</small>
                                  </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-between my-3">
                        <nav aria-label="" class="ms-5">
                            <ul class="pagination pagination-lg">
                              <li class="page-item active" aria-current="page">
                                <span class="page-link">
                                  1
                                  <span class="visually-hidden">(current)</span>
                                </span>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                            </ul>
                        </nav>
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
