<style> 
.main-body {
    padding: 15px;
}  

.panel-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
</style>

@extends('layouts.userdash')
@section('user-content')
  <!-- Right side column. Contains the navbar and content of the page -->
      <div class="content-wrapper">  
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Dashboard
            <small>Control panel</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Change Password</li>
          </ol>
        </section>

        @include('flashMsg.flashmessages')
        <!-- Main content -->
        <section class="content">
          <div class="box box-primary p-10" >
          <div class="container">
            <div class="main-body">  
               <h1 class="text-center">
              Change Your Password
             </h1>
             <br>
              <div class="row">
             
                <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                  {{ csrf_field() }}

                  <div class="form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                      <label for="new-password" class="col-md-4 control-label">Current Password</label>

                      <div class="col-md-6">
                          <input id="current-password" type="password" class="form-control" name="current-password" required>

                          @if ($errors->has('current-password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('current-password') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                      <label for="new-password" class="col-md-4 control-label">New Password</label>

                      <div class="col-md-6">
                          <input id="new-password" type="password" class="form-control" name="new-password" required>

                          @if ($errors->has('new-password'))
                              <span class="help-block">
                                  <strong>{{ $errors->first('new-password') }}</strong>
                              </span>
                          @endif
                      </div>
                  </div>

                  <div class="form-group">
                      <label for="new-password-confirm" class="col-md-4 control-label">Confirm New Password</label>

                      <div class="col-md-6">
                          <input id="new-password-confirm" type="password" class="form-control" name="new-password_confirmation" required>
                      </div>
                  </div>

                  <div class="form-group">
                      <div class="col-md-6 col-md-offset-4">
                          <button type="submit" class="btn btn-Success">
                              Change Password
                          </button>
                      </div>
                  </div>
              </form>
              </div>
            </div>
          </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper --> 
    </div>
@endsection