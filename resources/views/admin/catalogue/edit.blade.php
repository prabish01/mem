@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="panel panel-default">
            <div class="panel-body">
        <div class="box box-primary">
            <div class="container p-4">
            @include('flashMsg.flashmessages')
            </div>
            <div class="box-header">
                <h3>Edit catalogue</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('catalogue/update', $catalogue->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Catalogue Name:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="catalogue_title" value="{{$catalogue->catalogue_title}}" required disabled>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Catalogue Front Cover:</label>
                        <div class="col-md-3">
                            <input  class="form-control" onchange="previewFile()" type="file" name="image"   accept=".png" >
                        </div>
                        @if(isset($catalogue))
                            <div class="col-md-3">
                                <img class="img-rounded" id="mainimage" alt="..."  src="{{ asset('uploads/catalogue'.'/'. $catalogue->catalogue_title .'/'.$catalogue->page) }}" alt="" height ='200'>
                            </div>
                        @endif
                    </div>
                     <div class="form-group">
                        <label class="col-md-4 control-label">Downladable PDF Upload:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="file"  accept=".pdf"  name="cataloguepdf"> 
                        </div>
                    </div>
                     
                    <div class="form-group">
                        <label class="col-md-4 control-label">Inside Catalogue Pages:</label>
                        <div class="input-images-2" style="padding-top: .5rem; margin-top:40px;"></div>
                    </div>
                    
                    <div class="col-md-offset-4">
                        <button class="btn btn-success" type="submit">Save Changes</button> 
                    </div>
                </form>
            </div>

            <div class="box-body table-responsive p-20">
                <table class="table table-hover" id="myTable">
                    <thead>
                    <th >ID</th> 
                    <th>Image</th> 
                    <th>Action</th>
                    </thead>
                    <tbody>  
                    @foreach($cataloguePages  as $cataloguepage) 
                        <tr>
                            <td>{{$cataloguepage->id}}</td> 
                            <td>
                                <a href="{{asset('uploads/catalogue'.'/'. $catalogue->catalogue_title .'/'.$cataloguepage->filename)}}" target="_blank">  
                                <div class="text-center"> 
                                    <img  class="img-rounded" alt="..." src="{{asset('uploads/catalogue'.'/'. $catalogue->catalogue_title .'/'.$cataloguepage->filename)}}" alt="" width="200px;"
                                    style="">
                                  </div> 
                                </a>
                            </td>  
                            <td>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div> </div>
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
   const preview = document.querySelector('#mainimage'); 
    preview.src = "";
   const file = document.querySelector('input[type=file]').files[0];
   const reader = new FileReader();
 
   reader.addEventListener("load", function () {
     // convert image file to base64 string
     preview.src = reader.result;
   }, false);
 
   if (file) {
     reader.readAsDataURL(file); 
    
   } 
 }
            </script>