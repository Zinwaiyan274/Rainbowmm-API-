@extends('layouts.master')

@section('content')
    <div class="col-12">
        <div class="article bg-white border-radius-xl my-3 pb-1 fixed-start ">
            <main class="main-content position-relative border-radius-lg ">

                <!-- Navbar -->
                <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">

                    <div class="container-fluid py-1 px-3">
                        <nav aria-label="breadcrumb" class="mt-4">
                            <h3 class="font-weight-bolder inter" style="color: #1A202C; font-size: 20px">Certificates</h3>
                        </nav>
                    </div>
                    @if (Session::has('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('success') }}
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                        </div>
                    @endif
                    @if (Session::has('deleted'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ Session::get('deleted') }}
                            {{-- <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button> --}}
                        </div>
                    @endif
                </nav>
                <!-- End Navbar -->

                {{-- Certificate List --}}
                <div class="row border border-radius-xl mx-5" style="width: 94.5%">
                    @foreach ($data as $item)
                        <div class="col-4">
                            <div class="card border w-90 mx-4 mt-5 mb-3 shadow-xl">
                                <img src="{{ asset('certificateImg/'.$item->image) }}" class="card-img-top p-3 w-100"
                                alt="Hollywood Sign on The Hill" />
                            </div>
                            <form action="{{ route('deleteCertificate', $item->id) }}" method="post">
                                @csrf
                                <div class="d-flex justify-content-center w-90 mx-4 mt-4">
                                    <button class="btn btn-danger col-5" type="submit">Delete</button>
                                </div>
                            </form>
                        </div>
                    @endforeach
                </div>
                {{-- Certificate List --}}

                <div class="d-flex justify-content-between align-items-center my-3">
                    <div class="ms-5 mt-4 pagination-lg">
                        {{ $data->links() }}
                    </div>
                    <a href="{{ route('uploadCertificate') }}">
                        <div class="me-5 d-flex align-items-center">
                            <i class="fa-solid fa-circle-plus fs-1" style="color: #3B71FE"></i>
                        </div>
                    </a>
                </div>
            </main>
        </div>
    </div>
@endsection
