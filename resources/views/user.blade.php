@extends('layouts.master')

@section('content')
    <div class="col-xxl-12 offset-xxl-0 col-xl-10 offset-xl-2 col-lg-10 col-md-6">
        <div class="article bg-white border-radius-xl my-3 pb-1 fixed-start ">
            <main class="main-content position-relative border-radius-lg ">
                <!-- Navbar -->
                <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl " id="navbarBlur" data-scroll="false">
                    <div class="container-fluid py-1 px-3">
                        <nav aria-label="breadcrumb" class="mt-4">
                            <h3 class="font-weight-bolder inter" style="color: #1A202C; font-size: 20px">Users</h3>
                        </nav>
                        @if (Session::has('success'))
                            <div class="alert alert-success alert-dismissible d-flex align-items-center text-white" role="alert">
                                <p class="my-1">{{ Session::get('success') }}</p>
                                <button type="button" class="btn-close ms-3" style="margin-top: 2px" data-bs-dismiss="alert" aria-label="Close">
                                    <i class="fa-solid fa-close fs-4"></i>
                                </button>
                            </div>
                        @endif
                        <form action="{{ route('userSearch') }}" method="POST">
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
                    <div class="row border border-radius-xl mx-5" style="width: 94.5%">
                        <table class="table border mx-5 mt-3 " style="width: 94.5%">
                            <thead class="">
                                <tr class="">
                                    <th class="">Users</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    @if ($item->role == 'user')
                                        <tr>
                                            <td class="">
                                                <img src="{{ asset('userImg/'.$item->image) }}" alt="" width="70px" height="70px" class="rounded-circle float-start me-3">
                                                <div class="ms-3">
                                                    <h5>{{ $item->name }}</h5>
                                                    <h5>{{ $item->email }}</h5>
                                                </div>
                                            </td>
                                            <form action="{{ route('userDelete', $item->id) }}" method="POST">
                                                @csrf
                                                <td class="text-end">
                                                    <button class="btn btn-danger mt-4">Remove</button>
                                                </td>
                                            </form>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="ms-5 mt-4 pagination-lg">
                        {{ $data->links() }}
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
