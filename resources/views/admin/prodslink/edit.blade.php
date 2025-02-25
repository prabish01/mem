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
                        <h3>Edit prodslink</h3>
                    </div>
                    <div class="box-body">
                        <form class="form-horizontal" method="post" action="{{ url('prodslink/update', $prodslink->id) }}"
                            enctype="multipart/form-data">
                            @method('PUT')
                            {{ csrf_field() }}

                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Name:</label>
                                <div class="col-md-6">
                                    <input class="form-control" type="text" name="title"
                                        value="{{ $prodslink->title }}" required>
                                </div>
                            </div>
 
                            <div class="form-group">
                                <label class="col-md-4 control-label">Product Main Image:</label>
                                <div class="col-md-3">
                                    <input class="form-control" onchange="previewFile()" type="file" name="filename">
                                </div>
                                @if (isset($prodslink))
                                    <div class="col-md-3">
                                        <img class="img-rounded" id="mainimage" alt="..."
                                            src="{{ asset('uploads/prodslink'.'/'. $prodslink->filename) }}" alt=""
                                            height='200'>
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-offset-4">
                                <button class="btn btn-success" type="submit">Save Changes</button>
                                {{-- <a class="btn btn-danger" role="button" href="{{}}">Cancel</a> --}}
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

<script>
    function previewFile() {
        const preview = document.querySelector('#mainimage');
        preview.src = "";
        const file = document.querySelector('input[type=file]').files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function() {
            // convert image file to base64 string
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file); 
        }
    }
</script>
