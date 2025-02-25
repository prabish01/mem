@extends('layouts.backend')
@section('admin-content')
<div class="content-wrapper">
    <div class="box box-primary">
        @include('flashMsg.flashmessages')
        <div class="box-header">
            <h3>Edit Category</h3>
        </div>
        <div class="box-body">
          <form class="form-horizontal" method="post" action="{{url('category/update', $category->id)}}" enctype="multipart/form-data">
            @method('PUT')
            {{csrf_field()}}

            <div class="form-group">
                <label class="col-md-4 control-label">Category Name:</label>
                <div class="col-md-6">
                    <input  class="form-control" type="text" name="category_name" value="{{$category->category_name}}" required>
                </div>
            </div>

          <div class="form-group">
              <label class="col-md-4 control-label">Category Image:</label>
              <div class="col-md-3">
                  <input  class="form-control" type="file" name="image">
              </div>
              @if(isset($category))
                  <div class="col-md-4">
                      <img src="{{asset('uploads/category'.'/'.$category->image)}}" alt="" width="100px;">
                  </div>
              @endif
          </div>


              <input type="hidden" name="created_by" value="{{Auth::user()->id}}">
            <div class="col-md-offset-4">
                <button class="btn btn-primary">Save</button>
            </div>
        </form>

    </div>
  </div>
</div>
@endsection
