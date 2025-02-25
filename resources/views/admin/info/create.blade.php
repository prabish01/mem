@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>Add Contact</h3>
            </div>
            <div class="box-body">
                <form class="form-horizontal" method="post" action="{{url('info/store')}}">
                    {{csrf_field()}}

                    <div class="form-group">
                        <label class="col-md-4 control-label">Address:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="text" name="address" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Phone No:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="string" name="phone" required>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-md-4 control-label">Email:</label>
                        <div class="col-md-6">
                            <input  class="form-control" type="string" name="email" required>
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
