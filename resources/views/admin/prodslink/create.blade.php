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
                                <form class="form-horizontal" method="post" action="{{ url('prodslink/store') }}"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}

                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Product Link Title:</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="text" name="title" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Select Product:</label>
                                        <div class="col-md-6">
                                            <select name="prods_id" class="form-control" id="prods">
                                                <option selected disabled>-- Select Product --</option>
                                                @foreach($prodss as $prods)
                                                    <option value="{{$prods->id}}">{{$prods->prods_title}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Main Product Image:</label>
                                        <div class="col-md-6">
                                            <input class="form-control" type="file" onchange="previewFile()"
                                                name="filename" required>
                                            <br><img src="" class="img-rounded" height="200" alt="" id="mainimage"
                                                style="display:none">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Choose Categories: </label>
                                        <div class="col-md-8">
                                            <div class="col-md-12">
                                            </div>
                                            @foreach ($categories as $category)
                                                <div class="col-md-6">
                                                    <input type="radio" id="category" name="category_id"
                                                        value="{{ $category->id }}"> <strong>{{ $loop->iteration }}.
                                                        {{ $category->category_name }}</strong> 
                                                        @foreach ($category->subcateogry as $subcat)
                                                        <div class="col-md-12 show-subcategory">
                                                            <input type="radio" id="category" name="category_id"
                                                                value="{{ $subcat->id }}"> <label
                                                                class="control-label">{{ $subcat->subcategory_name }}</label>

                                                            @foreach ($subcat->childcategory as $childcategory)
                                                                <div class="col-md-12">
                                                                    <input type="radio" id="category" name="category_id"
                                                                        value="{{ $childcategory->id }}"> <label
                                                                        class="control-label">{{ $childcategory->childcategory_name }}</label>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    @endforeach
                                                </div>
                                            @endforeach
                                            <hr>
                                        </div>
                                    </div>
                                    <div class="col-md-offset-4">
                                        <button class="btn btn-Success">Add New product Link</button>
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

        reader.addEventListener("load", function() {
            // convert image file to base64 string
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);
            document.getElementById("mainimage").style.display = "block";
        }
    }
</script>
