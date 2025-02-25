@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Edit Slider</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('slider/update', $slider->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Slider Name:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="title" value="{{$slider->title}}" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-4 control-label">Slider Image:</label>
                        <div class="col-md-3">
                            <input  class="form-control" type="file" name="image" >
                        </div>
                        @if(isset($slider))
                            <div class="col-md-3">
                                <img src="{{ asset('uploads/slider'.'/'.$slider->image) }}" alt=""  width="50%">
                            </div>
                        @endif
                    </div>

                    <div class="col-md-offset-4">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
