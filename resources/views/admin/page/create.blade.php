@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Add Page</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('page/store')}}">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Page Title:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="title" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Description:</label>
                        <div class="col-md-6">
                            <textarea rows="10" class="form-control" type="text" name="description" required></textarea>
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
