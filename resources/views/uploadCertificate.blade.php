@extends('layouts.master')

@section('content')
    <div class="col-12">
        <div class="article bg-white border-radius-xl my-3 pb-1 fixed-start ">
            <main class="main-content position-relative border-radius-lg ">
                <!-- Navbar -->
                <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
                    <div class="container-fluid py-1 px-3">
                        <nav aria-label="breadcrumb" class="mt-4">
                            <h3 class="font-weight-bolder" style="color: #1A202C; font-size: 20px">Certificates</h3>
                        </nav>
                    </div>
                </nav>
                <!-- End Navbar -->
                <div class="">
                    {{-- <div class="row border border-radius-xl mx-5" style="width: 94.5%; height: 87.4vh;">
                        <div class="row ms-2 mt-3">
                            <div class="col-12">
                                <label for="" class="fs-4">Upload Certificate</label>
                                <input type="file" class="form-control form-control-lg">
                            </div>
                        </div>
                    </div> --}}
                    <div class="row border border-radius-xl mb-5 mx-5" style="height: 82.3vh" >
                        <div class="col-12 mt-5">
                            <label for="" class="fs-4">Title of the Article</label>
                            <input type="file" class="form-control form-control-lg">
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
