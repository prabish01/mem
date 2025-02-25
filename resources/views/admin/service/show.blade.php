@extends('layouts.backend')
@section('admin-content')
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="box box-primary">
                @include('flashMsg.flashmessages')
                <div class="box-header">
                    <h3>
                        Service Details
{{--                        <div class="pull-right">--}}
{{--                            <a href="{{ url('service/add') }}" class="btn btn-primary">Add Service</a>--}}
{{--                        </div>--}}
                    </h3>
                </div>
                <div class="box-body" >

                    <ul class="list-group col-md-6">
                        <li class="list-group-item">
                            <strong>Title</strong> : {{ $service->title }}
                        </li>>

                        <li class="list-group-item">
                            <strong>Description</strong> : {{ $service->description }}
                        </li>
                        <li class="list-group-item">
                            <strong>Created</strong> : {{ $service->created_at->diffForHumans() }}
                        </li>
                        <li class="list-group-item">
                            <strong>Updated</strong> : {{ $service->updated_at->diffForHumans() }}
                        </li>
                    </ul>
                    <a href="{{url('service/edit', $service->id)}}" class="btn btn-primary"> Edit This Service</a>
                </div>
            </div>
        </div>


    </div>
@endsection
