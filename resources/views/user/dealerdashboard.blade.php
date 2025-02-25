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

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
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
                <li class="active">Dashboard</li>
            </ol>
        </section>
        @include('flashMsg.flashmessages')
        <!-- Main content -->
        <section class="content">
            <div class="box box-primary p-10">

                <div class="container">
                    <div class="main-body">
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="panel">
                                    <div class="panel-body height-control" style="margin: 90px 0 0 0;">
                                        <div class="d-flex flex-column align-items-center text-center">
                                            @if ( $currentuser->profile_image)
                                            <img  id="profile_pic" src="{{ asset('uploads/userimages' . '/' . $currentuser->profile_image) }}" alt="User"
                                            class="img-circle" width="180" height="180"  >
                                            @else
                                            <img id="profile_pic" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="Admin"
                                                class="img-circle" width="180" height="180">
                                            @endif
                                            <div class="mt-3">
                                                <h3>{{ $currentuser->name }}</h3>
                                                <p class="text-secondary mb-1">{{ $currentuser->created_at }}</p>
                                                <p class="text-muted font-size-sm">{{ $dealer_profile->company_name }}</p>
                                                <p class="text-muted font-size-sm">{{ $dealer_profile->company_address }}
                                                </p>
                                                <form id="PhotoChange"   action="{{ route('profilepicchange') }}" method="POST"   enctype="multipart/form-data"                                             >
                                                @csrf
                                                <div class="text-secondary">
                                                     <input class="form-control"  type="file" id="profilepicfile"
                                                        name="profileImage" onchange="previewFile()" > 
                                                </div>
                                                
                                                <button class="btn btn-success" type="submit" id="profilepicsubmit" style="display: none">
                                                   Save Image
                                                </button>
                                            </form>
                                            <br>
                                                <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                              document.getElementById('logout-form1').submit();">
                                                    {{ __('Logout') }}
                                                </a>
                                                <form id="logout-form1" action="{{ route('logout') }}" method="POST"
                                                    style="display: none;">
                                                    @csrf
                                                </form>
                                            </div>
                                        </div>
                                        <hr class="my-4">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="panel">
                                    <div class="panel-body p-2">
                                        <h1>
                                            Update Your Profile
                                        </h1>
                                        <br>
                                        <form class="form-horizontal" method="POST"
                                            action="{{ route('updatedealerinfo') }}" enctype="multipart/form-data">
                                            {{ csrf_field() }}
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Full Name</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" name="name"
                                                        value="{{ $currentuser->name }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Email</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="email" class="form-control" name="email"
                                                        value="{{ $currentuser->email }}" disabled>
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Pan Number</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="number" class="form-control" name="pan_number"
                                                        value="{{ $dealer_profile->pan_number }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Company Name</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" name="company_name"
                                                        value="{{ $dealer_profile->company_name }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Company Address</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" name="company_address"
                                                        value="{{ $dealer_profile->company_address }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Mobile Phone No.</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="number" class="form-control" name="phone_number"
                                                        value="{{ $dealer_profile->phone_number }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">LandlineNumber</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="number" class="form-control" name="landline_number"
                                                        value="{{ $dealer_profile->landline_number }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Add Other Images</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input class="form-control" type="file"
                                                        name="userimages[]" multiple>
                                                </div>
                                                @if (isset($currentuser))
                                                    <div class="col-sm-6 text-secondary">

                                                    </div>
                                                @endif
                                            </div>
                                            <hr>
                                            <h3>
                                                Shipping Details
                                            </h3>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Province</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    
                                                        <select id="state"  class="form-control" name="province">
                                                            <option value="0">Select your State</option>
                                                            <option value="Province 1" @if($address->province =="Province 1") selected @endif>Province 1</option>
                                                            <option value="Province 2"  @if($address->province =="Province 2") selected @endif>Province 2</option>
                                                            <option value="Province 3"  @if($address->province =="Province 3") selected @endif>Province 3</option>
                                                            <option value="Province 4"  @if($address->province =="Province 4") selected @endif>Province 4</option>
                                                            <option value="Province 5"  @if($address->province =="Province 5") selected @endif>Province 5</option>
                                                            <option value="Province 6"  @if($address->province =="Province 6") selected @endif>Province 6</option>
                                                            <option value="Province 7"  @if($address->province =="Province 7") selected @endif>Province 7</option>
                                                            </select>
                                                </div>
                                            </div>
                                          
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Zone</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" name="zone"
                                                        value="{{  $address->zone }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">District</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" name="district"
                                                        value="{{ $address->district }}">
                                                </div>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">City</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" name="city"
                                                        value="{{ $address->city }}">
                                                </div>
                                            </div><div class="row mb-3">
                                                <div class="col-sm-3">
                                                    <h6 class="mb-0">Street</h6>
                                                </div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="text" class="form-control" name="street"
                                                        value="{{ $address->street }}">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-sm-3"></div>
                                                <div class="col-sm-9 text-secondary">
                                                    <input type="Submit" class="btn btn-success px-4" value="Save Changes">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                    </div>
                </div>
            </div> 
              
              <div class="box box-primary">

                <div class="container">
                    <div class="main-body">
                  <h2>My Images</h2>
                  @foreach ($userImages as $userImage)
                      <div class="col-sm-3">
                          <img class="img-rounded"  id="{{$userImage->id}}" onclick="showImage(this,{{$userImage->id}})"
                              src="{{ asset('uploads/userimages' . '/' . $userImage->image_name) }}"
                              width="200" height="200">
                      </div>
                  @endforeach 
                    </div>
                </div>
              </div>
        </section><!-- /.content -->
    </div>
    </div>
    </div><!-- /.content-wrapper -->
    
    <div id="myModal" class="modal">

      <span class="close" onclick="document.getElementById('myModal').style.display='none'">&times;</span>

      <img class="modal-content" id="img" style="max-width: 100%; max-height:100%;  display: block;
      margin-left: auto;
      margin-right: auto ">
      
      <div id="caption"></div>
  </div> 

@endsection

  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
<script>
    function previewFile() {
        const preview = document.querySelector('#mainimage');
        preview.src = "";
        const file = document.querySelector('input[type=file]').files[0];
        const reader = new FileReader();

        reader.addEventListener("load", function() {
            // convert image file to base64 string
            preview.src = reader.result;
        }, false);

        if (file) {
            reader.readAsDataURL(file);

        }
    } 
 
    function showImage(element,i){
    // Get the modal
    var modal = document.getElementById('myModal');
 
    var img = document.getElementById(i);
    var modalImg = document.getElementById("img");  
        modalImg.src = element.src;  
        modal.style.display = "block";
   } 

   
   function previewFile() {
  const preview = document.querySelector('img');
  const file = document.querySelector('input[type=file]').files[0];
  const reader = new FileReader();

  reader.addEventListener("load", function () {
    // convert image file to base64 string
    preview.src = reader.result;
  }, false);

  if (file) {
    reader.readAsDataURL(file);
    document.getElementById("profile_pic").style.width="180";
    document.getElementById("profile_pic").style.height="180";
    document.getElementById("profile_pic").style.display = "initial";
    document.getElementById("profilepicfile").style.visibility = "hidden";
    document.getElementById("profilepicsubmit").style.display = "initial"; 
  } 
}
</script>
