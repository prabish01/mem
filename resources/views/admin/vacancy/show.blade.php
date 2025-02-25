@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="box box-primary" style="min-height: 700px;">
                @include('flashMsg.flashmessages')
                <div class="box-header">
                    <h3>
                        Career Form Details
                    </h3>
                </div>
                <div class="box-body" >
                    <div class="col-md-6 pull-right">
                        <div class="box box-primary">
                            
                        </div>
              
                    </div>

                    <ul class="list-group col-md-6">
                        <li class="list-group-item">
                            <strong>Sender Name</strong> : {{ $vacancy->name }}
                        </li>
                        <li class="list-group-item">
                            <strong>Sender Email</strong> : {{ $vacancy->email }}
                        </li>

                        <li class="list-group-item">
                            <strong>Sender Phone No.</strong> : {{ $vacancy->phone  }}
                        </li>

                        <li class="list-group-item">
                            <strong>Applied For</strong> : {{ $vacancy->vacancy }}
                        </li>

                        <li class="list-group-item">
                            <strong>Created At</strong> : {{ $vacancy->created_at->diffForHumans() }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
