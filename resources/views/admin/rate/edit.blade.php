@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Edit Data</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('rate/update', $rate->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Data Title:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="title" value="{{$rate->title}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Image:</label>
                        <div class="col-md-3">
                            <input  class="form-control" type="file" name="image">
                        </div>
                        @if(isset($rate))
                            <div class="col-md-4">
                                <img src="{{asset('uploads/rated'.'/'.$rate->image)}}" alt="" width="100px;">
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Description:</label>
                        <div class="col-md-6">
                            <textarea rows="8"  class="form-control" type="text"  name="description" required>{{$rate->description}}</textarea>
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
