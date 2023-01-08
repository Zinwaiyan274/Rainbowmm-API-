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
                <form action="{{ route('uploadCertificateProcess') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row border border-radius-xl mb-5 mx-5" style="height: 82.3vh" >
                        <div class="col-10 mt-5">
                            <label for="" class="fs-4">Title of the Article</label>
                            <input type="file" class="form-control form-control-lg" name="img">
                            @error('img')
                                <div class="text-danger ms-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-2" style="margin-top: 93px">
                            <button class="btn btn-lg btn-success col-12" type="submit">Click</button>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>
@endsection
