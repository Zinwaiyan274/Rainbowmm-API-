@extends('layouts.master')

@section('content')
    <div class="col-12">
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
                                <tr>
                                    <td class="">
                                        <img src="https://images.unsplash.com/photo-1544005313-94ddf0286df2?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=688&q=80" alt="" width="70px" height="70px" class="rounded-circle float-start me-3">
                                        <div class="ms-3">
                                            <h5>Ricky</h5>
                                            <h5>ricky12@gmail.com</h5>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <button class="btn btn-danger mt-4" >Remove</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="">
                                        <img src="https://images.unsplash.com/photo-1599566150163-29194dcaad36?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=687&q=80" alt="" width="70px" height="70px" class="rounded-circle float-start me-3">
                                        <div class="ms-3">
                                            <h5>Tuna</h5>
                                            <h5>tuna123@gmail.com</h5>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <button class="btn btn-danger mt-4" >Remove</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="">
                                        <img src="https://images.unsplash.com/photo-1580489944761-15a19d654956?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=761&q=80" alt="" width="70px" height="70px" class="rounded-circle float-start me-3">
                                        <div class="ms-3">
                                            <h5>Kyll Kyll</h5>
                                            <h5>kyll1234@gmail.com</h5>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <button class="btn btn-danger mt-4" >Remove</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="">
                                        <img src="https://images.unsplash.com/photo-1542206395-9feb3edaa68d?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=764&q=80" alt="" width="70px" height="70px" class="rounded-circle float-start me-3">
                                        <div class="ms-3">
                                            <h5>Waii</h5>
                                            <h5>waii12344@gmail.com</h5>
                                        </div>
                                    </td>
                                    <td class="text-end">
                                        <button class="btn btn-danger mt-4" >Remove</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
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
                    </div>
                </div>
            </main>
        </div>
    </div>
@endsection
