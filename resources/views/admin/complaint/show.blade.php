@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="box box-primary">
                @include('flashMsg.flashmessages')
                <div class="box-header">
                    <h3>
                        Complaint Details
                    </h3>
                </div>
                <div class="box-body" >
                    <div class="col-md-6 pull-right">
                        <div class="box box-primary">
                            <div class="box-header">
                                Warrenty Image
                            </div>
                            <div class="box-body">
                                <img src="{{ asset('uploads/complain'.'/'.$complaint->warrenty) }}" width="100%">
                            </div>
                        </div>
                        <div class="box box-primary">
                            <div class="box-header">
                                Billing Image
                            </div>
                            <div class="box-body">
                                <img src="{{ asset('uploads/complain'.'/'.$complaint->billing) }}" width="100%">
                            </div>
                        </div>
                    </div>

                    <ul class="list-group col-md-6">
                        <li class="list-group-item">
                            <strong>Sender Name</strong> : {{ $complaint->name }}
                        </li>

                        <li class="list-group-item">
                            <strong>Sender Email</strong> : {{ $complaint->email }}
                        </li>
                        <li class="list-group-item">
                            <strong>Sender Phone No</strong> : {{ $complaint->phone }}
                        </li>
                        <li class="list-group-item">
                            <strong>Sender State</strong> : {{ $complaint->state }}
                        </li>
                        <li class="list-group-item">
                            <strong>Sender City</strong> : {{ $complaint->city }}
                        </li>
                        <li class="list-group-item">
                            <strong>Sender Address</strong> : {{ $complaint->address }}
                        </li>
                        <li class="list-group-item">
                            <strong>Sender Street</strong> : {{ $complaint->street }}
                        </li>
                        <li class="list-group-item">
                            <strong>Sender Landmark</strong> : {{ $complaint->landmark }}
                        </li>
                        <li class="list-group-item">
                            <strong>Complaint Category</strong> : {{ $complaint->category }}
                        </li>
                        <li class="list-group-item">
                            <strong>Complaint Product Name</strong> : {{ $complaint->product }}
                        </li>
                        <li class="list-group-item">
                            <strong>Product Serial No</strong> : {{ $complaint->productserial }}
                        </li>
                        <li class="list-group-item">
                            <strong>Purchased Date</strong> : {{ \Carbon\Carbon::parse($complaint->purchase_date)->format('M d, Y') }}
                        </li>
                        <li class="list-group-item">
                            <strong>Complaint Symptom</strong> : {{ $complaint->complaint }}
                        </li>
                        <li class="list-group-item">
                            <strong>Remark</strong> : {!! $complaint->remark !!}
                        </li>
                        <li class="list-group-item">
                            <strong>Created</strong> : {{ $complaint->created_at->diffForHumans() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Updated</strong> : {{ $complaint->updated_at->diffForHumans() }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
