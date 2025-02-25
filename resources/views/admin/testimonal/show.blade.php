@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="box box-primary">
                @include('flashMsg.flashmessages')
                <div class="box-header">
                    <h3>
                        Testimonal Details
                        <div class="pull-right">
                            <a href="{{ url('testimonal/add') }}" class="btn btn-primary">Add Testimonal</a>
                        </div>
                    </h3>
                </div>
                <div class="box-body" >
                    <div class="col-md-6 pull-right">
                        <div class="box box-primary">
                            <div class="box-header">
                                Image
                            </div>
                            <div class="box-body">
                                <img src="{{ asset('uploads/testimonal'.'/'.$testimonal->image) }}" width="100%">
                            </div>
                        </div>
                    </div>

                    <ul class="list-group col-md-6">
                        <li class="list-group-item">
                            <strong>Name</strong> : {{ $testimonal->title }}
                        </li>

                        <li class="list-group-item">
                            <strong>Position</strong> : {{ $testimonal->position  }}
                        </li>

                        <li class="list-group-item">
                            <strong>Rating</strong> : {{ $testimonal->rating  }}
                        </li>

                        <li class="list-group-item">
                            <strong>Description</strong> : {{ $testimonal->description }}
                        </li>
                        <li class="list-group-item">
                            <strong>Created</strong> : {{ $testimonal->created_at->diffForHumans() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Updated</strong> : {{ $testimonal->updated_at->diffForHumans() }}
                        </li>
                    </ul>
                    <a href="{{url('testimonal/edit', $testimonal->id)}}" class="btn btn-primary"> Edit This Testimonal</a>
                </div>
            </div>
        </div>
    </div>
@endsection
