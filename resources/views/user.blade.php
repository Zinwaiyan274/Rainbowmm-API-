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
                        <table class="table border mx-5 mt-3 " style="width: 94.5%">
                            <thead class="">
                                <tr class="">
                                    <th class="">Users</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="">
                                            <img src="{{ asset('userImg/'.$item->image) }}" alt="" width="70px" height="70px" class="rounded-circle float-start me-3">
                                            <div class="ms-3">
                                                <h5>{{ $item->name }}</h5>
                                                <h5>{{ $item->email }}</h5>
                                            </div>
                                        </td>
                                        @if ($item->role == 'admin')
                                            <td class="text-end">
                                                <button class="btn btn-danger mt-4" disabled>Remove</button>
                                            </td>
                                        @else
                                            <td class="text-end">
                                                <button class="btn btn-danger mt-4">Remove</button>
                                            </td>
                                        @endif
                                    </tr>
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
