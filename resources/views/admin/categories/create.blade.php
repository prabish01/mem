@extends('layouts.backend')
@section('admin-content')
<div class="content-wrapper">
    <div class="box box-primary">
        @include('flashMsg.flashmessages')
        <div class="box-header">
            <h3>Add Category</h3>
        </div>
        <div class="box-body">
          <form class="form-horizontal" method="post" action="{{url('category/store')}}" enctype="multipart/form-data">
            {{csrf_field()}}

            <div class="form-group">
                <label class="col-md-4 control-label">Category Name:</label>
                <div class="col-md-6">
                    <input  class="form-control" type="text" name="category_name" placeholder="Name" required>
                </div>
            </div>

              <div class="form-group">
                  <label class="col-md-4 control-label">Category Icon Image:</label>
                  <div class="col-md-6">
                      <input  class="form-control" type="file" name="image">
                  </div>
                  <label class="col-md-7 control-label  text-danger">*Please upload icon of size 150 X 150 </label>
              </div>

            <input type="hidden" name="created_by" value="{{Auth::user()->id}}">
            <div class="col-md-offset-4">
                <button class="btn btn-primary">Add Category</button>
            </div>
        </form>

    </div>
  </div>
</div>
@endsection
