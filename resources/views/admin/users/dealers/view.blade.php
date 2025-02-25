@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="box box-primary">
            @include('flashMsg.flashmessages')
            <div class="box-header">
                <h3>
                    Dealers Details
                </h3>
            </div>
            <div class="box-body" style="min-height: 700px;">
                <div class="col-md-6 pull-right">
                    <div class="box box-primary">
                        <div class="box-header">
                            PAN or VAT Images
                        </div>
                        <div class="box-body">
                            @foreach ($userImages as $userImage)
                               <img class="img-rounded" src="{{ asset('uploads/userimages' . '/' . $userImage->image_name) }}" width="200" height="200">
                            @endforeach
                        </div>
                    </div>
                </div>

                <ul class="list-group col-md-6">
                    <li class="list-group-item">
                        Name : {{ $dealer->name }}
                    </li>
                    <li class="list-group-item">
                        Email : {{ $dealer->email }}
                    </li>
                    <li class="list-group-item">
                        Company : {{ $dealer_profile->company_name }}
                    </li>
                    <li class="list-group-item">
                        Company Address : {{ $dealer_profile->company_address }}
                    </li>
                    <li class="list-group-item">
                        Mobile Number : {{ $dealer_profile->phone_number }}
                    </li>
                    <li class="list-group-item">
                        LandLine Number : {{ $dealer_profile->landline_number }}
                    </li>
                    <li class="list-group-item">
                        Created : {{ $dealer->created_at->diffForHumans() }}
                    </li>
                    <li class="list-group-item">
                        Updated : {{ $dealer->updated_at->diffForHumans() }}
                    </li>
                    <li class="list-group-item">
                        Approval Status: &nbsp;
                        @if ($dealer->is_approved == 0)
                            Not Approved <a href="{{ url('dealers/approve-dealer', $dealer->id) }}"
                                class="btn btn-primary btn-xs">Approve this User</a>
                        @else
                            Approved <a href="{{ url('dealers/disapprove-dealer', $dealer->id) }}"
                                class="btn btn-danger btn-xs">Disapprove this User</a>
                        @endif
                    </li>
                    <ul>
            </div>
        </div>
    </div>
@endsection
