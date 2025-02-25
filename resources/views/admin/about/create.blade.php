@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Add About</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('about/store')}}" enctype="multipart/form-data">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-md-4 control-label">About Name:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="title" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Description:</label>
                        <div class="col-md-6">
                            <textarea rows="8" class="form-control" type="text" name="description" required></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">About Image:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="file" name="image" required>
                        </div>
                    </div>

                    <div class="col-md-offset-4">
                        <button class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
