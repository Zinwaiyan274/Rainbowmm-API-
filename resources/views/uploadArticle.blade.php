@extends('layouts.master')

@section('content')
<div class="col-12">
        <div class="article bg-white border-radius-xl my-3 pb-1 fixed-start ">
            <main class="main-content position-relative border-radius-lg ">
                <div class="">
                    <div class="row mx-5" >
                        <div class="col-12 mt-5">
                            <label for="" class="fs-4 inter">Title of the Article</label>
                            <input type="text" class="form-control" style="height: 50px">
                        </div>
                    </div>
                    <div class="row mx-5" >
                        <div class="col-3 mt-4">
                            <label for="" class="fs-4 inter">Choose Category</label>
                            <select name="" id="" class="form-control" style="height: 50px">
                                <option value="" selected>Choose Category</option>
                                <option value="">Hello</option>
                                <option value="">Hello</option>
                            </select>
                        </div>
                        <div class="col-4 mt-4">
                            <label for="" class="fs-4 inter">Author Name</label>
                            <input type="text" class="form-control" style="height: 50px">
                        </div>
                    </div>
                    <div class="row mx-5">
                        <div class="col-12 mt-4">
                            <label for="" class="fs-4 inter">Content</label>
                            <textarea name="" class="form-control" rows="15" style="resize: none"></textarea>
                        </div>
                    </div>
                    <div class="row mx-5">
                        <div class="col-12 mt-4">
                            <label for="" class="fs-4 inter">Image</label>
                            <input type="file" class="form-control">
                        </div>
                    </div>
                    <div class="row mx-5 mt-5">
                        <div class="col-6">
                            <button class="col-3 btn btn-lg btn-success me-3">Submit</button>
                            <button class="col-3 btn btn-lg btn-outline-danger ms-3">Delete</button>
                        </div>
                        <div class="col d-flex justify-content-end">
                            <i class="fa-solid fa-circle-plus fs-1" style="color: #3B71FE"></i>
                        </div>
                    </div>

                </div>
            </main>
        </div>
    </div>
@endsection
