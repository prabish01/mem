@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Edit Service</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('service/update', $service->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Service Title:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="title" value="{{$service->title}}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Description:</label>
                        <div class="col-md-6">
                            <textarea rows="8"  class="form-control" type="text"  name="description" required>{{$service->description}}</textarea>
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
