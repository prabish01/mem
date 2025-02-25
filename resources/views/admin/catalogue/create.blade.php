
@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="panel panel-default" style="padding: 3px; margin:3px;">
            <div class="panel-body">
        <div class="card m-10" > 
            <div class="card-body">
        <div class="box box-primary p-10">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Add catalogue</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('catalogue/store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Catalogue Title:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="catalogue_title" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Main Catalogue Page:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="file"  accept=".png"  onchange="previewFile()" name="image" required>
                            <br><img src="" class="img-rounded" height="200" alt="" id="mainimage"  style="display:none">
                        </div>
                    </div>
                     <div class="form-group">
                                        <label class="col-md-4 control-label">Downladable PDF Upload:</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="file" accept=".pdf" name="cataloguepdf">
                                        </div>
                                    </div>
                   
                    <div class="form-group">
                        <label class="col-md-4 control-label">Inside Catalogue Pages:</label>
                        <div class="input-images-2" style="padding-top: .5rem; margin-top:40px;"></div>
                        </div>
                    <div class="col-md-offset-4">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
        </div>    </div>
    </div>
    </div>
@endsection 

<script>
   function previewFiles() {
   
   var preview = document.querySelector('#preview');
   preview.innerHTML = "";
   var files   = document.querySelector('#browse').files;
   
   function readAndPreview(file) {
   
     // Make sure `file.name` matches our extensions criteria
     if ( /\.(jpe?g|png|gif)$/i.test(file.name) ) {
       var reader = new FileReader();
   
       reader.addEventListener("load", function () {
         var image = new Image();
         image.height = 200;
         image.title = file.name;
         image.src = this.result;
         image.style="margin:5px; border-radius: 15px;" 
         preview.appendChild( image );
       }, false);
   
       reader.readAsDataURL(file);
     }
   
   }
   
   if (files) {
     [].forEach.call(files, readAndPreview);
   }
   
   }
   
   function previewFile() {
  const preview = document.querySelector('img');
  const file = document.querySelector('input[type=file]').files[0];
  const reader = new FileReader();

  reader.addEventListener("load", function () {
    // convert image file to base64 string
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
    document.getElementById("mainimage").style.display = "block";
   
  } 
}
           </script>