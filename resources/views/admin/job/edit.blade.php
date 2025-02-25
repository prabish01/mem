@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Edit Job Vacancy</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('job/update', $job->id)}}" enctype="multipart/form-data">
                    @method('PUT')
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Job Vacancy Name:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="title" value="{{$job->title}}">
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
