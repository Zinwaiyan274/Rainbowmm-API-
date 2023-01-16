@extends('layouts.master')

@section('content')
<div class="col-xxl-12 offset-xxl-0 col-xl-10 offset-xl-2 col-lg-10 col-md-6">
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
                        <div class="col-4 mt-4">
                            <label for="" class="fs-4 inter">Category</label>
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
                        <div class="col-4 mt-4">
                            <label for="" class="fs-4 inter">Hero Image</label>
                            <input type="file" class="form-control" style="height: 50px">
                        </div>
                    </div>
                    <div class="row mx-5" id='addMoreArticle'>
                        <span class="article">
                            <div class="col-12 mt-4">
                                <label for="" class="fs-4 inter">Content</label>
                                <textarea name="article[0][content]" class="form-control" rows="15" style="resize: none"></textarea>
                            </div>
                            <div>
                                <input type="file"  id="files" class="form-control" name="article[0][image]" multiple>
                                {{-- <img id="preview-image-before-upload" style="max-height: 250px;"> --}}
                            </div>
                        </span>
                    </div>
                    <div class="row mx-5 mt-5">
                            <div class="col-6">
                                <button class="col btn btn-lg btn-success me-3">Submit</button>
                                <button class="col btn btn-lg btn-outline-danger ms-3">Delete</button>
                            </div>
                            <div class="col d-flex justify-content-end" id='addArticle'>
                                <i class="fa-solid fa-circle-plus fs-1" style="color: #3B71FE"></i>
                            </div>
                    </div>
                </div>
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
        $('#addMoreArticle').append('<span class="article" id="more_articles"><div class="col-12 mt-4 "><label class="fs-4 inter">Content</label><textarea name="article['
            +i+'][content]" class="form-control"  rows="15" style="resize: none"></textarea></div><div><input type="file" id="img_files" class="form-control" name="article['
            +i+'][image]" multiple><img id="preview-image-before-upload" style="max-height: 250px;"><button type="button" class="btn btn-outline-danger remove-input-field">Delete</button></div></span>');
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
          var lastList = $("#addMoreArticle").last();
//   lastList.clone().insertAfter(lastList);
          $("<div class=\"pip\">" +
            "<img style=\"max-height: 150px;\" class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
            "<br/><span class=\"remove\"><b>X</b></span>" +
            "</div>").insertAfter('#img_files').clone().last();
        // var preview = "<div class=\"pip\">" +
        //     "<img style=\"max-height: 150px;\" class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
        //     "<br/><span class=\"remove\"><b>X</b></span>" +
        //     "</div>";
        //     preview.addAfter('#img_files');
            // $(this).parents('#more_articles').siblings('#img_files:last').append(preview);
          $(".remove").click(function(){
            $(this).parent(".pip").remove();
          });


        });
        fileReader.readAsDataURL(f);
      }
  }
}, '#img_files:last');


    // image preview
    // $(document).on("change", "#files", function(e){
    $("#files").on("change", function(e) {
      var files = e.target.files,
        filesLength = files.length;
      for (var i = 0; i < filesLength; i++) {
        var f = files[i]
        var fileReader = new FileReader();
        fileReader.onload = (function(e) {
          var file = e.target;
          $("<div class=\"pip\">" +
            "<img style=\"max-height: 150px;\" class=\"imageThumb\" src=\"" + e.target.result + "\" title=\"" + file.name + "\"/>" +
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
