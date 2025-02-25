@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Edit Blog</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('blog/update', $blog->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Blog Name:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="title" value="{{$blog->title}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Blog Date:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="date" name="blog_date" value="{{$blog->blog_date}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Image:</label>
                        <div class="col-md-3">
                            <input  class="form-control" type="file" name="image">
                        </div>
                        @if(isset($blog))
                            <div class="col-md-4">
                                <img src="{{asset('uploads/blog'.'/'.$blog->image)}}" alt="" width="100px;">
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Description:</label>
                        <div class="col-md-6">
                            <textarea rows="8"  class="form-control" type="text"  name="description" required>{{$blog->description}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-offset-4">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
