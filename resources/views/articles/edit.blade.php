@extends('layouts.master')

@section('content')
<div class="col-xxl-12 offset-xxl-0 col-xl-10 offset-xl-2 col-lg-10 col-md-6">
        <div class="article bg-white border-radius-xl my-3 pb-1 fixed-start ">
            <main class="main-content position-relative border-radius-lg ">
                <form action="{{ route('articleUpdate',$article->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="">
                        <div class="row mx-5" >
                            <div class="col-12 mt-5">
                                <label for="" class="fs-4 inter">Title of the Article</label>
                                <input type="text" name='title' value="{{ old('title',$article->title) }}" class="form-control" style="height: 50px">
                            </div>
                            @error('title')
                                <div class="text-danger ms-1">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="row mx-5" >
                            <div class="col-4 mt-4">
                                <label for="" class="fs-4 inter">Category</label>
                                <select name="category_id" id="" class="form-control" style="height: 50px">
                                    <option value="" selected>Choose Category</option>
                                    <option value="1" @if ($article->category_id == 1) selected @endif>Health</option>
                                    <option value="2" @if ($article->category_id == 2) selected @endif>Beauty</option>
                                    <option value="3" @if ($article->category_id == 3) selected @endif>Knowledge</option>
                                    <option value="4" @if ($article->category_id == 4) selected @endif>Entertainment</option>
                                </select>
                                @error('category_id')
                                    <div class="text-danger ms-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-4 mt-4">
                                <label for="" class="fs-4 inter">Author Name</label>
                                <input type="text" name="author_name" value="{{ old('author_name',$article->author_name) }}" class="form-control" style="height: 50px">
                                @error('author_name')
                                    <div class="text-danger ms-1">{{ $message }}</div>
                                 @enderror
                            </div>
                            <div class="col-4 mt-4">
                                <label for="" class="fs-4 inter">Hero Image</label>
                                <input type="file" name='hero_image' value="{{ $article->hero_image }}" class="form-control form-control-lg" >
                                @error('hero_image')
                                    <div class="text-danger ms-1">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        @foreach ($article->postContents as $content)
                        <div class="row mx-5" id='addMoreArticle'>
                            <span class="article">
                                <div class="col-12 mt-4">
                                    <label for="" class="fs-4 inter">Content</label>
                                    <textarea name="content[0]"  class="form-control" rows="15" style="resize: none">{{ old('content[0]',$content->content) }}</textarea>
                                    @error('content.*')
                                        <div class="text-danger ms-1">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div>
                                    <input type="file"  id="files" class="form-control" name="image[0]" multiple>
                                    <img src="{{ asset("storage/postImage/$content->image") }}" alt="" width='200px' class='img-fluid'>
                                    @error('image.*')
                                        <div class="text-danger ms-1">{{ $message }}</div>
                                    @enderror
                                </div>
                            </span>
                        </div>
                        @endforeach

                        <div class="row mx-5 mt-5">
                                <div class="col-6">
                                    <button class="col btn btn-lg btn-success me-3" type="submit">Update</button>
                                    <a href="{{ route('articlesPage') }}">
                                        <input class="col btn btn-lg btn-outline-danger ms-3"  type="button" value="Back"/>
                                    </a>                                </div>
                                <div class="col d-flex justify-content-end" id='addArticle'>
                                    <i class="fa-solid fa-circle-plus fs-1" style="color: #3B71FE"></i>
                                </div>
                        </div>
                    </div>
                </form>
            </main>
        </div>
    </div>
@endsection

@section('js')
<script type="text/javascript">
//dynamic input fields
    var i = 0;
    $("#addArticle").click(function () {
        ++i;
        $('#addMoreArticle').append('<span class="article" id="more_articles"><div class="col-12 mt-4 "><label class="fs-4 inter">Content</label><textarea name="content['
            +i+']" class="form-control"  rows="15" style="resize: none"></textarea></div><div><input type="file" id="files" class="form-control" name="image['
            +i+']" multiple><img id="preview-image-before-upload" style="max-height: 250px;"><button type="button" class="btn btn-outline-danger remove-input-field mt-3">Delete</button></div></span>');
    });

    $(document).on('click', '.remove-input-field', function () {
        $(this).closest(".article").remove();
    });



$(document).on({
  change: function(e) {
    var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          var lastList = $("#img_files").last();
            $('#img_files').after("<div class=\"pip\">" +
            "<img style=\"max-height: 300px;\" \"max-width: 250px;\" class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\"><b>X</b></span>" +
            "</div>");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });


        });
        fileReader.readAsDataURL(f);
      }
  }
}, '#img_files:last');


    // image preview
    $(document).on("change", "#files", function(e){
    // $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<div class=\"pip\">" +
            "<img style=\"max-height: 300px;\" \"max-width: 250px;\" class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\"><b>X</b></span>" +
            "</div>").insertAfter("#files");
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });


        });
        fileReader.readAsDataURL(f);
      }
    });

    // $(document).on({change: function(e) {
    // // $('#img_files').on("change", function(e){
    //   var files = e.target.files,
    //     filesLength = files.length;
    //   for (var i = 0; i < filesLength; i++) {
    //     var f = files[i]
    //     var fileReader = new FileReader();
    //     fileReader.onload = (function(e) {
    //       var file = e.target;
    //       $("<div class=\"pip\">" +
    //         "<img style=\"max-height: 150px;\" class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
    //         "<br/><span class=\"remove\"><b>X</b></span>" +
    //         "</div>").insertAfter("#img_files");
    //       $(".remove").click(function(){
    //         $(this).parent(".pip").remove();
    //       });


    //     });
    //     fileReader.readAsDataURL(f);
    //   }
    // }
    // });
</script>
@endsection
