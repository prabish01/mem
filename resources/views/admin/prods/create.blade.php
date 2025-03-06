@extends('layouts.backend')
@section('admin-content')
<div class="content-wrapper">
    <div class="panel panel-default" style="padding: 3px; margin:3px;">
        <div class="panel-body">
            <div class="card m-10">
                <div class="card-body">
                    <div class="box box-primary p-10">
                        @include('flashMsg.flashmessages')
                        <div class="box-header">
                            <h3>Add products</h3>
                        </div>
                        <div class="box-body">
                            <form class="form-horizontal" method="post" action="{{url('prods/store')}}"
                                enctype="multipart/form-data">
                                {{csrf_field()}}

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Product Title:</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" name="prods_title" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-4 control-label">Description:</label>
                                    <div class="col-md-6">
                                        <textarea rows="10" class="form-control" type="text" name="prods_description"
                                            required></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-4 control-label">Main Product Image</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="file" onchange="previewFile()"
                                            name="prods_image" required>
                                        <br><img src="" class="img-rounded" height="200" alt="" id="mainimage"
                                            style="display:none">
                                    </div>
                                </div>
                                <div class="col-md-offset-4">
                                    <button class="btn btn-Success">Add New product</button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
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